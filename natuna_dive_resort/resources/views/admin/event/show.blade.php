@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card" >
      @if ($events->event_image)
        <img src="{{ asset('storage/' . $events->event_image) }}" class="img-fluid rounded-start" alt="" style="min-width: 100%; object-fit:cover">    
      @else
        <img src="{{ asset('/images/default-image.jpg') }}" class="img-fluid rounded-start" alt=""  style="min-height: 100%; object-fit:cover">                    
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $events->event_name }}</h5>
        <p class="card-text"> @currency($events->event_price)</p>
        <p class="card-text">{{ $events->event_description }}</p>
        <a href="/dashboard/event" class="btn btn-sm  btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
        <a href="/event/edit/{{ $events->slug }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
        <form action="/event/delete/{{ $events->slug}}" method="post" class="d-inline">
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