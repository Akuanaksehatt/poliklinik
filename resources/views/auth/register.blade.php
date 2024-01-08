<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content=""><title>Register</title>
  {{-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">
</head>
<body class="bg">
  <div class="container" >
    <div class="card o-hidden border-0 shadow-lg" style="margin-top: 70px" >
      <div class="card-body p-0" style="height: 500px">
        <div class="row" >
            <div class="col-lg-6" >
              <div class="p-5">
                <div class="text-center"><br></br>
                  <h1 class="h4 text-gray-900 mb-3 font-weight-bold" style="margin-top: -10%;">Pendaftaran Akun</h1>
                </div>
                <form action="{{ route('register') }}" method="POST" class="user" enctype="multipart/form-data">
                  @csrf
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" 
                    id="exampleFirstName" placeholder="Nama" name="name" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              <div class="form-group">
                <input type="email" class="form-control form-control-user @error('email') is-invalid 
                @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group">
                <input type="text" min="0" class="form-control form-control-user @error('no_hp') is-invalid 
                @enderror" name="no_hp" id="no_hp" placeholder="No. Handphone">
                  @error('no_hp')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0 form-password">
                  <input type="password" class="form-control input-pass form-control-user @error('password') 
                  is-invalid @enderror" id="exampleInputPassword" name="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  {{-- <input type="password" class="form-control form-control-user input-pass" name="password" id="password" placeholder="Password"> --}}
                </div>
                <div class="col-sm-6 form-password">
                  <input type="password" class="form-control input-pass form-control-user" 
                  id="exampleRepeatPassword" name="password_confirmation" placeholder="Konfirmasi Password">
                  {{-- <input type="password" class="form-control form-control-user input-pass" 
                    name="repeat_pass" id="repeat_pass"> --}}
                </div>
              </div>
              <button type="submit" class="btn-submit btn-user btn-block">Daftar</button>
            </form>
            <hr>
            {{-- <div class="text-center">
              <a class="small" href="">Forgot Password?</a>
            </div> --}}
            <div class="text-center">
              <span class="small">Sudah Memiliki Akun? <a href="{{ route('login') }}">Masuk</a>
              </span>
            </div>
          </div>
        </div>
        <div class="col-lg-6 d-lg-block">
          <img src="img/clinic_main.png" width="100%" height="100%">
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>