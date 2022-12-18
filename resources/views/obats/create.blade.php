<x-app-layout>    
    <div class="py-2">
        <div class="max-w-7xl mb-2 mx-auto sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-700">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="{{ route('obats.index')}}">
                    <button
                        class="mb-3 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-6 mt-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Masukkan Obat
                </h4>
                
                <div class="mt-1 px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('obats.store') }}" method="POST" 
                        enctype="multipart/form-data">
                        @csrf

                        <label class="block text-sm">
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
                          </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nama Obat</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="nama" placeholder="Nama Obat..." />
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Jenis Obat</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="jenis" placeholder="jenis" />
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Kapasitas</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="kapasitas" placeholder="kapasitas" />
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Satuan</span>
                            <select id="satuan" name="satuan" required
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                <option disabled selected>--Pilih Satuan Obat--</option>
                                <option value="ml">Mililiter (ml)</option>
                                <option value="botol">Botol</option>
                                <option value="buah">Buah</option>
                                <option value="cc">CC</option>
                            </select>
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Stok (Botol)</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="stok" placeholder="stok" />
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
