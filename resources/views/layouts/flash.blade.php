@if (session()->has('success'))
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="alert alert-success mt-3">
        {{-- {{session()->get('success')}} --}} 
          {{-- step 1 --}}
        {{ Session::get('success') }}
        {{-- step 2 --}}
      </div>
    </div>
  </div>
</div>
@endif

@if (session()->has('error'))
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="alert alert-danger mt-3">
        {{ Session::get('error') }}
      </div>
    </div>
  </div>
</div>
@endif