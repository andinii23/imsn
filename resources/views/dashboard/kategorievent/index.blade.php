@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">News Kategori</h1>   
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="table-responsive col-lg-6">
    <a href="/dashboard/kategorievent/create" class="btn btn-primary mb-3">Tambah Kategori Event</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Kategori</th>
          <th scope="col">Aksi</th>
         
        </tr>
      </thead>
      <tbody>
        @foreach ($kategorievent as $n)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $n->kategori_event}}</td>
            <td>
                <a href="/dashboard/kategorievent/{{ $n->id }}" class="badge bg-info"> <span data-feather="eye"></span></a>
                <a href="/dashboard/kategorievent/{{ $n->id }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>
                <form action="/dashboard/kategorievent/{{ $n->id }}" method="post" class="d-inline">
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