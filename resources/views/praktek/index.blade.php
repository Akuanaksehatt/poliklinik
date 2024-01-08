@extends('layouts.main')

@section('content')

<head>
  <link rel="stylesheet" href="{{ asset('css/praktek.css') }}">
</head>

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
    @if (Auth::user()->role === 'pasien')
    @endif
    <div class="card shadow mb-4">
      <div class="card-header py-3">
      <h5 class="font-weight-bold text-black-001">Daftar Periksa
          @if (Auth::user()->role ==='pasien')
          <div class="addButton">
            <ul class="right">
              <span>
                <a href="{{ route('praktek.create')}}" class="btn btn-primary font-weight-bold">+Buat Jadwal</a>
              </span>
            </ul>
          </div>
          @endif
        </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Pasien</th>
                <th>Nomor KTP</th>
                <th>Nama Dokter</th>
                <th>Tanggal</th>
                <th>Jam</th>
                @if (Auth::user()->role === 'dokter')
                <th>Status</th>
                <th>Aksi</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach ($konsultasis as $k)
              <tr>
                <td>{{ $k->nama_pasien }}</td>
                <td>{{ $k->no_ktp }}</td>
                <td>{{ $k->nama_dokter }}</td>
                <td>{{ $k->tgl_perjanjian }}</td>
                <td>{{ $k->waktu_perjanjian }}</td>
                @if (Auth::user()->role === 'dokter')
                <td class="text-black-001 text-center">{{ $k->status }}</td>
                @endif
                <td>
                  <div class="row">
                  @if (Auth::user()->role === 'dokter')
                  <span>
                    <form action="{{ route('praktek.update', $k) }}" method="post">
                      @method('patch')
                      @csrf
                      <input type="hidden" name="id" value="{{$k->id}}">
                      <span>
                        <button type="submit" class="btn btn-success ml-3" data-toggle="modal" 
                        data-target="#success_tic" value="succes">Confirm</button>
                      </span>
                    </form>
                  </span>
                  @endif
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
              <h3 style="margin-top:5px;">Pasien Telah Di Konfirmasi</h3>
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

{{-- Modal Delete --}}
<div id="delete_tic" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <a class="close" href="#" data-dismiss="modal">&times;</a>
          <div class="page-body">
            <div class="head">  
              <h3 style="margin-top:5px;">Pasien Telah di Periksa</h3>
              {{-- <h4>Lorem ipsum dolor sit amet</h4> --}}
            </div>
          <h1 style="text-align:center;"><div class="checkmark-circle-del">
            <div class="background"></div>
            <div class="checkmark draw"></div>
          </div>
        <h1>
      </div>
    </div>
  </div>
</div>

@endsection