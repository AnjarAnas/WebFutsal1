@extends('layouts.app')
@section('content')
<section class="section container">
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
                <div class="float-right">
                  <form action="/user" method="get">
                    <div class="row">
                      <label for="cari">Cari Data</label>
                      <input type="text" name="cari" class="form-control mb-4 col-12" placeholder="Cari" id="cari">
                      </div>
                  </form>
                </div>
                
                @if (!$user->isEmpty())
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Id_user</th>
                      <th>Last Login</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    @foreach ($user as $a)
                        <tr>
                            <td>{{$a->name}}</td>
                            <td>{{$a->email}}</td>
                            <td>{{$a->id_user}}</td>
                            <td>@php
                              date_default_timezone_set('Asia/Jakarta');
                              $datenow=date('Y-m-d h:i:s');
                              $datenowconvert=date_create($datenow);
                              $datelastLogin=$a->last_login;
                              $datelastconvert=date_create($datelastLogin);
                              $dateDiv=date_diff($datenowconvert,$datelastconvert);
                              if($dateDiv->d>=1){
                                echo($dateDiv->d." Hari ".$dateDiv->h." Jam ".$dateDiv->i." Menit ".$dateDiv->s." Detik"); 
                              }elseif ($dateDiv->h>=1) {
                                echo ($dateDiv->h." Jam ".$dateDiv->i." Menit ".$dateDiv->s." Detik");
                              }elseif ($dateDiv->i>=1) {
                                echo($dateDiv->i." Menit ".$dateDiv->s." Detik");
                              }elseif ($dateDiv->s>=1) {
                                echo($dateDiv->s." Detik");
                              }
                              
                            @endphp</td>
                            <td>
                              @if ($a->status_user==2)
                                <div class="badge badge-success">
                                  Aktif
                                </div>
                              @else
                              <div class="badge badge-danger">
                                NonAktif
                              </div>
                              @endif
                            </td>
                            
                            
                        </tr>
                    @endforeach
                  </table>
                </div>
                @else
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    
                    <tr>
                      <div class="alert alert-danger">
                        Data Yang Anda Cari Tidak Ada
                      </div>
                    </tr>
                    
                  </table>
                </div>
                @endif
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection