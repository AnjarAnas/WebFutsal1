@extends('layouts.app')
@section('content')
@if ($id==1)
<section class="section">
    <div class="section-header">
      <h1>Lapangan 1</h1>
      <div class="section-header-breadcrumb">
        <a href="/jadwal/{{$id}}" class="btn btn-primary btn-md" style="border-radius: 10px">Jadwal Lapangan</a>
      </div>
    </div>
  
    <div class="section-body">
      <h2 class="section-title">Owl Carousel</h2>
      <p class="section-lead">Display multiple images alternately within a few seconds.</p>
  
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            @if (session('gagal'))
              <div class="alert alert-danger">
                {{session('gagal')}}
              </div>
            @endif
            <div class="card-body">
              <form action="/actionbook" method="post">
                @csrf
            <input type="hidden" name="id_lap" value="{{$id}}">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" placeholder="Nama" class="form-control" id="nama">
            </div>
            
            <div class="form-group">
              <label for="no">Nomor Telephone</label>
              <input type="number" name="" placeholder="No Telp" class="form-control" id="no">
            </div>
            <label for="date" class="form-label">Tanggal</label>
            <div class="form-group">
              <input type="date" name="tgl" class="form-control" id="date">
            </div>
            
            <hr>
            <div class="form-group">
              <label class="form-label">Pilih Jam Anda Akan Bermain</label>
              <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                  <input type="radio" name="waktu" value="" class="selectgroup-input" required checked="">
                  <span class="selectgroup-button">Pilih Jam</span>
                </label>
                @foreach ($waktu as $w)
                <label class="selectgroup-item">
                  <input type="radio" name="waktu" value="{{$w->id_waktu}}" class="selectgroup-input" required >
                  <span class="selectgroup-button">{{$w->waktu}}</span>
                </label>
                @endforeach
            </div>
            <div class="form-group mt-3">
              <label>Nominal Booking</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    Rp
                  </div>
                </div>
                <input type="text" placeholder="Uang Book" name="uang" class="form-control currency" onkeyup="convertToRupiah(this);">
              </div>
            </div>
            <hr>
            <div class="text-center mt-5">
              <button class="btn btn-primary btn-lg col-6" style="border-radius: 1rem">Booking</button>
            </div>
              </form>
              {{-- @foreach ($tanggal as $a)
              <div class="card">
                <div class="card-header">
                  {{date('d F Y',strtotime($a->tanggal))}}
                </div>
                <div class="card-body">
                  @foreach ($detail as $d)
                  @if ($a->tanggal==$d->tanggal)
                    <div class="card">
                      <div class="card-header">{{$d->nama}}</div>
                      <div class="card-body">
                        {{$d->waktu}}
                      </div>
                    </div>
                  @endif
                  @endforeach
                </div>
              </div>
              
              @endforeach --}}
          </div>
        </div>
      </div>
    </div>
</section>

<script src="{{asset('assets/js/rupiah.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  $('.alert').delay(5000).slideUp(300);
</script>
@else
<section class="section">
    <div class="section-header">
      <h1>Lapangan 2</h1>
      <div class="section-header-breadcrumb">
        <a href="/jadwal/{{$id}}" class="btn btn-primary btn-md" style="border-radius: 10px">Jadwal Lapangan</a>
      </div>
    </div>
  
    <div class="section-body">
      <h2 class="section-title">Owl Carousel</h2>
      <p class="section-lead">Display multiple images alternately within a few seconds.</p>
  
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            @if (session('gagal'))
              <div class="alert alert-danger">
                {{session('gagal')}}
              </div>
            @endif
            <form action="/actionbook" method="post">
              @csrf
              <div class="card-body">
                <input type="hidden" name="id_lap" value="{{$id}}">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" placeholder="Nama" class="form-control" id="nama">
                </div>
                <div class="form-group">
                  <label for="no">Nomor Telephone</label>
                  <input type="number" placeholder="No Telp" name="no" class="form-control" id="no">
                </div>
                <label for="date" class="form-label">Tanggal</label>
                <div class="form-group">
                  <input type="date" name="tgl" class="form-control" id="date">
                </div>
                <hr>
                <div class="form-group">
                  <label class="form-label">Pilih Jam Anda Akan Bermain</label>
                  <div class="selectgroup selectgroup-pills">
                    <label class="selectgroup-item">
                      <input type="radio" name="waktu" value="" class="selectgroup-input" required checked="">
                      <span class="selectgroup-button">Pilih Jam</span>
                    </label>
                    @foreach ($waktu as $w)
                    <label class="selectgroup-item">
                      <input type="radio" name="waktu" value="{{$w->id_waktu}}" class="selectgroup-input" >
                      <span class="selectgroup-button">{{$w->waktu}}</span>
                    </label>
                    @endforeach
              </div>
              <div class="form-group mt-3">
                <label>Nominal Booking</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      Rp
                    </div>
                  </div>
                  <input type="text" placeholder="Uang Book" name="uang" class="form-control currency" onkeyup="convertToRupiah(this);">
                </div>
              </div>
            
            <hr>
            <div class="text-center mt-5">
              <button class="btn btn-primary btn-lg col-6" type="submit" style="border-radius: 1rem">Booking</button>
            </div>
          </form>
          {{-- @foreach ($tanggal as $a)
              <div class="card">
                <div class="card-header">
                  {{date('d F Y',strtotime($a->tanggal))}}
                </div>
                <div class="card-body">
                  @foreach ($detail as $d)
                  @if ($a->tanggal==$d->tanggal)
                    <div class="card">
                      <div class="card-header">{{$d->nama}}</div>
                      <div class="card-body">
                        {{$d->waktu}}
                      </div>
                    </div>
                  @endif
                  @endforeach
                </div>
              </div>
              
              @endforeach --}}
          </div>
          
        </div>
        
      </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  
  $('.alert.alert-danger').delay(5000).slideUp(300);
</script>
<script src="{{asset('assets/js/rupiah.js')}}">
</script>
@endif


@endsection