@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit About</h1>   
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/about/{{ $about->id }}" class="mb-5">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Judul</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $about->title) }}">
          @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
        <label for="deskripsi" class="form-label">about</label>
            @error('deskripsi')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $about->deskripsi) }}">
            <trix-editor input="deskripsi"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>


@endsection