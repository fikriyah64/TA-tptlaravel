<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }} | TPT</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        {{-- <div class="card-header text-center">
            <a href="{{route('login')}}" class="h1"><b>Login</b>Admin</a>
        </div> --}}
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            
            <form action="{{ route('login-proses') }}" method="post">
                @csrf
                <div class="mb-3">
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>    
      {{-- <p class="mb-1">
        <a href="forgot-password.html">Lupa Password</a>
      </p> --}}
      <p class="mb-0">
        <a href="{{route('register')}}" class="text-center">Registrasi</a>
      </p>
    </div>
</div>

<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('lte//plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($message = Session::get('success'))
    <script>
        Swal.fire('{{$message}}');
    </script>
@endif

@if ($message = Session::get('failed'))
    <script>
        Swal.fire('{{$message}}');
    </script>
@endif
</body>
</html>
