
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | LOGIN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{ asset("AdminLTE/plugins/fontawesome-free/css/all.min.css") }}>
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href={{ asset("AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{ asset("AdminLTE/dist/css/adminlte.min.css") }}>
  <link rel="stylesheet" href="{{ asset('cssP/login.css') }}">
  


</head>
<div class="background"></div>
<body class="hold-transition login-page">
<div class="login-box">
  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>  
        @endforeach
      </ul>
    </div>
  @endif
  <div class="log nih">
  <img 
    src="{{ asset('imgP/logo.png') }}" 
    alt="Logo SAKURA" 
    style="display: block; margin: 0 auto; max-width: 145px; margin-bottom: 1px;"
  >
  </div>
  <!-- <div class="login-logo">
    <a><b><strong>SAKURA IRS</strong></b></a>
  </div> -->
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><strong>Silahkan Login</strong></p>

      <form action="{{ route('postlogin') }}" method="post">
        {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="{{ route('forgotpw') }}">I forgot my password</a>
      </p>
      <!-- <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
@include('Template.script')
</body>
</html>
