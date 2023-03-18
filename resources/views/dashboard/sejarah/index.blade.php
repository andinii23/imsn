@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Sejarah</h1>   
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="table-responsive col-lg-10">
    <a href="/dashboard/sejarah/create" class="btn btn-primary mb-3">Tambah Sejarah</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Sejarah</th>
          <th scope="col">Aksi</th>
         
        </tr>
      </thead>
      <tbody>
        @foreach ($sejarah as $n)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $n->title}}</td>
            <td>{!! $n->isi_sejarah !!}</td>
            <td>
                <a href="/dashboard/sejarah/{{ $n->id }}" class="badge bg-info"> <span data-feather="eye"></span></a>
                <a href="/dashboard/sejarah/{{ $n->id}}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>
                <form action="/dashboard/sejarah/{{ $n->id}}" method="post" class="d-inline">
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