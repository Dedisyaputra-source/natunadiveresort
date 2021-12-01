@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-8 mb-3">
            <a href="/event/create" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Tambah Data Baru</a>
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
                <th scope="col">Nama Event</th>
                <th scope="col">Harga Event</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no =1 ; @endphp
            @forelse ($events as $event)                
            <tr align="center">
                <td>{{ $no++ }}</td>
                <td>{{ $event->event_name}}</td>
                <td>@currency($event->event_price)</td>
                <td>
                    <a href="/event/show/{{ $event->slug }}" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i> Detail</a> 
                    <form action="/event/delete/{{ $event->slug}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus?')">
                            <span><i class="fas fa-trash-alt"></i> Hapus</span>
                        </button>
                    </form> 
                    <a href="/event/{{ $event->slug }}/edit" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a> 
                </td>
            </tr>
            @empty
            <tr align="center">
                <td colspan="4">Data Event Kosong</td>
            </tr>
            @endforelse
        </tbody>
      </table>        
@endsection