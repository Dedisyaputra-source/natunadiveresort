@extends('layouts.main')
@section('content')
{{-- <h2 class="card-text">Detail Kamar</h2> --}}
{{-- <div class="row">
  <div class="col-md-12 mb-2">
    <a href="/dashboard/room" class="btn btn-sm  btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
    <a href="/edit/{{ $room->slug }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <form action="/room/delete/{{ $room->slug}}" method="post" class="d-inline">
      @method('delete')
      @csrf
      <button class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus?')">
          <span><i class="fas fa-trash-alt"></i> Hapus</span>
      </button>
  </form> 
  </div>
</div> --}}
<div class="row">
  <div class="col-md-6">
    <div class="card" >
      @if ($room->gambar_kamar)
        <img src="{{ asset('storage/' . $room->gambar_kamar) }}" class="img-fluid rounded-start" alt="" style="min-width: 100%; object-fit:cover">    
      @else
        <img src="{{ asset('/images/default-image.jpg') }}" class="img-fluid rounded-start" alt=""  style="min-height: 100%; object-fit:cover">                    
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $room->nama_kamar }}</h5>
        <p class="card-text"> @currency($room->harga_kamar)</p>
        <p class="card-text">{{ $room->fasilitas_kamar }}</p>
        <a href="/dashboard/room" class="btn btn-sm  btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
        <a href="/room/edit/{{ $room->slug }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
        <form action="/room/delete/{{ $room->slug}}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus?')">
              <span><i class="fas fa-trash-alt"></i> Hapus</span>
          </button>
      </form> 
      </div>
    </div>
  </div>
</div>
@endsection