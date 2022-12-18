@extends('layouts/main')

@section('title', 'Klinik Hewan Kota Semarang')

@section('container')
<!-- slider -->
<div class="sliderAx h-128">
    <div id="slider-1" class="mx-auto">
        <div class="bg-cover bg-center text-white py-64 px-10 object-fill" style="background-image: url('images/Cover 1.jpg')">
            <div class="md:w-1/2">
                <p class="font-bold sm:text-lg text-md uppercase">Selamat Datang di</p>
                <p class="sm:text-4xl text-2xl font-bold">Situs Klinik Hewan Kota Semarang</p>
                <!-- <a href="#" class="bg-yellow-600 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Contact us</a> -->
            </div>  
        </div> <!-- container -->
    <br>
    </div>
    <div id="slider-2" class="mx-auto">
        <div class="bg-cover bg-top text-white py-64 px-10 object-fill" style="background-image: url('images/Cover 2.jpg')">
            <div class="md:w-1/2">
                <p class="font-bold sm:text-lg text-md uppercase">Selamat Datang di</p>
                <p class="sm:text-4xl text-2xl font-bold">Situs Klinik Hewan Kota Semarang</p>
                <!-- <a href="#" class="bg-yellow-600 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Contact us</a> -->
            </div>
        </div> <!-- container -->
    <br>
    </div>
</div>
<div  class="flex justify-between w-12 mx-auto pb-2">
        <button id="sButton1" onclick="sliderButton1()" class="bg-yellow-600 rounded-full w-4 pb-2 " ></button>
    <button id="sButton2" onclick="sliderButton2() " class="bg-yellow-600 rounded-full w-4 p-2"></button>
</div>

<!-- heroes -->
<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-12 md:flex-row flex-col mt-8 items-center">
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
            <img class="object-cover object-center rounded" alt="hero" src="images/Puskeswan.jpg">
        </div>
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
            <h1 class="title-font sm:text-4xl text-2xl mb-4 font-bold text-gray-900">Klinik Hewan
            <br class="hidden lg:inline-block">Kota Semarang
            </h1>
            <p class="leading-relaxed sm:text-lg text-md">Klinik Hewan, merupakan unit kesehatan hewan peliharaan yang terletak di Jl.Slamet Riyadi No. 4B Gayamsari</p>
        <!-- <div class="flex justify-center">
            <button class="inline-flex text-white bg-green-400 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">Button</button>
            <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
        </div> -->
        </div>
    </div>
</section>

