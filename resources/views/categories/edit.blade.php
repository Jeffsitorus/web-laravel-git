@extends('layouts.layout')

@section('content')
    <div class="container">
      <div class="row mt-3">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              Update Category : {{$category->name}}
            </div>
            <div class="card-body">
              <form action="{{ route('category.edit', $category->slug) }}" method="post">
                @csrf
                @method('patch')
                @include('categories.partials.form-control')
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection