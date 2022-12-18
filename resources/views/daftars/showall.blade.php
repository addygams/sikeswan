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

    <!-- component -->
    @php
        $data = [];
        $count = 0;
    @endphp
    @foreach ($daftar as $daft)
        @php
            $data[$count][0] = $daft->tanggal;
            $data[$count][1] = $daft->no;
            $data[$count][2] = $daft->nama;
            $data[$count][3] = $daft->id;
            $count++;
        @endphp
    @endforeach
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('daftars.index')}}">
                <button
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                    Kembali
                </button>
            </a>
            <body class="flex items-center justify-center">
                <div class="container block">
                    <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5" id="dataTable" style="width: 100%"">
                        <thead class="text-black">
                            <tr 
                                class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
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
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Tanggal</span>
                                    {{ \Carbon\Carbon::parse($data[$i][0])->format('d M Y') }}
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nama</span>
                                    {{ $data[$i][1] }}
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">KTP</span>
                                    {{ $data[$i][2] }}
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Aksi</span>
                                    <a href="{{ route('daftars.show', $data[$i][3]) }}" class="text-blue-400 hover:text-blue-600 underline">Lihat</a>
                                    <a href="{{URL::to('/daftars/destroy/.',$data[$i][3]) }}" class="text-blue-400 hover:text-blue-600 underline pl-6"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Remove</a>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </body>
        </div>
    </div>
    {{-- {{$daftar->links()}} --}}
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
                },
            });
        });
    </script>
</x-app-layout>
