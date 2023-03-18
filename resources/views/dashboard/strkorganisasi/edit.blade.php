@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Struktur Organisasi</h1>   
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/strkorganisasi/{{ $strkorganisasi->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Judul</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $strkorganisasi->title) }}">
          @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
       
        <div class="mb-3">
            <label for="strk_img" class="form-label">Gambar</label>
            <input type="hidden" name="oldImage" value="{{ $strkorganisasi->strk_img }}">
            @if($strkorganisasi->strk_img)
            <img src="{{ asset('storage/'.$strkorganisasi->strk_img) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img src="" class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input type="file" class="form-control @error('strk_img') is-invalid @enderror" id="strk_img" name="strk_img" onchange="previewImage()">
            @error('strk_img')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ket_foto" class="form-label">Keterangan Foto</label>
            <input type="text" class="form-control @error('ket_foto') is-invalid @enderror" id="ket_foto" name="ket_foto" required autofocus value="{{ old('ket_foto', $strkorganisasi->ket_foto) }}">
            @error('ket_foto')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
        
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            @error('deskripsi')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $strkorganisasi->deskripsi) }}">
            <trix-editor input="deskripsi"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<script>

    function previewImage(){
    const image = document.querySelector('#strk_img');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }
}
</script>

@endsection