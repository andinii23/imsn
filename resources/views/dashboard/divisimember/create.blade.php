@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Anggota Baru</h1>   
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/divisimember" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama_member" class="form-label">Nama Member</label>
          <input type="text" class="form-control @error('nama_member') is-invalid @enderror" id="nama_member" name="nama_member" required autofocus value="{{ old('nama_member') }}">
          @error('nama_member')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="divisi_id" class="form-label">Divisi</label>
            <select class="form-select" name="divisi_id">
                @foreach ($divisis as $divisi)
                @if(old('divisi_id') == $divisi->id)
                <option value="{{ $divisi->id }}" selected>{{ $divisi->name}}</option>
                @else
                <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi}}</option>
                @endif
                @endforeach 
            </select>
        </div>
        <div class="mb-3">
            <label for="img_member" class="form-label">Gambar</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input type="file" class="form-control @error('img_member') is-invalid @enderror" id="img_member" name="img_member" onchange="previewimage()">
            @error('img_member')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="univ_member" class="form-label">univ_member</label>
            <input type="text" class="form-control @error('univ_member') is-invalid @enderror" id="univ_member" name="univ_member" required value="{{ old('univ_member') }}">
            @error('univ_member')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>

function previewimage(){
    const image = document.querySelector('#img_member');
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