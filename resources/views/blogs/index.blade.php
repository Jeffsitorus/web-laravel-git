@extends('layouts.layout', ['title'  => 'All Blogs'])

@section('content')
  <div class="container mt-4">
    <div class="d-flex justify-content-between">
      @isset($category)
      <h4>Category : {{$category->name}}</h4>
      @endisset
      @isset($tag)
          <h4>Tag : {{ $tag->name }}</h4>
      @endisset

      @if (!isset($category) and !isset($tag))
        <h2>List Blogs</h2>
      @endif
    </div>

    <div class="row mt-3">
      <div class="col-md-7">
        @forelse ($blogs as $blog)    
          <div class="card mb-3">
            @if ($blog->thumbnail)
            <a href="{{ route('blog.show', $blog->slug) }}">
              <img style="height: 400px; object-fit:cover; object-position:center;" src="{{ $blog->TakeImage }}" class="card-img-top">
            </a>
            @endif
            <div class="card-body">
              
              <div class="my-2">
                <a href="{{ route('categories.show', $blog->category->slug) }}" class="text-secondary">
                  <small>{{ ucfirst($blog->category->name) }} -</small>
                </a>
                @foreach ($blog->tags as $tag)
                <a href="{{ route('tag.show', $tag->slug) }}" class="text-secondary">
                  <small>{{ $tag->name }}</small>
                </a>
                @endforeach
              </div>

              <div class="card-title">
                <h5>
                  <a class="text-dark" href="{{ route('blog.show', $blog->slug) }}">
                    {{$blog->judul}}
                  </a>
                </h5>
              </div>

              <div class="my-3 text-secondary">
                {{ Str::limit($blog->deskripsi,130) }}
              </div>

              <div class="d-flex justify-content-between mt-2">
                <div class="media align-items-center">
                  <img src="{{ $blog->author->gravatar() }}" class="rounded-circle mr-3" width="35" alt="">
                  <div class="media-body">
                    <div class="text-secondary">
                      {{ $blog->author->name }}
                    </div>
                  </div>
                </div>
                <div class="text-secondary mt-3">
                  <small>
                    {{-- Diposting {{ $blog->created_at->format('d F, Y') }} --}}
                    <p class="p-0">Diposting {{ $blog->created_at->diffForHumans() }}</p>
                  </small>
                </div>
              </div>
      
            </div>
          </div>
        @empty
        <div class="col-md-6">
          <div class="alert alert-danger">
            There's no posts.
          </div>
        </div>
        @endforelse
      </div>

      <div class="col-md-5">
        @forelse ($blogs as $blog)
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-5">
                <a href="{{ route('blog.show', $blog->slug) }}">
                  <img src="{{ $blog->TakeImage }}" height="120" class="card-img" alt="Image">
                </a>
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <a href="{{ route('blog.show', $blog->slug) }}">
                    <h6 class="card-title">{{ $blog->judul }}</h6>
                  </a>
                    <small>
                      <a href="{{ route('categories.show', $blog->category->slug) }}">
                        {{ ucfirst($blog->category->name) }} -
                      </a>
                      @foreach ($blog->tags as $tag)
                      <a href="{{ route('tag.show', $tag->slug) }}">
                        {{ ucfirst($tag->name) }}
                      </a>
                      @endforeach
                    </small>
                  <small><p class="card-text text-muted">{{ $blog->created_at->format('d F, Y') }}</p></small>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="alert-alert-danger">
            There's no posts.
          </div>
        @endforelse
      
      </div>
      
    </div>

    {{ $blogs->links() }}

  </div>
@endsection