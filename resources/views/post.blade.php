@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3">{{ $post->title }}</h2>
            <p><a class="text-decoration-none" href="/news?penulis={{ $post->penulis->username }}">{{ $post->penulis->nama_lengkap }}</a> by <a class="text-decoration-none" href="/news?kategori={{ $post->kategori->slug }}">{{ $post->kategori->kategori_news }}</a></p>  
            @if ($news->gambar)
            <div style="max-height: 350px; overflow:hidden;">
              <img src="{{ asset('storage/'.$news->gambar) }}" alt="{{ $news->kategori->kategori_news }}" class="img-fluid mt-3">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $news->kategori->kategori_news }}" alt="{{ $news->kategori->kategori_news }}" class="img-fluid mt-3">
            @endif
                <article class="my-3 fs-6">
                    {!! $post->isi_news !!}
                </article>
            
            
            <a href="/news" class="d-block mt-3">Kembali</a>
        </div>
    </div>
</div>

    
   
@endsection
   