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
                  <form action="/dashboard/admin" method="get">
                    <div class="row">
                      <label for="cari">Cari Data</label>
                      <input type="text" name="cari" class="form-control mb-4 col-12" placeholder="Cari" id="cari">
                      </div>
                  </form>
                </div>
                
                @if (!$data1->isEmpty())
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>Nama</th>
                      <th>Lapangan</th>
                      <th>Tanggal</th>
                      <th>Waktu</th>
                      <th>Deadline</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    @foreach ($data1 as $a)
                        <tr>
                            <td>{{$a->nama}}</td>
                            <td>{{$a->nama_lap}}</td>
                            <td>{{date('d F Y',strtotime($a->tanggal))}}</td>
                            <td>{{$a->waktu}}</td>
                            <td>
                              <div class="badge badge-success">
                              <span id="demo{{$a->id_bayar}}"></span>
                              </div>
                            </td>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
      $('.alert').delay(3000).slideUp(300);
  </script>
  @foreach ($data1 as $b)
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
      else{
        var a=document.getElementById("demo{{$b->id_bayar}}");
        a.innerHTML = "-------";
        
      }
      
    }
  }, 1000);
</script>
  @endforeach
@endsection