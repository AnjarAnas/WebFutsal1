<div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="index.html" class="navbar-brand sidebar-gone-hide">Futsal Oke</a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          
        </div>
        <div class="form-inline ml-auto mb-4">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
           
          </div>
        
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item {{(Request::is('home'))? 'active': ''}}">
              <a href="/home"  class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
              
            </li>
            <li class="nav-item {{(Request::is('maps'))? 'active': ''}}">
              <a href="/maps" class="nav-link"><i class="far fa-heart"></i><span>Denah Lokasi</span></a>
            </li>
            <li class="nav-item {{(Request::is('book')) || (Request::is('bayar/*'))? 'active': ''}}">
              <a href="/book" class="nav-link"><i class="far fa-heart"></i><span>Data Book User</span></a>
            </li>
            <li class="nav-item dropdown {{(Request::is('lap/*')) ||(Request::is('jadwal/*'))? 'active': ''}}">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Booking Lapangan</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="/lap/{{1}}" class="nav-link">Lapangan 1</a></li>
                <li class="nav-item"><a href="/lap/{{2}}" class="nav-link">Lapangan 2</a></li>
                
              </ul>
            </li>
          </ul>
        </div>
      </nav>