
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Dashboard</title>
  @include('AkademikMHS.header')
  <meta name="csrf-token" content="{{ csrf_token() }}">

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
  
        
          <!-- Tab Buat IRS -->
           <!-- Menyertakan file JavaScript -->
           
          <div class="tab-content">
        <div class="tab-pane fade show active" id="buat-irs" role="tabpanel">
    <div id="data-container" data-irs="{{ json_encode($irs) }}"></div>
    <div class="bg-purpleepanel p-4">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            <h5><i class="fas fa-plus-circle"></i> Tambahkan Mata Kuliah</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="select-matkul">Pilih Mata Kuliah</label>
                                <select id="select-matkul" class="form-control">
                                    @if ($jadwal_kuliah->isNotEmpty())
                                        @foreach ($jadwal_kuliah as $item)
                                            <option value="{{ $item->mata_kuliah_kode_mk }}" data-sks="{{ $item->sks }}">
                                                {{ $item->nama_mk }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option>-</option>
                                    @endif
                                </select>
                            </div>
                            <button class="btn btn-primary btn-block mt-3">Tambahkan</button>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header bg-info text-white">
                            <h5>Informasi Mahasiswa</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-1"><strong>Nama : {{ $mahasiswa->nama }}</strong></p>
                            <p class="mb-1">NIM : {{ $mahasiswa->nim }}</p>
                            <p class="text-muted">Email : {{ $mahasiswa->email }}</p>
                            <p class="mb-1">Tahun Masuk : {{ $mahasiswa->tahun_masuk }}</p>
                            <p class="mb-1"> Semester :{{ $mahasiswa->semester }}</p>

                            <div class="card mt-3">
                                <div class="card-header bg-primary text-white">
                                    <h5><i class="fas fa-user"></i> Mata Kuliah yang Dipilih</h5>
                                </div>
                                <div class="card-body">
                                    <h6><strong>Mata Kuliah yang Dipilih</strong></h6>
                                    <hr>
                                    <div id="selected-courses">
                                        @foreach ($irs as $course)
                                            <div class="course-item" data-sks="{{ $course->mataKuliah->sks }}">
                                                {{ $course->mataKuliah->nama_mk }} ({{ $course->mataKuliah->sks }} SKS) {{ $course->mataKuliah->kode_ruang }}
                                                <button class="btn btn-danger btn-sm remove-course" data-kode="{{ $course->mataKuliah->mata_kuliah_kode_mk }}">Hapus</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <button class="btn btn-success btn-sm" id="save-btn">Simpan</button>
                                        <button class="btn btn-warning btn-sm" id="edit-btn" style="display:none;">Edit</button>
                                        <strong>Total SKS: <span id="total-sks">{{ $totalSKS }}</span></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                                        $jadwal_hari = $jadwal_kuliah->filter(function ($item) use ($h, $jam) {
                                                            return $item->hari === $h && $item->jam_mulai === $jam;
                                                        });
                                                    @endphp
                                                    <td>
                                                        @if ($jadwal_hari->isNotEmpty())
                                                            @foreach ($jadwal_hari as $jadwal)
                                                                <a href="javascript:void(0)" class="card mb-2 p-2 add-course"
                                                                   data-id="{{ $jadwal->mata_kuliah_kode_mk }}"
                                                                   data-name="{{ $jadwal->nama_mk }}"
                                                                   data-sks="{{ $jadwal->sks }}">
                                                                    <strong>{{ $jadwal->nama_mk }}</strong><br>
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

<script>
// Ambil data IRS dari HTML
let irs = JSON.parse(document.getElementById('data-container').getAttribute('data-irs') || '[]');

// Ambil CSRF token dari meta tag
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Fungsi untuk memperbarui total SKS
function updateTotalSKS() {
    const totalSKS = irs.reduce((total, course) => total + course.total_sks, 0);
    document.getElementById('total-sks').textContent = totalSKS;
}

// Fungsi untuk menghapus mata kuliah dari IRS
function removeCourse(courseKodeMK) {
    irs = irs.filter(course => course.mata_kuliah_kode_mk !== courseKodeMK);
    renderSelectedCourses(); // Render ulang daftar mata kuliah
    updateTotalSKS();        // Update total SKS
}

// Fungsi untuk menambahkan mata kuliah ke IRS
function addCourse(courseKodeMK, courseName, courseSKS) {
    if (!irs.some(course => course.mata_kuliah_kode_mk === courseKodeMK)) {
        irs.push({
            mata_kuliah_kode_mk: courseKodeMK,
            name: courseName,
            total_sks: parseInt(courseSKS)
        });
        renderSelectedCourses(); // Render ulang daftar mata kuliah
        updateTotalSKS();        // Update total SKS
    } else {
        alert('Mata kuliah ini sudah ditambahkan.');
    }
}

// Render daftar mata kuliah yang dipilih
function renderSelectedCourses() {
    const selectedCoursesContainer = document.getElementById('selected-courses');
    selectedCoursesContainer.innerHTML = ''; // Kosongkan daftar lama

    const fragment = document.createDocumentFragment();

    irs.forEach(course => {
        const courseDiv = document.createElement('div');
        courseDiv.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'mb-2');
        courseDiv.setAttribute('data-id', course.mata_kuliah_kode_mk); // Tambahkan data ID untuk penghapusan

        const courseName = document.createElement('span');
        courseName.textContent = `${course.name} (${course.total_sks} SKS)`;

        const removeButton = document.createElement('button');
        removeButton.classList.add('btn', 'btn-danger', 'btn-sm');
        removeButton.textContent = 'Hapus';
        removeButton.addEventListener('click', () => removeCourse(course.mata_kuliah_kode_mk));

        courseDiv.appendChild(courseName);
        courseDiv.appendChild(removeButton);

        fragment.appendChild(courseDiv);
    });

    selectedCoursesContainer.appendChild(fragment);
}

