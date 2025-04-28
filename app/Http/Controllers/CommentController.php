<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * This method validates the comment data, creates a new comment
     * associated with the specified post, and redirects back to the post
     * with a success message.
     */
    public function store(Request $request, $postId): RedirectResponse
    {
        // Validate the request data
        $validated = $request->validate([
            'commenter_name' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        // Find the post
        $post = Post::findOrFail($postId);

        // Create the comment associated with the post
        $post->comments()->create($validated);

        // Redirect back to the post with a success message
        return redirect()->route('posts.show', $postId)
            ->with('success', 'Comment added successfully!');
    }
}
