
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Dashboard</title>
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
            <h1 class="m-0">Akademik</h1>
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
  <h2>Manajemen Jadwal</h2>

  <!-- Form untuk Membuat Jadwal -->
  <h4 class="mt-5">Buat Jadwal</h4>
  <form method="POST" action="{{ route('jadwal.store') }}">
      @csrf
      <div class="mb-3">
          <label for="mata_kuliah" class="form-label">Pilih Mata Kuliah</label>
          <select class="form-select" id="mata_kuliah" name="mata_kuliah" required>
              @foreach ($mataKuliah as $mk)
                  <option value="{{ $mk->kode_mk }}">{{ $mk->nama_mk }}</option>
              @endforeach
          </select>
      </div>
      <div class="mb-3">
          <label for="kelas" class="form-label">Kelas</label>
          <select class="form-select" id="kelas" name="kelas" required>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
          </select>
      </div>
      <div class="mb-3">
        <label for="ruang" class="form-label">Ruang</label>
        <select class="form-select" id="ruang" name="ruang_kuliah_kode_ruang" required>
            <option value="" disabled selected>Pilih Ruang</option>
            @foreach ($ruangKuliah as $ruang)
                <option value="{{ $ruang->kode_ruang }}">{{ $ruang->kode_ruang }}</option>
            @endforeach
        </select>
      </div>
      <div class="mb-3">
          <label for="hari" class="form-label">Hari</label>
          <select class="form-select" id="hari" name="hari" required>
              <option value="Senin">Senin</option>
              <option value="Selasa">Selasa</option>
              <option value="Rabu">Rabu</option>
              <option value="Kamis">Kamis</option>
              <option value="Jumat">Jumat</option>
          </select>
      </div>
      <div class="mb-3">
          <label for="jam_mulai" class="form-label">Jam Mulai</label>
          <select class="form-select" id="jam_mulai" name="jam_mulai" required>
              <option value="07:00">07:00</option>
              <option value="08:00">08:00</option>
              <option value="09:00">09:00</option>
              <option value="10:00">10:00</option>
              <option value="11:00">11:00</option>
              <option value="12:00">12:00</option>
              <option value="13:00">13:00</option>
              <option value="14:00">14:00</option>
              <option value="15:00">15:00</option>
              <option value="16:00">16:00</option>
              <option value="17:00">17:00</option>
              <option value="18:00">18:00</option>
          </select>
      </div>
      <div class="mb-3">
          <label for="jam_selesai" class="form-label">Jam Selesai</label>
          <select class="form-select" id="jam_selesai" name="jam_selesai" required>
              <option value="08:00">08:00</option>
              <option value="09:00">09:00</option>
              <option value="10:00">10:00</option>
              <option value="11:00">11:00</option>
              <option value="12:00">12:00</option>
              <option value="13:00">13:00</option>
              <option value="14:00">14:00</option>
              <option value="15:00">15:00</option>
              <option value="16:00">16:00</option>
              <option value="17:00">17:00</option>
              <option value="18:00">18:00</option>
              <option value="19:00">19:00</option>
              <option value="20:00">20:00</option>
          </select>
      </div>
      <button type="submit" class="btn btn-primary">Buat Jadwal</button>
  </form>

  <!-- Daftar Jadwal -->
  <h4 class="mt-5">Daftar Jadwal</h4>
  <table class="table table-bordered">
      <thead>
          <tr>
              <th>Mata Kuliah</th>
              <th>Kelas</th>
              <th>Hari</th>
              <th>Ruang</th> <!-- New column for Ruang -->
              <th>Jam</th>
              <th>Status</th>
              <th>Aksi </th>
          </tr>
      </thead>
      <tbody>
          @forelse ($jadwal as $j)
              <tr>
                <td>{{ $j->mataKuliah ? $j->mataKuliah->nama_mk : 'N/A' }}</td>
                  <td>{{ $j->kelas }}</td>
                  <td>{{ $j->hari }}</td>
                  <td>{{ $j->ruang_kuliah_kode_ruang }}</td> <!-- Displaying the Ruang code -->
                  <td>{{ $j->jam_mulai }} - {{ $j->jam_selesai }}</td>
                  <td>{{ $j->status }}</td>
                  <td>
                      <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                      </form>
                  </td>
              </tr>
          @empty
              <tr>
                  <td colspan="6" class="text-center">Tidak ada jadwal yang dibuat.</td>
              </tr>
          @endforelse
      </tbody>
  </table>
</div>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
