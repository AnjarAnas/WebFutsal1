@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Data Book</h1>
      
    </div>

    <div class="section-body">
      <h2 class="section-title">Data Book</h2>
      <p class="section-lead">Example of some Bootstrap table components.</p>

      <div class="row">
        <div class="col-md-12 ">
          <div class="card">
            <div class="card-header">
              <h4>Simple Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  <tr>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Lapangan</th>
                      <th>Waktu</th>
                      <th>Deadline</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Aksi</th>
                  </tr>
                  @foreach ($bayar as $b)
                      <tr>
                          <td>
                              {{$b->nama}}
                          </td>
                          <td>{{"Rp ".number_format($b->harga)}}</td>
                          <td>{{$b->nama_lap}}</td>
                          <td>{{$b->waktu}}</td>
                          <td>
                            @if ($b->status=="Dalam Proses")
                            <div class="badge badge-success"><span id="demo{{$b->id_bayar}}"></span></div></td>
                            @elseif ($b->status=="Belum Dibayar")
                            <div class="badge badge-success"><span id="demo{{$b->id_bayar}}"></span></div></td>
                            @elseif ($b->status="settlement")
                            <div class="badge badge-success">{{$b->status}}</div></td>
                            @endif
                            
                          <td>{{date('d F Y',strtotime($b->tanggal))}}</td>
                          <td>
                           @if ($b->status=="Dalam Proses" || $b->status=="Belum Dibayar")
                           <div class="badge badge-danger">{{$b->status}}</div>
                           @else
                           <div class="badge badge-success">Sudah Dibayar</div>
                           @endif
                            
                          </td>
                          
                          <td>
                            @if ($b->status=="Dalam Proses")
                            <a href="/bayar/{{$b->id_bayar}}" class="btn btn-warning" style="border-radius: 10px">Status</a>
                            @elseif ($b->status=="Belum Dibayar")
                            <a href="/bayar/{{$b->id_bayar}}" class="btn btn-danger" style="border-radius: 10px">Bayar</a>
                            @else
                            <a href="/bayar/{{$b->id_bayar}}" class="btn btn-success" style="border-radius: 10px">Struck</a>
                            @endif
                            </td>
                      </tr>

                  @endforeach
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              Note : setelah waktu deadline habis segera lakukan refresh
            </div>
          </div>
        </div>
        
      </div>
    </div>
</section>

  @foreach ($bayar as $b)
  <script>
  var countDownDate{{$b->id_bayar}} = new Date("{{$b->deadline}}").getTime();
  
  // Update the count down every 1 second
  var x = setInterval(function() {
  
    // Get today's date and time
    var now = new Date().getTime();
  
    // Find the distance between now and the count down date
    var distance{{$b->id_bayar}} = countDownDate{{$b->id_bayar}} - now;
  
    // Time calculations for days, hours, minutes and seconds
    var days{{$b->id_bayar}} = Math.floor(distance{{$b->id_bayar}} / (1000 * 60 * 60 * 24));
    var hours{{$b->id_bayar}} = Math.floor((distance{{$b->id_bayar}} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes{{$b->id_bayar}} = Math.floor((distance{{$b->id_bayar}} % (1000 * 60 * 60)) / (1000 * 60));
    var seconds{{$b->id_bayar}} = Math.floor((distance{{$b->id_bayar}} % (1000 * 60)) / 1000);
  
    // Display the result in the element with id="demo"
    document.getElementById("demo{{$b->id_bayar}}").innerHTML = days{{$b->id_bayar}} + "d " + hours{{$b->id_bayar}} + "h "
    + minutes{{$b->id_bayar}} + "m " + seconds{{$b->id_bayar}} + "s ";
   
  
    // If the count down is finished, write some text
    if (distance{{$b->id_bayar}} < 0) {
      if("{{$b->status}}"==="Belum Dibayar" || "{{$b->status}}"==="Dalam Proses"){
        document.getElementById("demo{{$b->id_bayar}}").innerHTML = "EXPIRED";
        clearInterval(x);
        $.ajax({
          type: "get",
          url: "/delete/pesan/{{$b->id_bayar}}",
          data: {
            
          },
          dataType: "json",
          success: function (response) {
            console.log(response.sukses);
          }
        });
        
      }
      
    }
  }, 1000);
</script>
  @endforeach

  
  
@endsection