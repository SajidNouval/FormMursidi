
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Dashboard</title>
  @include('DashBDEKAN.header')
  <style>
    /* Mengubah background seluruh halaman */
    body {
      background-color: #D8BFD8; /* Warna ungu pastel */
    }

    /* Mengubah background konten utama */
    .content-wrapper {
      background-color: #D8BFD8; /* Warna ungu pastel untuk konten utama */
    }
  </style>
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed bg-ungubg">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img src="{{ asset('AdminLTE/dist/img/LOGO_COBA.png') }}" alt="SAKURALOGO" height="500" width="500">
  </div>

  <!-- Navbar -->
@include('DashBDEKAN.navbar')
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Dekan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Profile Box -->
          <div class="col-12 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-secondary text-white d-flex align-items-center p-2">
              <div class="card-body text-center">
                <img src="{{ asset('AdminLTE/dist/img/pp.jpg') }}" alt="user-avatar" class="img-circle img-fluid mb-3" style="width: 100px;">
                <h4 class="font-weight-bold">Dekan</h4>
                <p class="mb-1"><strong>nama</strong></p>
                <p class="mb-1">nim</p>
                <p class="text-muted">email</p>
                <a href="#" class="text-info">Lihat Selengkapnya</a>
              </div>
            </div>
          </div>
    
          <!-- Main Info Boxes -->
          <div class="col-12 col-md-8 tombol-besar"> <!-- Tambahkan kelas "tombol-besar" di sini -->
            <div class="row">
              <!-- Akademik Box -->
              <div class="col-6 col-md-6 mb-3">
                <a href="{{ route('akademikdekan') }}" class="info-box bg-secondary">
                  <span class="info-box-icon"><i class="fas fa-book"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text text-white">Akademik</span>
                    <span class="info-box-number text-white">TA 2024/2025</span>
                  </div>
                </a>
              </div>
          
              <!-- Her-Registrasi Box -->
              <div class="col-6 col-md-6 mb-3">
                <a href="{{ route('herregmhs') }}" class="info-box bg-secondary">
                  <span class="info-box-icon"><i class="fas fa-desktop"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text text-white">Her-Registrasi</span>
                  </div>
                </a>
              </div>
          
              <!-- Status Akademik Box -->
              <div class="col-6 col-md-6 mb-3">
                <a href="/akademik" class="info-box bg-secondary">
                  <span class="info-box-icon"><i class="fas fa-home"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text text-white">Status Akademik</span>
                  </div>
                </a>
              </div>
          
              <!-- Prestasi Akademik Box -->
              <div class="col-6 col-md-6 mb-3">
                <a href="/akademik" class="info-box bg-secondary">
                  <span class="info-box-icon"><i class="fas fa-star"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text text-white">Prestasi Akademik</span>
                  </div>
                </a>
              </div>
              
            </div>
          </div>
          
        </div>
      </div>
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @include('DashBDEKAN.controllersidebar')
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer bg-ungu">
    <strong>Form Pengisian IRS &copy; 2024 <a href="https://SAKURAIRS.COM">SAKURA</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>SAKURA</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('DashBDEKAN.scriptdb')
</body>
</html>
