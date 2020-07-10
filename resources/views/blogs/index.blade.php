@extends('layouts.layout', ['title'  => 'All Blogs'])

@section('content')
    <div class="container">
      <div class="d-flex justify-content-between py-3">
        <div>
          @isset($category)
          <h4>Category : {{$category->name}}</h4>
          @endisset
          @isset($tag)
              <h4>Tag : {{ $tag->name }}</h4>
          @endisset

          @if (!isset($category) and !isset($tag))
            <h2>List Blogs</h2>
          @endif
          <hr>
        </div>
        <div>
          <a href="{{ route('blog.create') }}" class="btn btn-primary btn-lg">New Blog</a>
        </div>
      </div>
      <div class="row">
        @foreach ($blogs as $blog)    
        <div class="col-md-4">
          <div class="card mb-3">
            <div class="card-header">
              {{$blog->judul}}
            </div>
            <div class="card-body">
              <p>{{ Str::limit($blog->deskripsi,100) }}</p>
              <a href="{{ route('blog.show', $blog->slug) }}">Baca Selengkapnya</a>
            </div>
            <div class="card-footer d-flex justify-content-between">
              {{-- Diposting {{ $blog->created_at->format('d F, Y') }} --}}
              Diposting {{ $blog->created_at->diffForHumans() }}
              <a href="{{ route('blog.edit', $blog->slug) }}" class="btn btn-sm btn-success">Edit</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-center">
        <div>
          {{ $blogs->links() }}
        </div>
      </div>
    </div>
@endsection