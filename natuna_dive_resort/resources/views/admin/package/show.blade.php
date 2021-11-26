@extends('layouts.main')
@section('content')
<h2 class="card-text">Detail Paket</h2>
{{-- <hr class="divider"></hr> --}}
<div class="row">
  <div class="col-md-12 mb-2">
    <a href="/dashboard/package" class="btn btn-sm  btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
    <a href="/package/{{ $package->slug }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
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
  <div class="col-md-6">
    <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-5" style="min-height: 40vh">
            @if ($package->gambar_paket)
                <img src="{{ asset('storage/' . $package->gambar_paket) }}" class="img-fluid rounded-start" alt="" style="min-height: 100%; object-fit:cover">    
            @else
                <img src="../images/default-image.jpg" class="img-fluid rounded-start" alt=""  style="min-height: 100%; object-fit:cover">                    
            @endif
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <h5 class="card-title">{{ $package->nama_paket }}</h5>
              <p class="card-text">{{ $package->fasilitas_paket }}</p>
              <p class="card-text"><small class="text-muted"> Ditambahkan Pada: {{ $package->created_at }}</small></p>
              <p class="card-text"><small class="text-muted"> Update: {{ $package->updated_at }}</small></p>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
  <div class="row">
    <h5>Agenda Perjalanan</h5>
      <p class="card-text">
          {{$package->iternary }}
      </p>
  </div>
@endsection