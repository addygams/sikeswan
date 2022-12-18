<x-app-layout>    
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-50">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="{{ route('daftars.index')}}">
                    <button
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-4 mt-3 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Pendaftaran
                </h4>
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('daftars.store') }}" method="POST" 
                        enctype="multipart/form-data">
                        @csrf

                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Tanggal Pendaftaran</span>
                            <input type="date"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="tanggal" />
                        </label>

                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">Nama</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="nama" placeholder="Nama" />
                        </label>

                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">KTP</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="ktp" placeholder="ktp" />
                        </label>

                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">Nomor HP/WA</span>
                            <input type="number"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="hp" placeholder="hp" />
                        </label>

                        <label class="block mt-4 text-sm" for="jenis_pengobatan">
                            <span class="text-gray-700 dark:text-gray-400">
                                Jenis Pengobatan
                            </span>
                            <select id="jenis_pengobatan" name="jenis_pengobatan" required onchange="getCategory()"
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                <option disabled selected>--Pilih Jenis Pengobatan--</option>
                                <option value="kesayangan">Pengobatan Hewan Kesayangan</option>
                                <option value="gaduhan">Pelayanan kesehatan ternak bantuan pemerintah (gaduhan)</option>
                                <option value="dinas">Pelayanan kesehatan ternak  Kelompok binaan dinas</option>
                            </select>
                        </label>

                        <label class="block mt-4 text-sm" for="jenis_hewan">
                            <span class="text-gray-700 dark:text-gray-400">
                                Hewan
                            </span>
                            <select id="jenis_hewan" name="jenis_hewan" required onchange="hewanlain()"
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                <option disabled selected>--Pilih Hewan--</option>
                            </select>
                        </label>

                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">Hewan Lain : </span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="hl" id="hl" placeholder="hewan lain" />
                        </label>

                        <label class="block text-sm mt-3">Nama Hewan : <br></label>
                        <ol style="padding-left: 20px" class="list-decimal">
                            <li><input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="nama_hewan" id="nama_hewan"/><br></li>
                            <li><input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="nama_hewan2" id="nama_hewan2" placeholder="hewan lain" /><br></li>
                            <li><input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="nama_hewan3" id="nama_hewan3" placeholder="hewan lain" /><br></li>
                        </ol>

                        <label class="block mt-3 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Gejala</span>
                            <textarea id="gejala" name="gejala"
                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"
                                rows="3" placeholder="Tuliskan Gejala"></textarea>
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