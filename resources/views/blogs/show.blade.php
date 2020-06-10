@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row mt-3">
        <div class="col-12">
          <h2>{{$blog->judul}}</h2>
          <p>{{$blog->deskripsi}}</p>
          <div class="mt-3">
            <button type="button" class="btn btn-link btn-sm p-0 text-danger" data-toggle="modal" data-target="#modelId"> Delete</button>
          </div>
        </div>
      </div>
    </div>
@endsection

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
        <form action="/blog/{{$blog->slug}}/delete" method="post">
          @csrf
          @method('delete')
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ya</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
      </div>
    </form>
    </div>
  </div>
</div>