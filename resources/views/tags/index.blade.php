@extends('layouts.layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="d-flex justify-content-between py-3">
          <h2>List Tags</h2>
          <a href="#" data-toggle="modal" data-target="#modelId" class="btn btn-lg btn-primary">Create Tag</a>
        </div>
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tags as $tag)
                    <tr>
                      <td scope="row">{{ $loop->iteration }}</td>
                      <td>{{ $tag->name }}</td>
                      <td>{{ $tag->slug }}</td>
                      <td width="30%" class="text-center">
                        <a href="" data-toggle="modal" data-target="#{{ $tag->slug }}" class="btn btn-primary btn-sm"> Edit</a>
                        <a href="#" data-toggle="modal" data-target="#delete{{ $tag->slug }}" class="btn btn-warning btn-sm"> Delete</a>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@include('tags.modal')