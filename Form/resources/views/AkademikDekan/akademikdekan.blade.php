<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Persetujuan Ruang</title>
  @include('AkademikDekan.header')
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
              <li class="breadcrumb-item"><a href="{{ route('dekandb') }}">Home</a></li>
              <li class="breadcrumb-item active">Persetujuan Ruang</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main Content -->
    <div class="container mt-4">

      <!-- Filter dan Tombol Setujui Semua -->
      <div class="row mb-3">
        <div class="col-md-6">
          <form id="filterForm" method="GET" action="{{ route('dekan.ruang.index') }}">
            <div class="form-group">
              <label for="prodi">Filter Prodi:</label>
              <select name="prodi" id="prodi" class="form-control" onchange="document.getElementById('filterForm').submit();">
                <option value="">Semua Prodi</option>
                @foreach ($prodiList as $prodi)
                  <option value="{{ $prodi->kode_prodi }}" {{ request('prodi') == $prodi->kode_prodi ? 'selected' : '' }}>
                    {{ $prodi->nama_prodi }}
                  </option>
                @endforeach
              </select>
            </div>
          </form>
        </div>
        <div class="col-md-6 text-right">
          <form action="{{ route('dekan.ruang.setujuiSemua') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menyetujui semua ruang untuk prodi ini?');">
            @csrf
            <input type="hidden" name="prodi" value="{{ request('prodi') }}">
            <button type="submit" class="btn btn-success" {{ !request('prodi') ? 'disabled' : '' }}>
              <i class="fas fa-check"></i> Setujui Semua Ruang
            </button>
          </form>
        </div>
      </div>

      <!-- Kotak Status -->
      <div class="row text-center mb-4">
        <div class="col-md-4">
          <div class="info-box bg-secondary">
            <span class="info-box-icon"><i class="fas fa-file-alt"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Diajukan</span>
              <span class="info-box-number">{{ $ruang_kuliah->where('status', 'diajukan')->count() }}</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-check-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Disetujui</span>
              <span class="info-box-number">{{ $ruang_kuliah->where('status', 'disetujui')->count() }}</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fas fa-times-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Ditolak</span>
              <span class="info-box-number">{{ $ruang_kuliah->where('status', 'ditolak')->count() }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Tabel Daftar Ruang -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Ruang</h3>
        </div>
        <div class="card-body">
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
          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
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
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Setujui</button>
                      </form>
                      <form action="{{ route('dekan.ruang.tolak', $ruang->kode_ruang) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menolak ruang ini?');">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Tolak</button>
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
      </div>
    </div>

    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @include('DashBDEKAN.controllersidebar')
  <!-- /.control-sidebar -->

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