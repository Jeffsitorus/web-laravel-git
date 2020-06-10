@extends('layouts.app', ['title'  => 'All Blogs'])

@section('content')
    <div class="container">
      <div class="d-flex justify-content-between py-3">
        <div>
          <h1>List Blogs</h1>
          <hr>
        </div>
        <div>
          <a href="{{ url('/blog/create') }}" class="btn btn-primary btn-lg">New Blog</a>
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
              <p>Category : {{$blog->category->name}}</p>
              <a href="{{ url('blogs/'.$blog->slug)}}">Baca Selengkapnya</a>
            </div>
            <div class="card-footer d-flex justify-content-between">
              {{-- Diposting {{ $blog->created_at->format('d F, Y') }} --}}
              Diposting {{ $blog->created_at->diffForHumans() }}
              <a href="blog/{{$blog->slug}}/edit" class="btn btn-sm btn-success">Edit</a>
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