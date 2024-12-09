<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        // Pass data to the forum view if needed
        return view('Forum');
    }
}
