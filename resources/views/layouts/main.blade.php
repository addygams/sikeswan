<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="images/semarang.png">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        {{-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script> --}}
        <script>
            var cont=0;
        function loopSlider(){
        var xx= setInterval(function(){
                switch(cont)
                {
                case 0:{
                    $("#slider-1").fadeOut(400);
                    $("#slider-2").delay(400).fadeIn(400);
                    $("#sButton1").removeClass("bg-black-800");
                    $("#sButton2").addClass("bg-black-800");
                cont=1;
                
                break;
                }
                case 1:
                {
                
                    $("#slider-2").fadeOut(400);
                    $("#slider-1").delay(400).fadeIn(400);
                    $("#sButton2").removeClass("bg-black-800");
                    $("#sButton1").addClass("bg-black-800");
                
                cont=0;
                
                break;
                }
                
                
                }},8000);

        }

        function reinitLoop(time){
        clearInterval(xx);
        setTimeout(loopSlider(),time);
        }

        function sliderButton1(){

            $("#slider-2").fadeOut(400);
            $("#slider-1").delay(400).fadeIn(400);
            $("#sButton2").removeClass("bg-yellow-900");
            $("#sButton1").addClass("bg-yellow-900");
            reinitLoop(4000);
            cont=0
            
            }
            
            function sliderButton2(){
            $("#slider-1").fadeOut(400);
            $("#slider-2").delay(400).fadeIn(400);
            $("#sButton1").removeClass("bg-yellow-900");
            $("#sButton2").addClass("bg-yellow-900");
            reinitLoop(4000);
            cont=1
            
            }

            $(window).ready(function(){
                $("#slider-2").hide();
                $("#sButton1").addClass("bg-yellow-900");
                

                loopSlider();
        
            });

        </script>
        <script>
            function hewanlain(){
                var jenishewan = document.forms["daftar"]["jenis_hewan"];
                var jenishewan2 = document.forms["daftar"]["hl"];
                if (jenishewan.value == "lain"){
                    jenishewan2.classList.add("disabled:opacity-50");
                    jenishewan2.disabled=false;
                } else {
                    jenishewan2.disabled=true;
                }
            };
        
            // function getCategory() {
            //     var select = document.getElementById("jenis_hewan");
            //     select.remove(1);
            //     select.remove(1);
            //     select.remove(1);
            //     select.remove(1);
            //     select.remove(1);
            //     select.remove(1);
            //     select.remove(1);
            //     if (document.forms["daftar"]){
            //         var option = document.createElement("option");
            //         option.text = "Anjing";
            //         option.value="anjing";
            //         select.add(option,select[1]);
            //         var option = document.createElement("option");
            //         option.text = "Kambing";
            //         option.value="kambing";
            //         select.add(option,select[2]);
            //         var option = document.createElement("option");
            //         option.text = "Kucing";
            //         option.value="kucing";
            //         select.add(option,select[3]);                        
            //         var option = document.createElement("option");
            //         option.text = "Kelinci";
            //         option.value="kelinci";
            //         select.add(option,select[4]);                        
            //         var option = document.createElement("option");
            //         option.text = "Hamster";
            //         option.value="hamster";
            //         select.add(option,select[5]);                        
            //         var option = document.createElement("option");
            //         option.text = "Ayam";
            //         option.value="ayam";
            //         select.add(option,select[6]);                        
            //         var option = document.createElement("option");
            //         option.text = "Lainnya...";
            //         option.value="lain";
            //         select.add(option,select[7]);                        
            //     }
            // }
        </script>
    </head>
    
    <body>
        <header x-data="{ mobileMenuOpen : false }" class="flex flex-wrap flex-row justify-between md:items-center md:space-x-4 bg-green-400 py-4 px-6 relative sticky top-0 z-50">
            <a class="flex title-font font-bold items-center md:mb-0" href="/">
                <img class="sm:h-16 h-8" src="{{asset('images')}}/Semarang.png" alt="logo">
                <span class="sm:ml-4 ml-2 sm:text-2xl text-sm text-white hover:text-yellow-900">Klinik Hewan
                <br class="inline-block">Kota Semarang</span>
            </a>
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-block focus:outline-none md:hidden w-8 h-8 bg-transparent p-1 sm:mt-4 mt-1">
                <svg fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
            <nav class="absolute md:relative sm:top-24 top-16 left-0 md:top-0 z-20 md:flex flex-col md:flex-row md:space-x-6 font-semibold w-full md:w-auto bg-green-400 shadow-md  md:rounded-none md:shadow-none md:p-6 pt-0 md:p-0"
            :class="{ 'flex' : mobileMenuOpen , 'hidden' : !mobileMenuOpen}"  @click.away="mobileMenuOpen = false">
                <a class="block py-1 text-white font-semibold hover:text-yellow-900 ml-4 sm:text-base text-xs" href="/">Beranda</a>
                <a class="block py-1 text-white font-semibold hover:text-yellow-900 ml-4 sm:text-base text-xs" href="/profil">Profil</a>
                {{-- <a class="block py-1 text-white font-semibold hover:text-yellow-900 ml-4 sm:text-base text-xs" href="/berita">Berita</a> --}}
                <a class="block py-1 text-white font-semibold hover:text-yellow-900 ml-4 sm:text-base text-xs" href="/layanan1">Layanan</a>
                {{-- <div class="inline-block relative"  x-data="{ open: false }">
                    <button @click="open = !open" class="focus:outline-none py-1 font-semibold cursor-pointer block text-white hover:text-yellow-900 md:ml-0 ml-4 sm:text-base text-xs" >
                    Layanan
                    </button>
                    <ul x-transition:enter="transition-transform transition-opacity ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-end="opacity-0 transform -translate-y-3"
                        x-show="open" class=" bg-green-400 absolute mt-2 rounded sm:w-24 md:w-48 py-1 text-white sm:ml-0 md:-ml-16">
                        <li><a class="py-1 px-3 block sm:text-left md:text-center md:text-white md:hover:text-purple-900 hover:text-yellow-500 sm:text-base text-xs" href="/layanan1">Pengobatan di Tempat</a></li>
                        <li><a class="py-1 px-3 block sm:text-left md:text-center md:text-white md:hover:text-purple-900 hover:text-yellow-500 sm:text-base text-xs" href="/layanan2">Pengobatan Massal</a>
                    </ul>
                </div> --}}
                <a class="block py-1 text-white font-semibold hover:text-yellow-900 ml-4 sm:text-base text-xs" href="/faq">FAQ</a>
            </nav>
        </header>    
        @yield('container')
        <footer class="text-gray-600 body-font bg-green-400">
            <div class="container px-5 py-4 mx-auto">
                <div class="flex flex-wrap order-first">
                    <div class="xl:w-1/2 lg:w-1/2 w-full sm:px-28 px-0 xl:mt-8 lg:text-right text-center">
                        <h2 class="title-font font-bold text-white tracking-widest sm:text-lg text-md mb-2">SITUS TERKAIT</h2>
                        <nav class="list-none mb-10">
                        <li>
                            <a class="text-white hover:text-yellow-900" href="https://ditjenpkh.pertanian.go.id/index.html">Ditjen Peternakan dan Kesehatan Hewan</a>
                        </li>
                        <li>
                            <a class="text-white hover:text-yellow-900" href="https://disnakkeswan.jatengprov.go.id/">Dinas Peternakan dan Kesehatan Hewan Jateng</a>
                        </li>
                        <li>
                            <a class="text-white hover:text-yellow-900" href="https://www.semarangkota.go.id/">Pemerintah Kota Semarang</a>
                        </li>
                        <li>
                            <a class="text-white hover:text-yellow-900" href="https://laporhendi.semarangkota.go.id/">Lapor Pak Walikota</a>
                        </li>
                        </nav>
                    </div>
                    {{-- <div class="xl:w-1/2 lg:w-1/2 w-full lg:px-16 xl:px-32 xl:mt-8 lg:text-left text-center">
                        <h2 class="title-font font-bold text-white tracking-widest sm:text-lg text-md sm:mb-2 mb-0">MEDIA SOSIAL</h2>
                        <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                        <a class="text-yellow-900">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                        </a>
                        <a class="ml-3 text-yellow-900">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                        </svg>
                        </a>
                        <a class="ml-3 text-yellow-900">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                        </svg>
                        </a>
                        <a class="ml-3 text-yellow-900">
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                            <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                            <circle cx="4" cy="4" r="2" stroke="none"></circle>
                        </svg>
                        </a>
                        </span>
                    </div> --}}
                    <div class="container px-5 pt-6 pb-8 mx-auto block md:flex -mt-8 -mb-8">
                        <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative shadow-lg">
                            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.084826039498!2d110.44669391477336!3d-6.999292194943924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c94a1506219%3A0xf9efc24ccf32ac8c!2sKlinik%20Hewan%20Dinas%20Pertanian%20Semarang!5e0!3m2!1sid!2sid!4v1670359058784!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                            <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.084826039498!2d110.44669391477336!3d-6.999292194943924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c94a1506219%3A0xf9efc24ccf32ac8c!2sKlinik%20Hewan%20Dinas%20Pertanian%20Semarang!5e0!3m2!1sid!2sid!4v1670359058784!5m2!1sid!2sid"></iframe>
                        </div>
                        <div class="lg:w-1/3 md:w-1/2 flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                        <h2 class="text-white sm:text-xl text-md mb-1 font-bold title-font">Kecamatan Gayamsari</h2>
                        <p class="leading-relaxed text-white sm:text-lg text-sm">JL. Slamet Riyadi, No. 4B, 50161, Gayamsari, Kec. Gayamsari, Kota Semarang, Jawa Tengah 50248</p>
                        <a class="mt-3 text-black inline-flex font-semibold sm:text-lg text-sm items-center hover:text-white" href="https://goo.gl/maps/kF6sbbhAi1LtvnSM8">Lihat di Google Maps</a>
                        <a class="mt-3 text-black inline-flex font-semibold sm:text-lg text-sm items-center hover:text-white" href="/visimisi">Hubungi</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-yellow-900">
                <div class="px-6 py-4 mx-auto flex items-center flex-row">
                    <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                        <img class="sm:h-16 h-8" src="images/semarang.png" alt="logo">
                    </a>
                    <p class="sm:text-sm text-xs text-white ml-2">© 2022 Pemerintah Kota Semarang
                    <br class="inline-block">All Rights Reserved  
                    </p>
                </div>
            </div>
        </footer>
    </body>
</html>