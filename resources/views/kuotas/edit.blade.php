<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <main class="h-full pb-16 overflow-y-auto">
                <div class="mt-4 mx-auto mb-10 px-4">
                    <a href="{{ route('kuotas.index') }}">
                        <button
                            class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                            Kembali
                        </button>
                    </a>
                    <h4 class="mb-6 mt-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
                      Edit Kuota
                    </h4>
                    <div class="mx-auto p-6 max-w bg-white rounded-lg border border-gray-200 shadow-md">
                    {{-- <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"> --}}
                        <form name="daftar" action="{{ route('kuotas.update',$kuota->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <label class="block text-sm">
                                <span class="font-bold text-gray-700 dark:text-gray-400">Tanggal</span>
                                <input type="date"
                                {{-- value="{{ \Carbon\Carbon::parse($kuota->tanggal)->format('d M Y') }}" --}}
                                    value="{{$kuota->tanggal}}"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    disabled
                                    name="tanggal" />
                            </label>
                            <label class="block text-sm mt-6">
                                <span class="font-bold text-gray-700 dark:text-gray-400">Kuota</span>
                                <input type="number"
                                value="{{$kuota->kuota}}"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="kuota" placeholder="Masukkan jumlah kuota..." />
                            </label>
                            <div class="mt-5">
                                <button type="submit"
                                    class="bg-blue-500 text-white py-2 px-4 rounded shadow-sm focus:outline-none hover:bg-indigo-700">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
