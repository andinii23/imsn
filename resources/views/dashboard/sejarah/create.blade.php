@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Berita Baru</h1>   
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/sejarah" class="mb-5">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Judul</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
          @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="isi_sejarah" class="form-label">Berita</label>
            @error('isi_sejarah')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="isi_sejarah" type="hidden" name="isi_sejarah" value="{{ old('isi_sejarah') }}">
            <trix-editor input="isi_sejarah"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection