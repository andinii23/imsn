@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Berita</h1>   
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/contact/{{ $contact->id }}" class="mb-5">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="contact" class="form-label">Contact</label>
          <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" required autofocus value="{{ old('contact', $contact->contact) }}">
          @error('contact')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="icon" class="form-label">Icon</label>
          <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" required autofocus value="{{ old('icon', $contact->icon) }}">
          @error('icon')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
            @error('deskrsipsi')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $contact->deskripsi) }}">
            <trix-editor input="deskripsi"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>


@endsection