
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Permatakulan</title>
  @include('AkademikKAPRODI.header')
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
@include('DashBKAPRODI.navbar')
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
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
              <div class="form-group">
                  <label for="kode_mk">Kode Mata Kuliah</label>
                  <input type="text" class="form-control form-control-border" id="kode_mk" name="kode_mk" required>
              </div>
              <div class="form-group">
                  <label for="nama_mk">Nama Mata Kuliah</label>
                  <input type="text" class="form-control form-control-border" id="nama_mk" name="nama_mk" required>
              </div>
              <div class="form-group">
                  <label for="sks">SKS</label>
                  <input type="number" class="form-control form-control-border" id="sks" name="sks" required>
              </div>
              <div class="form-group">
                  <label for="semester">Semester</label>
                  <input type="number" class="form-control form-control-border" id="semester" name="semester" required>
              </div>
              <div class="form-group">
                  <label for="jenis">Jenis</label>
                  <select class="custom-select form-control-border" id="jenis" name="jenis" required>
                      <option value="wajib">Wajib</option>
                      <option value="pilihan">Pilihan</option>
                  </select>
              </div>
              <!-- Dropdown for Pengajar 1 -->
                <div class="form-group">
                  <label for="pengajar_1">Pengajar 1</label>
                  <select class="custom-select form-control-border" id="Pengampu1" name="pengampu1" required>
                      <option value="">Pilih Pengampu</option>
                      @foreach($dosen as $d)
                          <option value="{{ $d->id }}">{{ $d->nama }}</option> <!-- Displaying the name of the dosen -->
                      @endforeach
                  </select>
                </div>

                <!-- Dropdown for Pengajar 2 -->
                <div class="form-group">
                  <label for="pengajar_2">Pengajar 2</label>
                  <select class="custom-select form-control-border" id="Pengampu2" name="pengampu2">
                      <option value="">Pilih Pengampu</option>
                      @foreach($dosen as $d)
                          <option value="{{ $d->id }}">{{ $d->nama }}</option>
                      @endforeach
                  </select>
                </div>

                <!-- Dropdown for Pengajar 3 -->
                <div class="form-group">
                  <label for="pengajar_3">Pengampu 3</label>
                  <select class="custom-select form-control-border" id="Pengampu3" name="pengampu3">
                      <option value="">Pilih Pengampu</option>
                      @foreach($dosen as $d)
                          <option value="{{ $d->id }}">{{ $d->nama }}</option>
                      @endforeach
                  </select>
                </div>
              <div class="form-group">
                  <label for="program_studi_kode_prodi">Kode Program Studi</label>
                  <input type="text" class="form-control form-control-border" id="program_studi_kode_prodi" name="program_studi_kode_prodi" required>
              </div>
              <div class="form-group">
                  <label for="fakultas_kode_fakultas">Kode Fakultas</label>
                  <input type="text" class="form-control form-control-border" id="fakultas_kode_fakultas" name="fakultas_kode_fakultas" required>
              </div>
          </div>
          <div class="card-footer">
              <button type="submit" class="btn btn-primary">Tambah Mata Kuliah</button>
          </div>
      </form>
  </div>
  <!-- /.card -->

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
                          <td colspan="8" class="text-center">Tidak ada data mata kuliah.</td>
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
@include('AkademikKAPRODI.scriptdb')
</body>
</html>
