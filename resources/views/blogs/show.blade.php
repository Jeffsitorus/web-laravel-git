@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row mt-3">
    <div class="col-12">
      <h4>{{$blog->judul}}</h4>
      <small>
        <p class="text-muted text-small">Category : <a href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a> <b>&middot; {{$blog->created_at->format('d F, Y')}}</b> 
          &middot; @foreach ($blog->tags as $tag)
              <a href="{{ route('tag.show', $tag->slug) }}">{{ $tag->name }}</a>
          @endforeach
          
        </p>
        <p class="text-muted text-small">Penulis : {{ $blog->author->name }}</p>
      </small>
      <hr>
      <p>{{$blog->deskripsi}}</p>
      <div class="mt-3">
        @auth
        @if (auth()->user()->id == $blog->user_id)
          <button type="button" class="btn btn-link btn-sm p-0 text-danger" data-toggle="modal" data-target="#modelId"> Delete</button>
        @endif
        @else
          <a href="{{ route('blog.index') }}" class="btn btn-info"> Back Home</a>
        @endauth
      </div>
    </div>
  </div>
</div>
@endsection

@auth
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
@endauth