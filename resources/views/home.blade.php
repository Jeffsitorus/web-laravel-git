@extends('layouts.layout')

@section('content')
<div class="container py-5">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @forelse ($blogs as $blog)
                        <div class="col-md-6">
                            <div class="card my-3">
                                @if ($blog->thumbnail)                            
                                <a href="{{ route('blog.show', $blog->slug) }}" class="img-link">
                                    <img src="{{ $blog->TakeImage }}" style="height: 370px; object-fit: cover; object-position: center;" class="card-img-top" alt="image">
                                </a>
                                @endif
                                <div class="card-body">
                                    <a href="{{ route('blog.show', $blog->slug) }}">
                                        <h5 class="card-title">{{ $blog->judul }}</h5>
                                    </a>

                                    <div class="my-3 text-secondary">
                                        {{ Str::limit($blog->deskripsi,110) }}
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
                        </div>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                There's no post.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
