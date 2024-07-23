@section('title', 'Jadwal')
<x-app-layout>
    <div class="pt-6 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <form class="mx-auto" action="{{ route('jadwal.search') }}">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Cari</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search" name="key"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cari Jadwal..."/>
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-container flex flex-col gap-2 justify-center items-center">
                @if ($transaksis->isEmpty())
                    <div
                        class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-5">
                            <h5 class="mb-2 text-center tracking-tight text-gray-900 dark:text-white">
                                Tidak ada jadwal.
                            </h5>
                        </div>
                    </div>
                @else
                    @foreach ($transaksis as $transaksi)
                        @foreach ($transaksi->kursus->materi as $item)
                            <div
                                class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <div class="p-5">
                                    <h1 href="#">
                                        <h5
                                            class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            {{ $transaksi->kursus->nama }}</h5>
                                    </h1>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->judul }}</p>
                                    @php
                                        \Carbon\Carbon::setLocale('id');
                                    @endphp
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        @if ($item->jadwal)
                                            {{ \Carbon\Carbon::parse($item->jadwal->dates)->translatedFormat('l, Y-m-d') }},
                                            Jam :
                                            {{ \Carbon\Carbon::parse($item->jadwal->start_time)->format('H:i') }}-{{ \Carbon\Carbon::parse($item->jadwal->end_time)->format('H:i') }}
                                        @else
                                            Jadwal tidak ditemukan.
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endif
            </div>
            <div class="mt-4">
                {{ $transaksis->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
