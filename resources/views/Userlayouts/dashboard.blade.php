@extends('layouts.app')
@section('content')

<section class="section">
  <div class="section-header">
    <h1>Owl Carousel</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Modules</a></div>
      <div class="breadcrumb-item">Owl Carousel</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Owl Carousel</h2>
    <p class="section-lead">Display multiple images alternately within a few seconds.</p>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="https://cdn1-production-images-kly.akamaized.net/926vX6OSO3X8fSaYfyVPo4k4G58=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3149049/original/024123000_1591784711-200526_Ilustrasi_Manchester_United.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="https://asset.indosport.com/article/image/289015/logo_manchester_united-169.jpg?w=600" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="https://pict-a.sindonews.net/dyn/620/pena/news/2020/10/08/11/190560/edinson-cavani-masuk-daftar-pemain-mu-di-liga-champions-wcw.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
        
      </div>
      
    </div>
  </div>
</section>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

@endsection