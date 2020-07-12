@extends('layouts.layout')

@section('content')
<div class="container pb-5">
  <div class="row mt-3">

    <div class="col-md-8">
      <div class="card">
        @if ($blog->thumbnail)
          <img src="{{ $blog->TakeImage }}" style="height: 450px; object-fit:cover; object-position:center;" class="rounded" alt="">
        @endif
        <div class="card-body">
          <h4>{{$blog->judul}}</h4>
            <div class="text-muted text-small">Category : <a href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a> <b>&middot; {{$blog->created_at->format('d F, Y')}}</b> 
              &middot; @foreach ($blog->tags as $tag)
                  <a href="{{ route('tag.show', $tag->slug) }}">{{ $tag->name }}</a>
              @endforeach
            </div>
            <div class="media my-3">
              <img src="{{ $blog->author->gravatar() }}" class="rounded-circle mr-3" width="60">
              <div class="media-body">
                <div class="mt-2">
                  <small>{{ $blog->author->name }}</small>
                </div>
                  <small>{{ '@' . $blog->author->username }}</small>
              </div>
            </div>
          <hr>
          <p>{!! nl2br($blog->deskripsi) !!}</p>
          <div class="mt-3">
            @auth
            {{-- @if (auth()->user()->id == $blog->user_id) --}}
            @can('delete', $blog)
              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modelId"> Delete</button>
            @endcan
    
              {{-- @if (auth()->user()->is($blog->author)) --}}
              @can('update', $blog)
                <a href="{{ route('blog.edit', $blog->slug) }}" class="btn btn-sm btn-success">Edit</a>
              @endcan
              {{-- @endif --}}
    
              {{-- @endif --}}
            @else
              <a href="{{ route('blog.index') }}" class="btn btn-info"> Back Home</a>
            @endauth
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-4">

      @forelse ($blogs as $blog)    
        <div class="card mb-3">
          <div class="card-body">
            <a href="{{ route('categories.show', $blog->category->slug) }}" class="text-secondary">
              <small>{{ ucfirst($blog->category->name) }} -</small>
            </a>
            @foreach ($blog->tags as $tag)
            <a href="{{ route('tag.show', $tag->slug) }}" class="text-secondary">
              <small>{{ $tag->name }}</small>
            </a>
            @endforeach
            <div class="card-title">
              <h5>
                <a class="text-dark" href="{{ route('blog.show', $blog->slug) }}">
                  <h6>{{$blog->judul}}</h6>
                </a>
              </h5>
            </div>

            <div class="my-3 text-secondary">
              <small>{{ Str::limit($blog->deskripsi,100) }}</small>
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
      {{ $blogs->links() }}
    </div>

  </div>
</div>
@endsection

@auth
  @can('delete', $blog)
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Anda yakin ingin menghapusnya?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4>{{$blog->judul}}</h4>
            <div class="mt-3">
              <small>Diposting {{$blog->created_at->diffForHumans()}}</small>
            </div>
            <form action="{{ route('blog.destroy',$blog->slug) }}" method="post">
              @csrf
              @method('DELETE')
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Ya</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  @endcan
@endauth