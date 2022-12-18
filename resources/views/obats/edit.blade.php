<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="{{ route('obats.index')}}">
                    <button
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-5 mt-1 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Obat
                </h4>
                <div class="border-2 border-blue-400 px-2 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('obats.update',$obat->id) }}" method="POST" 
                        enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="grid grid-cols-2 grid-rows-3 gap-2">
                            <label class="block text-sm mt-1">
                                <span class="text-gray-700 font-bold dark:text-gray-400">Nama</span>
                                <input type="text"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="nama" placeholder="nama" value="{{$obat->nama}}" />
                            </label>

                            <label class="block text-sm mt-2">
                                <span class="text-gray-700 font-bold dark:text-gray-400 font-bold">Golongan</span><br>
                                <select id="golongan" name="golongan" class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"">
                                    @foreach ($golongan as $key => $gol)
                                        <option value="{{ $key }}" {{ $obat->golongan == $key ? 'selected' : ''}}>{{ $gol }}</option>
                                    @endforeach
                                </select>
                            </label>

                            <label class="block text-sm mt-1">
                                <span class="text-gray-700 font-bold dark:text-gray-400">Jenis Obat</span>
                                <input type="text"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="jenis" placeholder="jenis obat" value="{{$obat->jenis}}" />
                            </label>

                            <label class="block text-sm mt-1">
                                <span class="text-gray-700 font-bold dark:text-gray-400">Kapasitas</span>
                                <input type="number"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="kapasitas" placeholder="Kapasitas Obat..." value="{{$obat->kapasitas}}" />
                            </label>

                            <label class="block text-sm mt-1">
                                <span class="text-gray-700 font-bold dark:text-gray-400">Stok</span>
                                <input type="number"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="stok" placeholder="Stok Obat..." value="{{$obat->stok}}" />
                            </label>
                            
                            {{-- <label class="block text-sm mt-1">
                                <span class="text-gray-700 font-bold dark:text-gray-400">Satuan</span>
                                <input type="text"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="satuan" placeholder="Satuan Obat..." value="{{$obat->satuan}}" />
                            </label> --}}

                            <label class="block text-sm mt-1">
                                <span class="text-gray-700 font-bold dark:text-gray-400">Sisa</span>
                                <input type="number"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="sisa" placeholder="Sisa Obat..." value="{{$obat->sisa}}" />
                            </label>
                        </div>

                        <div class="mt-5">
                            <button type="submit"
                                class="bg-blue-500 text-white py-2 px-4 rounded shadow-sm focus:outline-none hover:bg-indigo-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>