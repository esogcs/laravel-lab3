<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of all posts with their authors.
     *
     * This method uses eager loading to fetch the authors
     * along with the posts, reducing database queries.
     */
    public function index(): View
    {
        // Retrieve all posts with eager loading of authors
        $posts = Post::with('author')->latest()->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Display a specific post with its author and comments.
     *
     * This method retrieves a specific post by ID and loads
     * its associated author and comments information.
     */
    public function show($id): View
    {
        // Find the post by ID with eager loading of author and comments
        $post = Post::with(['author', 'comments'])->findOrFail($id);

        return view('posts.show', compact('post'));
    }
}
