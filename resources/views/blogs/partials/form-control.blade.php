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
  <label for="deskripsi">Deskripsi</label>
  <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{old('deskripsi') ?? $blog->deskripsi}}</textarea>
  @error('judul')
    <div class="invalid-feedback mt-2">
      {{$message}}
    </div>
  @enderror
</div>
<div class="form-group">
  <button type="submit" class="btn btn-primary">{{$submit ?? 'Update'}}</button>
</div>