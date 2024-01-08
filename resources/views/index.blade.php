@extends('layouts.main_tailwind')
@section('container')

<style>
  .bg {
    margin-left: 50%;
    width: 50%;
    /* margin-top: 10px; */
    background-image: url(img/pr.avif);
    background-size: cover;
    background-position: center;
    text-align: center;
    height: 670px;
  }
  .hero {
    margin-top: -35%;
  }
  .btn-1 {
    width: 23%;
    margin-top: 25px;
    /* margin-left: 55%; */
    padding: 10px;
    background-color: #01b597;
    border: 3px solid #01b597;
    color: white;
    margin-right: 20px;
    font-family: 'Poppins', sans-serif;
  }

  .btn-1:hover {
    background-color: white;
    color: #01b597;
    transition: .3s;
  }

  .btn-2 {
    width: 30%;
    padding: 10px;
    border: 3px solid #01b597;
    color: #01b597;
    font-family: 'Poppins', sans-serif;
  }

  .btn-2:hover {
    background-color: #01b597;
    color: white;
    transition: .3s;
  }

</style>

  {{-- <img src="img/dokter-1.avif" class="bg" alt=""> --}}
  <div class="bg animate__animated animate__fadeInRightBig"></div>
  <section id="hero" class="hero pb-16">
    <div class="container">
      <div class="flex flex-wrap">
        <div class="w-full px-4 mt-20 mb-10 lg:w-1/2">
          {{-- <h2 class="max-w-lg mb-5 text-4xl  font-bold text-blue dark:text-white lg:text-5xl text-dark animate__animated animate__fadeInLeft">Klinik Mutiara Persani</h2> --}}
          <h2 class="max-w-lg mb-5 text-2xl  font-bold text-blue dark:text-white lg:text-5xl text-primary animate__animated animate__fadeInLeft"></h2>
          <p class="font-bold text-2xl animate__animated animate__fadeInLeft">Terpercaya</p>
          <p class="font-bold text-2xl animate__animated animate__fadeInLeft">Pelayanan Terbaik</p>
          <p class="font-bold text-2xl animate__animated animate__fadeInLeft">Dokter Yang Berpengalaman</p>
          {{-- <p class="font-bold text-2xl animate__animated animate__fadeInLeft">Kenyamanan Pasien Prioritas Kami</p> --}}
          <button class="btn-1 rounded-md font-bold animate__animated animate__fadeInLeft">Selengkapnya</button>
          <a href="{{ route('login') }}" class="btn-2 rounded-md font-bold animate__animated animate__fadeInLeft">Login</a>
        </div>
      </div>
    </div>
  </section>
@endsection
