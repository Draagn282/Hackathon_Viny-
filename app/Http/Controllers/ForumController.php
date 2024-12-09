<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs; // Assuming you have a Blog model
use App\Models\Comment; // Assuming you have a Comment model

class ForumController extends Controller
{
    /**
     * Display a listing of the forums (blogs).
     */
    public function index()
    {
        // Fetch all blog posts
        $blogs = Blogs::all();
        return view('forums.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create()
    {
        return view('forums.create');
    }

    /**
     * Store a newly created blog post in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'header' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new blog post
        Blogs::create([
            'header' => $validatedData['header'],
            'description' => $validatedData['description'],
            'account_id' => auth()->id(), // Assuming the user is logged in
        ]);

        return redirect()->route('forums.index')->with('success', 'Blog post created successfully!');
    }

    /**
     * Display the specified blog post and its comments.
     */
    public function show(string $id)
    {
        // Find the blog post
        $blog = Blogs::findOrFail($id);

        // Get comments for the blog post
        $comments = $blog->comments;

        return view('forums.show', compact('blog', 'comments'));
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit(string $id)
    {
        // Find the blog post
        $blog = Blogs::findOrFail($id);

        return view('forums.edit', compact('blog'));
    }

    /**
     * Update the specified blog post in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'header' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Find and update the blog post
        $blog = Blogs::findOrFail($id);
        $blog->update($validatedData);

        return redirect()->route('forums.index')->with('success', 'Blog post updated successfully!');
    }

    /**
     * Remove the specified blog post from storage.
     */
    public function destroy(string $id)
    {
        // Find and delete the blog post
        $blog = Blogs::findOrFail($id);
        $blog->delete();

        return redirect()->route('forums.index')->with('success', 'Blog post deleted successfully!');
    }
}
