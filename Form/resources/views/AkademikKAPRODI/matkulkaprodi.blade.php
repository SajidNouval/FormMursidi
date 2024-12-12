<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Permatakulan</title>
  @include('AkademikKAPRODI.header')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Mengubah background seluruh halaman */
    body {
      background-color: #D8BFD8; /* Warna ungu pastel */
    }

    /* Mengubah background konten utama */
    .content-wrapper {
      background-color: #D8BFD8; /* Warna ungu pastel untuk konten utama */
    }

    .card-header {
      background-color: #6f42c1; /* Warna ungu gelap */
      color: white;
    }

    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
    }

    .btn-danger {
      background-color: #dc3545;
      border-color: #dc3545;
    }

    .table th, .table td {
      vertical-align: middle;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed bg-ungubg">
<div class="wrapper">

  <!-- Navbar -->
  @include('DashBKAPRODI.navbar')
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('kaprodidb') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container mt-5">

    <!-- Tambah Mata Kuliah -->
    <div class="card mt-4">
      <div class="card-header">
          <h3 class="card-title">Tambah Mata Kuliah</h3>
      </div>
      <form method="POST" action="{{ route('mata_kuliah.store') }}">
          @csrf
          <div class="card-body">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              <div class="form-group">
                  <label for="kode_mk">Kode Mata Kuliah</label>
                  <input type="text" class="form-control @error('kode_mk') is-invalid @enderror" id="kode_mk" name="kode_mk" value="{{ old('kode_mk') }}" required>
                  @error('kode_mk')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="nama_mk">Nama Mata Kuliah</label>
                  <input type="text" class="form-control @error('nama_mk') is-invalid @enderror" id="nama_mk" name="nama_mk" value="{{ old('nama_mk') }}" required>
                  @error('nama_mk')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="sks">SKS</label>
                  <input type="number" class="form-control @error('sks') is-invalid @enderror" id="sks" name="sks" min="1" max="6" value="{{ old('sks') }}" required>
                  @error('sks')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="semester">Semester</label>
                  <input type="number" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" min="1" max="14" value="{{ old('semester') }}" required>
                  @error('semester')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="jenis">Jenis</label>
                  <select class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis" required>
                      <option value="wajib" {{ old('jenis') == 'wajib' ? 'selected' : '' }}>Wajib</option>
                      <option value="pilihan" {{ old('jenis') == 'pilihan' ? 'selected' : '' }}>Pilihan</option>
                  </select>
                  @error('jenis')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              <!-- Dropdown for Pengajar -->
              @for ($i = 1; $i <= 3; $i++)
                  <div class="form-group">
                      <label for="pengampu{{ $i }}">Pengajar {{ $i }}</label>
                      <select class="form-control @error('pengampu'.$i) is-invalid @enderror" id="pengampu{{ $i }}" name="pengampu{{ $i }}" required onchange="updatePengajarOptions()">
                          <option value="">Pilih Pengampu</option>
                          @foreach($dosens as $d)
                              <option value="{{ $d->nama }}" {{ old('pengampu'.$i) == $d->nama ? 'selected' : '' }}>{{ $d->nama }}</option>
                          @endforeach
                      </select>
                      @error('pengampu'.$i)
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
              @endfor
              <div class="form-group">
                  <label for="program _studi_kode_prodi">Program Studi</label>
                  <select class="form-control @error('program_studi_kode_prodi') is-invalid @enderror" id="program_studi_kode_prodi" name="program_studi_kode_prodi" required>
                      <option value="">Pilih Program Studi</option>
                      @foreach($programStudis as $prodi)
                          <option value="{{ $prodi->kode_prodi }}" {{ old('program_studi_kode_prodi') == $prodi->kode_prodi ? 'selected' : '' }}>{{ $prodi->nama_prodi }}</option>
                      @endforeach
                  </select>
                  @error('program_studi_kode_prodi')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="fakultas_kode_fakultas">Fakultas</label>
                  <select class="form-control @error('fakultas_kode_fakultas') is-invalid @enderror" id="fakultas_kode_fakultas" name="fakultas_kode_fakultas" required>
                      <option value="">Fakultas</option>
                      @foreach($fakultas as $fk)
                          <option value="{{ $fk->kode_fakultas }}" {{ old('fakultas_kode_fakultas') == $fk->kode_fakultas ? 'selected' : '' }}>{{ $fk->nama_fakultas }}</option>
                      @endforeach
                  </select>
                  @error('fakultas_kode_fakultas')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
          </div>
          <div class="card-footer">
              <button type="submit" class="btn btn-success">Tambah Mata Kuliah</button>
          </div>
      </form>
    </div>
      <!-- Daftar Mata Kuliah -->
      <div class="card mt-5">
          <div class="card-header">
              <h3 class="card-title">Daftar Mata Kuliah</h3>
          </div>
          <div class="card-body">
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>Kode MK</th>
                          <th>Nama MK</th>
                          <th>SKS</th>
                          <th>Semester</th>
                          <th>Jenis</th>
                          <th>Pengajar</th>
                          <th>Kode Prodi</th>
                          <th>Kode Fakultas</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($mataKuliah as $mk)
                          <tr>
                              <td>{{ $mk->kode_mk }}</td>
                              <td>{{ $mk->nama_mk }}</td>
                              <td>{{ $mk->sks }}</td>
                              <td>{{ $mk->semester }}</td>
                              <td>{{ $mk->jenis }}</td>
                              <td>
                                {{ $mk->pengampu1 }}{{ $mk->pengampu2 ? ', ' . $mk->pengampu2 : '' }}{{ $mk->pengampu3 ? ', ' . $mk->pengampu3 : '' }}
                              </td>
                              <td>{{ $mk->program_studi_kode_prodi }}</td>
                              <td>{{ $mk->fakultas_kode_fakultas }}</td>
                              <td>
                                  <form action="{{ route('mata_kuliah.destroy', $mk->kode_mk) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                  </form>
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="9" class="text-center">Tidak ada data mata kuliah.</td>
                          </tr>
                      @endforelse
                  </tbody>
              </table>
          </div>
      </div>
      <!-- /.card -->
    </div>

    <!-- Control Sidebar -->
    @include('AkademikKAPRODI.controllersidebar')
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
  <!-- REQUIRED SCRIPTS -->
  @include('AkademikKAPRODI.scriptdb')
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs