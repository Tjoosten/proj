<?php 

namespace ActivismeBe\Repositories; 

use ActivismeBe\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

/**
 * Class UserRepository
 * 
 * @package ActivismeBe\Repositories
 */
class UserRepository extends Authenticatable
{
    /**
     * Function for processing delete request from users. 
     * 
     * @param  Request $request The request information collection bag. 
     * @param  User    $user    The resource entity from the given user. 
     * @return void
     */
    public function processDeleteRequest(Request $request, User $user): void
    {
        if ($this->isValidConfirmation($request) && $user->delete()) { // Confirmation is valid && User has been deleted in the system.
            $undoLink = '<a href="'. route('users.delete.undo', $user) .'">undo</a>';
            $this->flashWarning("The login for {$user->name} has been deleted. {$undoLink}")->important();
        }
    }

    /**
     * Confirm that the value from the confirmation input is the same as the auth user his password. 
     * 
     * @param  Request $request The request information collection bag. 
     * @return bool
     */
    private function isValidConfirmation(Request $request): bool
    {
        return Hash::check($request->confirmation, auth()->user()->getAuthPassword());
    }
}