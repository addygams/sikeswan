@extends('layouts/main')

@section('title', 'Pengobatan di Tempat')

@section('container')
    <section class="mx-2 text-gray-600 body-font">
        <div class="flex flex-col text-center w-full mt-8 mb-8">
            <h1 class="sm:text-3xl text-xl font-bold title-font text-gray-900">LAYANAN PENGOBATAN</h1>
            <div class="flex mt-2 justify-center">
                <div class="w-24 h-1 rounded-full bg-purple-800 inline-flex"></div>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="bg-green-400 py-2 mb-2">
                <h2 class="font-semibold text-xl leading-tight text-black text-center">
                    {{session('success')}}
                </h2>
            </div>
        @endif

        @if (session()->has('failed'))
            <div class="bg-red-400 py-2 mb-2">
                <h2 class="font-semibold text-xl leading-tight text-black text-center">
                    {{session('failed')}}
                </h2>
            </div>
        @endif
        <div class="px-5 mx-auto">
            <div class="flex flex-wrap -mx-4 -mb-10 text-center">
                <div class="sm:w-1/2 mb-10 px-4">
                    <div class="rounded-lg h-64 overflow-hidden">
                    <img alt="content" class="object-cover object-center h-full w-full" src="images/Layanan 1.jpg">
                    </div>
                    <h2 class="title-font text-2xl font-semibold text-gray-900 mt-6 mb-3">Pelayanan Aktif</h2>
                    <p class="leading-relaxed text-base">Pelayanan Pengobatan yang dilakukan oleh Tenaga Medik dengan mengunjungi Kandang Ternak. Peternak dapat menghubungi terlebih dahulu pihak Klinik Hewan melalui (024)6714930, selanjutnya mendaftarnya untuk reservasi tanggal pemeriksaan.</p>
                    <button class="flex mx-auto mt-6 text-white bg-green-400 border-0 py-2 px-5 focus:outline-none hover:bg-purple-800 rounded-lg"><a href="{{route('daftarAktif')}}">Daftar</a></button>
                </div>
            <div class="sm:w-1/2 mb-10 px-4">
                <div class="rounded-lg h-64 overflow-hidden">
                    <img alt="content" class="object-cover object-center h-full w-full" src="images/Layanan 2.jpg">
                    </div>
                    <h2 class="title-font text-2xl font-semibold text-gray-900 mt-6 mb-3">Pelayanan Pasif</h2>
                    <p class="leading-relaxed text-base">Pelayanan Pengobatan yang dilakukan secara mandiri oleh pemilik hewan kesayangan dengan mengunjungi langsung ke Klinik Hewan, yang sebelumnya telah melakukan pendaftaran secara online untuk mendapatkan nomor antrian.</p>
                    <button class="flex mx-auto mt-6 text-white bg-green-400 border-0 py-2 px-5 focus:outline-none hover:bg-purple-800 rounded-lg"><a href="{{route('daftar')}}">Daftar</a></button>
                </div>
            </div>
        </div>
        @php
            $datas = [];
            $counts = 0;
        @endphp
        @foreach ($daftaraktif as $aktif)
            @php
                $datas[$counts][0] = $aktif->tanggal;
                $datas[$counts][1] = $aktif->nama;
                $datas[$counts][2] = $aktif->kelompok;
                $datas[$counts][3] = $aktif->namkel;
                $counts++;
            @endphp
        @endforeach
        @php
            // dd($counts);
        @endphp

        <!-- Card -->
        <div id="aktif" class="mt-4 mx-auto mb-10 px-4">
            <div class="mx-auto p-6 max-w bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Agenda Pelayanan Aktif</h5>
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-center">
                                    <thead class="border-b bg-green-300">
                                        <tr>
                                        <th scope="col" class="text-sm text-bold font-large text-gray-900 px-6 py-4 text-center">
                                            Nomor
                                        </th>
                                        <th scope="col" class="text-sm text-bold font-large text-gray-900 px-6 py-4 text-center">
                                            Nama Peternak
                                        </th>
                                        <th scope="col" class="text-sm text-bold font-large text-gray-900 px-6 py-4 text-center">
                                            Kelurahan
                                        </th>
                                        <th scope="col" class="text-sm text-bold font-large text-gray-900 px-6 py-4 text-center">
                                            Kelompok Ternak
                                        </th>
                                        </th>
                                        <th scope="col" class="text-sm text-bold font-large text-gray-900 px-6 py-4 text-center">
                                            Tanggal Pemeriksaan
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < $counts; $i++)
                                        <tr class="border-b bg-green-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$i + 1}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$datas[$i][1]}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$datas[$i][3]}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$datas[$i][2]}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($datas[$i][0])->isoFormat('dddd, D MMMM Y') }}
                                        </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class=" mx-auto py-3 mt-16 -mb-16 text-center">
            <p class="text-center font-bold">Agenda Pelayanan Aktif</p>
            <div class=" mx-auto">
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="border-b bg-green-300 ">
                                        <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Nomor
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Nama Peternak
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Kelurahan
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Kelompok Ternak
                                        </th>
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Tanggal Pemeriksaan
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < $count; $i++)
                                        <tr class="border-b bg-green-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$i + 1}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$data[$i][1]}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$data[$i][3]}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$data[$i][2]}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($data[$i][0])->isoFormat('dddd, D MMMM Y') }}
                                        </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        @php
            $datas = [];
            $counts = 0;
        @endphp
        @foreach ($daftars as $pasif)
            @php
                $datas[$counts][0] = $pasif->tanggal;
                $datas[$counts][1] = $pasif->nama;
                $datas[$counts][2] = $pasif->nama_hewan;
                $datas[$counts][3] = $pasif->jenis_hewan;
                $datas[$counts][4] = $pasif->no;
                $counts++;
            @endphp
        @endforeach
        <div id="pasif" class="mt-4 mx-auto mb-10 px-4">
            <div class="mx-auto p-6 max-w bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                @if (empty($tanggal))
                    <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Antrian Pelayanan Pasif {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</h5>
                @else
                    <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Antrian Pelayanan Pasif {{ \Carbon\Carbon::parse($tanggal)->isoFormat('dddd, D MMMM Y') }}</h5>
                @endif
                <div class="mx-auto">
                    <div class="flex mx-auto">
                        <p class="flex items-center justify-center overflow-x-auto lg:ml-28 sm:ml-2 text-left font-semibold">Masukkan Tanggal Antrian:</p>
                        <form action="{{ 'layanan1' }}" method="get">
                            @csrf
                            <div class="flex items-center border-b border-teal-500 py-2">
                                <input type="date"
                                {{-- aria-label="search" --}}
                                class="sm:ml-2 block sm:w-36 lg:w-96 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                {{-- placeholder="dd-mm-yyyy" --}}
                                id= "tanggal" name="tanggal" value="{{$tanggal}}" 
                                min="{{$startDate}}" max="{{$latestKuota}}" 
                                />
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded shadow-sm focus:outline-none hover:bg-indigo-700 float-right mt-2 ml-2">Pilih</button>
                            </div>
                        </form>
                    </div>
                    <div class="flex flex-col mx-auto">
                        <div class="overflow-x-auto">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="w-10/12 mx-auto text-center">
                                    <thead class="border-b bg-green-300 ">
                                        <tr>
                                        <th scope="col" class="text-sm text-bold font-large text-gray-900 px-6 py-4 text-center">
                                            Nomor Antrian
                                        </th>
                                        <th scope="col" class="text-sm text-bold font-large text-gray-900 px-6 py-4 text-center">
                                            Nama Pemilik
                                        </th>
                                        <th scope="col" class="text-sm text-bold font-large text-gray-900 px-6 py-4 text-center">
                                            Nama Hewan
                                        </th>
                                        <th scope="col" class="text-sm text-bold font-large text-gray-900 px-6 py-4 text-center">
                                            Jenis Hewan
                                        </th>
                                        <th scope="col" class="text-sm text-bold font-large text-gray-900 px-6 py-4 text-center">
                                            Tanggal
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < $counts; $i++)
                                        <tr class="border-b bg-green-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$datas[$i][4]}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$datas[$i][1]}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$datas[$i][2]}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ucwords($datas[$i][3])}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ \Carbon\Carbon::parse($datas[$i][0])->isoFormat('dddd, D MMMM Y') }}
                                        </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>        

    <style>
        html,
        body {
            height: 100%;
        }

        @media (min-width: 640px) {
            table {
                /* display: inline-table !important; */
            }

            thead tr:not(:first-child) {
                display: none;
            }
        }

        td:not(:last-child) {
            border-bottom: 0;
        }

        th:not(:last-child) {
            border-bottom: 2px solid rgba(0, 0, 0, .1);
        }

    </style>
@endsection
