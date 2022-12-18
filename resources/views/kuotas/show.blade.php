<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-black">
            Pendaftaran Tanggal {{ \Carbon\Carbon::parse($kuota->tanggal)->format('d M Y') }}
        </h2>
    </x-slot>
    <div class="py-6 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @php
                $data = [];
                $count = 0;
            @endphp
            @foreach ($daftars as $daftar)
                @php
                    $data[$count][0] = $daftar->tanggal;
                    $data[$count][1] = $daftar->no;
                    $data[$count][2] = $daftar->nama;
                    $data[$count][3] = $daftar->id;
                    $count++;
                @endphp
            @endforeach

            <body class="items-center justify-center">
                <div class="container block">
                    <table
                        class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                        <thead class="text-black">
                            @for ($i = 0; $i < $count; $i++)
                                <tr
                                    class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                    <th scope="col" class="border-grey-light border p-3 text-center">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="border-grey-light border p-3 text-center">
                                        Nomor Antrian
                                    </th>
                                    <th scope="col" class="border-grey-light border py-3 px-12 text-center">
                                        Nama
                                    </th>
                                    <th scope="col" class="border-grey-light border p-3 text-center">
                                        Aksi
                                    </th>
                                </tr>
                            @endfor
                        </thead>
                        <tbody class="flex-1 sm:flex-none">
                            @for ($i = 0; $i < $count; $i++)
                                <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                                        {{ \Carbon\Carbon::parse($data[$i][0])->format('d M Y') }}</td>
                                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                                        {{ $data[$i][1] }}</td>
                                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                                        {{ $data[$i][2] }}</td>
                                    <td class="border-grey-light border text-center">
                                        <a href="{{ route('daftars.show', $data[$i][3]) }}">
                                            <button
                                                class="ml-2 md:inline-block sm:block sm:px-4 px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple">
                                                Lihat
                                            </button>
                                        </a>
                                        <a href="{{ route('daftars.edit', $data[$i][3]) }}">
                                            <button
                                                class="ml-2 md:inline-block sm:block sm:px-4 px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                                                Sunting
                                            </button>
                                        </a>
                                        <form action="{{ route('daftars.destroy', $data[$i][3]) }}" method="POST"
                                            class="md:inline-block sm:block sm:px-2 px-2 py-2">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="ml-2 md:inline-block sm:block sm:px-4 px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                    {{ $daftars->links() }}
                </div>
            </body>
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
        </div>
    </div>
</x-app-layout>
