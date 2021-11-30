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
        <form action="/trip/update/{{ $trip->slug }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="trip_image" class="form-label d-block">Gambar Trip</label>
              <input type="hidden" name="gambarLama" value="{{ $trip->trip_image }}">
              @if ($trip->trip_image)
              <div class="row">
                <div class="col-md-7">
                  <img src="{{ asset('storage/' . $trip->trip_image) }}" class="img-preview img-fluid mb-3 d-block">
                </div>                              
              </div>
              @endif
              <input class="form-control @error('trip_image') is-invalid @enderror" type="file" id="trip_image" name="trip_image" onchange="previewImage()">
              @error('trip_image')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <div class="form-row">      
            <div class="form-group col-md-6">
              <label for="trip_name" class="form-label">Nama Trip</label>
                  <input type="text" class="form-control @error('trip_name') is-invalid @enderror" id="trip_name" name="trip_name"  autofocus  value="{{ old('trip_name', $trip->trip_name) }}">
                    @error('trip_name')
                    <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="trip_price" class="form-label">Harga Kamar</label>
              <input type="number" class="form-control @error('trip_price') is-invalid @enderror" id="trip_price" name="trip_price"  value="{{ old('trip_price', $trip->trip_price) }}">
            @error('trip_price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group col-md-12">
              <label for="trip_description" class="form-label">Fasilitas Kamar</label>
              @error('trip_description')
                <p class="text-danger">{{ $message }}</p>                      
              @enderror
              <input id="trip_description" type="hidden" name="trip_description" value="{{old('trip_description', $trip->trip_description)}}">
              <trix-editor input="trip_description" class="trix-content"></trix-editor>
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
