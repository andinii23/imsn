@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Berita</h1>   
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/news/{{ $news->slug }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Judul</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $news->title) }}">
          @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $news->slug) }}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" name="kategori_id">
                @foreach ($kategoris as $kategori)
                @if(old('kategori_id', $news->kategori_id) == $kategori->id)
                <option value="{{ $kategori->id }}" selected>{{ $kategori->kategori_news }}</option>
                @else
                <option value="{{ $kategori->id }}">{{ $kategori->kategori_news }}</option>
                @endif
                @endforeach 
            </select>
        </div>
        {{-- <div class="mb-3">
            <label for="image" class="form-label">news Image</label>
            <input type="hidden" name="oldImage" value="{{ $news->image }}">
            @if($news->image)
            <img src="{{ asset('storage/'.$news->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img src="" class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div> --}}
        <div class="mb-3">
            <label for="isi_news" class="form-label">isi_news</label>
            @error('isi_news')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="isi_news" type="hidden" name="isi_news" value="{{ old('isi_news', $news->isi_news) }}">
            <trix-editor input="isi_news"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Update news</button>
    </form>
</div>
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/news/checkSlug?title='+ title.value)
        .then(response => response.json())
        .then(data => slug.value =  data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })

    function previewImage(){
    const image = document.querySelector('#image');
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