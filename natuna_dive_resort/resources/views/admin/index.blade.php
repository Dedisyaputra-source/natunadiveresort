@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-6 mb-3">
            <h2> List Data Paket</h2>
        </div>
        <div class="col-md-6 mb-3">
            <h2> List Data Kamar</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <tr align="center">
                        <th scope="row">No</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Harga Paket</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no =1 ; @endphp
                    @forelse ($package as $packages )
                    <tr align="center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $packages->nama_paket}}</td>
                        <td>@currency($packages->harga_paket)</td>
                    </tr>
                    @empty
                    <tr align="center">
                        <td colspan="3">Data Belum Tersedia</td>
                      </tr>        
                    @endforelse
                </tbody>
              </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <tr align="center">
                        <th scope="row">No</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Harga Paket</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no =1 ; @endphp
                    @forelse ($room as $rooms)
                    <tr align="center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $rooms->nama_kamar}}</td>
                        <td>@currency($rooms->harga_kamar)</td>
                    </tr>                        
                    @empty
                      <tr align="center">
                          <td colspan="3">Data Belum Tersedia</td>
                        </tr>  
                    @endforelse
                </tbody>
              </table>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-6 mb-3">
            <h2> List Data Trip</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <tr align="center">
                        <th scope="row">No</th>
                        <th scope="col">Nama Trip</th>
                        <th scope="col">Harga Trip</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no =1 ; @endphp
                    @forelse ($trip as $trips )
                    <tr align="center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $trips->trip_name}}</td>
                        <td>@currency($trips->trip_price)</td>
                    </tr>
                    @empty
                    <tr align="center">
                        <td colspan="3">Data Belum Tersedia</td>
                      </tr>        
                    @endforelse
                </tbody>
              </table>
        </div>
    </div>
@endsection