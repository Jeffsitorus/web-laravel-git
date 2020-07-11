<?php

namespace App\Http\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Blog;
use App\Category;
use App\Http\Requests\BlogRequest;
use App\Tag;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $blogs = Blog::latest()->paginate(6);
        return view('blogs.index', [
            'blogs'     => $blogs,
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function create()
    {
        $this->middleware('auth');
        return view('blogs.create', [
            'categories'    => Category::get(),
            'tags'          => Tag::get(),
        ]);
    }

    public function store(BlogRequest $request)
    {
        $blog = $request->all();
        $blog['slug']        = Str::slug($request->judul);
        $blog['category_id'] = $request->category;
        $blog = Blog::create($blog);
        $blog->tags()->attach(request('tags'));
        session()->flash('success', 'Blog baru berhasil ditambahkan!');
        return back();
    }

    public function edit(Blog $blog)
    {
        $categories = Category::get();
        $tags       = Tag::get();
        return view('blogs.edit', compact(['blog', 'categories', 'tags']));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $attr           = $request->all();
        $attr['category_id'] = $request->category;
        $blog->tags()->sync(request('tags'));
        $blog->update($attr);
        session()->flash('success', 'Blog berhasil diubah');
        return back();
    }

    public function destroy(Blog $blog)
    {
        $blog->tags()->detach();
        $blog->delete();
        session()->flash('success', 'Blog berhasil dihapus');
        return redirect(route('blog.index'));
    }
}
