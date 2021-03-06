@extends('layouts.main')
@section('content')
    <div class="row">
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
                <th scope="col">Nama Pengirim</th>
                <th scope="col">Email Pengirim</th>
                <th scope="col">Pesan </th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no =1 ; @endphp
            @forelse ($messages as $message)                
            <tr align="center">
                <td>{{ $no++ }}</td>
                <td>{{ $message->name}}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->message }}</td>
                <td>
                    <form action="/message/delete/{{ $message->slug}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus?')">
                            <span><i class="fas fa-trash-alt"></i> Hapus</span>
                        </button>
                    </form> 
                </td>
            </tr>
            @empty
            <tr align="center">
                <td colspan="5">Belum Ada Pesan Masuk</td>
            </tr>
            @endforelse
        </tbody>
      </table>        
@endsection