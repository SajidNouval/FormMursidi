<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Persetujuan Ruang</title>
  @include('AkademikDekan.header')
  <style>
    /* Mengubah background halaman */
    body {
      background-color: #D8BFD8; /* Warna ungu pastel */
    }

    /* Styling kotak status */
    .status-box {
      border-radius: 15px;
      padding: 20px;
      text-align: center;
      color: white;
      transition: all 0.2s ease-in-out;
    }

    .status-box:hover {
      transform: scale(1.05);
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    }

    .status-diajukan {
      background-color: #d6d6d6; /* Abu-abu muda */
    }
    .status-diajukan:hover {
      background-color: #b5b5b5; /* Abu-abu lebih gelap */
    }

    .status-disetujui {
      background-color: #28a745; /* Hijau */
    }
    .status-disetujui:hover {
      background-color: #218838; /* Hijau lebih gelap */
    }

    .status-ditolak {
      background-color: #dc3545; /* Merah */
    }
    .status-ditolak:hover {
      background-color: #c82333; /* Merah lebih gelap */
    }

    /* Styling tabel */
    table {
      background-color: #FFF;
      border-radius: 8px;
      overflow: hidden;
    }

    table th {
      background-color: #6c757d; /* Abu-abu gelap */
      color: white;
    }

    table td {
      vertical-align: middle;
    }

    /* Tombol aksi */
    .btn-success, .btn-danger {
      font-size: 14px;
      border-radius: 5px;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed bg-ungubg">
<div class="wrapper">

  <!-- Navbar -->
  @include('DashBDEKAN.navbar')
  <!-- /.navbar -->

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Persetujuan Ruang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('kaprodidb') }}">Home</a></li>
              <li class="breadcrumb-item active">Persetujuan Ruang</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main Content -->
    <div class="container mt-5">

      <!-- Kotak Status -->
      <div class="row text-center mb-4">
        <div class="col-md-4">
          <div class="status-box status-diajukan">
            <h4>Diajukan</h4>
            <h3>{{ $ruang_kuliah->where('status', 'diajukan')->count() }}</h3>
          </div>
        </div>
        <div class="col-md-4">
          <div class="status-box status-disetujui">
            <h4>Disetujui</h4>
            <h3>{{ $ruang_kuliah->where('status', 'disetujui')->count() }}</h3>
          </div>
        </div>
        <div class="col-md-4">
          <div class="status-box status-ditolak">
            <h4>Ditolak</h4>
            <h3>{{ $ruang_kuliah->where('status', 'ditolak')->count() }}</h3>
          </div>
        </div>
      </div>

      <!-- Tabel Daftar Ruang -->
      <h2 class="text-center mb-4">Daftar Ruang</h2>
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Kode Ruang</th>
            <th>Kapasitas</th>
            <th>Kode Prodi</th>
            <th>Kode Fakultas</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($ruang_kuliah as $ruang)
            <tr>
              <td>{{ $ruang->kode_ruang }}</td>
              <td>{{ $ruang->kapasitas }}</td>
              <td>{{ $ruang->program_studi_kode_prodi }}</td>
              <td>{{ $ruang->fakultas_kode_fakultas }}</td>
              <td>
                <span class="badge 
                  {{ $ruang->status == 'disetujui' ? 'badge-success' : ($ruang->status == 'ditolak' ? 'badge-danger' : 'badge-secondary') }}">
                  {{ ucfirst($ruang->status) }}
                </span>
              </td>
              <td class="text-center">
                @if ($ruang->status == 'diajukan')
                  <form action="{{ route('dekan.ruang.setujui', $ruang->kode_ruang) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                  </form>
                  <form action="{{ route('dekan.ruang.tolak', $ruang->kode_ruang) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                  </form>
                @else
                  <span class="text-muted">Tidak ada aksi</span>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center">Tidak ada data ruangan yang diajukan.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->

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

@include('AkademikDekan.scriptdb')
</body>
</html>
