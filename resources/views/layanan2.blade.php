@extends('layouts/main')

@section('title', 'Pengobatan di Tempat')

@section('container')
    <section class="text-gray-600 body-font">
        <div class="flex flex-col text-center w-full mt-16 -mb-8">
            <h1 class="sm:text-3xl text-xl font-bold title-font text-gray-900">AGENDA PENGOBATAN MASSAL</h1>
            <div class="flex mt-2 justify-center">
                <div class="w-24 h-1 rounded-full bg-purple-800 inline-flex"></div>
            </div>
        </div>
        <div class="mx-auto py-3 mt-16 text-center">
            <div class="container mx-auto">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="border-b bg-green-300 ">
                                    <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                        Nomor
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                        Lokasi
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                        Kelompok Ternak
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                        Tanggal
                                    </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b bg-green-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Mark
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Otto
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        @mdo
                                    </td>
                                    </tr>
                                    <tr class="border-b bg-green-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Jacob
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Thornton
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        @fat
                                    </td>
                                    </tr>
                                    <tr class="border-b bg-green-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Larry
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Wild
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        @twitter
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="overflow-hidden text-gray-700 ">
    <div class="container px-5 py-2 mb-16 mx-auto lg:pt-12 lg:px-32">
        <div class="flex flex-wrap -m-1 md:-m-2">
            <div class="flex flex-wrap w-1/3">
                <div class="w-full p-1 md:p-2">
                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp">
                </div>
            </div>
            <div class="flex flex-wrap w-1/3">
                <div class="w-full p-1 md:p-2">
                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(74).webp">
                </div>
            </div>
            <div class="flex flex-wrap w-1/3">
                <div class="w-full p-1 md:p-2">
                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(75).webp">
                </div>
            </div>
            <div class="flex flex-wrap w-1/3">
                <div class="w-full p-1 md:p-2">
                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(70).webp">
                </div>
            </div>
            <div class="flex flex-wrap w-1/3">
                <div class="w-full p-1 md:p-2">
                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(76).webp">
                </div>
            </div>
            <div class="flex flex-wrap w-1/3">
                <div class="w-full p-1 md:p-2">
                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(72).webp">
                </div>
            </div>
            {{-- <div @click="$dispatch('img-modal', {  imgModalSrc: '{{ asset('/storage/packages/' . $data[$i][4]) }}', imgModalDesc: 'Foto Tenaga Medis' })" class=" cursor-pointer transition duration-300 ease-in-out  transform hover:-translate-y-1 md:p-2 p-1 w-1/2 flex mx-auto"> 
                <img class="mx-auto" width="200px" src="{{ asset('/storage/packages/' . $data[$i][4]) }}">
            </div> --}}
            <div x-data="{ imgModal : false, imgModalSrc : '', imgModalDesc : '' }">
                <template @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc; imgModalDesc = $event.detail.imgModalDesc;" x-if="imgModal">
                <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform " x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform " x-on:click.away="imgModalSrc = ''" class="p-2 fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center bg-black bg-opacity-75">
                    <div @click.away="imgModal = ''" class="flex flex-col max-w-3xl max-h-full overflow-auto">
                        <div class="z-50">
                            <button @click="imgModal = ''" class="float-right pt-2 pr-2 outline-none focus:outline-none">
                            <svg class="fill-current text-white " xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                            </button>
                        </div>
                        <div class="p-2">
                            <img :alt="imgModalSrc" class="object-contain h-1/2-screen" :src="imgModalSrc">
                            <p x-text="imgModalDesc" class="text-center text-white"></p>
                        </div>
                    </div>
                </div>
                </template>
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
                display: inline-table !important;
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
