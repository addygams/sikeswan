<x-app-layout>
    @if (session()->has('success'))
        <x-slot name="header">
            <h2 class="font-semibold text-xl leading-tight text-white">
                {{session('success')}}
            </h2>
        </x-slot>
    @endif

    @if (session()->has('failed'))
        <x-slot name="header">
            <h2 class="font-semibold text-xl leading-tight text-white">
                {{session('failed')}}
            </h2>
        </x-slot>
    @endif
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <a href="{{route('daftars.showall')}}">
                <button
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                    Lihat Semua Pendaftaran
                </button>
            </a> --}}
            <!-- component -->
            @php
                $data = [];
                $count = 0;
            @endphp
            @foreach ($daftars as $daftar)
                @php
                    $data[$count][0] = $daftar->tanggal;
                    $data[$count][1] = $daftar->no;
                    $data[$count][2] = $daftar->nama;
                    $data[$count][3] = $daftar->id;
                    $count++;
                @endphp
            @endforeach
            
            <body class="flex items-center justify-center relative">
                <div class="container block">
                    <table 
                        class="w-full sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-2" id="dataTable" style="width: 100%">
                        <thead class="text-black">
                            <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Tanggal</th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Nomor Antrian</th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Nama</th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="flex-1 sm:flex-none">
                            @for ($i = 0; $i < $count; $i++)
                                <tr
                                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 flex items-center text-center border border-b block lg:table-cell relative lg:static ">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Tanggal</span>
                                            {{ \Carbon\Carbon::parse($data[$i][0])->format('d M Y') }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 flex items-center text-center border border-b block lg:table-cell relative lg:static ">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nomor Antrian</span>
                                            {{ $data[$i][1] }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 flex items-center text-center border border-b block lg:table-cell relative lg:static ">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nama</span>
                                            {{ $data[$i][2] }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 flex items-center text-center border border-b block lg:table-cell relative lg:static ">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Aksi</span>
                                        <a href="{{ route('daftars.edit', $data[$i][3]) }}" class="text-blue-400 hover:text-blue-600 underline">Lanjut</a>
                                        <a href="{{URL::to('/daftars/destroy/.',$data[$i][3]) }}" class="text-blue-400 hover:text-blue-600 underline pl-6"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Remove</a>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </body>
            @if (session()->has('berhasil'))
            <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                            <svg
                            class="h-6 w-6 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                            ></path>
                            </svg>
                        </div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Sukses!</h3>
                        <div class="mt-2 px-7 py-3">
                            <p class="text-sm text-gray-500">
                                Rekam Medis Berhasil dibuat!
                            </p>
                        </div>
                        <div class="items-center px-4 py-3">
                            <a href="{{ route('rekampasifs.edit', session('rekampasif')->id) }}">
                                <button id="ok-btn"
                                class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300"
                                >
                                Menuju Rekam Medis
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    {{$daftars->links()}}
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
</x-app-layout>
