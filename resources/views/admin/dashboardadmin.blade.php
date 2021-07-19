@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Table</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">Table</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Table</h2>
      <p class="section-lead">Example of some Bootstrap table components.</p>

      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Simple Table</h4>
            </div>
            <div class="card-body">
                @if (session('sukses'))
                <div class="alert alert-success">{{session('sukses')}}</div>
                @endif
                
              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  <tr>
                    <th>Nama</th>
                    <th>Lapangan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  @foreach ($data1 as $a)
                      <tr>
                          <td>{{$a->nama}}</td>
                          <td>{{$a->nama_lap}}</td>
                          <td>{{date('d F Y',strtotime($a->tanggal))}}</td>
                          <td>{{$a->waktu}}</td>
                          <td>{{$a->status}}</td>
                          <td>@if ($a->status=="settlement")
                              <a href="/konfirmasi/{{$a->id_bayar}}" class="btn btn-md btn-danger">Konfirmasi</a>
                          @elseif ($a->status=="Sudah Dikonfirmasi")
                          <div class="badge badge-success">Sudah Dikonfirmasi</div>
                              @else
                              <div class="badge badge-warning">Belum Dibayar</div>
                          @endif</td>
                      </tr>
                  @endforeach
                </table>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
      
      
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
      $('.alert').delay(3000).slideUp(300);
  </script>
@endsection