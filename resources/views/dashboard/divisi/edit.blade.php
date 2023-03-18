@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kategori</h1>   
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/divisi/{{ $divisi->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama_divisi" class="form-label">Nama Divisi</label>
          <input type="text" class="form-control @error('nama_divisi') is-invalid @enderror" id="nama_divisi" name="nama_divisi" required autofocus value="{{ old('nama_divisi', $divisi->nama_divisi) }}">
          @error('nama_divisi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required value="{{ old('deskripsi', $divisi->deskripsi) }}">
            @error('deskripsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        
        

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>


@endsection