
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{ asset("AdminLTE/plugins/fontawesome-free/css/all.min.css") }}>
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href={{ asset("AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{ asset("AdminLTE/dist/css/adminlte.min.css") }}>
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="{{ url('/') }}"><b>SAKURA</b>IRS</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register Account</p>

        <form action="{{ route('simpanregister') }}" method="post">
          {{ csrf_field() }}
          <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Full name" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="phone" class="form-control" placeholder="Phone number" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Pemilihan Role</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="roles[]" value="admin" id="role_admin">
              <label class="form-check-label" for="role_admin">Admin</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="roles[]" value="mahasiswa" id="role_mahasiswa">
              <label class="form-check-label" for="role_mahasiswa">Mahasiswa</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="roles[]" value="bakademik" id="role_bakademik">
              <label class="form-check-label" for="role_bakademik">Biro Akademik</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="roles[]" value="kaprodi" id="role_kaprodi">
              <label class="form-check-label" for="role_kaprodi">Kaprodi</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="roles[]" value="dekan" id="role_dekan">
              <label class="form-check-label" for="role_dekan">Dekan</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="roles[]" value="pakademik" id="role_pakademik">
              <label class="form-check-label" for="role_pakademik">Pimpinan Akademik</label>
            </div>
          </div>
          
          
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
          </div>
        </form>

        <a href="{{ route('login') }}" class="text-center">Sudah Memiliki Akun</a>
      </div>
    </div>
  </div>

<!-- /.register-box -->

<!-- jQuery -->
@include('Template.script')
</body>
</html>
