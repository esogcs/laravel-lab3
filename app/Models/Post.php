<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'title', 'content'];

    /**
     * Get the author of this post.
     *
     * This establishes the inverse relationship to Author.
     * Each Post belongs to one Author.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get all comments for this post.
     *
     * This establishes a one-to-many relationship between Post and Comment.
     * One Post can have many Comments.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
