@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h3>Tambah Data Trip</h3>
</div>
</div>
    <div class="row">
      <div class="col-md-8 mb-5">
        <div class="card">
          <div class="card-body mb-2">
            <form action="/trip/create" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="trip_image">Gambar Trip</label>
                  <div class="row">
                    <div class="col-md-5">
                      <img class="img-preview img-fluid d-inline mb-3">
                    </div>
                  </div>
                  <input class="form-control @error('trip_image') is-invalid @enderror" type="file" id="trip_image" name="trip_image" onchange="previewImage()">
                  @error('trip_image')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="trip_name" class="form-label">Nama Trip</label>
                  <input type="text" class="form-control @error('trip_name') is-invalid @enderror" id="trip_name" name="trip_name"  autofocus  value="{{ old('trip_name') }}">
                  @error('trip_name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="trip_price" class="form-label">Harga Paket</label>
                  <input type="number" class="form-control @error('trip_price') is-invalid @enderror" id="trip_price" name="trip_price"  value="{{ old('trip_price') }}">
                @error('trip_price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group col-md-12">
                  <label for="trip_description" class="form-label">Deskripsi Trip</label>
                  @error('trip_description')
                    <p class="text-danger">{{ $message }}</p>                      
                  @enderror
                  <input id="trip_description" type="hidden" name="trip_description" value="{{old('trip_description')}}">
                  <trix-editor input="trip_description"></trix-editor>
                </div>
              <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>        
          </div>        
          </div>
      </div>
    </div> 
        <script>
          function previewImage(){
            const gambar = document.querySelector('#trip_image');
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