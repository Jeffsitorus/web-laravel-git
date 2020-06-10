<div class="form-group">
  <label for="name">Name</label>
  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid
  @enderror" value="{{old('name') ?? $category->name}}" placeholder="Category name">
  @error('name')
  <div class="invalid-feedback">
    {{$message}}
  </div>
  @enderror
</div>
<div class="form-group">
  <button type="submit" class="btn btn-primary">{{$submit ?? 'Update'}}</button>
</div>