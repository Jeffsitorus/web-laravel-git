<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function post()
    {
        $query = request('query');
        $blogs = Blog::with(['author', 'tags', 'category'])->where("judul", "like", "%$query%")->paginate(3);
        return view('blogs.index', compact('blogs'));
    }
}
