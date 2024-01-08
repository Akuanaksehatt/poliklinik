@extends('layouts.main')

@section('content')

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
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-black-001">Data Dokter
          {{-- <span>
            <a href="{{ route('admin-dokter.create') }}" class="btn ml-4 btn-primary font-weight-bold">
              + Tambah Dokter
            </a>
          </span> --}}
        </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Poli</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                {{-- <th>Actions</th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach ($dokters as $dokter)
              <tr>
                <td>{{ $dokter->nama_dokter }}</td>
                <td>{{ $dokter->spesialisasi_dokter }}</td>
                <td>{{ $dokter->no_telp }}</td>
                <td>{{ $dokter->alamat_dokter }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection