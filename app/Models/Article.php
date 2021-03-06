<?php

namespace ActivismeBe\Models;

use ActivismeBe\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * Class Article
 * 
 * @package ActivismeBe\Models
 */
class Article extends Model
{
    use Searchable, SoftDeletes;

    /**
     * Mass-assign fields for the database storage table. 
     * 
     * @return array
     */
    protected $fillable = ['title', 'content'];

    /**
     * Get the author data in the storage through the relation.
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
       return $this->belongsTo(User::class);
    }
}
