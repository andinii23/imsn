@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Berita</h1>   
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="table-responsive col-lg-10">
    <a href="/dashboard/strkorganisasi/create" class="btn btn-primary mb-3">Tambah Struktur Organisasi Baru</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Gambar</th>
          <th scope="col">Ket Foto</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Aksi</th>
         
        </tr>
      </thead>
      <tbody>
        @foreach ($strkorganisasi as $n)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $n->title }}</td>
            <td><img src="{{ asset('storage/'.$n->strk_img) }}" alt="" style="width: 50px; height:50px"></td>
            <td>{{ $n->ket_foto }}</td>
            <td>{!! $n->deskripsi !!}</td>
           <td>
                <a href="/dashboard/strkorganisasi/{{ $n->id }}" class="badge bg-info"> <span data-feather="eye"></span></a>
                <a href="/dashboard/strkorganisasi/{{ $n->id }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>
                <form action="/dashboard/strkorganisasi/{{ $n->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Yakin akan menghapus data?')"><span data-feather="x-circle"></span></button>
              </form>
                
            </td>
          </tr> 
        @endforeach
        
        
      </tbody>
    </table>
  </div>
@endsection