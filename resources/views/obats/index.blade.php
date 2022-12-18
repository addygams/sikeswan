<x-app-layout>
    @if (session()->has('success'))
        <x-slot name="header">
            <h2 class="font-semibold text-xl leading-tight text-white">
                {{ session('success') }}
            </h2>
        </x-slot>
    @endif

    @if (session()->has('failed'))
        <x-slot name="header">
            <h2 class="font-semibold text-xl leading-tight text-white">
                {{ session('failed') }}
            </h2>
        </x-slot>
    @endif

    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            {{-- <div class="float-right mr-5">
                <div class="relative w-full max-w-xl mr-6 ">
                    <div class="absolute inset-y-0 flex items-center pl-2">
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <form action="">
                        <input
                            class="w-full pl-8 pr-2 text-sm border-2 border-purple-300 shadow-outline-gray placeholder-gray-600 bg-white border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                            type="search" placeholder="Cari Obat/Golongan" aria-label="Search" value="{{$search}}" name="search" />
                    </form>
                </div>
            </div> --}}
            <!-- component -->
            @php
                $data = [];
                $count = 0;
            @endphp
            @foreach ($obatt as $obat)
                @php
                    $data[$count][0] = $obat->nama_golongan;
                    $data[$count][1] = $obat->nama;
                    $data[$count][2] = $obat->jenis;
                    $data[$count][3] = $obat->kapasitas;
                    $data[$count][4] = $obat->stok;
                    $data[$count][5] = $obat->id;
                    $data[$count][6] = $obat->satuan;
                    $count++;
                @endphp
            @endforeach

            <body class="flex items-center justify-center">
                <div class="container block">
                    <div class="px-12 my-2">
                        <div class="flex lg:flex-row sm:justify-between lg:justify-start">
                            <a href="{{ route('obats.create') }}">
                                <button
                                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700">
                                    Masukkan Obat Baru
                                </button>
                            </a>
            
                            <!-- component -->
                            <style>
                                .animated {
                                    -webkit-animation-duration: 1s;
                                    animation-duration: 1s;
                                    -webkit-animation-fill-mode: both;
                                    animation-fill-mode: both;
                                }
            
                                .animated.faster {
                                    -webkit-animation-duration: 500ms;
                                    animation-duration: 500ms;
                                }
            
                                .fadeIn {
                                    -webkit-animation-name: fadeIn;
                                    animation-name: fadeIn;
                                }
            
                                .fadeOut {
                                    -webkit-animation-name: fadeOut;
                                    animation-name: fadeOut;
                                }
            
                                @keyframes fadeIn {
                                    from {
                                        opacity: 0;
                                    }
            
                                    to {
                                        opacity: 1;
                                    }
                                }
            
                                @keyframes fadeOut {
                                    from {
                                        opacity: 1;
                                    }
            
                                    to {
                                        opacity: 0;
                                    }
                                }
                            </style>
            
                            <div class="inline-block ">
                                <button onclick="openModal('main-modal')" class='ml-2 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 '>Tambah Golongan</button>
                            </div>
                            <div class="inline-block">
                                <button onclick="openModal('another-modal')" class='ml-2 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700  '>Hapus Golongan</button>
                            </div>
                        </div>
            
                        <div class="main-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
                            <div class="border border-blue-500 shadow-lg modal-container bg-white w-4/12 md:max-w-11/12 mx-auto rounded-xl shadow-lg z-50 overflow-y-auto">
                                <div class="modal-content py-4 text-left px-6">
                                    <!--Title-->
                                    <div class="flex justify-between items-center pb-3">
                                        <p class="text-2xl font-bold text-gray-500">Tambah Golongan</p>
                                        <div class="modal-close cursor-pointer z-50" onclick="modalClose('main-modal')">
                                            <svg class="fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18">
                                                <path
                                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <!--Body-->
                                    <div class="my-5 mr-5 ml-5 flex justify-center">
                                        <form name="daftar" method="post" autocomplete="on" action="{{ route('store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="text-md text-gray-600" for="nama_golongan">Nama Golongan : </label>
                                                <input type="text" class="w-auto mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md" id="nama_golongan" name="nama_golongan">
                                            </div>
                                            <br>
                                            {{-- <button type="submit" class="btn btn-primary" name="submit" value="submit">Tambah</button> --}}
                                            <div class="flex justify-end pt-2 space-x-14">
                                                <button class="px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Footer-->
                                </div>
                            </div>
                        </div>
                        <div class="another-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
                            <div class="border border-blue-500 shadow-lg modal-container bg-white w-4/12 md:max-w-11/12 mx-auto rounded-xl shadow-lg z-50 overflow-y-auto">
                                <div class="modal-content py-4 text-left px-6">
                                    <!--Title-->
                                    <div class="flex justify-between items-center pb-3">
                                        <p class="text-2xl font-bold text-gray-500">Hapus Golongan</p>
                                        <div class="modal-close cursor-pointer z-50" onclick="modalClose('another-modal')">
                                            <svg class="fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18">
                                                <path
                                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <!--Body-->
                                    <div class="my-5 mr-5 ml-5 flex justify-center">
                                        <form id="hapus" name="hapus" method="delete" autocomplete="on" action="">
                                            @csrf
                                            <div class="form-group">
                                                <label for="id_golongan">Golongan : </label>
                                                <select id="id_golongan" name="id_golongan" class="form-control">
                                                    <option disabled selected >--Pilih Golongan--</option>
                                                    @foreach ($golongan as $gol)
                                                        <option value="{{$gol->id_golongan}}">{{$gol->nama_golongan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <a class="float-right bg-blue-600 p-2 text-white rounded " onclick="this.href='/golongandelete/' + document.getElementById('id_golongan').value">Hapus</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <script>
                            all_modals = ['main-modal', 'another-modal']
                            all_modals.forEach((modal)=>{
                                const modalSelected = document.querySelector('.'+modal);
                                modalSelected.classList.remove('fadeIn');
                                modalSelected.classList.add('fadeOut');
                                modalSelected.style.display = 'none';
                            })
                            const modalClose = (modal) => {
                                const modalToClose = document.querySelector('.'+modal);
                                modalToClose.classList.remove('fadeIn');
                                modalToClose.classList.add('fadeOut');
                                setTimeout(() => {
                                    modalToClose.style.display = 'none';
                                }, 500);
                            }
            
                            const openModal = (modal) => {
                                const modalToOpen = document.querySelector('.'+modal);
                                modalToOpen.classList.remove('fadeOut');
                                modalToOpen.classList.add('fadeIn');
                                modalToOpen.style.display = 'flex';
                            }
            
                        </script>
                        <table
                            class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5" id="dataTable" style="width: 100%">
                            <thead class="text-black">
                                {{-- @for ($i = 0; $i < $count; $i++) --}}
                                    <tr
                                        class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                            Golongan
                                        </th>
                                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                            Nama Obat
                                        </th>
                                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                            Jenis Obat
                                        </th>
                                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                            Kapasitas
                                        </th>
                                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                            Stok
                                        </th>
                                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                            Aksi
                                        </th>
                                    </tr>
                            </thead>
                            <tbody class="flex-1 sm:flex-none">
                                @for ($i = 0; $i < $count; $i++)
                                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Golongan</span>
                                            {{ $data[$i][0] }}
                                        </td>
                                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nama Obat</span>
                                            {{ $data[$i][1] }}
                                        </td>
                                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Jenis</span>
                                            {{ $data[$i][2] }}</td>
                                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Kapasitas</span>
                                            {{ $data[$i][3] }} {{ $data[$i][6] }}</td>
                                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Stok</span>
                                            {{ $data[$i][4] }}</td>
                                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Aksi</span>
                                            {{-- <a href="{{ route('obats.show', $data[$i][5]) }}" class="text-blue-400 hover:text-blue-600 underline">Lihat</a> --}}
                                            <a href="{{ route('obats.edit', $data[$i][5]) }}" class="text-blue-400 hover:text-blue-600 underline pl-6">Edit</a>
                                            <a href="{{URL::to('/obats/destroy/.',$data[$i][5]) }}" class="text-blue-400 hover:text-blue-600 underline pl-6"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    {{-- {{ $obatt->links() }} --}}
                </div>
            </body>

            <style>
                html,
                body {
                    height: 100%;
                }

                @media (min-width: 640px) {
                    table {
                        display: inline-table !important;
                    }

                    thead tr:not(:first-child) {
                        display: none;
                    }
                }

                td:not(:last-child) {
                    border-bottom: 0;
                }

                th:not(:last-child) {
                    border-bottom: 2px solid rgba(0, 0, 0, .1);
                }

            </style>
        </div>
        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable({
                    "language" :{
                        "paginate": {
                            "previous": "Sebelumnya",
                            "next": "Selanjutnya"
                        },
                        "search": "Cari:",
                        "lengthMenu": "Menampilkan _MENU_ data per halaman",
                        "zeroRecords": "Tidak Ada Data Yang Ditemukan",
                        "info": "Menampilkan Halaman _PAGE_ of _PAGES_",
                        "infoEmpty": "Tidak Ada Data",
                        "infoFiltered": "(disaring dari _MAX_ total data)"
                    }
                });
            });
        </script>
    </div>
</x-app-layout>
