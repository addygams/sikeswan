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
    @php
        $data = [];
        $count = 0;
    @endphp
    @foreach ($diagnosasementaras as $diagnosa)
        @php
            $data[$count][0] = $diagnosa->kepanjangan;
            $data[$count][1] = $diagnosa->inisial;
            $data[$count][2] = $diagnosa->id;
            $count++;
        @endphp
    @endforeach
    <!-- component -->

    <div class="mx-auto sm:px-6 lg:px-8 my-3">
        <a href="{{route('diagnosasementaras.create')}}">
            <button
                class="ml-4 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                Buat Baru
            </button>
        </a>
    </div>

    <div class="px-12">
        <table class="w-full sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-2" id="dataTable" style="width: 100%">
            <thead>
                <tr class="text-center">
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell text-center">
                        Kepanjangan</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Singkatan</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $diagnosasementaras as $diagnosa )
                <tr
                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Kepanjangan</span>
                        {{ $diagnosa->kepanjangan }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Inisial</span>
                        {{ $diagnosa->inisial }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Aksi</span>
                        <a href="{{ route('diagnosasementaras.edit', $diagnosa->id) }}" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                        <a href="{{URL::to('/diagnosasementaras/destroy/.',$diagnosa->id) }}" class="text-blue-400 hover:text-blue-600 underline pl-6"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
</x-app-layout>
