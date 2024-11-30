
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Dashboard</title>
  @include('HerRegMHS.header')
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

  <!-- Navbar -->
@include('DashBMHS.navbar')
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Her-Rgistrasi</h1>
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
          <!-- Header -->
          <div class="col-12 text-center mb-3">
            <h1 class="text-dark font-weight-bold">Her-Registrasi</h1>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- Aktif -->
          <div class="col-12 col-md-6 col-lg-3 mb-3">
            <a href="#" class="info-box-custom bg-light-purple p-4 text-center h-100 d-block">
              <h4 class="text-dark font-weight-bold">Aktif</h4>
              <p class="text-secondary">
                Anda akan mengikuti kegiatan perkuliahan pada semester ini serta mengisi Isian Rencana Studi (IRS).
              </p>
            </a>
          </div>
    
          <!-- Cuti -->
          <div class="col-12 col-md-6 col-lg-3 mb-3">
            <a href="#" class="info-box-custom bg-light-purple p-4 text-center h-100 d-block">
              <h4 class="text-dark font-weight-bold">Cuti</h4>
              <p class="text-secondary">
                Menghentikan kuliah sementara untuk semester ini tanpa kehilangan status sebagai mahasiswa.
              </p>
            </a>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- Her-Registrasi -->
          <div class="col-12 col-md-6 col-lg-6 mb-3">
            <a href="#" class="info-box-custom bg-light-purple p-4 text-left h-100 d-block">
              <h4 class="text-dark font-weight-bold">Her-Registrasi</h4>
              <p class="text-secondary">
                Informasi lebih lanjut mengenai Her-Registrasi, atau mekanisme serta pengajuan penangguhan pembayaran dapat ditanyakan melalui Biro Administrasi Akademik (BAA) atau program studi masing-masing.
              </p>
              <p class="text-dark font-weight-bold">Status Akademik Anda: #######</p>
            </a>
          </div>
    
          <!-- Konsultasi -->
          <div class="col-12 col-md-6 col-lg-3 mb-3">
            <a href="{{ route('konsultasimhs') }}" class="info-box-custom bg-light-purple p-4 text-center h-100 d-block">
              <h4 class="text-dark font-weight-bold">Konsultasi</h4>
              <p class="text-secondary">
                Konsultasi dengan Pembimbing Akademik untuk membantu pemilihan IRS.
              </p>
            </a>
          </div>
        </div>
      </div>
    </section>
    
    
    
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @include('HerRegMHS.controllersidebar')
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
@include('HerRegMHS.scriptdb')
</body>
</html>
