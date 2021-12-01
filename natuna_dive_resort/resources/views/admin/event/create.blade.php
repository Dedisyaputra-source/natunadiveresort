@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h3>Tambah Data Event</h3>
</div>
</div>
    <div class="row">
      <div class="col-md-8 mb-5">
        <div class="card">
          <div class="card-body mb-2">
            <form action="/event/create" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="event_image">Gambar Event</label>
                  <div class="row">
                    <div class="col-md-5">
                      <img class="img-preview img-fluid d-inline mb-3">
                    </div>
                  </div>
                  <input class="form-control @error('event_image') is-invalid @enderror" type="file" id="event_image" name="event_image" onchange="previewImage()">
                  @error('event_image')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="event_name" class="form-label">Nama Event</label>
                  <input type="text" class="form-control @error('event_name') is-invalid @enderror" id="event_name" name="event_name"  autofocus  value="{{ old('event_name') }}">
                  @error('event_name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="event_price" class="form-label">Harga Event</label>
                  <input type="number" class="form-control @error('event_price') is-invalid @enderror" id="event_price" name="event_price"  value="{{ old('event_price') }}">
                @error('event_price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group col-md-12">
                  <label for="event_description" class="form-label">Deskripsi Event</label>
                  @error('event_description')
                    <p class="text-danger">{{ $message }}</p>                      
                  @enderror
                  <input id="event_description" type="hidden" name="event_description" value="{{old('event_description')}}">
                  <trix-editor input="event_description"></trix-editor>
                </div>
              <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>        
          </div>        
          </div>
      </div>
    </div> 
        <script>
          function previewImage(){
            const gambar = document.querySelector('#event_image');
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