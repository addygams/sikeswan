<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mb-2 mx-auto sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-700">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="{{ route('tenagamediks.index')}}">
                    <button
                        class="mb-3 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-6 mt-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Masukkan Tenaga Medis
                </h4>
                
                <div class="mt-1 px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('tenagamediks.store') }}" method="POST" 
                        enctype="multipart/form-data">
                        @csrf

                        {{-- <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                              Golongan : 
                            </span>
                            <select
                              class="block w-full mt-1 text-sm border-gray-600 dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                              id="id_golongan" name="id_golongan" required
                            >
                                <option disabled selected >--Pilih Golongan--</option>
                                @foreach ($golongan as $gol)
                                    <option value="{{$gol->id_golongan}}">{{$gol->nama_golongan}}</option>
                                @endforeach
                            </select>
                        </label> --}}

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nama Tenaga Medis</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="nama" placeholder="Nama..." />
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nomor Induk</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="nomor" placeholder="Nomor Induk..." />
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Kategori</span>
                            <select id="jenis" name="jenis" required
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                <option disabled selected>--Pilih Kategori Tenaga Medis--</option>
                                <option value="Dokter">Dokter</option>
                                <option value="Paramedis">Paramedik</option>
                            </select>
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Foto</span>
                            <script>
                                function preview2() {
                                    frame2.src=URL.createObjectURL(event.target.files[0]);
                                }
                            </script>
                            <br>
                            <input class="inline-block" type="file" accept="image/*" name="foto" onchange="preview2()">
                            <img class="inline-block mt-2" id="frame2" width="150px">
                        </label>

                        <div class="mt-5">
                            <button type="submit"
                            class="bg-blue-500 text-white py-2 px-4 rounded shadow-sm focus:outline-none hover:bg-indigo-700">Daftar</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>