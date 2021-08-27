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

@endsection