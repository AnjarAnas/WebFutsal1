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
                <div class="row">
                    @foreach ($bulan as $a)
                    @php
                        $pendapatan=\App\Models\Bayar
                        ::join('lapangan','pembayaran.id_lapangan','=','lapangan.id_lap')
                        ->join('tanggal','pembayaran.id_tanggal','=','tanggal.id_tanggal')
                        ->where([['pembayaran.status','=','Sudah Dikonfirmasi'],['tanggal.bulan','=',$a->bulan]])
                        ->sum('lapangan.harga');
                    @endphp
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                {{date('F',strtotime($a->bulan))}}
                            </div>
                            <div class="card-body">
                                {{"Rp. ".number_format($pendapatan)}}
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
                     
                    
                    
                    
                    
                </div>
                
                
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection