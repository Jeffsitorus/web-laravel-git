@extends('layouts.layout', ['title'  => 'Create new Blog'])

@section('content')
    <div class="container mt-3">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4>Update Blog: {{$blog->judul}}</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('blog.update',$blog->slug) }}" method="post">
                @method('patch')
                @csrf
                @include('blogs.partials.form-control')
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
