<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'commenter_name', 'comment'];

    /**
     * Get the post that this comment belongs to.
     *
     * This establishes the inverse relationship to Post.
     * Each Comment belongs to one Post.
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
