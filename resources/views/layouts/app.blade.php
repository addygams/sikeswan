<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('images')}}/Semarang.png">
    <title>{{ config('SIKESWAN', 'SIKESWAN') }}</title>

    <meta name="description" content="">
    <meta name="keywords" content="">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/DataTables/datatables.min.css"/>
    <link rel="stylesheet" href="{{asset('assets')}}/css/styles.css">
    {{-- <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/tailwind.output.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/select2/dist/css/select2.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('assets')}}/select2/dist/js/select2.min.js"></script>
    <script src="{{asset('assets')}}/moment.js"></script>
    {{-- <script src="{{asset('assets')}}/datetime-moment.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script> --}}
    {{-- <script src="//cdn.datatables.net/plug-ins/1.13.1/sorting/datetime-moment.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script>
    <script type="text/javascript" src="{{asset('assets')}}/DataTables/datatables.min.js"></script>
    
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}
     <!--Responsive Extension Datatables CSS-->
    <!-- Fonts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{asset('assets')}}/js/init-alpine.js"></script>
    <!-- DataTables -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script>
        $(document).ready(function () {
            // $.fn.dataTable.moment( 'd M Y' );
            // console.log(this);
        });

        function hewanlain(){
            var jenishewan = document.forms["daftar"]["jenis_hewan"];
            var jenishewan2 = document.forms["daftar"]["hl"];
            if (jenishewan.value == "lain"){
                jenishewan2.disabled=false;
                jenishewan2.classList.add("border-blue-600");
            } else {
                jenishewan2.disabled=true;
            }
        };
        
    </script>
    <style>
		
		/*Overrides for Tailwind CSS */

        .dataTables_wrapper .dataTables_length select{
            width: 60px;
        }
		
		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			/* color: #4a5568; 			
			padding-left: 1rem; 		
			padding-right: 1rem; 		
			padding-top: .5rem; 		
			padding-bottom: .5rem; 		 */
			line-height: 1.25; 			
			border-width: 1px; 			
			border-radius: .25rem; 		
			border-color: black; 		/*border-gray-200*/
			background-color: transparent; /*bg-gray-200*/
            margin-top: 1rem;
            margin-bottom: 1rem; 	
            margin-left: .5rem; 	
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;	/*bg-indigo-100*/
		}
		
		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button		{
			font-weight: 700;				/*font-bold*/
			border-radius: .25rem;			/*rounded*/
			border: 1px solid transparent;	/*border border-transparent*/
		}
		
		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current	{
			color: #fff !important;				/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
			font-weight: 700;					/*font-bold*/
			border-radius: .25rem;				/*rounded*/
			background: #667eea !important;		/*bg-indigo-500*/
			border: 1px solid transparent;		/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
			color: #fff !important;				/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
			font-weight: 700;					/*font-bold*/
			border-radius: .25rem;				/*rounded*/
			background: #667eea !important;		/*bg-indigo-500*/
			border: 1px solid transparent;		/*border border-transparent*/
		}
		
		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}
		
		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important; /*bg-indigo-500*/
		}
		
      </style>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            @if (session()->has('success'))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-green-500">
                        {{ $header }}
                    </div>
                </header>
            @endif    
        @endif

        @if (isset($header))
            @if (session()->has('failed'))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-red-500">
                        {{ $header }}
                    </div>
                </header>
            @endif    
        @endif

        @if (isset($header))
            @if (session()->has('dashboard'))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('modals')
    @stack('scripts')

    @livewireScripts
</body>

</html>
