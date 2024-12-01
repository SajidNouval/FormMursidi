
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Dashboard</title>
  @include('HerRegMHS.header')
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
            <h1 class="m-0">Profil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('AdminLTE/dist/img/pp.jpg') }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $mahasiswa->nama }}</h3>
                <p class="text-muted text-center">{{ $mahasiswa->nim }}</p>
                <h3 class="profile-username text-center">{{ $mahasiswa->email }}</h3>

                <ul class="list-group list-group-unbordered mb-3">

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  SMA Negeri Ngawi 1
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted"> {{ $mahasiswa->alamat }}</p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>

                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <!-- Activity tab (dikosongkan) -->
                      <div class="active tab-pane" id="activity">
                        <ul class="list-group">
                          <li class="list-group-item"><strong>Nama:</strong> Mursid</li>
                          <li class="list-group-item"><strong>NIM:</strong> 2406012213110</li>
                          <li class="list-group-item"><strong>Email:</strong> mhs@gmail.com</li>
                          <li class="list-group-item"><strong>Alamat:</strong> Jl. Mawah Sejati</li>
                          <li class="list-group-item"><strong>Pendidikan:</strong> SMA Negeri Ngawi 1</li>
                        </ul>
                        <!-- Kosong -->
                      </div>
                      <!-- /.tab-pane -->
              
                      <!-- Settings tab -->
                      <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                          <!-- Username -->
                          <div class="form-group row">
                            <label for="inputUsername" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputUsername" placeholder="Enter new username">
                            </div>
                          </div>
              
                          <!-- Email -->
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" id="inputEmail" placeholder="Enter your email">
                            </div>
                          </div>
              
                          <!-- Password -->
                          <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" id="inputPassword" placeholder="Enter new password">
                            </div>
                          </div>
              
                          <!-- Confirm Password -->
                          <div class="form-group row">
                            <label for="inputPasswordConfirm" class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" id="inputPasswordConfirm" placeholder="Confirm new password">
                            </div>
                          </div>
              
                          <!-- Save Button -->
                          <div class="form-group row">
                            <div class="col-sm-12 text-right">
                              <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-save"></i> Save Changes
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
              
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @include('HerRegMHS.controllersidebar')
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
@include('HerRegMHS.scriptdb')
</body>
</html>
