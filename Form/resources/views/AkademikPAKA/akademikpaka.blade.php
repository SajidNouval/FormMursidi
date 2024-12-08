<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Persetujuan IRS</title>
@include('AkademikPAKA.header')
 
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
        <div class="col-md-4">
          <div class="status-box status-diajukan">
            <h4>Diajukan</h4>
            <h5>{{ $irs->where('status', 'diajukan')->count() }}</h5>
          </div>
        </div>
        <div class="col-md-4">
          <div class="status-box status-disetujui">
            <h4>Disetujui</h4>
            <h5>{{ $irs->where('status', 'disetujui')->count() }}</h5>
          </div>
        </div>
        <div class="col-md-4">
          <div class="status-box status-ditolak">
            <h4>Ditolak</h4>
            <h5>{{ $irs->where('status', 'ditolak')->count() }}</h5>
          </div>
        </div>
      </div>

      <!-- Tabel Daftar IRS -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar IRS</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>NIM Mahasiswa</th>
                <th>Kelas</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($irs as $item)
                <tr>
                  <td>{{ $item->mahasiswa_nim }}</td>
                  <td>{{ $item->kelas->kode_kelas }}</td>
                  <td>{{ $item->kelas->mataKuliah->nama_mk }}</td>
                  <td>{{ $item->kelas->mataKuliah->sks }}</td>
                  <td>
                    <span class="badge 
                      {{ $item->status == 'disetujui' ? 'badge-success' : ($item->status == 'ditolak' ? 'badge-danger' : 'badge-secondary') }}">
                      {{ ucfirst($item->status) }}
                    </span>
                  </td>
                  <td class="text-center">
                    @if ($item->status == 'diajukan')
                      <a href="{{ route('approveIrs', $item->id) }}" class="btn btn-approve">Setujui</a>
                      <a href="{{ route('rejectIrs', $item->id) }}" class="btn btn-reject">Tolak</a>
                    @else
                      <span class="text-muted">Tidak ada aksi</span>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="text-center">Tidak ada data IRS yang diajukan.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  @include('AkademikPAKA.controllersidebar')
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
@include('AkademikPAKA.scriptdb')
</body>
</html>
