@extends('layouts.app')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Lapangan 2</h1>
      
    </div>
  
    <div class="section-body">
      <h2 class="section-title">Owl Carousel</h2>
      <p class="section-lead">Display multiple images alternately within a few seconds.</p>
  
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            @if (session('bayar'))
            <div class="text-center p-4">
                <button class="btn btn-primary btn-lg col-6" id="pay-button" type="submit" style="border-radius: 1rem">Booking</button>
                <div class="text-right">
                  <div class="badge badge-secondary m-3" style="color: black">
                    Note : Jika sudah selesai melakukan pembayaran silahkan refresh page ini
                  </div>
                  
                </div>
              </div>
            @elseif(session('sudah'))
            <div class="alert alert-success">
                Pesanan sedang diproses, Silahkan Tekan Ini <a href="/book" class="btn btn-secondary">Book</a>
            </div>
            @elseif(session('proses'))
            <div class="table-responsive">
                <table class="table">
                  <tr><td>VA</td><td>{{$va}}</td></tr>
                  <tr><td>Order ID</td><td>{{$order_id}}</td></tr>
                  <tr><td>Transaksi ID</td><td>{{$trx_id}}</td></tr>
                  <tr><td>BANK</td><td>{{$bank}}</td></tr>
                  
                  
                  <tr><td>Waktu Transaksi</td><td>{{date('d M Y G:i:s',strtotime($waktu))}}</td></tr>
                  <tr><td>Waktu Bayar</td><td>@if($status=="settlement"){{date('d M Y G:i:s',strtotime($waktu_bayar))}}@else --- @endif</td></tr>
                  <tr><td> Status</td><td> @if($status=="settlement")<span class="badge badge-success">Pesanan Sudah Dibayar</span>@else<span class="badge badge-danger">Pesanan Belum Dibayar</span>@endif</td></tr>
                  @if ($bayar[0]->status=="settlement")
                      <tr><td>Note</td><td><span class="badge badge-danger">Silahkan Datang 10 menit sebelum Pertandingan Dimulai </span></td></tr>
                  @endif
                 </table>
              </div>
            @endif
            
            <form id="payment-form" action="Payment" method="get">
                <input type="hidden" name="result" value="" id="resultdata">
                
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
<script type="text/javascript"
  src="https://app.sandbox.midtrans.com/snap/snap.js"
  data-client-key="SB-Mid-client-wpQR9-_zpDmYdMrM"></script>
<script type="text/javascript">
  var payButton = document.getElementById('pay-button');
  // For example trigger on button clicked, or any time you need
  payButton.addEventListener('click', function () {
    var resultData=document.getElementById("resultdata");
    function changeResult(type,data){
      $("#resultdata").val(JSON.stringify(data));
    }
    snap.pay('{{$token}}',{
      onSuccess:function(result){
        changeResult('success',result);
        $("#payment-form").submit();
      },
      onPending:function(result){
        changeResult('pending',result);
        $("#payment-form").submit();
      }
    }); // Replace it with your transaction token
  });
  
</script>
<script>
  
  $('.alert.alert-danger').delay(5000).slideUp(300);
</script>
<script src="{{asset('assets/js/rupiah.js')}}">
</script>



@endsection