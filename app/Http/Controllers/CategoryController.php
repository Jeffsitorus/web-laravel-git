<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data   = request()->all();
        $data['slug']   = Str::slug($request->name);
        Category::create($data);
        session()->flash('success','The category was created');
        return redirect()->to('categories');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data   = $request->all();
        $category->update($data);
        session()->flash('success','The category was updated');
        return redirect()->to('categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success','The category was destroyed');
        return redirect()->to('categories');
    }
}
