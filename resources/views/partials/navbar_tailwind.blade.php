<header class="absolute top-0 left-0 z-10 flex items-center w-full bg-transparent">
    <div class="container" >
      <div class="relative flex items-center justify-between">
         <div class="px-4">
          <img src="img/logo-removebg-preview.png" alt="" width="100%" height="20%">
          {{-- <a href="#home" class="block py-6 text-lg font-bold" style="color:rgb(79, 79, 255)">Klinik Mutiara Persani</a> --}}
        </div> 
        <div class="grid grid-rows-2 hover:grid-rows-6">
         {{-- <img src="/img/logo-smk.png" alt="img" class="" width="13%" height="13%"> --}}
        </div>
          <div class="flex items-center px-4">
         <button id="hamburger" name="hamburger" type="button" class="absolute block right-4 lg:hidden">
            <span class="transition duration-300 ease-in-out origin-top-left hamburger-line"></span>
            <span class="transition duration-300 ease-in-out hamburger-line"></span>
            <span class="transition duration-300 ease-in-out origin-bottom-left hamburger-line"></span>
          </button>

          <nav id="nav-menu" class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg dark:bg-dark dark:shadow-slate-500 lg:static lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:shadow-none lg:dark:bg-transparent">
            <ul class="block blk-1 lg:flex">
              @guest
              {{-- <li class="dropdown">
                <a href="{{ route('login') }}" class="flex py-2 mx-8 text-base text-dark hover:text-primary">Login</a>
                    <div class="dropdown-content">
                      <a href="{{ route('login') }}" class="text-sm nav-link text-dark hover:text-primary dark:text-white">Login</a><hr>
                      <a href="{{ route('register') }}" class="text-sm nav-link text-dark hover:text-primary dark:text-white">Daftar</a><hr> 
                      @auth
                      <a href="" class="text-sm nav-link text-dark hover:text-primary dark:text-white">Logout</a><hr> 
                      @endauth
                    </div>
                  </li> --}}
              <li class="dropdown">
                <a href="" class="flex py-2 mx-4 text-base text-primary hover:text-white dark:text-white">Sign Up</a>
                    <div class="dropdown-content">
                      <a href="{{ route('login') }}" class="text-sm nav-link text-dark hover:text-primary dark:text-white">Login</a><hr>
                      <a href="" class="text-sm nav-link text-dark hover:text-primary dark:text-white">Registration</a><hr> 
                      @auth
                      <a href="" class="text-sm nav-link text-dark hover:text-primary dark:text-white">Logout</a><hr> 
                      @endauth
                    </div>
                  </li>
                  @endguest
                  @auth
                @if (Auth::user()->role === "admin")
                @if (Auth::user()->role === "dokter")
              <li class="dropdown">
                <a href="" class="flex py-2 mx-8 text-base text-dark hover:text-primary dark:text-white">Admin</a>
                    <div class="dropdown-content">
                      <a href="/dashboard" class="text-sm nav-link text-dark hover:text-primary dark:text-white">Dashboard</a><hr>
                      <form action="" method="post">
                        @csrf
                        <a href="" class="text-sm nav-link text-dark hover:text-primary dark:text-white">Logout</a><hr>
                      </form>
                    </div>
                  </li>
                  @endif
                  @endif
                  @if (Auth::user()->role === "pasien")
                  <li class="dropdown">
                    <a href="" class="flex py-2 mx-8 text-base text-primary hover:text-white dark:text-white">Pasien</a>
                        <div class="dropdown-content">
                          <a href="/konsultasi" class="text-sm nav-link text-dark hover:text-primary dark:text-white">Buat Janji</a><hr>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            @csrf
                            <a href="" class="text-sm nav-link text-dark hover:text-primary dark:text-white">Logout</a><hr>
                          </form>
                        </div>
                      </li>
                    @endif
                @endauth
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>
  </body>
</html>