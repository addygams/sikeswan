<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="{{ route('daftaraktifs.index')}}">
                    <button
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-4 mt-3 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Detail Pengobatan Aktif {{$daftar->nama}}
                </h4>
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400 font-bold">Tanggal Pendaftaran</span>
                        <input type="date"
                            value="{{$daftar->tanggal}}"
                            disabled
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                            name="tanggal" />
                    </label>

                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400 font-bold">Nama</span>
                        <input type="text"
                            value="{{$daftar->nama}}"
                            disabled
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                            name="nama" placeholder="Nama" />
                    </label>

                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400 font-bold">Kecamatan</span><br>
                        <select id="kecamatan" name="kecamatan" class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"">
                            <option value="{{ $daftar->kecamatan }}"> {{ $daftar->kecamatan }}</option>
                        </select>
                    </label>

                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400 font-bold">Kelurahan</span><br>
                            <select name="kelurahan" id="kelurahan" class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"">
                                <option value="{{$daftar->kelurahan}}" selected disabled>{{$daftar->kelurahan}}</option>
                            </select>
                    </label>

                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400 font-bold">Nomor HP/WA</span>
                        <input type="number"
                            value="{{$daftar->hp}}"
                            disabled
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                            name="hp" placeholder="hp" />
                    </label>

                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400 font-bold">Kelompok Ternak</span>
                        <input type="text"
                            value="{{$daftar->kelompok}}"
                            disabled
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                            name="kelompok" placeholder="Kelompok Ternak" />
                    </label>

                    <label class="block mt-4 text-sm" for="jenis_hewan">
                        <span class="text-gray-700 dark:text-gray-400 font-bold">
                            Hewan
                        </span>
                        <select id="jenis_hewan" name="jenis_hewan" required onchange="hewanlain()"
                            class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                            <option disabled selected>{{ucwords($daftar->jenis_hewan)}}</option>
                        </select>
                    </label>

                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400 font-bold">Hewan Lain</span>
                        <input type="text"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md "
                            value="{{$daftar->hewan_lain}}"
                            disabled
                            name="hl" id="hl" placeholder="hewan lain" />
                    </label>

                    <label class="block mt-4 text-sm" for="jenkel">
                        <span class="text-gray-700 dark:text-gray-400 font-bold">
                            Jenis Kelamin
                        </span>
                        <select id="jenkel" name="jenkel" required
                            class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"
                            >
                            <option value="jantan" @if($daftar->jenkel == 'jantan') selected @endif >Jantan</option>
                            <option value="betina" @if($daftar->jenkel == 'betina') selected @endif >Betina</option>
                        </select>
                    </label>

                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400 font-bold">Umur</span>
                        <input type="text"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                            value="{{$daftar->umur}}"
                            name="umur" id="umur" placeholder="Umur"
                            />
                    </label>

                    <label class="block mt-4 text-sm" for="jenis_pengobatan">
                        <span class="text-gray-700 dark:text-gray-400 font-bold">
                            Jenis Pengobatan
                        </span>
                        <select id="jenis_pengobatan" name="jenis_pengobatan" required
                            class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                            {{-- <option disabled selected value=""> {{$daftar->jenis_pengobatan}}</option> --}}
                            <option value="hibah" @if($daftar->status == 'hibah') selected @endif >Hibah</option>
                            <option value="gaduhan" @if($daftar->status == 'gaduhan') selected @endif >Gaduhan</option>
                            <option value="perseorangan" @if($daftar->status == 'perseorangan') selected @endif >Pribadi perseorangan</option>
                            <option value="kelompok" @if($daftar->status == 'kelompok') selected @endif >Pribadi anggota kelompok</option>
                        </select>
                    </label>

                    <label class="block mt-3 text-sm">
                        <span class="text-gray-700 dark:text-gray-400 font-bold">Ciri Khusus</span>
                        <textarea id="ciri_khusus" name="ciri_khusus"
                            class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"
                            {{-- value="{{$daftar->ciri_khusus}}" --}}
                            rows="3" placeholder="Tuliskan Ciri Khusus">{{$daftar->ciri_khusus}}</textarea>
                    </label>

                    <label class="block mt-3 text-sm">
                        <span class="text-gray-700 dark:text-gray-400 font-bold">Gejala</span>
                        <textarea id="gejala" name="gejala"
                            class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"
                            {{-- value="{{$daftar->gejala}}" --}}
                            rows="3" placeholder="Tuliskan Gejala">{{$daftar->gejala}}</textarea>
                    </label>
                </div>
            </main>
        </div>
    </div>
    <script>
        $('#kecamatan').change(function() {
            var id_kecamatan = $(this).val();
            if (id_kecamatan) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('getKelurahan') }}?id_kecamatan=" + id_kecamatan,
                    success: function(res) {
                        if (res) {
                            $("#kelurahan").empty();
                            $("#kelurahan").append('<option disabled>Pilih Kelurahan</option>');
                            $.each(res, function(key, value) {
                                $("#kelurahan").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        } else {
                            $("#kelurahan").empty();
                        }
                    }
                });
            } else {    
                $("#kelurahan").empty();
            }
        });    
    </script>
</x-app-layout>