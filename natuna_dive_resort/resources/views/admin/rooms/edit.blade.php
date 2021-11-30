@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h3>Update Data</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-8 mb-5">
    <div class="card">
      <div class="card-body mb-2">
        <form action="/room/update/{{ $room->slug }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="gambar_kamar" class="form-label d-block">Gambar Paket</label>
              <input type="hidden" name="gambarLama" value="{{ $room->gambar_kamar }}">
              @if ($room->gambar_kamar)
              <div class="row">
                <div class="col-md-7">
                  <img src="{{ asset('storage/' . $room->gambar_kamar) }}" class="img-preview img-fluid mb-3 d-block">
                </div>                              
              </div>
              @endif
              <input class="form-control @error('gambar_kamar') is-invalid @enderror" type="file" id="gambar_kamar" name="gambar_kamar" onchange="previewImage()">
              @error('gambar_kamar')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <div class="form-row">      
            <div class="form-group col-md-6">
              <label for="nama_kamar" class="form-label">Nama Paket</label>
                  <input type="text" class="form-control @error('nama_kamar') is-invalid @enderror" id="nama_kamar" name="nama_kamar"  autofocus  value="{{ old('nama_kamar', $room->nama_kamar) }}">
                    @error('nama_kamar')
                    <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="harga_kamar" class="form-label">Harga Kamar</label>
              <input type="number" class="form-control @error('harga_kamar') is-invalid @enderror" id="harga_kamar" name="harga_kamar"  value="{{ old('harga_kamar', $room->harga_kamar) }}">
            @error('harga_kamar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group col-md-12">
              <label for="fasilitas_kamar" class="form-label">Fasilitas Kamar</label>
              @error('fasilitas_kamar')
                <p class="text-danger">{{ $message }}</p>                      
              @enderror
              <input id="fasilitas_kamar" type="hidden" name="fasilitas_kamar" value="{{old('fasilitas_kamar', $room->fasilitas_kamar)}}">
              <trix-editor input="fasilitas_kamar" class="trix-content"></trix-editor>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
        </form>        
      </div>        
      </div>
  </div>
</div>
        <script>
          function previewImage(){
            const gambar = document.querySelector('#gambar_kamar');
            const previewImage = document.querySelector('.img-preview');

            previewImage.style.display = 'block';

            const oFReader = new FileReader();

            oFReader.readAsDataURL(gambar.files[0]);

            oFReader.onload = function(oFREvent){
              previewImage.src = oFREvent.target.result;
            }
          }
        </script>
@endsection
