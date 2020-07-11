<?php

namespace App\Http\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tag::get();
        return view('tags.index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        $blogs = $tag->blogs()->latest()->paginate(6);
        return view('blogs.index', compact('blogs', 'tag'));
    }

    public function store(Request $request)
    {
        $data = [
            'name'       => $request->name,
            'slug'       => Str::slug($request->name),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        Tag::create($data);
        session()->flash('success', 'The tag was created');
        return redirect()->to(route('tag.index'));
    }

    public function update(Tag $tag, Request $request)
    {
        $data = $request->all();
        $tag->update($data);
        session()->flash('success', 'The tag was updated');
        return back();
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('success', 'The tag was deleted');
        return back();
    }
}
