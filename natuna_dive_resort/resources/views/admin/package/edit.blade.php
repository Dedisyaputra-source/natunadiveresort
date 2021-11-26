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
        <form action="/package/edit/{{ $package->slug }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="gambar_paket" class="form-label d-block">Gambar Paket</label>
              <input type="hidden" name="gambarLama" value="{{ $package->gambar_paket }}">
              @if ($package->gambar_paket)
              <div class="row">
                <div class="col-sm-5">
                  <img src="{{ asset('storage/' . $package->gambar_paket) }}" class="img-preview img-fluid mb-3 d-block">
                </div>                              
              </div>
              @endif
              <input class="form-control @error('gambar_paket') is-invalid @enderror" type="file" id="gambar_paket" name="gambar_paket" onchange="previewImage()">
              @error('gambar_paket')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <div class="form-row">      
            <div class="form-group col-md-6">
              <label for="nama_paket" class="form-label">Nama Paket</label>
                  <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="nama_paket" name="nama_paket"  autofocus  value="{{ old('nama_paket', $package->nama_paket) }}">
                          @error('nama_paket')
                    <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="harga_paket" class="form-label">Harga</label>
              <input type="number" class="form-control @error('harga_paket') is-invalid @enderror" id="harga_paket" name="harga_paket"  value="{{ old('harga_paket', $package->harga_paket) }}">
            @error('harga_paket')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group col-md-12">
              <label for="fasilitas_paket" class="form-label">Fasilitas_Paket</label>
              @error('fasilitas_paket')
                <p class="text-danger">{{ $message }}</p>                      
              @enderror
              <input id="fasilitas_paket" type="hidden" name="fasilitas_paket" value="{{old('fasilitas_paket', $package->fasilitas_paket)}}">
              <trix-editor input="fasilitas_paket" class="trix-content"></trix-editor>
            </div>
            <div class="form-group col-md-12">
              <label for="iternary" class="form-label">Agenda Perjalanan</label>
              @error('iternary')
                <p class="text-danger">{{ $message }}</p>                      
              @enderror
              <input id="iternary" type="hidden" name="iternary" value="{{ old('iternary',$package->iternary) }}">
              <trix-editor input="iternary" class="trix-content"></trix-editor>
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
            const gambar = document.querySelector('#gambar_paket');
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



{{-- @extends('layouts.main')
@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Paket</h1>
        </div>
        <div class="row"></div>
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="/package/edit/{{ $package->slug }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-2">
                          <label for="gambar_paket" class="form-label">Gambar Paket</label>
                          <input type="hidden" name="gambarLama" value="{{ $package->gambar_paket }}">
                          @if ($package->gambar_paket)
                          <div class="col-sm-5">
                            <img src="{{ asset('storage/' . $package->gambar_paket) }}" class="img-preview img-fluid mb-3 d-block">
                          </div>                              
                          @else
                          <img src="../images/default-image.jpg" class="img-fluid" alt="">                     
                          @endif
                          <input class="form-control @error('gambar_paket') is-invalid @enderror" type="file" id="gambar_paket" name="gambar_paket" onchange="previewImage()">
                          @error('gambar_paket')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="mb-2">
                          <label for="nama_paket" class="form-label">Nama Paket</label>
                          <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="nama_paket" name="nama_paket"  autofocus  value="{{ old('nama_paket', $package->nama_paket) }}">
                          @error('nama_paket')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="mb-2">
                            <label for="harga_paket" class="form-label">Harga</label>
                            <input type="number" class="form-control @error('nama_paket') is-invalid @enderror" id="harga_paket" name="harga_paket"  value="{{ old('harga_paket', $package->harga_paket) }}">
                          @error('harga_paket')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                          </div>
                        <div class="mb-2">
                          <label for="fasilitas_paket" class="form-label">Fasilitas Paket</label>
                          <input class="form-control @error('fasilitas_paket') is-invalid @enderror" name="fasilitas_paket" id="fasilitas_paket" cols="30" rows="10"  value="{{ old('fasilitas_paket', $package->fasilitas_paket) }}"></input>
                          @error('fasilitas_paket')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-2">
                          <label for="iternary" class="form-label">Agenda Perjalanan</label>
                          <input class="form-control @error('iternary') is-invalid @enderror" name="iternary" id="iternary" cols="30" rows="10" value="{{ old('iternary', $package->iternary) }}" ></input>
                          @error('iternary')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>     
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                      </form>
                </div>
            </div>
        </div>
        <script>
          function previewImage(){
            const gambar = document.querySelector('#gambar_paket');
            const previewImage = document.querySelector('.img-preview');

            previewImage.style.display = 'block';

            const oFReader = new FileReader();

            oFReader.readAsDataURL(gambar.files[0]);

            oFReader.onload = function(oFREvent){
              previewImage.src = oFREvent.target.result;
            }
          }
        </script>
@endsection --}}