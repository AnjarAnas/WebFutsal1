@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Jadwal Petandingan Lapangan {{($id==1) ? '1':'2'}}</h1>
      <div class="section-header-breadcrumb">
        
      </div>
    </div>
  
    <div class="section-body">
      <h2 class="section-title">Jadwal Pertandingan</h2>
      <p class="section-lead">Silahkan Lihat Dengan Teliti Ya, Sebelum Booking</p>
  
      <div class="row">
        <div class="col-md-12">
            <form action="/cari/{{$id}}" method="post">
                <div class="row mb-4">
                    @csrf
                    <div class="col-6">
                        <input type="date" class="form-control" name="cari" id="">
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary col-12">Cari</button>
                    </div>
                </div> 
            </form>
          <div class="card">  
          @foreach ($tanggal as $a)
            
              <div class="card">
                <div class="card-header">
                  {{date('d F Y',strtotime($a->tanggal))}}
                </div>
                <div class="card-body">
                  @foreach ($detail as $d)
                  
                    @if ($a->tanggal==$d->tanggal)
                    @if($d->kondisi==2)
                      <div class="card">
                        <div class="card-header">{{$d->nama}}</div>
                        <div class="card-body">
                          {{$d->waktu}}
                        </div>
                      </div>
                    @endif
                  @endif
                  @endforeach
                </div>
              </div>
            
              @endforeach
          </div>
        </div>
      </div>
    </div>
</section>
@endsection