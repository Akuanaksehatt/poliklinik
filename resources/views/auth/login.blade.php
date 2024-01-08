<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content=""><title>Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>

<body class="bg-clinic">
  <div class="container" >
    <!-- Outer Row -->
        <div class="row justify-content-center" style="margin-top: 9%;">
          <div class="col-xl-10 col-lg-12 col-md-9 mb-2">
                  <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                      <img src="img/clinic-care-logo.png" alt="" width="100%" height="90%">
                    </div>
                      <div class="col-lg-6">
                        <div class="p-5">
                          <div class="text-center" style="margin-top: -40px;">
                            <h1 class="h4 text-gray-900 font-weight-bold">Login</h1><br></br>
                          </div>
                          <form class="user" method="POST" action="{{ route('login') }}" enctype="application/x-www-form-urlencoded">
                            @csrf
                              <div class="form-group">
                                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" 
                                value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            <div class="form-group form-password">
                                <input type="password" class="form-control input-pass form-control-user @error('password') is-invalid @enderror" 
                                id="exampleInputPassword" name="password" placeholder="Password">
                                  @error('password')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                <i class="fas fa-eye showPass" id="showPass0" onclick="showPass(this.id)"></i>
                                <i class="fas fa-eye-slash hidePass" id="hidePass0" onclick="hidePass(this.id)"></i>
                            </div>
                            <button type="submit" class=".text-tosca-001 btn-submit btn-user btn-block">Login</button>
                            <hr>
                          </form>
                        <div class="text-center">
                       
                        </div>
                        <div class="text-center">
                          <p>
                            Belum Memiliki Akun? <a class="small .text-tosca-001" href="{{ route('register') }}"> Daftar</a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
</body>
</html>