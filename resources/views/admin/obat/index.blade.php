@extends('layouts.main')

@section('content')
<head>
  <link rel="stylesheet" href="{{ asset('css/praktek.css') }}">
</head>

<div id="content">
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
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
        <h5 class="font-weight-bold text-black-001">Daftar Obat
          <div class="addButton">
            <ul class="right">
              <span>
                <a href="{{ route('obat.create') }}" class="btn btn-primary font-weight-bold">+Tambah Obat
                </a>
              </span>
            </ul>
          </div>
        </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Description</th>
                <th>Kemasan</th>
                <th>Jumlah</th>
                <th>Harga/Bungkus</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($obats as $obat)
              <tr>
                <td>{{ $obat->nama_obat }}</td>
                <td>{{ $obat->desc }}</td>
                <td>{{ $obat->kemasan }}</td>
                <td>{{ $obat->jumlah_obat }}</td>
                <td>Rp{{ number_format($obat->harga_obat) }}</td>
                <td>
                  <div class="row">
                    <span>
                      <a href="{{ route('obat.edit', $obat->id) }}" class="ml-2 btn btn-warning">Ubah</a>
                    </span>
                    <form action="{{ route('obat.destroy', $obat->id) }}" method="post">
                      @method('delete')
                      @csrf
                    <span>
                      <button onclick="return confirm('Are you sure?')" class="ml-5 btn btn-danger d-block" type="submit">Hapus</button>
                    </span>
                      </form>
                    </div>
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

@endsection