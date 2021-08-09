<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <a href="index.html" class="navbar-brand sidebar-gone-hide">Hy, {{Auth::user()->name}}</a>
    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    <div class="nav-collapse">
      <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
        <i class="fas fa-ellipsis-v"></i>
      </a>
      <ul class="navbar-nav">
        <li class="nav-item active"><a href="/dashboard/admin" class="nav-link">Dashboard</a></li>
        <li class="nav-item"><a href="/user" class="nav-link">User</a></li>
        <li class="nav-item"><a href="/pendapatan" class="nav-link">Pendapatan</a></li>
      </ul>
    </div>
    <form class="form-inline ml-auto">
      
    </form>
    <ul class="navbar-nav navbar-right">
      
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">Logged </div>
          <div class="dropdown-title">
          @php 
            $user=\App\Models\User::all();
            date_default_timezone_set('Asia/Jakarta');
            $datenow=date('Y-m-d h:i:s');
            $datenowconvert=date_create($datenow);
            $datelastLogin=$user[2]->last_login;
            $datelastconvert=date_create($datelastLogin);
            $dateDiv=date_diff($datenowconvert,$datelastconvert);
            echo ($dateDiv->h." Jam ".$dateDiv->i." Menit ".$dateDiv->s." Detik");
          @endphp
          </div>
          <div class="dropdown-divider"></div>
          <a href="/logout" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
