@extends('layouts.main')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/konsul.css') }}">
</head>

<div id="content">
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <form class="form-inline">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
    </form>
    <ul class="navbar-nav ml-auto">
      <div class="topbar-divider d-none d-sm-block"></div>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
          <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
        </a>
        <div>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>


  <div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Data Konsultasi Pasien</h1>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-primary">Data All
          <span class=>
            <a href="{{ route('konsultasi.create')}}" class="btn ml-4 btn-primary font-weight-bold">
              + Tambah Perjanjian
            </a>
          </span>
        </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($perjanjians as $p)
              <tr>
                <td>{{ $p->nama_pasien }}</td>
                <td>{{ $p->nama_dokter }}</td>
                <td>{{ $p->tgl_perjanjian }}</td>
                <td>{{ $p->waktu_perjanjian }}</td>
                <td>
                  <span>
                    <form action="{{ route('praktek.hapus', $p) }}" method="post">
                      @method('patch')
                      @csrf
                      <input type="hidden" name="id" value="{{$p->id}}">
                      <span>
                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#success_tic">Accept</button>
                      </span>
                      {{-- <span class="btn-col" align="center" style="vertical-align: middle;">
                        <a class="badge badge-primary btn-info" href="{{ route('pemeriksaan.create', $p->id) }}" role="button">Add &nbsp;<i class="fas fa-info-circle"></i></a>
                      </span> --}}
                    </form>
                    {{-- <button onclick="return confirm('Are you sure?')" class="btn btn-danger d-block" type="submit">Hapus</button> --}}
                  </span>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>  

<!-- Modal Accept -->
<div id="success_tic" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <a class="close" href="#" data-dismiss="modal">&times;</a>
          <div class="page-body">
            <div class="head">  
              <h3 style="margin-top:5px;">Pasien Telah di Periksa</h3>
              {{-- <h4>Lorem ipsum dolor sit amet</h4> --}}
            </div>
          <h1 style="text-align:center;"><div class="checkmark-circle">
            <div class="background"></div>
            <div class="checkmark draw"></div>
          </div>
        <h1>
      </div>
    </div>
  </div>
</div>

@endsection