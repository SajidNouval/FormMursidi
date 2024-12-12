<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Penjadwalan</title>
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

      <!-- Form untuk Membuat Jadwal -->
      <div class="card mt-4">
        <div class="card-header">
          <h3 class="card-title">Buat Jadwal</h3>
        </div>
        <form method="POST" action="{{ route('jadwal.store') }}">
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
              <label for="mata_kuliah">Mata Kuliah</label>
              <select class="custom-select form-control-border border-width-2" id="mata_kuliah" name="mata_kuliah" required>
                  <option value="" disabled selected>Pilih Mata Kuliah</option>
                  @foreach ($mataKuliah as $mk)
                  <option value="{{ $mk->kode_mk }}" data-sks="{{ $mk->sks }}" {{ old('mata_kuliah') == $mk->kode_mk ? 'selected' : '' }}>{{ $mk->nama_mk }} ({{ $mk->sks }} SKS)</option>
                  @endforeach
                  @error('mata_kuliah')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </select>
            </div>

            <div class="form-group">
              <label for="kelas">Kelas</label>
              <select class="custom-select rounded-0" id="kelas" name="kelas" required>
                <option value="A" {{ old('kelas') == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ old('kelas') == 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ old('kelas') == 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ old('kelas') == 'D' ? 'selected' : '' }}>D</option>
              </select>
              @error('kelas')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="tahun_akademik">Tahun Akademik</label>
              <select class="custom-select rounded-0" id="tahun_akademik" name="tahun_akademik" required>
                  <option value="">Pilih Tahun Akademik</option>
                  <option value="2023/2024" {{ old('tahun_akademik') == '2023/2024' ? 'selected' : '' }}>2023/2024</option>
                  <option value="2024/2025" {{ old('tahun_akademik') == '2024/2025' ? 'selected' : '' }}>2024/2025</option>
                  <option value="2025/2026" {{ old('tahun_akademik') == '2025/2026' ? 'selected' : '' }}>2025/2026</option>
                  <option value="2026/2027" {{ old('tahun_akademik') == '2026/2027' ? 'selected' : '' }}>2026/2027</option>
                  <option value="2027/2028" {{ old('tahun_akademik') == '2027/2028' ? 'selected' : '' }}>2027/2028</option>
              </select>
              @error('tahun_akademik')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="ruang">Ruang</label>
              <select class="custom-select form-control-border border-width-2" id="ruang" name="ruang_kuliah_kode_ruang" required>
                  <option value="" disabled selected>Pilih Ruang</option>
                  @foreach ($ruangKuliah as $ruang)
                  <option value="{{ $ruang->kode_ruang }}" data-kapasitas="{{ $ruang->kapasitas }}" {{ old('ruang_kuliah_kode_ruang') == $ruang->kode_ruang ? 'selected' : '' }}>{{ $ruang->kode_ruang }}</option>
                  @endforeach
              </select>
              @error('ruang_kuliah_kode_ruang')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="kuota">Kuota</label>
              <input type="number" class="form-control form-control-border" id="kuota" name="kuota" value="{{ old('kuota') }}" placeholder="Pilih ruang dulu" required>
              @error('kuota')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="hari">Hari</label>
              <select class="custom-select rounded-0" id="hari" name="hari" required>
                <option value="Senin" {{ old('hari') == 'Senin' ? 'selected' : '' }}>Senin</option>
                <option value="Selasa" {{ old('hari') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                <option value="Rabu" {{ old('hari') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                <option value="Kamis" {{ old('hari') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                <option value="Jumat" {{ old('hari') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
              </select>
              @error('hari')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="jam_mulai">Jam Mulai</label>
              <select class="custom-select form-control-border border-width-2" id="jam_mulai" name="jam_mulai" required>
                  <option value="07:00" {{ old('jam_mulai') == '07:00' ? 'selected' : '' }}>07:00</option>
                  <option value="08:00" {{ old('jam_mulai') == '08:00' ? 'selected' : '' }}>08:00</option>
                  <option value="09:00" {{ old('jam_mulai') == '09:00' ? 'selected' : '' }}>09:00</option>
                  <option value="10:00" {{ old('jam_mulai') == '10:00' ? 'selected' : '' }}>10:00</option>
                  <option value="11:00" {{ old('jam_mulai') == '11:00' ? 'selected' : '' }}>11:00</option>
                  <option value="12:00" {{ old('jam_mulai') == '12:00' ? 'selected' : '' }}>12:00</option>
                  <option value="13:00" {{ old('jam_mulai') == '13:00' ? 'selected' : '' }}>13:00</option>
                  <option value="14:00" {{ old('jam_mulai') == '14:00' ? 'selected' : '' }}>14:00</option>
                  <option value="15:00" {{ old('jam_mulai') == '15:00' ? 'selected' : '' }}>15:00</option>
                  <option value="16:00" {{ old('jam_mulai') == '16:00' ? 'selected' : '' }}>16:00</option>
                  <option value="17:00" {{ old('jam_mulai') == '17:00' ? 'selected' : '' }}>17:00</option>
                  <option value="18:00" {{ old('jam_mulai') == '18:00' ? 'selected' : '' }}>18:00</option>
              </select>
              @error('jam_mulai')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="jam_selesai">Jam Selesai</label>
              <select class="custom-select rounded-0" id="jam_selesai" name="jam_selesai" required disabled>
                  <option value="" disabled selected>Pilih Jam Mulai dan Mata Kuliah</option>
              </select>
              @error('jam_selesai')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Buat Jadwal</button>
          </div>
        </form>
      </div>
      <!-- /.card -->

      <!-- Daftar Jadwal -->
      <div class="card mt-5">
        <div class="card-header">
          <h3 class="card-title">Daftar Jadwal</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Mata Kuliah</th>
                <th>Kelas</th>
                <th>Hari</th>
                <th>Ruang</th>
                <th>Jam</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($jadwal as $j)
              <tr>
                <td>{{ $j->mataKuliah ? $j->mataKuliah->nama_mk : 'N/A' }}</td>
                <td>{{ $j->kelas }}</td>
                <td>{{ $j->hari }}</td>
                <td>{{ $j->ruang_kuliah_kode_ruang }}</td>
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
                <td colspan="7" class="text-center">Tidak ada jadwal yang dibuat.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card -->
    </div>

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