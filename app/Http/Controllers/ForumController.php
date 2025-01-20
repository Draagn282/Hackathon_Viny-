<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs; // Assuming you have a Blog model
use App\Models\Comments; // Assuming you have a Comment model

class ForumController extends Controller
{
    /**
     * Display a listing of the forums (blogs).
     */
    public function index()
{
    // Filter data op basis van de specificaties
    $beginnersBlog = Blogs::where('id', 1)->get(); // Alleen Blogs met id 1
    $ownersBlogs = Blogs::where('account_id', 1)->get(); // Blogs van de ingelogde gebruiker
    $generalBlogs = Blogs::all(); // Alle Blogs

    // Doorsturen naar de view
    return view('forums.index', compact('beginnersBlog', 'ownersBlogs', 'generalBlogs'));
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
        // dd($request);

        // Create the new comment
        Comments::create([
            'description' => $request['content'],
            'blogs_id' => $request['blogs_id'],
            'account_id' => $request['account_id']
        ]);  
        
        // Redirect back to the blog post page
        return redirect()->route('forums.index')->with('success', 'Blog post created successfully!');
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
