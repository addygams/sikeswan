@extends('layouts/main')

@section('title', 'FAQ')

@section('container')
<!-- Section 1 -->
<section class="relative py-16 bg-white min-w-screen animation-fade animation-delay">
    <div class="container px-0 px-8 mx-auto sm:px-12 xl:px-5">
        <p class="text-s font-bold text-left text-yellow-500 uppercase sm:mx-6 sm:text-center sm:text-normal sm:font-bold">
            Pertanyaan yang Kerap Muncul
        </p>
        <h3 class="mt-1 text-2xl font-bold text-left text-gray-800 sm:mx-6 sm:text-3xl md:text-4xl lg:text-5xl sm:text-center sm:mx-0">
            Frequently Asked Questions
        </h3>
        <div class="w-full px-6 py-6 mx-auto mt-8 bg-yellow-500 border border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3">
            <h3 class="text-lg font-bold text-white sm:text-xl md:text-2xl">Bagaimana cara pendaftaran online di Klinik Hewan Dinas Pertanian Kota Semarang?</h3>
            <p class="mt-2 text-base text-white sm:text-lg md:text-normal">
                Mengisi form pendaftaran di web dinas dispertan.semrangkota.go.id 
            </p>
        </div>
        <div class="w-full px-6 py-6 mx-auto mt-8 bg-yellow-500 border border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3">
            <h3 class="text-lg font-bold text-white sm:text-xl md:text-2xl">Apa saja syarat untuk mendaftar di Klinik Hewan Dinas Pertanian Kota Semarang?</h3>
            <p class="mt-2 text-base text-white sm:text-lg md:text-normal">
                a. Melakukan pendaftaran online H-1 pemeriksaan
            </p>
            <p class="mt-2 text-base text-white sm:text-lg md:text-normal">
                b. Membawa KTP Asli Kota Semarang saat pemeriksaan
            </p>
        </div>
        <div class="w-full px-6 py-6 mx-auto mt-8 bg-yellow-500 border border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3">
            <h3 class="text-lg font-bold text-white sm:text-xl md:text-2xl">Risiko ternak apa saja yang dijamin AUTS/K?</h3>
            <p class="mt-2 text-base text-white sm:text-lg md:text-normal">
            Risiko ternak yang dijamin AUTS/K diantaranya adalah:
            <br>-Hewan mati karena penyakit
            <br>-Hewan mati karena Kecelakaan
            <br>-Hewan mati karena beranak
            <br>-Hewan hilang karena dicuri
            </p>
        </div>
        <div class="w-full px-6 py-6 mx-auto mt-8 bg-yellow-500 border border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3">
            <h3 class="text-lg font-bold text-white sm:text-xl md:text-2xl">Bagaimana cara Pendaftaran AUTS/K?</h3>
            <p class="mt-2 text-base text-white sm:text-lg md:text-normal">
            Berikut adalah tahap-tahap pendaftaran AUTS/K:
            <br>a. Mengisi formulir pendaftaran di DInas Pertanian Kota Semarang
            <br>b. Petugas Dinas Pertanian dan Asuransi akan melakukan survey
            <br>c. Transfer premi dan konfirmasi ke Perusahaan Asuransi
            <br>d. Penyerahan polis AUTS/K
            </p>
        </div>
        <div class="w-full px-6 py-6 mx-auto mt-8 bg-yellow-500 border border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3">
            <h3 class="text-lg font-bold text-white sm:text-xl md:text-2xl">Bagaimanakan Alur proses Klaim AUTS/K?</h3>
            <p class="mt-2 text-base text-white sm:text-lg md:text-normal">
            a. Pemberitahuan Kematian kepada PPL pendamping atau pihak asuransi 
            <br>b. Pemberitahuan Klaim dengan menyertai form dan berkas pendukung
            <br>c. Pemeriksaan berkas dan Perhitungan 
            <br>d. Hasil pemeriksaan klaim
            <br>e. Pengesahan Berita Acara Klaim
            <br>f. Persetujuan dan Pembayaran
            </p>
        </div>
        <div class="w-full px-6 py-6 mx-auto mt-8 bg-yellow-500 border border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3">
            <h3 class="text-lg font-bold text-white sm:text-xl md:text-2xl">Apa saja Dokumen Pengajuan Klaim AUTS/K?</h3>
            <p class="mt-2 text-base text-white sm:text-lg md:text-normal">
            Dokumen yang harus disertakan dalam pengajuan klaim AUTS/K adalah:
            <br>a. Formulir Klaim
            <br>b. Fotocopi Polis / Sertifikat Polis
            <br>c. Foto Kematian
            <br>d. Hasil visum dari dokter Hewan
            </p>
        </div>
        <div class="w-full px-6 py-6 mx-auto mt-8 bg-yellow-500 border border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3">
            <h3 class="text-lg font-bold text-white sm:text-xl md:text-2xl">Apakah besaran klaim Asuransi tiap kejadian risiko ternak sama?</h3>
            <p class="mt-2 text-base text-white sm:text-lg md:text-normal">
            Besaran klaim tiap kejadian resiko ternak berbeda-beda dengan rincian sebagai berikut:
            <br>a. Untuk kejadian kematian besaran klaim adalah 100% dari nilai pertanggungan
            <br>b. Untuk kejadian potong paksa besaran klaim diberikan sebesar 50% dari nilai pertanggungan
            <br>c. Untuk kejadian kehilangan/kecurian besaran klaim diberikan sebesar 70% dari nilai pertanggungan, karena dikurangi risiko sendiri (deductible)sebesar 30%.
            </p>
        </div>
    </div>
</section>
@endsection