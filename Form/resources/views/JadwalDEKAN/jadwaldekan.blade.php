<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Persetujuan Jadwal Dekan</title>
  @include('JadwalDEKAN.header')

  <!-- Tambahkan styling tambahan -->
  <style>
    /* Background halaman */
    body {
      background-color: #D8BFD8; /* Warna ungu pastel */
    }
    .content-wrapper {
      background-color: #D8BFD8; /* Warna ungu pastel */
    }

    /* Kotak persetujuan */
    .status-box {
      text-align: center;
      padding: 15px;
      border-radius: 10px;
      color: #D8BFD8;
      transition: all 0.3s ease;
    }

    .status-box:hover {
      cursor: pointer;
      filter: brightness(85%);
    }

    .status-diajukan {
      background-color: #808080; /* Abu-abu tua */
    }

    .status-disetujui {
      background-color: #28a745; /* Hijau */
    }

    .status-ditolak {
      background-color: #dc3545; /* Merah */
    }

    /* Tabel jadwal */
    .table {
      background-color: #D8BFD8; /* Ungu pastel */
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .table tbody tr:hover {
      background-color: #c4a0c4; /* Gelap sedikit lebih dari ungu pastel */
      cursor: pointer;
    }

    .btn-approve {
      color: #fff;
      background-color: #28a745; /* Hijau */
      border-color: #28a745;
    }

    .btn-reject {
      color: #fff;
      background-color: #dc3545; /* Merah */
      border-color: #dc3545;
    }

    .btn-approve:hover,
    .btn-reject:hover {
      filter: brightness(85%);
    }
  </style>
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('DashBDEKAN.navbar')

  <!-- Main content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Persetujuan Jadwal Dekan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Persetujuan Jadwal</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Kotak status -->
    <div class="content">
      <div class="container-fluid">
        <div class="row text-center">
          <div class="col-md-4">
            <div class="status-box status-diajukan">
              <h3>{{ $diajukan }}</h3>
              <p>Jadwal Diajukan</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="status-box status-disetujui">
              <h3>{{ $disetujui }}</h3>
              <p>Jadwal Disetujui</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="status-box status-ditolak">
              <h3>{{ $ditolak }}</h3>
              <p>Jadwal Ditolak</p>
            </div>
          </div>
        </div>

        <!-- Tabel Jadwal -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Jadwal Kuliah</h3>
              </div>
              <div class="card-body">
                <table id="jadwalTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Ruang</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($jadwal_kuliah as $index => $jadwal)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $jadwal->ruang_kuliah_kode_ruang }}</td>
                      <td>{{ $jadwal->mata_kuliah_kode_mk }}</td>
                      <td>{{ $jadwal->hari }}</td>
                      <td>{{ $jadwal->jam_mulai }}</td>
                      <td>{{ $jadwal->jam_selesai }}</td>
                      <td>
                        @if($jadwal->status === 'diajukan')
                          <span class="badge badge-secondary">Diajukan</span>
                        @elseif($jadwal->status === 'disetujui')
                          <span class="badge badge-success">Disetujui</span>
                        @else
                          <span class="badge badge-danger">Ditolak</span>
                        @endif
                      </td>
                      <td>
                        <form action="{{ route('dekan.jadwal.setujui', $jadwal->id) }}" method="POST" style="display:inline-block;">
                          @csrf
                          <button class="btn btn-sm btn-approve">Setujui</button>
                        </form>
                        <form action="{{ route('dekan.jadwal.tolak', $jadwal->id) }}" method="POST" style="display:inline-block;">
                          @csrf
                          <button class="btn btn-sm btn-reject">Tolak</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="main-footer bg-ungu">
    <strong>SAKURA &copy; 2024 <a href="https://SAKURAIRS.COM">SAKURA</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>

<!-- Scripts -->
@include('JadwalDEKAN.scriptdb')

@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
@endif

</body>
</html>
