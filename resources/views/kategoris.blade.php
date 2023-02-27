
@extends('layouts.main')

@section('container')
<h1 class="mb-5">News Kategoris</h1>
<div class="container">
    <div class="row">
        @foreach ($kategoris as $kategori)
        <div class="col-md-4">
            <a href="/news?kategori={{ $kategori->slug }}" class="text-decoration-none">
            <div class="card text-bg-dark">
                <img src="https://source.unsplash.com/500x300?{{ $kategori->kategori_news }}" class="card-img" alt="{{ $kategori->kategori_news }}">
                <div class="card-img-overlay d-flex align-items-center p-0">
                  <h5 class="card-title text-center flex-fill p-2 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $kategori->kategori_news}}</h5>
                </div>
              </div>
            </a>
        </div>
        @endforeach
    </div>
</div>


@endsection
   