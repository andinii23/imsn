@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Event Baru</h1>   
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/event" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul') }}">
          @error('judul')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kategori_event_id" class="form-label">Kategori Event</label>
            <select class="form-select" name="kategori_event_id">
                @foreach ($kategorie as $kategori)
                @if(old('kategori_event_id') == $kategori->id)
                <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
                @else
                <option value="{{ $kategori->id }}">{{ $kategori->kategori_event }}</option>
                @endif
                @endforeach 
            </select>
        </div>
        <div class="mb-3">
            <label for="img_event" class="form-label">Post Image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input type="file" class="form-control @error('img_event') is-invalid @enderror" id="img_event" name="img_event" onchange="previewimage()">
            @error('img_event')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tgl_event" class="form-label">Tanggal Event</label>
            <input type="text" class="form-control @error('tgl_event') is-invalid @enderror" id="tgl_event" name="tgl_event" required value="{{ old('tgl_event') }}">
            @error('tgl_event')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="isi_event" class="form-label">Event yang akan diadakan</label>
            @error('isi_event')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="isi_event" type="hidden" name="isi_event" value="{{ old('isi_event') }}">
            <trix-editor input="isi_event"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
    

function previewimage(){
    const image = document.querySelector('#img_event');
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