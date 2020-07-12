<?php

namespace App\Http\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Blog;
use App\Category;
use App\Http\Requests\BlogRequest;
use App\Tag;
use Illuminate\Support\Facades\Storage;
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

        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $attr = $request->all();
        $slug        = Str::slug($request->judul);
        $attr['slug'] = $slug;

        $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store("images/post") : null;
        $attr['category_id'] = $request->category;
        $attr['thumbnail']   = $thumbnail;

        $blog = auth()->user()->blogs()->create($attr);
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
        $this->authorize('update', $blog);

        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $attr           = $request->all();
        if (request()->file('thumbnail')) {
            Storage::delete($blog->thumbnail);
            $thumbnail = request()->file('thumbnail')->store("images/post");
        } else {
            $thumbnail = $blog->thumbnail;
        }
        $attr['category_id'] = $request->category;
        $attr['thumbnail']   = $thumbnail;

        $blog->tags()->sync(request('tags'));
        $blog->update($attr);
        session()->flash('success', 'Blog berhasil diubah');
        return back();
    }

    public function destroy(Blog $blog)
    {
        // if (auth()->user()->id == $blog->user_id) {
        $this->authorize('delete', $blog);
        Storage::delete($blog->thumbnail);
        $blog->tags()->detach();
        $blog->delete();
        session()->flash('success', 'Blog berhasil dihapus');
        return redirect(route('blog.index'));
        // } else {
        // session()->flash('error', 'Tidak dapat menghapus blog!, Ini bukan blog anda!');
        // return redirect(route('blog.index'));
        // }
    }
}