<!-- profil -->
<section class="text-gray-600 body-font -mb-16">
    <div class="flex flex-col text-center w-full mt-8 -mb-8">
        <h1 class="sm:text-3xl text-xl font-bold title-font mb-0 text-gray-900">PROFIL</h1>
        <div class="flex mt-2 justify-center">
            <div class="w-12 h-1 rounded-full bg-purple-800 inline-flex"></div>
        </div>
    </div>
    <div class="container px-5 py-24 mx-auto">
        {{-- <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
            <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full bg-green-200 text-yellow-900 flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="sm:w-16 sm:h-16 w-10 h-10 " viewBox="0 0 24 24">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" ></path>
                </svg>
            </div>
            <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                <h2 class="text-gray-900 sm:text-2xl text-lg title-font font-semibold mb-2">Visi Misi</h2>
                <p class="leading-relaxed sm:text-lg text-sm">Visi dan Misi Klinik Hewan Kota Semarang.</p>
                <a class="mt-3 text-green-400 inline-flex items-center hover:text-purple-800" href="/profil#visimisi">Selengkapnya
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
                </a>
            </div>p
        </div> --}}
        <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
            <div class="flex-grow sm:text-right text-center mt-6 sm:mt-0">
                <h2 class="text-gray-900 sm:text-2xl text-lg title-font font-semibold mb-2">Dokter</h2>
                <p class="leading-relaxed sm:text-lg text-sm">Dokter yang bekerja pada Klinik Hewan Kota Semarang.</p>
                <a class="mt-3 text-green-400 inline-flex items-center hover:text-purple-800" href="/profil#dokter">Selengkapnya
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
                </a>
            </div>
            <div class="sm:w-32 sm:order-none order-first sm:h-32 h-20 w-20 sm:ml-10 inline-flex items-center justify-center rounded-full bg-green-200 text-yellow-900 flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="sm:w-16 sm:h-16 w-10 h-10" viewBox="0 0 24 24">
                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
        </div>
        <div class="flex items-center lg:w-3/5 mx-auto sm:flex-row flex-col">
            <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full bg-green-200 text-yellow-900 flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="sm:w-16 sm:h-16 w-10 h-10" viewBox="0 0 24 24">
                <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                <h2 class="text-gray-900 sm:text-2xl text-lg title-font font-semibold mb-2">Paramedis Klinik Hewan</h2>
                <p class="leading-relaxed sm:text-lg text-sm">Paramedis yang bekerja pada Klinik Hewan Kota Semarang.</p>
                <a class="mt-3 text-green-400 inline-flex items-center hover:text-purple-800" href="/profil#paramedik">Selengkapnya
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Layanan -->
{{-- <section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full -mt-8 mb-16">
        <h1 class="sm:text-3xl text-xl font-bold title-font mb-0 text-gray-900">BERITA</h1>
        <div class="flex mt-2 justify-center">
            <div class="w-16 h-1 rounded-full bg-purple-800 inline-flex"></div>
        </div>
    </div>
    <div class="flex flex-wrap -m-4">
      <div class="xl:w-1/4 md:w-1/2 p-4">
        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
          <img class="h-40 rounded w-full object-cover object-center mb-6" src="images/Berita 1.jpg" alt="content">
          <h2 class="sm:text-lg text-mc text-gray-900 font-semibold title-font sm:mb-4 mb-2">Lorem Ipsum</h2>
          <p class="leading-relaxed sm:text-base text-sm">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
          <a class="text-green-400 inline-flex items-center hover:text-purple-800" href="/detail">Learn More
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
      <div class="xl:w-1/4 md:w-1/2 p-4">
        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
          <img class="h-40 rounded w-full object-cover object-center mb-6" src="images/Berita 2.jpg" alt="content">
          <h2 class="sm:text-lg text-mc text-gray-900 font-semibold title-font sm:mb-4 mb-2">Lorem Ipsum</h2>
          <p class="leading-relaxed sm:text-base text-sm">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
          <a class="text-green-400 inline-flex items-center hover:text-purple-800" href="/detail">Learn More
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
      <div class="xl:w-1/4 md:w-1/2 p-4">
        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
          <img class="h-40 rounded w-full object-cover object-center mb-6" src="images/Berita 3.jpg" alt="content">
          <h2 class="sm:text-lg text-mc text-gray-900 font-semibold title-font sm:mb-4 mb-2">Lorem Ipsum</h2>
          <p class="leading-relaxed sm:text-base text-sm">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
          <a class="text-green-400 inline-flex items-center hover:text-purple-800" href="/detail">Learn More
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
      <div class="xl:w-1/4 md:w-1/2 p-4">
        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
          <img class="h-40 rounded w-full object-cover object-center mb-6" src="images/Berita 4.jpg" alt="content">
          <h2 class="sm:text-lg text-mc text-gray-900 font-semibold title-font sm:mb-4 mb-2">Lorem Ipsum</h2>
          <p class="leading-relaxed sm:text-base text-sm">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
          <a class="text-green-400 inline-flex items-center hover:text-purple-800" href="/detail">Learn More
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
  <button class="flex mx-auto -mt-16 text-white bg-green-400 border-0 py-2 px-8 focus:outline-none hover:bg-purple-800 rounded-lg text-lg" href="/berita"><a href="/berita">Semua Berita</a></button>
</section> --}}
<!-- Layanan -->
<section class="text-gray-600 body-font">
    <div class="flex flex-col text-center w-full mt-24 -mb-8">
        <h1 class="sm:text-3xl text-xl font-bold title-font text-gray-900">LAYANAN</h1>
        <div class="flex mt-2 justify-center">
            <div class="w-24 h-1 rounded-full bg-purple-800 inline-flex"></div>
        </div>
    </div>
    <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap -mx-4 -mb-10 text-center">
      <div class="sm:w-1/2 mb-10 px-4">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="images/Layanan 1.jpg">
        </div>
        <h2 class="title-font text-2xl font-semibold text-gray-900 mt-6 mb-3">Pelayanan Aktif</h2>
        <p class="leading-relaxed text-base">Pelayanan Pengobatan yang dilakukan oleh Tenaga Medik dengan mengunjungi Kandang Ternak. Peternak dapat menghubungi terlebih dahulu pihak Klinik Hewan melalui (024)6714930, selanjutnya mendaftarnya untuk reservasi tanggal pemeriksaan.</p>
        <div class="flex justify-center">
          <button class="mt-6 text-white bg-green-400 border-0 py-2 px-5 focus:outline-none hover:bg-purple-800 rounded-lg"><a href="{{route('daftarAktif')}}">Daftar</a></button>
          <button class="ml-2 mt-6 text-white bg-green-400 border-0 py-2 px-5 focus:outline-none hover:bg-purple-800 rounded-lg"><a href="/layanan1#aktif">Lihat Antrian</a></button>
        </div>
      </div>
      <div class="sm:w-1/2 mb-10 px-4">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="images/Layanan 2.jpg">
        </div>
        <h2 class="title-font text-2xl font-semibold text-gray-900 mt-6 mb-3">Pelayanan Pasif</h2>
        <p class="leading-relaxed text-base">Pelayanan Pengobatan yang dilakukan secara mandiri oleh pemilik hewan kesayangan dengan mengunjungi langsung ke Klinik Hewan, yang sebelumnya telah melakukan pendaftaran secara online untuk mendapatkan nomor antrian.</p>
        <div class="flex justify-center">
          <button class="mt-6 text-white bg-green-400 border-0 py-2 px-5 focus:outline-none hover:bg-purple-800 rounded-lg"><a href="{{route('daftar')}}">Daftar</a></button>
          <button class="ml-2 mt-6 text-white bg-green-400 border-0 py-2 px-5 focus:outline-none hover:bg-purple-800 rounded-lg"><a href="/layanan1#pasif">Lihat Antrian</a></button>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection