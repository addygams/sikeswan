<x-app-layout>    
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-50">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="{{ route('daftaraktifs.index')}}">
                    <button
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Detail Rekam Medis {{$aktif->nama}}
                </h4>
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('rekamaktifs.update', $aktif) }}" method="POST" 
                        enctype="multipart/form-data">
                        @method('patch')
                        @csrf

                        <div class="mt-4 mx-auto mb-6 px-4">
                            <div class="mx-auto p-6 max-w bg-white rounded-lg border border-gray-200 shadow-md">
                                <h4 class="font-bold">Info Pendaftar</h4>
                                <hr class="border-1 border-black mb-2">
                                <div class="grid grid-cols-2 grid-rows-6 gap-2">

                                <div class="block text-sm">
                                    <span class="font-bold text-gray-700 dark:text-gray-400">Tanggal Pendaftaran</span>
                                    <input type="date"
                                        value="{{$aktif->tanggal}}"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                        name="tanggal" />
                                </div>

                                <div class="block text-sm">
                                    <span class="font-bold text-gray-700 dark:text-gray-400">Nama</span>
                                    <input type="text"
                                        value="{{$aktif->nama}}"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                        name="nama" placeholder="Nama" />
                                </div>

                                <div class="block text-sm">
                                    <span class="font-bold text-gray-700 dark:text-gray-400">KTP</span>
                                    <input type="text"
                                        value="{{$aktif->ktp}}"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                        name="ktp" placeholder="ktp" />
                                </div>

                                <div class="block text-sm">
                                    <span class="font-bold text-gray-700 dark:text-gray-400 font-bold">Kecamatan</span><br>
                                    <select id="kecamatan" name="kecamatan" class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"">
                                        @foreach ($kecamatan as $key => $kecam)
                                            <option value="{{ $key }}" {{ $aktif->kecamatan == $key ? 'selected' : ''}}>{{ $kecam }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="block text-sm">
                                    <span class="font-bold text-gray-700 dark:text-gray-400 font-bold">Kelurahan</span><br>
                                        <select name="kelurahan" id="kelurahan" class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"">
                                            @foreach ($kelurahan as $key => $lurah)
                                                <option value="{{$key}}" {{ $aktif->kelurahan == $key? 'selected' : '' }}>{{$lurah}}</option>
                                            @endforeach
                                        </select>
                                </div>

                                <div class="block text-sm">
                                    <span class="font-bold text-gray-700 dark:text-gray-400">Nomor HP/WA</span>
                                    <input type="number"
                                        value="{{$aktif->hp}}"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                        name="hp" placeholder="hp" />
                                </div>

                                <div class="block text-sm">
                                    <span class="font-bold text-gray-700 dark:text-gray-400 font-bold">Kelompok Ternak</span>
                                    <input type="text"
                                        value="{{$aktif->kelompok}}"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                        name="kelompok" placeholder="Kelompok Ternak" />
                                </div>

                                <div class="block text-sm" for="status">
                                    <span class="font-bold text-gray-700 dark:text-gray-400">
                                        Jenis Pengobatan
                                    </span>
                                    <select id="status" name="status" required
                                        class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                        <option value="hibah" @if($aktif->status == 'hibah') selected @endif >Hibah</option>
                                        <option value="gaduhan" @if($aktif->status == 'gaduhan') selected @endif >Gaduhan</option>
                                        <option value="perseorangan" @if($aktif->status == 'perseorangan') selected @endif >Pribadi perseorangan</option>
                                        <option value="kelompok" @if($aktif->status == 'kelompok') selected @endif >Pribadi anggota kelompok</option>
                                    </select>
                                </div>

                                <div class="block text-sm" for="jenis_hewan">
                                    <span class="font-bold text-gray-700 dark:text-gray-400">
                                        Hewan
                                    </span>
                                    @if ($aktif->jenis_hewan == 'lain')
                                        <input type="text"
                                            id="hl" name="hl"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            value="{{ucwords($aktif->hewan_lain)}}">
                                    @else
                                    <input id="jenis_hewan" name="jenis_hewan"
                                            class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md mt-2"
                                            value="{{ucwords($aktif->jenis_hewan)}}">
                                    @endif
                                    {{-- <select id="jenis_hewan" name="jenis_hewan" required onchange="hewanlain()"
                                        class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                        <option value="sapi_perah" @if($aktif->jenis_hewan == 'sapi_perah') selected @endif >Sapi Perah</option>
                                        <option value="sapi_potong" @if($aktif->jenis_hewan == 'sapi_potong') selected @endif >Sapi Potong</option>
                                        <option value="kerbau" @if($aktif->jenis_hewan == 'kerbau') selected @endif >Kerbau</option>
                                        <option value="kambing" @if($aktif->jenis_hewan == 'kambing') selected @endif >Kambing</option>
                                        <option value="lain" @if($aktif->jenis_hewan == 'lain') selected @endif >Lainnya...</option>
                                    </select> --}}
                                </div>

                                <div class="block text-sm" for="jenkel">
                                    <span class="font-bold text-gray-700 dark:text-gray-400 font-bold">
                                        Jenis Kelamin
                                    </span>
                                    <select id="jenkel" name="jenkel" required
                                        class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                        <option value="jantan" @if($aktif->jenkel == 'jantan') selected @endif >Jantan</option>
                                        <option value="betina" @if($aktif->jenkel == 'betina') selected @endif >Betina</option>
                                    </select>
                                </div>

                                <div class="block text-sm">
                                    <span class="font-bold text-gray-700 dark:text-gray-400 font-bold">Umur</span>
                                    <input type="text"
                                        value="{{$aktif->umur}}"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                        name="umur" id="umur" placeholder="Umur"
                                        />
                                </div>

                                <div class="block text-sm">
                                    <span class="font-bold text-gray-700 dark:text-gray-400 font-bold">Ciri Khusus</span>
                                    <input
                                        type="text"
                                        id="ciri_khusus" name="ciri_khusus"
                                        class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"
                                        value="{{$aktif->ciri_khusus}}"
                                        placeholder="Tuliskan Ciri Khusus">
                                </div>
                            </div>

                            <div class="block text-sm mt-2">
                                <span class="font-bold text-gray-700 dark:text-gray-400">Gejala</span>
                                <textarea
                                    type="text"
                                    id="gejala" name="gejala"
                                    class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"
                                    {{-- value="{{$aktif->gejala}}" --}}
                                    placeholder="Tuliskan Gejala">{{$aktif->gejala}}</textarea>
                            </div>

                            </div>
                        </div>

                        <div class="mt-4 mx-auto mb-4 px-4">
                            <div class="mx-auto p-6 max-w bg-white rounded-lg border border-gray-200 shadow-md">
                                <h4 class="font-bold">Hasil Periksa</h4>
                                <hr class="border-1 border-black mb-2">
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="block text-sm">
                                        <h3 class="mb-2 font-bold text-gray-900 dark:text-white">Dokter</h3>
                                        <ul class="w-full text-sm font-medium text-gray-900 rounded-lg">
                                            <div class="grid grid-cols-2 gap-2">
                                            @for ($i = 0; $i < count($dokters); $i++)
                                                @php
                                                    $checked = false;
                                                @endphp
                                                @foreach ($tenagamedis as $medis)
                                                    @if ($medis->id_aktif == $aktif->id && $medis->id_tenagamedis == $dokters[$i]->id)
                                                        @php
                                                            // dd($medis);
                                                            $checked = true;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                <li class="w-full rounded-lg border-2 border-black hover:bg-gray-100 dark:border-gray-600">
                                                    <div class="flex items-center pl-3">
                                                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" name="dokter[]"
                                                            value="{{ $dokters[$i]->id }}"
                                                            @if ($checked) checked @endif
                                                            >
                                                        <div class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{ $dokters[$i]->nama }}</div>
                                                    </div>
                                                </li>
                                                @endfor
                                            </div>
                                        </ul>
                                    </div>
                                    {{-- <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Dokter</span>
                                        @foreach ($dokters as $dokter)
                                            <br>
                                            <input type="checkbox" class="form-checkbox" name="dokter[]"
                                                value="{{ $dokter->nama }}"
                                                {{ is_array($aktif->dokter) && in_array($dokter->nama, $aktif->dokter) ? ' checked' : '' }}>
                                            <span class="ml-2">{{ $dokter->nama }}</span>
                                        @endforeach
                                    </div> --}}

                                    <div class="block text-sm">
                                        <h3 class="mb-2 font-bold text-gray-900 dark:text-white">Paramedis</h3>
                                        <ul class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg">
                                            <div class="grid grid-cols-2 gap-2">
                                            @for ($i = 0; $i < count($paramediks); $i++)
                                            <li class="w-full rounded-lg border-2 border-black hover:bg-gray-100">
                                                <div class="flex items-center pl-3">
                                                    <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" name="paramedik[]"
                                                        value="{{ $paramediks[$i]->id }}"
                                                        @foreach ($tenagamedis as $param)
                                                            @if ($param->id_aktif == $aktif->id && $param->id_tenagamedis == $paramediks[$i]->id) checked @endif
                                                        @endforeach
                                                        >
                                                    <div class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{ $paramediks[$i]->nama }}</div>
                                                </div>
                                            </li>
                                            @endfor
                                            </div>
                                        </ul>
                                    </div>
                                </div>

                                    {{-- <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Paramedis</span>
                                        @foreach ($paramediks as $paramedik)
                                            <br>
                                            <input type="checkbox" class="form-checkbox" name="paramedik[]"
                                                value="{{ $paramedik->nama }}"
                                                {{ is_array($aktif->paramedik) && in_array($paramedik->nama, $aktif->paramedik) ? ' checked' : '' }}>
                                            <span class="ml-2">{{ $paramedik->nama }}</span>
                                        @endforeach
                                    </div> --}}
                                <div class="grid grid-row-2 gap-2">
                                    <div class="block text-sm mt-2">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Anamnesa </span>
                                        <textarea type="text"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="anamnesa" id="anamnesa" placeholder="Anamnesa.."
                                            value="" />{{ $aktif->anamnesa }}</textarea>
                                    </div>

                                    <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Diagnosa</span>
                                        <textarea type="text"
                                            value=""
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="diagnosa" id="diagnosa" placeholder="Diagnosa" />{{$aktif->diagnosa}}</textarea>
                                    </div>
                                </div>

                                <div class="grid grid-row-2 gap-2 mt-2">
                                    <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Terapi Tambahan : </span>
                                        <select id="terapi" name="terapi" required
                                            class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                            <option disabled selected>--Pilih Terapi Tambahan--</option>
                                            @foreach ($tambahans as $tambahan)
                                                <option value="{{ $tambahan->nama }}" {{ old('tambahans') == $tambahan ? 'selected' : ''}} >{{ $tambahan->nama }}
                                                    ({{ $tambahan->keterangan }})</option>
                                                {{-- <option value="{{ $key }}" {{ old('kecamatan') == $key ? 'selected' : ''}}>{{ $kecam }}</option> --}}
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Tindakan Selanjutnya : </span>
                                        <input type="text"
                                            value="{{$aktif->tambahan}}"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="tambahan" id="tambahan" placeholder="Tindakan Selanjutnya.." />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 ml-4">
                            <button type="submit"
                                class="bg-blue-500 text-white py-2 px-4 rounded shadow-sm focus:outline-none hover:bg-indigo-700">Simpan</button>
                        </div>
                    </form>
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
