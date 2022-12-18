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
            <a href="{{ route('tenagamediks.create') }}">
                <button
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                    Tambah Tenaga Medis
                </button>
            </a>
            @php
                $data = [];
                $count = 0;
            @endphp
            @foreach ($mediks as $medik)
                @php
                    $data[$count][0] = $medik->nama;
                    $data[$count][1] = $medik->nomor;
                    $data[$count][2] = $medik->jenis;
                    $data[$count][3] = $medik->id;
                    $data[$count][4] = $medik->foto;
                    $count++;
                @endphp
            @endforeach

            <!-- component -->

            <body class="flex items-center justify-center">
                <div class="container block">
                    <table
                        class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-2" id="dataTable" style="width: 100%">
                        <thead class="text-black">
                            <tr
                                class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Foto
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Nama
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Nomor Induk
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Kategori
                                </th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="flex-1 sm:flex-none">
                            @for ($i = 0; $i < $count; $i++)
                                <tr
                                    style = "height:100px"
                                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td
                                        style="height: 100%"
                                        class="w-full lg:w-auto p-3 text-gray-800 flex items-center text-center border border-b block lg:table-cell relative lg:static ">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Foto</span>
                                        @if ($data[$i][4] == null)
                                            <h5 class="mx-auto">Foto Tidak Ditemukan</h5> 
                                        @else
                                        <div @click="$dispatch('img-modal', {  imgModalSrc: '{{ asset('/storage/packages/' . $data[$i][4]) }}', imgModalDesc: ' {{$data[$i][0]}}' })" class=" cursor-pointer transition duration-300 ease-in-out  transform hover:-translate-y-1 md:p-2 p-1 w-1/2 flex mx-auto"> 
                                            <img class="mx-auto" width="100px" src="{{ asset('/storage/packages/' . $data[$i][4]) }}">
                                        </div>
                                        {{-- Image Popup --}}
                                        <div x-data="{ imgModal : false, imgModalSrc : '', imgModalDesc : '' }">
                                            <template @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc; imgModalDesc = $event.detail.imgModalDesc;" x-if="imgModal">
                                            <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform " x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform " x-on:click.away="imgModalSrc = ''" class="p-2 fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center bg-black bg-opacity-75">
                                                <div @click.away="imgModal = ''" class="flex flex-col max-w-3xl max-h-full overflow-auto">
                                                    <div class="z-50">
                                                        <button @click="imgModal = ''" class="float-right pt-2 pr-2 outline-none focus:outline-none">
                                                        <svg class="fill-current text-white " xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                                            </path>
                                                        </svg>
                                                        </button>
                                                    </div>
                                                    <div class="p-2">
                                                        <img :alt="imgModalSrc" class="object-contain h-1/2-screen" :src="imgModalSrc">
                                                        <p x-text="imgModalDesc" class="text-center text-white"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            </template>
                                        </div>
                                        @endif
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nama</span>
                                        {{ $data[$i][0] }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nomor Induk</span>
                                        {{ $data[$i][1] }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Kategori</span>
                                        {{ $data[$i][2] }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Aksi</span>
                                        {{-- <a href="{{ route('tenagamediks.show', $data[$i][3]) }}" class="text-blue-400 hover:text-blue-600 underline">Lihat</a> --}}
                                        <a href="{{ route('tenagamediks.edit', $data[$i][3]) }}" class="text-blue-400 hover:text-blue-600 underline pl-6">Edit</a>
                                        <a href="{{URL::to('/tenagamediks/destroy/.',$data[$i][3]) }}" class="text-blue-400 hover:text-blue-600 underline pl-6"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            @endfor

                        </tbody>
                    </table>
                    {{-- {{ $kuotaa->links() }} --}}
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
                    "info": "Menampilkan Halaman _PAGE_ of _PAGES_",
                    "infoEmpty": "Tidak Ada Data",
                    "infoFiltered": "(disaring dari _MAX_ total data)"
                }
            });
        });
    </script>

</x-app-layout>
