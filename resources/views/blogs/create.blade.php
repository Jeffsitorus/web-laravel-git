@extends('layouts.layout', ['title'  => 'Create new Blog'])

@section('content')
    <div class="container mt-3">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4>Create New Blog</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('blog.store') }}" method="post">
                @csrf
                @include('blogs.partials.form-control',[
                  'blog'    => new \App\Blog,
                  'submit'  => 'Create'
                  ]
                )
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
