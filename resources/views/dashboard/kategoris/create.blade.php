@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Kategori Baru</h1>   
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/kategoris" class="mb-5">
        @csrf
        <div class="mb-3">
          <label for="kategori_news" class="form-label">Kategori</label>
          <input type="text" class="form-control @error('kategori_news') is-invalid @enderror" id="kategori_news" name="kategori_news"  autofocus value="{{ old('kategori_news') }}">
          @error('kategori_news')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"  value="{{ old('slug') }}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
    const kategori_news = document.querySelector('#kategori_news');
    const slug = document.querySelector('#slug');

    kategori_news.addEventListener('change', function(){
        fetch('/dashboard/kategoris/checkSlug?kategori_news='+ kategori_news.value)
        .then(response => response.json())
        .then(data => slug.value =  data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })


</script>

@endsection