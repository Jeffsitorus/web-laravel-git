<?php

namespace App\Http\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs'     => Blog::paginate(6),
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(BlogRequest $request)
    {
        // $blog = new Blog;
        // $blog->slug    = Str::slug($request->judul);
        // $blog->judul   = $request->judul;
        // $blog->deskripsi    = $request->deskripsi;
        // $blog->created_at   = date('Y-m-d H:i:s');
        // $blog->save();
        // return redirect()->to('blogs');
        // return back();

        // validate is field

        $blog = $request->all();
        $blog['slug']    = Str::slug($request->judul);
        Blog::create($blog);
        session()->flash('success', 'Blog baru berhasil ditambahkan!');
        return back();
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $data   = $request->all();
        $blog->update($data);
        session()->flash('success', 'Blog berhasil diubah');
        return back();
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        session()->flash('success', 'Blog berhasil dihapus');
        return redirect(route('blog.index'));
    }
}
