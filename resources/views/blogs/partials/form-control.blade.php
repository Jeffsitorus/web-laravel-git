<div class="form-group">
  <label for="Judul">Judul</label>
  <input type="text" name="judul" id="judul" value="{{ old('judul') ?? $blog->judul }}" class="form-control @error('judul') is-invalid @enderror">
  @error('judul')
    <div class="invalid-feedback mt-2">
      {{$message}}
      {{-- Judul harus diisi. --}}
    </div>
  @enderror
</div>

<div class="form-group">
  <label for="category">Kategori</label>
  <select name="category" id="category" class="form-control">
    <option selected disabled>Choose One!</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}"{{ $category->id == $blog->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
    @endforeach
  </select>
  @error('category')
    <div class="text-danger mt-2">
      {{$message}}
    </div>
  @enderror
</div>

<div class="form-grou">
  <div class="form-group">
    <label for="tags">Tag</label>
    <select class="form-control select2" name="tags[]" id="tags" multiple>
      @foreach ($blog->tags as $tag)
        <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
      @endforeach
      @foreach ($tags as $tag)
      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
      @endforeach
    </select>
    @error('tags')
    <div class="text-danger mt-2">
      {{$message}}
    </div>
    @enderror
  </div>
</div>

<div class="form-group">
  <label for="deskripsi">Deskripsi</label>
  <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{old('deskripsi') ?? $blog->deskripsi}}</textarea>
  @error('judul')
    <div class="invalid-feedback mt-2">
      {{$message}}
    </div>
  @enderror
</div>

<div class="form-group">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div>
    @error('thumbnail')
    <div class="text-danger mt-2">
      {{$message}}
    </div>
    @enderror
</div>

<div class="form-group">
  <button type="submit" class="btn btn-primary">{{$submit ?? 'Update'}}</button>
</div>