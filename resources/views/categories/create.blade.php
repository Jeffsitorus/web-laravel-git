@extends('layouts.layout')

@section('content')
    <div class="container">
      <div class="row mt-3">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              Create New Category
            </div>
            <div class="card-body">
              <form action="{{ route('category.store') }}" method="post">
                @csrf
                @include('categories.partials.form-control',[
                  'submit'  => 'Create',
                  'category'=> new \App\Category,
                  ])
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection