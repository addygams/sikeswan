@extends('layouts/main')

@section('title', 'Pendaftaran Pengobatan di Tempat')

@section('container')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <main class="h-full pb-16 overflow-y-auto">
                @if (session()->has('failed'))
                    <div class="bg-red-400 py-2 mb-2">
                        <h2 class="font-semibold text-xl leading-tight text-black text-center">
                            {{session('failed')}}
                        </h2>
                    </div>
                @endif
                <a href="/layanan1">
                    <button
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-4 mt-3 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Pendaftaran Pengobatan Pasif
                </h4>
                <div class="px-4 py-3 my-8 border-2 border-blue-500 rounded-lg shadow-md">
                    <form name="daftar" action="{{ route('daftars.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-2 grid-rows-3 gap-4">

                        <label class="block text-sm">
                            <span class="text-gray-700 font-bold">Tanggal Pendaftaran<span class="text-red-800">*</span></span>
                            <input type="date"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="tanggal" id="tanggal" min="{{$startDate}}" max="{{$latestKuota}}"/>
                                {{-- <script>
                                    document.getElementById('tanggal').value = new Date().toDateInputValue();
                                </script> --}}
                                @if (count($errors) > 0)
                                    @if ($errors->tanggal)
                                        <h3 class="text-red-600"> Tanggal Pendaftaran Harus Diisi! </h3>
                                    @endif
                                @endif
                        </label>

                        <label class="block text-sm ">
                            <span class="text-gray-700 font-bold">Nama<span class="text-red-800">*</span></span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="nama" id="nama" value="{{old('nama')}}"  placeholder="Nama" />
                            @if (count($errors) > 0)
                                @if ($errors->nama)
                                    <h3 class="text-red-600"> Nama Harus Diisi! </h3>
                                @endif
                            @endif
                        </label>

                        <label class="block text-sm ">
                            <span class="text-gray-700 font-bold">KTP<span class="text-red-800">*</span></span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="ktp" placeholder="ktp" />
                            @if (count($errors) > 0)
                                @if ($errors->ktp)
                                    <h3 class="text-red-600"> Nomor KTP Harus Diisi! </h3>
                                @endif
                            @endif
                        </label>

                        <label class="block text-sm ">
                            <span class="text-gray-700 font-bold">Nomor HP/WA<span class="text-red-800">*</span></span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="hp" placeholder="hp" />
                            @if (count($errors) > 0)
                                @if ($errors->hp)
                                    <h3 class="text-red-600"> Nomor HP Harus Diisi! </h3>
                                @endif
                            @endif
                        </label>

                        <label class="block text-sm" for="jenis_hewan">
                            <span class="text-gray-700 font-bold">
                                Hewan <span class="text-red-800">*</span>
                            </span>
                            <select id="jenis_hewan" name="jenis_hewan" required onchange="hewanlain()"
                                class="border-black block w-full mt-1 text-sm form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple rounded-md ">
                                <option disabled selected>--Pilih Hewan--</option>
                                <option value="anjing">Anjing</option>
                                <option value="kambing">Kambing</option>
                                <option value="kucing">Kucing</option>
                                <option value="kelinci">Kelinci</option>
                                <option value="hamster">Hamster</option>
                                <option value="ayam">Ayam</option>
                                <option value="lain">Lainnya...</option>
                            </select>
                            @if (count($errors) > 0)
                                @if ($errors->jenis_hewan)
                                    <h3 class="text-red-600"> Hewan Harus Diisi! </h3>
                                @endif
                            @endif
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700 font-bold">Hewan Lain : </span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="hl" id="hl" placeholder="hewan lain" />
                            @if (count($errors) > 0)
                                @if ($errors->hl)
                                    <h3 class="text-red-600"> Hewan Harus Diisi! </h3>
                                @endif
                            @endif
                        </label>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <label class="block text-sm mt-3 font-bold">Nama Hewan : <br>
                        <ol style="padding-left: 20px" class="list-decimal">
                            <li><input type="text"
                                    class="block w-full ml-1 mt-3 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="nama_hewan" id="nama_hewan" placeholder="Nama Hewan 1" /></li>
                            <li><input type="text"
                                    class="block w-full ml-1 mt-5 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="nama_hewan2" id="nama_hewan2" placeholder="Nama Hewan 2" /></li>
                            <li><input type="text"
                                    class="block w-full ml-1 mt-5 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                    name="nama_hewan3" id="nama_hewan3" placeholder="Nama Hewan 3"/></li>
                        </ol>
                        </label>

                        <label class="block mt-3 text-sm">
                            <span class="text-gray-700 font-bold">Gejala<span class="text-red-800">*</span></span>
                            <textarea id="gejala" name="gejala"
                                class="h-40 border-black block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"
                                placeholder="Tuliskan Gejala"></textarea>
                            @if (count($errors) > 0)
                                @if ($errors->gejala)
                                    <h3 class="text-red-600"> Gejala Hewan Harus Diisi! </h3>
                                @endif
                            @endif
                        </label>
                    </div>

                        <div class="mt-5">
                            <button type="submit"
                                class="bg-blue-500 text-white py-2 px-4 rounded shadow-sm focus:outline-none hover:bg-indigo-700">Daftar</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection