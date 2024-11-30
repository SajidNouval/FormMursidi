
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Dashboard</title>
  @include('AkademikMHS.header')
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
            <h1 class="m-0">Akademik</h1>
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
    <section class="content">
        <div class="container-fluid">
          <div class="tab-custom">
            <ul class="nav nav-tabs" id="custom-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="tab-buat-irs" data-toggle="pill" href="#buat-irs" role="tab">Buat IRS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab-irs" data-toggle="pill" href="#irs" role="tab">IRS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab-khs" data-toggle="pill" href="#khs" role="tab">KHS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab-transkrip" data-toggle="pill" href="#transkrip" role="tab">Transkrip</a>
              </li>
            </ul>
          </div>
  
          <div class="tab-content">

       <!-- Tab Buat IRS -->
<div class="tab-pane fade show active" id="buat-irs" role="tabpanel">
    <!-- Container dengan latar belakang ungu -->
    <div class="bg-purpleepanel p-4">
        <div class="container-fluid py-4">
            <div class="row">
                <!-- Bagian Kiri (Informasi Mahasiswa dan Tambah Mata Kuliah) -->
                <div class="col-md-4">
                    <!-- Tambahkan Mata Kuliah -->
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            <h5><i class="fas fa-plus-circle"></i> Tambahkan Mata Kuliah Lain</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="select-matkul">Pilih Mata Kuliah</label>
                                <select id="select-matkul" class="form-control">
                                    @if ($jadwal_kuliah->isNotEmpty())
                                        @foreach ($jadwal_kuliah as $item)
                                            <option>{{ $item->nama_mk }}</option>
                                        @endforeach
                                    @else
                                        <option>-</option>
                                    @endif
                                </select>
                            </div>
                            <button class="btn btn-primary btn-block mt-3">Tambahkan</button>
                        </div>
                    </div>

                    <!-- Informasi Mahasiswa -->
                    <div class="card mb-3">
                        <div class="card-header bg-info text-white">
                            <h5>Informasi Mahasiswa</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-1"><strong>{{ $mahasiswa->nama }}</strong></p>
                            <p class="mb-1">{{ $mahasiswa->nim }}</p>
                            <p class="text-muted">{{ $mahasiswa->email }}</p>
                            <p class="mb-1">{{ $mahasiswa->tahun_masuk }}</p>
                            <p class="mb-1">{{ $mahasiswa->semester }}</p>

                            <!-- Mata Kuliah yang Dipilih -->
                            <div class="card mt-3">
                                <div class="card-header bg-primary text-white">
                                    <h5><i class="fas fa-user"></i> Mata Kuliah yang Dipilih</h5>
                                </div>
                                <div class="card-body">
                                    <h6><strong>Mata Kuliah yang Dipilih</strong></h6>
                                    <hr>
                                    @foreach ($irs as $item)
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>{{ $item->nama_mk }} ({{ $item->sks }} SKS)</span>
                                            <form action="{{ route('hapusMatakuliah', $item->id) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <hr>
                                    @endforeach
                                    <div class="card-footer text-right">
                                        <strong>Total SKS: {{ $totalSKS }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian Kanan (Jadwal Kuliah) -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5><i class="fas fa-calendar"></i> Jadwal Kuliah</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Jam</th>
                                            <th>Senin</th>
                                            <th>Selasa</th>
                                            <th>Rabu</th>
                                            <th>Kamis</th>
                                            <th>Jumat</th>
                                            <th>Sabtu</th>
                                            <th>Minggu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                            $jamMulai = [
                                                '07:00', '08:00', '09:00', '10:00', '11:00',
                                                '12:00', '13:00', '14:00', '15:00', '16:00',
                                                '17:00', '18:00', '19:00', '20:00', '21:00'
                                            ];
                                        @endphp

                                        @foreach ($jamMulai as $jam)
                                            <tr>
                                                <td>{{ $jam }}</td>
                                                @foreach ($hari as $h)
                                                    @php
                                                        // Filter jadwal berdasarkan hari dan jam mulai
                                                        $jadwal_hari = $jadwal_kuliah->filter(function ($item) use ($h, $jam) {
                                                            return $item->hari === $h && $item->jam_mulai === $jam;
                                                        });
                                                    @endphp
                                                    <td>
                                                        @if ($jadwal_hari->isNotEmpty())
                                                            @foreach ($jadwal_hari as $jadwal)
                                                                <a href="#" class="card mb-2 p-2">
                                                                    <strong>{{ $jadwal->mata_kuliah_kode_mk }} - {{ $jadwal->nama_mk }}</strong><br>
                                                                    Ruang: {{ $jadwal->kode_ruang }}<br>
                                                                    Jam: {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                                                                </a>
                                                            @endforeach
                                                        @else
                                                            <span>-</span>
                                                        @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



          <!-- TAB LIAT MATKUL DIAMBIL -->
           

  
          <!-- Tab IRS -->
          <div class="tab-pane fade" id="irs" role="tabpanel">
            <div class="panel">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Rencana Studi (IRS)</h3>

                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-body">
                    <!-- Semester Tabs -->
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <a class="nav-link active" id="semester1-tab" data-toggle="pill" href="#semester1">Semester 1</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="semester2-tab" data-toggle="pill" href="#semester2">Semester 2</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="semester3-tab" data-toggle="pill" href="#semester3">Semester 3</a>
                      </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content mt-3">
                      <div class="tab-pane fade show active" id="semester1">
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>NO</th>
                                <th>KODE</th>
                                <th>MATA KULIAH</th>
                                <th>KELAS</th>
                                <th>SKS</th>
                                <th>RUANG</th>
                                <th>STATUS</th>
                                <th>NAMA DOSEN</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>UUW00003</td>
                                <td>Pancasila dan Kewarganegaraan</td>
                                <td>C</td>
                                <td>3</td>
                                <td>A303</td>
                                <td>BARU</td>
                                <td>Dr. Drs. Slamet Subekti, M.Hum.</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>UUW00005</td>
                                <td>Olahraga</td>
                                <td>A</td>
                                <td>1</td>
                                <td>Lapangan Stadion UNDIP Tembalang</td>
                                <td>BARU</td>
                                <td>Dr. Endang Kumaidah, M.Kes.</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <!-- Semester 2 -->
                      <div class="tab-pane fade" id="semester2">
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>NO</th>
                                <th>KODE</th>
                                <th>MATA KULIAH</th>
                                <th>KELAS</th>
                                <th>SKS</th>
                                <th>RUANG</th>
                                <th>STATUS</th>
                                <th>NAMA DOSEN</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>UUW00008</td>
                                <td>Matematika Dasar</td>
                                <td>B</td>
                                <td>3</td>
                                <td>Ruang 202</td>
                                <td>BARU</td>
                                <td>Prof. Budi Santoso, Ph.D.</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>UUW00010</td>
                                <td>Pengantar Ilmu Komputer</td>
                                <td>A</td>
                                <td>3</td>
                                <td>Lab 1</td>
                                <td>BARU</td>
                                <td>Dr. Siti Hajar, M.T.</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <!-- Semester 3 -->
                      <div class="tab-pane fade" id="semester3">
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>NO</th>
                                <th>KODE</th>
                                <th>MATA KULIAH</th>
                                <th>KELAS</th>
                                <th>SKS</th>
                                <th>RUANG</th>
                                <th>STATUS</th>
                                <th>NAMA DOSEN</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>UUW00015</td>
                                <td>Struktur Data</td>
                                <td>C</td>
                                <td>4</td>
                                <td>Lab 2</td>
                                <td>BARU</td>
                                <td>Dr. Ahmad Zainal, M.Kom.</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>UUW00017</td>
                                <td>Aljabar Linier</td>
                                <td>A</td>
                                <td>3</td>
                                <td>Ruang 101</td>
                                <td>BARU</td>
                                <td>Prof. Agung Prabowo, S.T., M.T.</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Tab IRS -->

            <!-- Tab KHS -->
            <div class="tab-pane fade" id="khs" role="tabpanel">
              <div class="bg-purpleepanel p-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">KHS</h3>
      
                      <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
      
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="max-height: 400px; overflow-y: auto;">
                      <table class="table table-hover text-nowrap sticky-header">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Reason</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>183</td>
                            <td>John Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-success">Approved</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr>
                            <td>219</td>
                            <td>Alexander Pierce</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-warning">Pending</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr>
                            <td>657</td>
                            <td>Bob Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-primary">Approved</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr>
                            <td>175</td>
                            <td>Mike Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-danger">Denied</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr>
                            <td>175</td>
                            <td>Mike Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-danger">Denied</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr>
                            <td>175</td>
                            <td>Mike Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-danger">Denied</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr>
                            <td>175</td>
                            <td>Mike Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-danger">Denied</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr>
                            <td>175</td>
                            <td>Mike Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-danger">Denied</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr>
                            <td>175</td>
                            <td>Mike Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-danger">Denied</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr>
                            <td>175</td>
                            <td>Mike Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-danger">Denied</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr>
                            <td>175</td>
                            <td>Mike Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-danger">Denied</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
  
            <!-- Tab Transkrip -->
          <div class="tab-pane fade" id="transkrip" role="tabpanel">
            <div class="panel">
              <!-- Tombol untuk memilih konten -->
              <div class="btn-group">
                <button type="button" class="btn btn-default" id="btnLengkap">Lengkap</button>
                <button type="button" class="btn btn-default" id="btnTerbaik">Terbaik</button>
                <button type="button" class="btn btn-default" id="btnInggris">Inggris</button>
              </div>

              <!-- Konten Tab Transkrip -->
              <div id="transkripContent" class="tab-content mt-3">
                <!-- Konten Lengkap -->
                <div id="contentLengkap" class="tab-pane fade show active">
                  <h5>Data Lengkap Transkrip</h5>
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Reason</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-success">Approved</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      </tr>
                      <!-- Data lainnya di sini -->
                    </tbody>
                  </table>
                </div>

                <!-- Konten Terbaik -->
                <div id="contentTerbaik" class="tab-pane fade">
                  <h5>Data Terbaik Transkrip</h5>
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Reason</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>657</td>
                        <td>Bob Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-primary">Approved</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      </tr>
                      <!-- Data lainnya di sini -->
                    </tbody>
                  </table>
                </div>

                <!-- Konten Inggris -->
                <div id="contentInggris" class="tab-pane fade">
                  <h5>Data dalam Bahasa Inggris</h5>
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Reason</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>175</td>
                        <td>Mike Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-danger">Denied</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      </tr>
                      <!-- Data lainnya di sini -->
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @include('AkademikMHS.controllersidebar')
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
@include('AkademikMHS.scriptdb')


<!-- JavaScript untuk menangani penghapusan dan penambahan mata kuliah -->
<script>
    let irs = @json($irs); // IRS yang berisi mata kuliah yang dipilih mahasiswa

    function updateTotalSKS() {
        const totalSKS = irs.reduce((total, course) => total + course.sks, 0);
        document.getElementById('total-sks').textContent = totalSKS;
    }

    function removeCourse(courseId) {
        // Hapus course berdasarkan ID
        irs = irs.filter(course => course.id !== courseId);
        // Update the selected courses list
        renderSelectedCourses();
        updateTotalSKS();
    }

    function addCourse(courseId, courseName, courseSKS) {
        // Tambahkan course ke dalam daftar yang dipilih, jika belum ada
        if (!irs.some(course => course.id === courseId)) {
            irs.push({ id: courseId, name: courseName, sks: courseSKS });
            // Update the selected courses list
            renderSelectedCourses();
            updateTotalSKS();
        }
    }

    function renderSelectedCourses() {
        const selectedCoursesContainer = document.getElementById('selected-courses');
        selectedCoursesContainer.innerHTML = ''; // Clear current list
        irs.forEach(course => {
            const courseHTML = `
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span>${course.name} (${course.sks} SKS)</span>
                    <button class="btn btn-danger btn-sm" onclick="removeCourse('${course.id}')"><i class="fas fa-trash"></i></button>
                </div>
                <hr>
            `;
            selectedCoursesContainer.innerHTML += courseHTML;
        });
    }

    // Initial render
    renderSelectedCourses();
    updateTotalSKS();
</script>
</body>
</html>
