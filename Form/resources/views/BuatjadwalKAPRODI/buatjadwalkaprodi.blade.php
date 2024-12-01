
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Dashboard</title>
  @include('BuatjadwalKAPRODI.header')
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
@include('DashBMHS.navbar')
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Buat Jadwal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('mhsdb') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Daftar Jadwal Kuliah</h3>
            <div class="card-tools">
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addScheduleModal">
                    <i class="fas fa-plus"></i> Tambah Jadwal
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped table-bordered">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th>No</th>
                        <th>Ruang Kuliah</th>
                        <th>Mata Kuliah</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwal_kuliah as $key => $jadwal)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $jadwal->ruang_kuliah_kode_ruang }}</td>
                        <td>{{ $jadwal->mata_kuliah_kode_mk }}</td>
                        <td>{{ ucfirst($jadwal->hari) }}</td>
                        <td>{{ $jadwal->jam_mulai }}</td>
                        <td>{{ $jadwal->jam_selesai }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editSchedule({{ $jadwal->id }})">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form method="POST" action="{{ route('jadwal_kuliah.destroy', $jadwal->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus jadwal ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Modal Tambah Jadwal -->
    <div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addScheduleModalLabel">Tambah Jadwal Kuliah</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('jadwal_kuliah.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="ruang_kuliah_kode_ruang">Ruang Kuliah</label>
                            <input type="text" class="form-control" id="ruang_kuliah_kode_ruang" name="ruang_kuliah_kode_ruang" required>
                        </div>
                        <div class="form-group">
                            <label for="mata_kuliah_kode_mk">Mata Kuliah</label>
                            <input type="text" class="form-control" id="mata_kuliah_kode_mk" name="mata_kuliah_kode_mk" required>
                        </div>
                        <div class="form-group">
                            <label for="hari">Hari</label>
                            <select class="form-control" id="hari" name="hari" required>
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jumat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jam_mulai">Jam Mulai</label>
                            <select class="form-control" id="jam_mulai" name="jam_mulai" required>
                                <option value="07:00">07:00</option>
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jam_selesai">Jam Selesai</label>
                            <select class="form-control" id="jam_selesai" name="jam_selesai" required>
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @section('css')
    <style>
        .card-title {
            font-weight: bold;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .modal-header {
            border-bottom: 2px solid #007bff;
        }
    </style>
    @endsection
    
    @section('js')
    <script>
        function editSchedule(id) {
            alert('Fitur edit jadwal belum diimplementasikan!');
        }
        </script>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('BuatJadwalKAPRODI.scriptdb')
</body>
</html>
