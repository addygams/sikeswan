<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-50">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="{{ route('rekampasifs.index') }}">
                    <button
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-4 mt-3 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Rekam Medis Pasif
                </h4>
                <div class="px-4 py-3 mb-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('rekampasifs.update', $rekampasif->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="mt-4 mx-auto mb-10 px-4">
                            <div class="mx-auto p-6 max-w bg-white rounded-lg border border-gray-200 shadow-md">
                                <h4 class="font-bold">Info Pendaftar</h4>
                                <hr class="border-1 border-black mb-2">
                                <div class="grid grid-cols-2 grid-rows-2 gap-2">
                                    <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Tanggal Pendaftaran</span>
                                        <input type="date"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="tanggal" value="{{ $rekampasif->tanggal }}" />
                                    </div>

                                    <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Nama</span>
                                        <input type="text"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="nama" placeholder="Nama" value="{{ $rekampasif->nama }}" />
                                    </div>

                                    <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">KTP</span>
                                        <input type="text"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="ktp" placeholder="ktp" value="{{ $rekampasif->ktp }}" />
                                    </div>

                                    <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Nomor HP/WA</span>
                                        <input type="number"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="hp" placeholder="hp" value="{{ $rekampasif->hp }}" />
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 grid-rows-2 gap-2">
                                    <div class="row-span-2">
                                        <div class="block text-sm mt-2">
                                            <span class="text-gray-700 dark:text-gray-400 font-bold">Alamat</span>
                                                <textarea id="alamat" name="alamat" placeholder="Tulis alamat pasien..."
                                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md mt-2"
                                                rows="5">{{$rekampasif->alamat}}</textarea>
                                        </div>
                                    </div>

                                    <div class="block text-sm mt-2">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Kecamatan<span class="text-red-800">*</span></span><br>
                                        <select id="kecamatan" name="kecamatan" class="border-black block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"">
                                            <option value="" selected disabled>Pilih Kecamatan</option>
                                            @foreach ($kecamatan as $key => $kecam)
                                                <option value="{{ $key }}"> {{ $kecam }}</option>
                                            @endforeach
                                        </select>
                                        @if (count($errors) > 0)
                                            @if ($errors->kecamatan)
                                                <h3 class="text-red-600"> Kecamatan Harus Diisi! </h3>
                                            @endif
                                        @endif
                                    </div>
            
                                    <div class="block text-sm mt-2">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Kelurahan<span class="text-red-800">*</span></span><br>
                                        <select name="kelurahan" id="kelurahan" class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"">
                                            <option value="" selected disabled>Pilih Kelurahan</option>
                                        </select>
                                        @if (count($errors) > 0)
                                            @if ($errors->kelurahan)
                                                <h3 class="text-red-600"> Kelurahan Harus Diisi! </h3>
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 grid-rows-2 gap-2">
                                    <div class="row-span-2">
                                        <div class="block text-sm mt-3 font-bold">Nama Hewan : <br></div>
                                        <ol style="padding-left: 20px" class="list-decimal">
                                            <li><input type="text"
                                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                                    name="nama_hewan" id="nama_hewan" value="{{ $rekampasif->nama_hewan }}" /></li>
                                            <li><input type="text"
                                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                                    name="nama_hewan2" id="nama_hewan2" value="{{ $rekampasif->nama_hewan2 }}" placeholder="hewan lain" /></li>
                                            <li><input type="text"
                                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                                    name="nama_hewan3" id="nama_hewan3" value="{{ $rekampasif->nama_hewan3 }}" placeholder="hewan lain" /></li>
                                        </ol>
                                    </div>

                                    <div class="block mt-4 text-sm" for="jenis_hewan">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">
                                            Hewan
                                        </span>
                                            @if ($rekampasif->jenis_hewan == 'lain')
                                            <input id="hewan_lain" name="hewan_lain" required onchange="hewanlain()"  
                                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"
                                                value="{{$rekampasif->hewan_lain}}">
                                            @else
                                            <input id="jenis_hewan" name="jenis_hewan" required onchange="hewanlain()" readonly
                                                class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"
                                                value="{{$rekampasif->jenis_hewan}}">
                                            @endif
                                    </div>

                                    <div class="block mt-2 text-sm ">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Gejala</span>
                                        <input id="gejala" name="gejala" value="{{ $rekampasif->gejala }}" 
                                            class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 mx-auto mb-10 px-4">
                            <div class="mx-auto p-6 max-w bg-white rounded-lg border border-gray-200 shadow-md ">
                                <h4 class="font-bold">Ruang Periksa</h4>
                                <hr class="border-1 border-black mb-2">
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="block text-sm">
                                        <h3 class="mb-2 font-bold text-gray-900 dark:text-white">Dokter</h3>
                                        <ul class="w-full text-sm font-medium text-gray-900 rounded-lg">
                                            <div class="grid lg:grid-cols-2 gap-2">
                                            @for ($i = 0; $i < count($dokters); $i++)
                                                @php
                                                    $checked = false;
                                                @endphp
                                                @foreach ($tenagamedis as $medis)
                                                    @if ($medis->id_pasif == $rekampasif->id && $medis->id_tenagamedis == $dokters[$i]->id)
                                                        @php
                                                            $checked = true;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                <li class="w-full rounded-lg border-2 border-black hover:bg-gray-100 dark:border-gray-600">
                                                    <div class="flex items-center pl-3">
                                                        <input type="checkbox" class="lg:w-4 lg:h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" name="dokter[]"
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

                                    <div class="block text-sm">
                                        <h3 class="mb-2 font-bold text-gray-900 dark:text-white">Paramedis</h3>
                                            <ul class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg">
                                                <div class="grid lg:grid-cols-2 gap-2">
                                                @for ($i = 0; $i < count($paramediks); $i++)
                                                <li class="w-full rounded-lg border-2 border-black hover:bg-gray-100">
                                                    <div class="flex items-center pl-3">
                                                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" name="paramedik[]"
                                                            value="{{ $paramediks[$i]->id }}"
                                                            @foreach ($tenagamedis as $param)
                                                                @if ($param->id_pasif == $rekampasif->id && $param->id_tenagamedis == $paramediks[$i]->id) checked @endif
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

                                <div class="grid grid-cols-2 gap-2">
                                    <div class="block text-sm mt-2 col-span-2">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Anamnesa </span>
                                        <textarea type="text"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                        name="anamnesa" id="anamnesa" placeholder="Anamnesa.."
                                        />{{ $rekampasif->anamnesa }}</textarea>
                                    </div>
                                </div>
                                    
                                <div class="grid grid-cols-2 grid-rows-4 gap-2">
                                    <div class="block text-sm mt-2">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Suhu : </span>
                                        <input type="number"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="suhu" id="suhu" placeholder="Suhu... (derajat celcius)"
                                            value="{{ $rekampasif->suhu }}" />
                                    </div>

                                    <div class="block text-sm mt-2">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Pulsus : </span>
                                        <input type="number"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="pulsus" id="pulsus" placeholder="Pulsus... (kali per menit)"
                                            value="{{ $rekampasif->pulsus }}" />
                                    </div>

                                    <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Frekuensi Napas : </span>
                                        <input type="number"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="frekuensi" id="frekuensi" placeholder="frekuensi... (kali per menit)"
                                            value="{{ $rekampasif->frekuensi }}" />
                                    </div>

                                    <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Berat : </span>
                                        <input type="number" step="0.01"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="berat" id="berat" placeholder="Berat badan... (kg)"
                                            value="{{ $rekampasif->berat }}" />
                                    </div>

                                    <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Pemeriksaan Khusus : </span>
                                        <input type="text"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="khusus" id="khusus" placeholder="Pemeriksaan Khusus.."
                                            value="{{ $rekampasif->khusus }}" />
                                    </div>

                                    <div class="block text-sm" for="pair">
                                        <span class="my-2 text-gray-700 dark:text-gray-400 font-bold">Diagnosa Sementara : </span>
                                        <br>
                                        <select class="mt-2 selectpicker" style="width: 100%" id="diags" name="diags" required
                                            class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                            @foreach ($diagnosasementara as $diags)
                                                <option value="{{ $diags->inisial }}">{{ $diags->inisial }}
                                                    ({{ $diags->kepanjangan }})</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Diagnosa Akhir : </span>
                                        <input type="text"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="diaga" id="diaga" placeholder="Diagnosa Akhir.." />
                                    </div>
                                    
                                    <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Terapi Tambahan : </span>
                                        <select id="terapi" name="terapi" required
                                            class="border-black block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                            <option disabled selected>--Pilih Terapi Tambahan--</option>
                                            @foreach ($tambahans as $tambahan)
                                                <option value="{{ $tambahan->nama }}">{{ $tambahan->nama }}
                                                    ({{ $tambahan->keterangan }})</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- <div class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Terapi (Dosis) : </span>
                                        <input type="number"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="dosis_terapi" id="dosis_terapi" placeholder="Dosis Terapi.." />
                                    </div> --}}

                                    <div class="block text-sm col-span-2">
                                        <span class="text-gray-700 dark:text-gray-400 font-bold">Catatan Tambahan : </span>
                                        <textarea 
                                            class="block w-full mt-1 text-sm border-black dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                            name="tambahan" id="tambahan" placeholder="Catatan Tambahan.." /></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="block text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-700 dark:text-gray-400 font-bold mb-2">
                                    Obat
                                </span>
                                    <button type="button" name="add" id="dynamic-ar2"
                                    class="float-right bg-blue-500 hover:bg-blue-700 text-white font-bold align-middle mb-2 mr-2 py-1 px-2 border border-blue-500 rounded">Tambah Baris Obat</button>
                            </div>
                            <table class="w-full border-collapse block mt-2 md:table" id="dynamicAddRemove2">
                                <tr
                                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <th
                                        class="w-5/12 p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                        Obat</th>
                                    <th
                                        class="w-4/12 p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                        Dosis</th>
                                    <th
                                        class="w-3/12 p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                        Action</th>
                                </tr>
                                @foreach ($obatpakai as $pakai)
                                    <tr
                                        class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                        <td
                                        class="w-6/12 lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Obat</span>
                                            <select id="selectt{{$loop->index}}" name="obat[]"
                                                class="border-black block w-9/12 mx-auto text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                                    <option selected value="{{$pakai->id_obat}}">{{$pakai->obat->nama}}</option>
                                                @foreach ($golongan as $gol)
                                                    <option disabled
                                                        class="font-bold text-black-800">{{ $gol->nama_golongan }}</option>
                                                    @foreach ($gol->obat as $obat)
                                                        <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </td>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#selectt{{$loop->index}}').select2();
                                            });
                                        </script>
                                        <td class="w-6/12 lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                            <input type="number" class="mx-auto mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md mt-2 w-10/12"
                                                name="dosis_obat[]" id="dosis_obat" placeholder="Dosis Obat.."  value="{{$pakai->dosis_obat}}"  />
                                        </td>
                                        <td class="w-6/12 lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static" >
                                            <a href="{{ URL::to('/rekampasifs/deleteObat/.', $pakai->id) }}"
                                                class="ml-4 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr
                                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Obat</span>
                                        <select id="obat" name="obat[]"
                                            class="required border-black block w-9/12 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md selectt">
                                            <option></option>
                                            @foreach ($golongan as $golong)
                                                <option disabled value="{{ $golong->id_golongan }}"
                                                    class="font-bold text-black-800">{{ $golong->nama_golongan }}</option>
                                                @foreach ($golong->obat as $obat)
                                                    <option value="{{ $obat->id }}" {{old('obat') == $obat->id ? "selected" : ""}}>{{ $obat->nama }}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                        @if (count($errors) > 0)
                                            @if ($errors->obat)
                                                <h3 class="text-red-600"> Obat Harus Diisi! </h3>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="w-6/12 lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <input type="number" class="required mx-auto block w-9/12 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md mt-2 w-10/12"
                                            name="dosis_obat[]" id="dosis_obat" placeholder="Dosis Obat.." />
                                        @if (count($errors) > 0)
                                            @if ($errors->dosis_obat)
                                                <h3 class="text-red-600"> Dosis Harus Diisi! </h3>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="w-6/12 lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static" >
                                        <button type="button"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded remove-input-field">Hapus</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400 font-bold">
                                Pemeriksaan Penunjang
                            </span>
                            <button type="button" name="add" id="dynamic-ar"
                                        class="float-right bg-blue-500 hover:bg-blue-700 text-white font-bold align-middle mb-2 mr-2 py-1 px-2 border border-blue-500 rounded">Tambah Baris Penunjang</button>
                            <table class="w-full border-collapse block mt-2 md:table" id="dynamicAddRemove">
                                <tr
                                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <th
                                        class="w-5/12 p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                        Nama</th>
                                    <th
                                        class="w-4/12 p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                        Foto</th>
                                    <th
                                        class="w-3/12 p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                        Action</th>
                                </tr>
                                @if (count($penunjang) === 0)
                                {{-- @dd($penunjang) --}}
                                @else
                                @foreach ($penunjang as $penunjang)
                                {{-- @dd($loop->index) --}}
                                    <tr
                                        class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                        <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        {{-- @dd($penunjang->nama) --}}
                                            <span
                                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nama</span>
                                                <select id="penunjang" name="penunjang[]"
                                                    class="mx-auto border-black block w-9/12 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                                    {{-- <option disabled selected value="{{$penunjang[$i]->nama}}">{{ucwords($penunjang[$i]->nama)}}</option> --}}
                                                    <option selected value="{{$penunjang->nama}}">{{ucwords($penunjang->nama)}}</option>
                                                    @foreach ($listpenunjangs as $listpenunjang)
                                                        <option value="{{ $listpenunjang->nama }}">{{ $listpenunjang->nama }}
                                                            ({{ $listpenunjang->keterangan }})</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td
                                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                                <span
                                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Foto</span>
                                                    <img class="block mt-2 mx-auto" name="frame[{{$loop->index}}]" id="framee{{$loop->index}}" width="150px">
                                                    <img id="hidetest{{$loop->index}}" class="block mx-auto" width="150px" src="{{ asset('/storage/packages/' . $penunjang->foto) }}">
                                                    <input class="block mt-1 pl-16 mx-auto" type="file" accept="image/*" name="foto[]" onchange="preview{{$loop->index}}()">
                                                    <script>
                                                        function preview{{$loop->index}}() {
                                                            framee{{$loop->index}}.src=URL.createObjectURL(event.target.files[0]);
                                                            x = document.getElementById("hidetest{{$loop->index}}");
                                                            x.style.display = "none";   
                                                        }
                                                    </script>
                                            </td>
                                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                                <a href="{{ URL::to('/rekampasifs/delete/.', $penunjang->id) }}"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold align-middle py-1 px-2 border border-red-500 rounded">Hapus</a>
                                            </td>
                                    </tr>
                                    {{-- @endfor --}}
                                    @endforeach
                                @endif
                                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nama</span>
                                        <select id="penunjang" name="penunjang[]"
                                            class="mx-auto border-black block w-9/12 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md">
                                            @foreach ($listpenunjangs as $listpenunjang)
                                                <option value="{{ $listpenunjang->nama }}">{{ $listpenunjang->nama }}
                                                    ({{ $listpenunjang->keterangan }})</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Foto</span>
                                        <script>
                                            function preview2() {
                                                frame2.src=URL.createObjectURL(event.target.files[0]);
                                            }
                                        </script>
                                        <img class="block mx-auto mt-2" id="frame2" width="150px">
                                        <input class="block mx-auto pl-16 mt-1" type="file" accept="image/*" name="foto[]" onchange="preview2()">
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <button type="button"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold align-middle py-1 px-2 border border-red-500 rounded remove-input-field">Hapus</button>
                                    </td>
                                </tr>
                            </table>
                            <script>
                                function preview() {
                                    frame.src=URL.createObjectURL(event.target.files[0]);
                                }

                                var i = 100;
                                $("#dynamic-ar").click(function() {
                                    ++i;
                                    $("#dynamicAddRemove").append('<tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0"> <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nama</span> <select id="penunjang" name="penunjang[]" class="mx-auto border-black block w-9/12 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"> @foreach ($listpenunjangs as $listpenunjang) <option value="{{ $listpenunjang->nama }}">{{ $listpenunjang->nama }} ({{ $listpenunjang->keterangan }})</option> @endforeach </select> </td> <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Foto</span> <img class="block mx-auto mt-2" id="frame" width="150px" height="auto"> <input class="block mx-auto pl-16 mt-1" type="file" accept="image/*" name="foto[]" onchange="preview()">  </td> <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> <button type="button" name="add" id="dynamic-ar" class="bg-red-500 hover:bg-red-700 text-white font-bold align-middle py-1 px-2 border border-red-500 rounded remove-input-field">Hapus</button></td></tr>'
                                    );
                                });

                                $("#dynamic-ar2").click(function() {
                                    ++i;
                                    $("#dynamicAddRemove2").append('<tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0"> <td class="w-6/12 lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Obat</span><select id="selectt'+i+'" name="obat[]" class="border-black block w-9/12 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md selectt"> <option></option> @foreach ($golongan as $gol) <option disabled value="{{ $gol->id_golongan }}" class="font-bold text-black-800">{{ $gol->nama_golongan }}</option> @foreach ($gol->obat as $obat) <option value="{{ $obat->id }}">{{ $obat->nama }}</option> @endforeach @endforeach </select> </td> <td class="w-6/12 lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> <input type="number" class="mx-auto mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md mt-2 w-10/12" name="dosis_obat[]" id="dosis_obat" placeholder="Dosis Obat.."/> </td> <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> <button type="button" class="ml-4 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded remove-input-field">Hapus</button> </td> </tr>'
                                    );
                                    $("#dynamicAddRemove2").append('<script type="text/javascript"> $(document).ready(function() { $("#selectt'+i+'").select2(); }); </'+'script>');
                                });

                                $(document).on('click', '.remove-input-field', function () {
                                    $(this).parents('tr').remove();
                                });

                            </script>
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
    @push('scripts')
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.selectpicker').select2();
        });

        $(document).ready(function() {
            $('#selectt5').select2();
        });

        $(document).ready(function() {
            $('.selectt').select2();
        });
 
    </script>
    @endpush
</x-app-layout>

