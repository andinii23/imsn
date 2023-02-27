
@extends('layouts.main')

@section('container')
<h1 class="mb-5 text-center">{{ $judul }}</h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/news">
      @if (request('kategori'))
          <input type="hidden" name="kategori" value="{{ request('kategori') }}">
      @endif
      @if (request('penulis'))
          <input type="hidden" name="penulis" value="{{ request('penulis') }}">
      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="btn btn-danger" type="submit" >Search</button>
      </div>
    </form>
  </div>  

</div>

@if($posts->count())
<div class="card mb-3">
  @if ($posts[0]->gambar)
  <div style="max-height: 400px; overflow:hidden;">
    <img src="{{ asset('storage/'.$posts[0]->gambar) }}" alt="{{ $posts[0]->kategori->kategori_news }}" class="img-fluid">
  </div>
  @else
  <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->kategori->kategori_news }}" class="card-img-top" alt="{{ $posts[0]->kategori->kategori_news }}">
  @endif
   
    <div class="card-body text-center">
      <h3 class="card-title"><a class="text-decoration-none text-dark" href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h3>
      <p>
        <small class="text-muted">
        <a class="text-decoration-none " href="/news?penulis={{ $posts[0]->penulis->username }}">{{ $posts[0]->penulis->nama_lengkap }}</a> by <a class="text-decoration-none" href="/news?kategori={{ $posts[0]->kategori->slug }}">{{ $posts[0]->kategori->kategori_news }}</a> {{ $posts[0]->created_at->diffForHumans() }}
        </small>
    </p> 
      <p class="card-text">{{ $posts[0]->kutipan }}</p>
      <a class="text-decoration-none btn btn-primary" href="/posts/{{ $posts[0]->slug }}">Selengkapnya</a>
   
    </div>
  </div>


<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
            <div class="card" >
                <div class="position-absolute px-1 py-1" style="background-color: rgba(0, 0, 0, 0.5)"><a href="/news?kategori={{ $post->kategori->slug }}" class=" text-white text-decoration-none">{{ $post->kategori->kategori_news }}</a></div>
              
                
                @if ($post->gambar)
                <div style="max-height: 300px; overflow:hidden;">
                  <img src="{{ asset('storage/'.$post->gambar) }}" alt="{{ $post->kategori->kategori_news }}" class="img-fluid">
                </div>
                @else
                <img src="https://source.unsplash.com/500x300?{{ $post->kategori->kategori_news }}" class="card-img-top" alt="{{ $post->kategori->kategori_news }}">
                @endif

                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <p>
                    <small class="text-muted">
                    <a class="text-decoration-none " href="/news?penulis={{ $post->penulis->username }}">{{ $post->penulis->nama_lengkap }}</a>  {{ $post->created_at->diffForHumans() }}
                    </small>
                </p> 
                  <p class="card-text">{{ $post->kutipan }}</p>
                  <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Selengkapnya</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

@else
<p class="text-center fs-4">Tidak ada postingan yang ditemukan</p>
@endif

<div class="d-flex justify-content-end">
  {{ $posts->links() }}
</div>


@endsection
   