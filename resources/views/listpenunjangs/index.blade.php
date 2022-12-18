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
    <!-- component -->

    <div class="mx-auto sm:px-6 lg:px-8 my-3">
        <a href="{{route('listpenunjangs.create')}}">
            <button
                class="ml-5 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                Buat Baru
            </button>
        </a>
        {{-- <div class="float-right">
            <div class="relative w-full max-w-xl mr-6 ">
                <div class="absolute inset-y-0 flex items-center pl-2">
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <form class="inline" action="" method="POST">
                    <input class="pl-8 pr-2 text-sm border-2 border-purple-300 shadow-outline-gray placeholder-gray-600 bg-white border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                        type="search" id="search" name="search" placeholder="Search">
                </form>
            </div>
        </div> --}}
    </div>

    <div class="px-12">
        <table class="w-full sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-2" id="dataTable" style="width: 100%">
            <thead>
                <tr>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Nama</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Keterangan</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Aksi</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ( $listpenunjangs as $listpenunjang )
                    <tr
                        class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nama</span>
                            {{ $listpenunjang->nama }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Keterangan</span>
                            {{ $listpenunjang->keterangan }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Aksi</span>
                            <a href="{{ route('listpenunjangs.edit', $listpenunjang->id) }}" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                            <a href="{{URL::to('/listpenunjangs/destroy/.',$listpenunjang->id) }}" class="text-blue-400 hover:text-blue-600 underline pl-6"
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script>
    $('#search').on('keyup', function(){
        search();
    });
    search();
    function search(){
         var keyword = $('#search').val();
         $.post('{{ route("listpenunjangs.search") }}',
          {
             _token: $('meta[name="csrf-token"]').attr('content'),
             keyword:keyword
           },
           function(data){
            table_post_row(data);
              console.log(data);
           });
    }
    // table row with ajax
    function table_post_row(res){
    let htmlView = '';
    if(res.employees.length <= 0){
        // htmlView+= `
        //    <tr>
        //       <td colspan="4">No data.</td>
        //   </tr>`;
    }
    for(let i = 0; i < res.employees.length; i++){
        htmlView += `
            <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <span
                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nama</span>`
                    +res.employees[i].nama+`
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <span
                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nama</span>`
                    +res.employees[i].keterangan+`
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span
                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Aksi</span>
                        <a href="/listpenunjangs/`+res.employees[i].id+`/edit" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                        <a href="{{URL::to('/listpenunjangs/destroy/.',`+res.employees[i].id+`) }}" class="text-blue-400 hover:text-blue-600 underline pl-6"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Remove</a>
                    </td>
            </tr>`;
    }
         $('tbody').html(htmlView);
    }
    </script> --}}
<div class="mx-28">
    {{-- {{ $tambahans->links() }} --}}
</div>
</x-app-layout>
