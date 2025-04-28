<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    /**
     * Get all posts written by this author.
     *
     * This establishes a one-to-many relationship between Author and Post.
     * One Author can have many Posts.
     */
    
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