// Menangani klik tombol "Simpan"
document.getElementById('save-btn')?.addEventListener('click', () => {
    const formData = {
        irs: irs
    };

    // Simpan IRS ke server
    console.log(formData);
    fetch('/simpanirs', {
        method: 'POST', // Pastikan metode yang digunakan adalah POST
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken // Tambahkan CSRF token ke header
        },
        body: JSON.stringify(formData) // Mengirim data dalam format JSON
    })
    // .then(response => {
    // if (!response.ok) {
    //     throw new Error('HTTP error ' + response.status);
    // }
    // return response.json();
    // })
    .then(response => {
    console.log('Response status:', response.status);
    return response.json();
    })

    .then(data => {
        console.log('Simpan IRS berhasil:', data);
        document.getElementById('edit-btn').style.display = 'inline-block'; // Menampilkan tombol Edit
        document.getElementById('save-btn').style.display = 'none'; // Menyembunyikan tombol Simpan
    })
    .catch(error => {
    console.error('Error:', error);
    alert('Gagal menyimpan IRS. Periksa kembali data atau coba lagi.');
    });

});

// Menangani klik pada jadwal kuliah untuk menambahkannya
document.querySelectorAll('.add-course').forEach(button => {
    button.addEventListener('click', () => {
        const courseKodeMK = button.getAttribute('data-id');
        const courseName = button.getAttribute('data-name');
        const courseSKS = button.getAttribute('data-sks');
        addCourse(courseKodeMK, courseName, courseSKS);
    });
});



</script>









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
                <h4>Transkrip Akademik (Terbaik)</h4>
                <p>Nama: Tito Dean</p>
                <p>Program Studi: Informatika</p>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Mata Kuliah</th>
                      <th>SKS</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Isi data transkrip akademik sesuai kebutuhan -->
                  </tbody>
                </table>
                <button class="button-print">PRINT</button>
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
