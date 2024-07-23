@section('title', 'Kursus')
@section('title', 'Kursus')
<x-app-layout>
    <div class="pb-12 pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <form class="mx-auto" action="{{ route('kursus.search') }}">
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
                                placeholder="Cari Kursus..."/>
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @if ($kursuses->isNotEmpty())
                <div class="card-container flex flex-col gap-2 justify-center">
                    @foreach ($kursuses as $item)
                        <form
                            class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $item->nama }}</h5>
                                </a>
                                <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-white">
                                    @rupiah($item->harga)
                                </h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->deskripsi }}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Include materi :
                                    @foreach ($materis as $materi)
                                        @if ($materi->kursus_id === $item->id)
                                            {{ $materi->judul }}
                                        @endif
                                    @endforeach
                                </p>
                                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                    data-item-id="{{ $item->id }}" data-item-harga="{{ $item->harga }}"
                                    data-item-nama="{{ $item->nama }}"
                                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    Beli
                                </button>
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="mt-4">
                    {{ $kursuses->links() }}
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 text-gray-900 text-center dark:text-white">
                        Maaf tidak ada data yang sesuai dengan pencarian kamu
                    </div>
                </div>
            @endif
        </div>
    </div>
    @if ($kursuses->isNotEmpty())
        @include('components.modal-beli')
    @endif
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('default-modal');
        const modalKursusId = document.getElementById('modal-kursus-id');
        const modalKursusNama = document.getElementById('modal-kursus-nama');
        const modalKursusHarga = document.getElementById('modal-kursus-harga');

        document.querySelectorAll('button[data-modal-toggle="default-modal"]').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-item-id');
                const itemNama = this.getAttribute('data-item-nama');
                const itemHarga = this.getAttribute('data-item-harga');

                modalKursusId.textContent = itemId;
                modalKursusId.value = itemId;
                modalKursusNama.textContent = itemNama;
                modalKursusHarga.textContent = formatCurrency(itemHarga);
                console.log(itemHarga)
                console.log(formatCurrency(itemHarga))
            });
        });
    });

    function formatCurrency(value) {
        const number = parseFloat(value);
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(number);
    }
</script>
