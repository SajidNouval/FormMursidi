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
              <h5>{{ $irs->where(fn($group) => $group->first()->is_verified == 0)->count() }}</h5>
          </div>
      </div>
      <div class="col-md-4">
          <div class="status-box status-disetujui">
              <h4>Disetujui</h4>
              <h5>{{ $irs->where(fn($group) => $group->first()->is_verified == 1)->count() }}</h5>
          </div>
      </div>
      <div class="col-md-4">
          <div class="status-box status-ditolak">
              <h4>Ditolak</h4>
              <h5>{{ $irs->where(fn($group) => $group->first()->is_verified == -1)->count() }}</h5>
          </div>
      </div>
  </div>
  

    <!-- Daftar IRS -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar IRS</h3>
      </div>
      <div class="card-body">
        <table id="irsTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM Mahasiswa</th>
                    <th>Nama Mahasiswa</th>
                    <th>Total SKS</th>
                    <th>Status IRS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($irs as $index => $mahasiswaIrs)
                <!-- Baris Utama -->
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $mahasiswaIrs->first()->mahasiswa_nim }}</td>
                    <td>{{ $mahasiswaIrs->first()->mahasiswa->nama ?? 'Tidak ada' }}</td>
                    <td>{{ $mahasiswaIrs->sum(fn($item) => $item->kelas->mataKuliah->sks ?? 0) }}</td>
                    <td>
                        @php
                            $status = $mahasiswaIrs->first()->is_verified;
                        @endphp
                        @if($status == 1)
                            <span class="badge badge-success">Disetujui</span>
                        @elseif($status == -1)
                            <span class="badge badge-danger">Ditolak</span>
                        @else
                            <span class="badge badge-secondary">Diajukan</span>
                        @endif
                    </td>
                    <td>
                        @if($status == 0)
                        <form action="{{ route('irs.approve', $mahasiswaIrs->first()->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-check"></i> Setujui
                            </button>
                        </form>
                        <form action="{{ route('irs.reject', $mahasiswaIrs->first()->id) }}" method="POST" style="display:inline-block;">
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
    
                <!-- Baris Expandable -->
                <tr class="expandable-body d-none">
                    <td colspan="6">
                        <div class="p-3">
                            <ul>
                                @foreach ($mahasiswaIrs as $item)
                                    <li>
                                        {{ $item->kelas->mataKuliah->nama_mk ?? 'Tidak ada' }}
                                        (Kelas: {{ $item->kelas->kode_kelas ?? '-' }}, 
                                        SKS: {{ $item->kelas->mataKuliah->sks ?? '0' }},
                                        Tahun Akademik: {{ $item->kelas->tahun_Akademik ?? '#'}},
                                        Semester: {{ $item->mahasiswa->semester ?? '#' }},
                                        )

                                    </li>
                                @endforeach
                            </ul>
                        </div>
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
