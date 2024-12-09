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
        $blog = Blogs::all();
        return view('forums.index', compact('blog'));
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
            'account_id' => 'required|string'
        ]);

        // Create a new blog post
        Blogs::create([
            'header' => $validatedData['header'],
            'description' => $validatedData['description'],
            'account_id' => $validatedData['account_id'],
        ]);

        return redirect()->route('forums.index')->with('success', 'Blog post created successfully!');
    }

    public function storeComment(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'content' => 'required|string', // Ensure the content of the comment is required and a string
            'blog_id' => 'required|exists:blogs,id', // Ensure the blog_id exists in the blogs table
            'account_id' => 'required|string'

        ]);
    
        // Create the new comment
        Comment::create([
            'content' => $validatedData['content'],
            'blog_id' => $validatedData['blog_id'],
            'account_id' => $validatedData['account_id']
        ]);
    
        // Redirect back to the blog post page
        return redirect()->route('forums.show', $validatedData['blog_id'])->with('success', 'Comment posted successfully!');
    }
    
    


    /**
     * Display the specified blog post and its comments.
     */
    public function show(string $id)
    {
        // Fetch the blog post and eager load the associated Account and Comments
        $blog = Blogs::with('account', 'comments.account')->findOrFail($id);
    
        // Get the comments for the blog post
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
