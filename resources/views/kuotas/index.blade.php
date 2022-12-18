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
        <div class="container">
            <div class="sm:px-6 lg:px-8">
                <a href="{{ route('kuotas.create') }}">
                    <button
                        class="float-left ml-5 mb-3 px-6 py-3 font-medium text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                        Tambah Kuota
                    </button>
                </a>
            </div>
            @php
                $data = [];
                $count = 0;
            @endphp
            @foreach ($kuotaa as $kuota)
                @php
                    $data[$count][0] = $kuota->tanggal;
                    $data[$count][2] = $kuota->kuota;
                    $data[$count][3] = $kuota->id;
                    $count++;
                @endphp
            @endforeach
            <!-- component -->
            <div class="px-12">
                <table class="w-full sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-2" id="dataTable" style="width: 100%">
                    <thead>
                        <tr>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Tanggal</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Kuota</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Kuota</span>
                                    {{ $data[$i][2] }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Aksi</span>
                                
                                <a href="{{ route('kuotas.edit', $data[$i][3]) }}" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                                <a href="{{URL::to('/kuotas/destroy/.',$data[$i][3]) }}" class="text-blue-400 hover:text-blue-600 underline pl-6"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
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
                    "info": "Menampilkan Halaman _PAGE_ of _PAGES_",
                    "infoEmpty": "Tidak Ada Data",
                    "infoFiltered": "(disaring dari _MAX_ total data)"
                }
            });
        });
    </script>
</x-app-layout>
