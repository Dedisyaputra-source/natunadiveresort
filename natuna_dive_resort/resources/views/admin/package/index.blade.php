@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-8 mb-3">
            <a href="/package/create" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Tambah Data Baru</a>
        </div>
        <div class="col-md-4">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr align="center">
                <th scope="row">No</th>
                <th scope="col">Nama Paket</th>
                <th scope="col">Harga Paket</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $no =1 ; @endphp
            @foreach ($package as $packages )
            <tr align="center">
                <td>{{ $no++ }}</td>
                <td>{{ $packages->nama_paket}}</td>
                <td>@currency($packages->harga_paket)</td>
                <td>
                    <a href="/package/show/{{ $packages->slug }}" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i> Detail</a> 
                    <form action="/package/delete/{{ $packages->slug}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus?')">
                            <span><i class="fas fa-trash-alt"></i> Hapus</span>
                        </button>
                    </form> 
                    <a href="/package/edit/{{ $packages->slug }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>        
@endsection