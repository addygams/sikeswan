<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-50">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="{{ route('tambahans.index')}}">
                    <button
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-4 mt-3 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Terapi Tambahan
                </h4>
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('tambahans.update',$tambahan->id) }}" method="POST" 
                        enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">Nama</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="nama" placeholder="nama" value="{{$tambahan->nama}}" />
                        </label>

                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">Keterangan</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="keterangan" placeholder="keterangan" value="{{$tambahan->keterangan}}" />
                        </label>
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