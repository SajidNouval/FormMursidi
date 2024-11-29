
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
            <h1 class="m-0">Dashboard MHS</h1>
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
          <!-- Her-Registrasi Section -->
          <div class="col-12">
            <div class="card bg-light-purple">
              <div class="card-header text-center">
                <h3>Her-Registrasi</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <!-- Aktif -->
                  <div class="col-6 col-md-3 mb-3">
                    <a href="" class="info-box bg-secondary p-4 text-center">
                      <h5 class="text-white">Aktif</h5>
                      <p class="text-white-50">Anda akan mengikuti kegiatan perkuliahan pada semester ini serta mengisi Isian Rencana Studi (IRS).</p>
                    </a>
                  </div>
    
                  <!-- Cuti -->
                  <div class="col-6 col-md-3 mb-3">
                    <a href="" class="info-box bg-secondary p-4 text-center">
                      <h5 class="text-white">Cuti</h5>
                      <p class="text-white-50">Menghentikan kuliah sementara untuk semester ini tanpa kehilangan status sebagai mahasiswa.</p>
                    </a>
                  </div>
    
                  <!-- Her-Registrasi -->
                  <div class="col-6 col-md-3 mb-3">
                    <a href="" class="info-box bg-secondary p-4 text-center">
                      <h5 class="text-white">Her-Registrasi</h5>
                      <p class="text-white-50">Informasi lebih lanjut mengenai Her-Registrasi, atau mekanisme serta pengajuan penangguhan pembayaran dapat ditanyakan melalui Biro Administrasi Akademik (BAA).</p>
                    </a>
                  </div>
    
                  <!-- Konsultasi -->
                  <div class="col-6 col-md-3 mb-3">
                    <a href="" class="info-box bg-secondary p-4 text-center">
                      <h5 class="text-white">Konsultasi</h5>
                      <p class="text-white-50">Konsultasi dengan Pembimbing Akademik untuk membantu pemilihan IRS.</p>
                    </a>
                  </div>
                </div>
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
