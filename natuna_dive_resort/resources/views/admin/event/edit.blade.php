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
        <form action="/event/update/{{ $event->slug }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="event_image" class="form-label d-block">Gambar Event</label>
              <input type="hidden" name="gambarLama" value="{{ $event->event_image }}">
              @if ($event->event_image)
              <div class="row">
                <div class="col-md-7">
                  <img src="{{ asset('storage/' . $event->event_image) }}" class="img-preview img-fluid mb-3 d-block">
                </div>                              
              </div>
              @endif
              <input class="form-control @error('event_image') is-invalid @enderror" type="file" id="event_image" name="event_image" onchange="previewImage()">
              @error('event_image')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <div class="form-row">      
            <div class="form-group col-md-6">
              <label for="event_name" class="form-label">Nama Event</label>
                  <input type="text" class="form-control @error('event_name') is-invalid @enderror" id="event_name" name="event_name"  autofocus  value="{{ old('event_name', $event->event_name) }}">
                    @error('event_name')
                    <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="event_price" class="form-label">Harga Event</label>
              <input type="number" class="form-control @error('event_price') is-invalid @enderror" id="event_price" name="event_price"  value="{{ old('event_price', $event->event_price) }}">
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
              <input id="event_description" type="hidden" name="event_description" value="{{old('event_description', $event->event_description)}}">
              <trix-editor input="event_description" class="trix-content"></trix-editor>
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
