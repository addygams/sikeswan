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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- component -->
            @php
                $data = [];
                $count = 0;
            @endphp
            @foreach ($rekamaktifs as $rekamaktif)
                @php
                    $data[$count][0] = $rekamaktif->tanggal;
                    $data[$count][1] = $rekamaktif->nama;
                    $data[$count][3] = $rekamaktif->id;
                    $count++;
                @endphp
            @endforeach

            <body class="flex items-center justify-center">
                <div class="container block">
                    <table
                    class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5" id="dataTable" style="width:100%">
                        <thead class="text-black">
                            {{-- @for ($i = 0; $i < $count; $i++) --}}
                            <tr
                                class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Tanggal
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Nama
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Aksi
                                </th>
                            </tr>
                            {{-- @endfor --}}
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
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Aksi</span>
                                        <a href="{{ route('rekamaktifs.edit', $data[$i][3]) }}"
                                            class="text-blue-400 hover:text-blue-600 underline pl-6">Edit</a>
                                        <a href="{{ URL::to('/rekamaktifs/destroy/.', $data[$i][3]) }}"
                                            class="text-blue-400 hover:text-blue-600 underline pl-6"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>

                                {{-- <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                                        {{ \Carbon\Carbon::parse($data[$i][0])->format('d M Y') }}</td>
                                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                                        {{ $data[$i][1] }}</td>
                                    <td class="border-grey-light border text-center">
                                        <a href="{{ route('rekamaktifs.show', $data[$i][3]) }}">
                                            <button
                                                class="ml-2 md:inline-block sm:block sm:px-4 px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple">
                                                Lihat
                                            </button>
                                        </a>
                                        <a href="{{ route('rekamaktifs.edit', $data[$i][3]) }}">
                                            <button
                                                class="ml-2 md:inline-block sm:block sm:px-4 px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                                                Sunting
                                            </button>
                                        </a>
                                        <form action="{{ route('rekamaktifs.destroy', $data[$i][3]) }}" method="POST"
                                            class="md:inline-block sm:inline-block sm:px-1 px-2 py-2">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="ml-2 md:inline-block sm:block sm:px-4 px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr> --}}
                            @endfor
                        </tbody>
                    </table>
                    {{ $rekamaktifs->links() }}
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
                    "info": "Menampilkan Halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak Ada Data",
                    "infoFiltered": "(disaring dari _MAX_ total data)"
                }
            });
            // "info":false,
        });
    </script>
</x-app-layout>
