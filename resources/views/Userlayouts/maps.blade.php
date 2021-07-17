@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
<section class="section">
<div class="section-header">
    <h1>Top Navigation</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Layout</a></div>
      <div class="breadcrumb-item">Top Navigation</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">This is Example Page</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    <div class="card">
      <div class="card-header">
        <h4>Example Card</h4>
      </div>
      <div class="card-body">
        <iframe width="100%" height="500" src="https://maps.google.com/maps?q=-6.8969684492477, 107.5995523527562&output=embed" frameborder="0"></iframe>
        {{-- <div id="map" style="width:100%; height: 500px;"></div> --}}
      </div>
      
    </div>
  </div>
</section>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<script>
 
    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYW5qYXJhbmFzMjEyIiwiYSI6ImNrb29hMzJrbjA3emwyb3VpMnowamVqZGIifQ._hJ8hlsIsEfa58seZ0s8Lg', {
    
    id: 'mapbox/streets-v11'
  });

  var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYW5qYXJhbmFzMjEyIiwiYSI6ImNrb29hMzJrbjA3emwyb3VpMnowamVqZGIifQ._hJ8hlsIsEfa58seZ0s8Lg', {
    
    id: 'mapbox/satellite-v9'
  });


  var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    
  });

  var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=ppk.eyJ1IjoiYW5qYXJhbmFzMjEyIiwiYSI6ImNrb29hMzJrbjA3emwyb3VpMnowamVqZGIifQ._hJ8hlsIsEfa58seZ0s8Lg', {
    
    id: 'mapbox/dark-v10'
  });
  
  
  var map = L.map('map', {
    center: [-6.8969684492477, 107.5995523527562],
    zoom: 14,
    layers: [peta1
      ]
  });
  var baseMaps = {
    "Grayscale": peta1,
    "Streets": peta3,
    "Dark" : peta4,
    "Satellite": peta2
  };
  L.control.layers(baseMaps).addTo(map);
  

    
    var marker=L.marker([-6.8969684492477, 107.5995523527562]).addTo(map).bindPopup("<table><tr><td>Nama </td><td>:</td><td></td></tr><tr><td>Koordinat</td><td>:</td><td></td></tr></table>");
    
    
  
  L.Control.geocoder().addTo(map);
</script>
@endsection