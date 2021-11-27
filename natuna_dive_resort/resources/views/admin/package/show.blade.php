@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-7 mb-2">
    <a href="/dashboard/package" class="btn btn-sm  btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
    <a href="/edit/{{ $package->slug }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <form action="/package/delete/{{ $package->slug}}" method="post" class="d-inline">
      @method('delete')
      @csrf
      <button class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus?')">
          <span><i class="fas fa-trash-alt"></i> Hapus</span>
      </button>
  </form>
  </div>
</div>
<div class="row">
  <div class="col-md-9">
    <div class="card" >
      @if ($package->gambar_paket)
        <img src="{{ asset('storage/' . $package->gambar_paket) }}" class="img-fluid rounded-start" alt="" style="min-width: 100%; object-fit:cover">    
      @else
        <img src="../images/default-image.jpg" class="img-fluid rounded-start" alt=""  style="min-height: 100%; object-fit:cover">                    
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $package->nama_paket }}</h5>
        <p class="card-text"> @currency($package->harga_paket)</p>
        <p class="card-text">{{ $package->fasilitas_paket }}</p>
        <p class="card-title">Agenda Perjalan</p>
        <p class="card-text">{{ $package->iternary }}</p> 
      </div>
    </div>
  </div>
</div>
@endsection



