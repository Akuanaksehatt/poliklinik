<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content=""><title>Klinik Mutiara Persani</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}
  {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
  <link href="{{ asset('js/jquery-ui.js') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/fontawesome.min.css" rel="stylesheet">
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-navbar sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
        </div>
        <div class="sidebar-brand-text mx-3">Klinik Mutiara Persani<sup></sup></div>
      </a>
      <hr class="sidebar-divider my-0">
      @if (Auth::user()->role === 'admin')
      <li class="nav-item {{ ($active === "dashboard") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('home') }}">
        <button type="button" class="btn btn-primary btn-block">
          Dashboard
        </button>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item {{ ($active === "perjanjian") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('praktek.index') }}">
          <button type="button" class="btn btn-primary btn-block">
            Pasien Poli
          </button>
      <hr class="sidebar-divider">
      <li class="nav-item {{ ($active === "dokter") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin-dokter.index') }}">
          <button type="button" class="btn btn-primary btn-block">
            Dokter
          </button>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item {{ ($active === "obat") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('obat.index') }}">
          <button type="button" class="btn btn-primary btn-block">
            Obat
          </button>
      </li>
      @endif

      @if (Auth::user()->role === 'dokter')
      {{-- <li class="nav-item {{ ($active === "pasien") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('janji.index') }}">
          <button type="button" class="btn btn-primary btn-block">
            Pasien
          </button>
      </li> --}}
      <li class="nav-item {{ ($active === "dashboard") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('home') }}">
          <button type="button" class="btn btn-primary btn-block">
            Daftar Pasien
          </button>
      </li>
      <li class="nav-item {{ ($active === "perjanjian") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('praktek.index') }}">
          <button type="button" class="btn btn-primary btn-block">
            Daftar Pasien Poli
          </button>
      </li>
      {{-- <li class="nav-item {{ ($active === "jadwal") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="jadwal_praktek/jadwal">
          <button type="button" class="btn btn-primary btn-block">
            Jadwal Periksa
          </button>
      </li> --}}
      <li class="nav-item {{ ($active === "obat") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('obat.index') }}">
          <button type="button" class="btn btn-primary btn-block">
            Obat
          </button>
      </li>
      @endif

      @if (Auth::user()->role === 'pasien')
      <li class="nav-item {{ ($active === "perjanjian") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('praktek.index') }}">
        <button type="button" class="btn btn-primary btn-block">
          Daftar Poli
        </button>
      </li>
      <li class="nav-item {{ ($active === "dokter") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('daftar-dokter.index') }}">
        <button type="button" class="btn btn-primary btn-block">
          Data Dokter
        </button>
      </li>
      @endif

      {{-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle">
        </button>
      </div> --}}
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      @yield('content')
      @if (Auth::user()->role == 'admin')
      @endif
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('js/Chart.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Page level custom scripts -->
  <script src="{{ asset('js/datatables-demo.js') }}"></script>
</body>
</html>


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ready to leave?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('logout') }}" method="POST">
          @method('logout')
          @csrf
        <button class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>