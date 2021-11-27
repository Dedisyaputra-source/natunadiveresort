@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h3 class="text-center">Tambah Data Kamar</h3>
</div>
</div>
    <div class="row">
      <div class="col-md-8 mb-5 mx-auto">
        <div class="card">
          <div class="card-body mb-2">
            <form action="/room/create" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="gambar_kamar">Gambar Kamar</label>
                  <div class="row">
                    <div class="col-md-5">
                      <img class="img-preview img-fluid d-inline mb-3">
                    </div>
                  </div>
                  <input class="form-control @error('gambar_kamar') is-invalid @enderror" type="file" id="gambar_kamar" name="gambar_kamar" onchange="previewImage()">
                  @error('gambar_kamar')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nama_kamar" class="form-label">Nama Kamar</label>
                  <input type="text" class="form-control @error('nama_kamar') is-invalid @enderror" id="nama_kamar" name="nama_kamar"  autofocus  value="{{ old('nama_kamar') }}">
                  @error('nama_kamar')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="harga_kamar" class="form-label">Harga Paket</label>
                  <input type="number" class="form-control @error('harga_kamar') is-invalid @enderror" id="harga_kamar" name="harga_kamar"  value="{{ old('harga_kamar') }}">
                @error('harga_kamar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group col-md-12">
                  <label for="fasilitas_kamar" class="form-label">Fasilitas_Kamar</label>
                  @error('fasilitas_kamar')
                    <p class="text-danger">{{ $message }}</p>                      
                  @enderror
                  <input id="fasilitas_kamar" type="hidden" name="fasilitas_kamar" value="{{old('fasilitas_kamar')}}">
                  <trix-editor input="fasilitas_kamar"></trix-editor>
                </div>
              <button type="submit" class="btn btn-primary">Tambah Data</button>
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