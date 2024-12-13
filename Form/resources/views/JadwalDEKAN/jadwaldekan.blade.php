<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @include('JadwalDEKAN.header')
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('DashBDEKAN.navbar')

  <!-- Main Content -->
  <div class="content-wrapper">
    <!-- Header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Persetujuan Jadwal</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Kotak Status -->
    <div class="content">
      <div class="container-fluid">
        <div class="row text-center mb-4">
          <div class="col-md-4">
            <div class="info-box bg-secondary">
              <span class="info-box-icon"><i class="fas fa-clock"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jadwal Diajukan</span>
                <span class="info-box-number">{{ $diajukan }}</span>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="fas fa-check-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jadwal Disetujui</span>
                <span class="info-box-number">{{ $disetujui }}</span>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="fas fa-times-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jadwal Ditolak</span>
                <span class="info-box-number">{{ $ditolak }}</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Tombol Setujui Semua Jadwal -->
        <div class="mb-4">
          <form action="{{ route('dekan.jadwal.setujuiSemua') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success btn-lg">Setujui Semua Jadwal</button>
          </form>
        </div>

        <!-- Tabel Jadwal -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Jadwal Kuliah</h3>
          </div>
          <div class="card-body">
            <table id="jadwalTable" class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>No</th>
                  <th>Kode Ruang</th>
                  <th>Kode Mata Kuliah</th>
                  <th>Kelas</th>
                  <th>Hari</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
                  <th>Status</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($jadwal_kuliah as $index => $jadwal)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $jadwal->ruang_kuliah_kode_ruang }}</td>
                    <td>{{ $jadwal->nama_mk }}</td>
                    <td>{{ $jadwal->kelas }}</td>
                    <td>{{ $jadwal->hari }}</td>
                    <td>{{ $jadwal->jam_mulai }}</td>
                    <td>{{ $jadwal->jam_selesai }}</td>
                    <td>
                      <span class="badge 
                        {{ $jadwal->status === 'diajukan' ? 'badge-secondary' : ($jadwal->status === 'disetujui' ? 'badge-success' : 'badge-danger') }}">
                        {{ ucfirst($jadwal->status) }}
                      </span>
                    </td>
                    <td class="text-center">
                      @if($jadwal->status === 'diajukan')
                        <form action="{{ route('dekan.jadwal.setujui', $jadwal->id) }}" method="POST" style="display:inline-block;">
                          @csrf
                          <button class="btn btn-sm btn-success"><i class="fas fa-check"></i> Setujui</button>
                        </form>
                        <form action="{{ route('dekan.jadwal.tolak', $jadwal->id) }}" method="POST" style="display:inline-block;">
                          @csrf
                          <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Tolak</button>
                        </form>
                      @else
                        <span class="text-muted">Tidak ada aksi</span>
                      @endif
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

  @include("JadwalDEKAN.controllersidebar")

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
