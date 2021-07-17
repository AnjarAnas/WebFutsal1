@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Jadwal Petandingan Lapangan 2</h1>
      <div class="section-header-breadcrumb">
        
      </div>
    </div>
  
    <div class="section-body">
      <h2 class="section-title">Jadwal Pertandingan</h2>
      <p class="section-lead">Silahkan Lihat Dengan Teliti Ya, Sebelum Booking</p>
  
      <div class="row">
        <div class="col-md-12">
          <div class="card"> 
              <div class="card-body">
                @if (session('sukses'))
                    <div class="alert alert-success">
                        {{session('sukses')}}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                      <tr>
                          <th>Nama</th>
                          
                          <th>Lapangan</th>
                          <th>Waktu</th>
                          <th>Tanggal</th>
                          
                      </tr>
                      @if (!$cari->isEmpty())
                        @foreach ($cari as $b)
                        @if($b->id_lap==1)
                            <tr>
                                <td>
                                    {{$b->nama}}
                                </td>
                                
                                <td>{{$b->nama_lap}}</td>
                                <td>{{$b->waktu}}</td>
                                <td>{{date('d F Y',strtotime($b->tanggal))}}</td>
                            
                            </tr>
                        @endif
                        @if($b->id_lap==2)
                        <tr>
                            <td>
                                {{$b->nama}}
                            </td>
                            
                            <td>{{$b->nama_lap}}</td>
                            <td>{{$b->waktu}}</td>
                            <td>{{date('d F Y',strtotime($b->tanggal))}}</td>
                        
                        </tr>
                        @endif
        
                        @endforeach
                      @else
                          <div class="alert alert-success">Tanggal yang anda cari belum ada yang booking</div>
                      @endif
                      
                    </table>
                  </div>
                
              </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection