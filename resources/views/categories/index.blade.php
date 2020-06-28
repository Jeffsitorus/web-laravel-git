@extends('layouts.layout')

@section('content')
    <div class="container">
      <div class="row mt-3">
        <div class="col-md-8">  
          <a href="{{ route('category.create') }}" class="btn btn-primary mb-2"> Create</a>
          <div class="table-responsive">
            <table class="table table-bordered table-inverse">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Actions</th>
                </tr>
              </thead>
              @foreach ($categories as $key => $category)  
              <tbody>
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$category->name}}</td>
                  <td>{{$category->slug}}</td>
                  <td>
                    <a href="{{ route('category.edit', $category->slug) }}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modelId{{$category->slug}}">
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection

@foreach ($categories as $category)
  <!-- Modal -->
  <div class="modal fade" id="modelId{{$category->slug}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Anda yakin menghapusnya?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          {{$category->name}}
          <div class="mt-2">
            <small>Diinputkan {{$category->created_at->diffForHumans()}}</small>
          </div>
          <form action="{{ route('category.destroy', $category->slug) }}" method="post">
          @csrf
          @method('delete')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Ya</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endforeach