@extends('layouts.main')
@section('content')

<head>
  <link rel="stylesheet" href="{{ asset('css/doctor.css') }}">
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
    <div class="d-sm-flex align-items-center justify-content-between">
      <h1 class="h3 mb-0 text-gray-800 font-weight-bold">{{ Auth::user()->admin }}</h1>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Rincian</a> --}}
    </div>

    @if (Auth::user()->role == 'admin')
    <div class="row">
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Dokter</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dokters }}</div>
                <small><a href="{{ route('admin-dokter.index') }}" class="text-primary">See details..</a></small>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Pasien</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $pasien }}</div>
                  </div>
                  <div class="col"></div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-2x fa-prescription-bottle-alt"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Obat</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $obats }}</div>
                    <small><a href="{{ route('obat.index') }}" class="text-primary">See details..</a></small>
                  </div>
                  {{-- <div class="col"></div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif


    @if (Auth::user()->role == 'dokter')
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-black-001">Data Pasien
          </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Waktu Kunjungan</th>
                  <th>Keluhan</th>
                  <th>No Telepon</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pasiens as $p)
                {{-- @foreach ($pemeriksaans as $pm) --}}
                <tr>
                  <td>{{ $p->nama_pasien }}</td>
                  <td>{{ $p->alamat_pasien }}</td>
                  <td>{{ $p->created_at }}</td>
                  <td>{{ $p->keluhan_pasien }}</td>
                  <td>{{ $p->no_telp }}</td>
                  <td>
                    <div class="row">
                    <span class="btn-col" align="center" style="vertical-align: middle;">
                      <a class="badge badge-info btn-info" role="button">Info &nbsp;<i class="fas fa-info-circle"></i></a>
                    </span>
                    {{-- <span class="btn-col" align="center" style="vertical-align: middle;">
                      <a class="badge badge-primary btn-info" href="{{ route('pemeriksaan.create', $p->id ) }}" role="button">Add &nbsp;<i class="fas fa-info-circle"></i></a>
                      <a class="badge badge-primary btn-info" href="pemeriksaan.create/{{ $d->id }}/{{ $p->id}}" role="button">Add &nbsp;<i class="fas fa-info-circle"></i></a>
                    </span> --}}
                    
                    <span class="btn-col ml-2" align="center" style="vertical-align: middle;">
                      <form  method="post">
                        @method('delete')
                        @csrf
                      <button onclick="return confirm('Hapus Data Pasien?')" class="badge badge-danger trigger-btn" type="submit">Hapus</button>
                      </form>
                    </span>
                  </div>
                    {{-- <span class="btn-col" align="center" style="vertical-align: middle;">
                      <button type="submit" href="" data-toggle="modal" class="badge badge-danger trigger-btn" style="border-color: red">Hapus &nbsp;<i class="fas fa-trash-alt"></i></button>
                    </span> --}}
                    {{-- </form> --}}
                    {{-- <span>
                      <a href="#myModal" class="trigger-btn" data-toggle="modal">Click to Open Confirm Modal</a>
                    </span> --}}
                    {{-- <span>
                      <a href="{{ route('pemeriksaan.index', $p->id) }}" class="btn btn-success">
                        Info
                      </a>
                    </span> --}}
                      {{-- <form  method="post">
                        @method('delete')
                        @csrf
                        <span><button onclick="return confirm('Are you sure?')" class="btn btn-danger d-block" type="submit">Hapus</button></span>
                      </form> --}}
                    </td>
                  </tr>
                  @endforeach
                  {{-- @endforeach --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      @endif
    @if (Auth::user()->role == 'admin')
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Semua Pasien 
            <span>
              <a href="{{ route('pasien.create') }}" class="btn btn-info ml-4 font-weight-bold">
                + Tambah Pasien
              </a>
            </span>
          </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  {{-- <th>Id</th> --}}
                  <th>Nama Pasien</th>
                  <th>Alamat Pasien</th>
                  <th>Tanggal Datang</th>
                  <th>Keluhan</th>
                  <th>No Telepon</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pasiens as $p)
                {{-- @foreach ($pemeriksaans as $pm) --}}
                <tr>
                  {{-- <td>{{ $p->pasien_id }}</td> --}}
                  <td>{{ $p->nama_pasien }}</td>
                  <td>{{ $p->alamat_pasien }}</td>
                  <td>{{ $p->created_at }}</td>
                  <td>{{ $p->keluhan_pasien }}</td>
                  <td>{{ $p->no_telp }}</td>
                  <td>
                    <div class="row">
                    <span class="btn-col mt-2" align="center" style="vertical-align: middle;">
                      <a class="badge badge-primary btn-info"  role="button">Info &nbsp;<i class="fas fa-info-circle"></i></a>
                    </span>
                   
                    <span class="btn-col ml-2" align="center" style="vertical-align: middle;">
                      <form  method="post">
                        @method('delete')
                        @csrf
                      <button onclick="return confirm('Hapus Data Pasien?')" class="badge badge-danger trigger-btn" type="submit">Hapus</button>
                      </form>
                    </span>
                  </div>
                    {{-- <span class="btn-col" align="center" style="vertical-align: middle;">
                      <button type="submit" href="#myModal" data-toggle="modal" class="badge badge-danger trigger-btn" style="border-color: red">Hapus &nbsp;<i class="fas fa-trash-alt"></i></button>
                    </span> --}}
                    {{-- </form> --}}
                    {{-- <span>
                      <a href="#myModal" class="trigger-btn" data-toggle="modal">Click to Open Confirm Modal</a>
                    </span> --}}
                    {{-- <span>
                      <a href="{{ route('pemeriksaan.index', $p->id) }}" class="btn btn-success">
                        Info
                      </a>
                    </span> --}}
                      {{-- <form method="post">
                        @method('delete')
                        @csrf
                        <span><button onclick="return confirm('Are you sure?')" class="btn btn-danger d-block" type="submit">Hapus</button></span>
                      </form> --}}
                    </td>
                  </tr>
                  @endforeach
                  {{-- @endforeach --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      @endif
  @endsection

<!-- Modal HTML -->
{{-- <div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>						
				  <h4 class="modal-title w-100">Are you sure?</h4>	
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			  </div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        @foreach($pasiens as $p)
        <form  method="post">
          @method('delete')
          @csrf
				<button type="submit" class="btn btn-danger">Delete</button>
        </form>
        @endforeach
			</div>
		</div>
	</div>
</div>      --}}