@extends('layouts.main')

@section('content')

  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">


<div id="content">
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <form class="form-inline">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
    </form>
    <ul class="navbar-nav ml-auto">
      <div class="topbar-divider d-none d-sm-block"></div><p></p>
          <span class="mr-2 font-weight-bold d-none d-lg-inline text-black-001 big mb-2">Hallo, {{ Auth::user()->name }}</span>
        <div>
        <li class="nav-item d-flex align-items-center">
          <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
            @csrf
              <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="nav-link text-white font-weight-bold px-0">
                  <span class="d-sm-inline d-none text-white-001 btn btn-primary mb-6">Log out</span>
              </a>
            </form>
        </li>
        </div>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-black-001">Pendaftaran Poli
        </h6>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('praktek.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="nama_pasien">Nama Pasien</label>
            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" 
            placeholder="Nama Lengkap" value="{{ old('nama_pasien') }}">
            @error('nama_pasien')
            <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="no_ktp">Nomor KTP</label>
            <input type="text" class="form-control" id="no_ktp" name="no_ktp" 
            placeholder="Nomor KTP" value="{{ old('no_ktp') }}">
            @error('no_ktp')
            <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="nama_dokter">Nama Dokter</label>
            <select class="form-control" id="nama_dokter" name="nama_dokter">
              <option> --Pilih--</option>
              @foreach ($dokters as $dokter)
              <option value="{{ $dokter->nama_dokter }}">
                {{ $dokter->nama_dokter }}
              </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="tgl_perjanjian">Waktu Kunjungan</label>
              <br></br><input type="date" id="tgl_perjanjian" name="tgl_perjanjian">
              @if ($errors -> has('tgl_perjanjian'))
              <div class="text-danger">
                  {{$errors -> first('tgl_perjanjian')}}
              </div>
              @endif
            </div>
          <div class="form-group">
            <label for="waktu_perjanjian">Jam</label>
            <select name="waktu_perjanjian" class="form-control" id="waktu_perjanjian">
              <option value="Pagi (09:00)">Pagi (08:00)</option>
              <option value="Siang (14:00)">Siang (13:00)</option>
              <option value="Sore (16:00)">Sore (15:00)</option>
            </select>
          </div><br></br>
          <button type="submit" class="btn btn-primary">Buat</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>

  $( function() {
    $("#datepicker" ).datepicker();
  } );

function myFunction() {
    var x = document.getElementById("nama_pasien");
    x.disabled = true;
}

</script>

@endsection