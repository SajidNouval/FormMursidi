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
          <h5>{{ $irs->where('is_verified', 0)->count() }}</h5>
        </div>
      </div>
      <div class="col-md-4">
        <div class="status-box status-disetujui">
          <h4>Disetujui</h4>
          <h5>{{ $irs->where('is_verified', 1)->count() }}</h5>
        </div>
      </div>
      <div class="col-md-4">
        <div class="status-box status-ditolak">
          <h4>Ditolak</h4>
          <h5>{{ $irs->where('is_verified', -1)->count() }}</h5>
        </div>
      </div>
    </div>

    <!-- Daftar IRS -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar IRS</h3>
      </div>
      <div class="card-body">
        <table id="irsTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>NIM Mahasiswa</th>
              <th>Kelas</th>
              <th>Nama Mata Kuliah</th>
              <th>SKS</th>
              <th>Status IRS</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($irs as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->mahasiswa_nim }}</td>
                <td>{{ $item->kelas->kode_kelas ?? 'Tidak ada' }}</td>
                <td>{{ $item->kelas->mataKuliah->nama_mk ?? 'Tidak ada' }}</td>
                <td>{{ $item->kelas->mataKuliah->sks ?? '0' }}</td>
                <td>
                    @if($item->is_verified == 1)
                        <span class="badge badge-success">Disetujui</span>
                    @elseif($item->is_verified == -1)
                        <span class="badge badge-danger">Ditolak</span>
                    @else
                        <span class="badge badge-secondary">Diajukan</span>
                    @endif
                </td>
                <td class="text-center">
                    @if($item->is_verified == 0)
                    <form action="{{ route('irs.approve', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fas fa-check"></i> Setujui
                        </button>
                    </form>
                    <form action="{{ route('irs.reject', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-times"></i> Tolak
                        </button>
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
