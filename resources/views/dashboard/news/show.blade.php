@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $news->title}}</h1>
            <a href="/dashboard/news" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my news</a>
            <a href="/dashboard/news/{{ $news->slug }}/edit" class="btn btn-warning"><span data-feather="edit"> </span>Edit</a>
          
            <form action="/dashboard/news/{{ $news->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><span data-feather="x-circle"></span>Delete</button>
              </form>
              @if ($news->gambar)
              <div style="max-height: 350px; overflow:hidden;">
                <img src="{{ asset('storage/'.$news->gambar) }}" alt="{{ $news->kategori->kategori_news }}" class="img-fluid mt-3">
              </div>
              @else
              <img src="https://source.unsplash.com/1200x400?{{ $news->kategori->kategori_news }}" alt="{{ $news->kategori->kategori_news }}" class="img-fluid mt-3">
              @endif
            
            <article class="my-3 fs-5">

                {!! $news->isi_news !!}
            </article>
            
        </div>
    </div>
</div>
@endsection