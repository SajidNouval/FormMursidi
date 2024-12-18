<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Persetujuan IRS</title>
@include('RekapPAKA.header')
 
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed bg-ungubg">
<div class="wrapper">

  <!-- Navbar -->
  @include('DashBPAKA.navbar')
  <!-- /.navbar -->

<!-- Content Wrapper -->
<div class="content-wrapper">
    <div class="container mt-5">
  
        <!-- Kotak Status -->
        <div class="row text-center mb-4">
            <div class="col-md-6">
                <div class="status-box status-belum">
                    <i class="fas fa-user-clock"></i>
                    <h4>Belum Mengisi IRS</h4>
                    <h5>{{ $mahasiswa->whereNotIn('nim', $irs->pluck('mahasiswa_nim'))->count() }}</h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="status-box status-sudah">
                    <i class="fas fa-user-check"></i>
                    <h4>Sudah Mengisi IRS</h4>
                    <h5>{{ $irs->pluck('mahasiswa_nim')->unique()->count() }}</h5>
                </div>
            </div>
        </div>
  
        <!-- Daftar Mahasiswa -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Rekap Mahasiswa</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Mahasiswa Belum Mengisi -->
                    <div class="col-md-6">
                        <h4>Belum Mengisi IRS</h4>
                        <ul>
                            @foreach ($mahasiswa->whereNotIn('nim', $irs->pluck('mahasiswa_nim')) as $mhs)
                                <li>{{ $mhs->nim }} - {{ $mhs->nama }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Mahasiswa Sudah Mengisi -->
                    <div class="col-md-6">
                        <h4>Sudah Mengisi IRS</h4>
                        <ul>
                            @foreach ($irs->pluck('mahasiswa_nim')->unique() as $nim)
                                @php
                                    $mhs = $mahasiswa->firstWhere('nim', $nim);
                                @endphp
                                <li>{{ $mhs->nim }} - {{ $mhs->nama }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- /.content-wrapper -->
  @include('RekapPAKA.controllersidebar')
  <!-- Footer -->
  <footer class="main-footer bg-ungu">
    <strong>Form Pengisian IRS &copy; 2024 <a href="https://SAKURAIRS.COM">SAKURA</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>SAKURA</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->  

<!-- Scripts -->
@include('RekapPAKA.scriptdb')
</body>
</html>
