@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Berita</h1>   
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/partnership/{{ $partnership->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama_partner" class="form-label">Nama Partner</label>
          <input type="text" class="form-control @error('nama_partner') is-invalid @enderror" id="nama_partner" name="nama_partner" required autofocus value="{{ old('nama_partner', $partnership->nama_partner) }}">
          @error('nama_partner')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
       
        <div class="mb-3">
            <label for="partner_img" class="form-label">Gambar</label>
            <input type="hidden" name="oldImage" value="{{ $partnership->partner_img }}">
            @if($partnership->partner_img)
            <img src="{{ asset('storage/'.$partnership->partner_img) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img src="" class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input type="file" class="form-control @error('partner_img') is-invalid @enderror" id="partner_img" name="partner_img" onchange="previewImage()">
            @error('partner_img')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<script>

    function previewImage(){
    const image = document.querySelector('#partner_img');
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