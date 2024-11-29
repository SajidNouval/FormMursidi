
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
                          <!-- Bagian Kiri -->
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
                                              <option>Dasar Pemrograman</option>
                                              <option>Matematika I</option>
                                              <option>Struktur Data</option>
                                              <option>Algoritma</option>
                                          </select>
                                      </div>
                                      <button class="btn btn-primary btn-block mt-3">Tambahkan</button>
                                  </div>
                              </div>
                              <!-- Informasi Mahasiswa -->
                              <div class="card">
                                  <div class="card-header bg-info text-white">
                                      <h5>Matakuliah Ditampilkan</h5>
                                  </div>
                                  <div class="card-body">
                                      <p class="mb-1"><strong>Nama: </strong>{{ $mahasiswa->nama }}</p>
                                      <p class="mb-1"><strong>NIM: </strong>{{ $mahasiswa->nim }}</p>
                                      <p><strong>Th. Ajaran:</strong> 2019/2020</p>
                                      <p><strong>Semester:</strong> Ganjil</p>
                                      <div class="d-flex justify-content-between align-items-center mb-2">
                                          <span>Dasar Pemrograman (3 SKS)</span>
                                          <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                      </div>
                                      <hr>
                                      <div class="d-flex justify-content-between align-items-center">
                                          <span>Matematika I (2 SKS)</span>
                                          <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                      </div>
                                  </div>
                                  <div class="card-footer text-right">
                                      <strong>Total SKS: 5</strong>
                                  </div>
                              </div>
                          </div>
                          <!-- Bagian Kanan -->
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
                                                      <th>Waktu</th>
                                                      <th>Senin</th>
                                                      <th>Selasa</th>
                                                      <th>Rabu</th>
                                                      <th>Kamis</th>
                                                      <th>Jumat</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <tr>
                                                      <td>07:00</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>08:00</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>09:00</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>10:00</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>11:00</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>12:00</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>13:00</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>14:00</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>15:00</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>16:00</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>17:00</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                  <tr>
                                                      <td>18:00</td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
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
</body>
</html>
