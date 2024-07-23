@section('title', 'Transaksi')
<x-app-layout>
    <div class="p-4 mt-14 h-auto sm:h-screen sm:ml-64">
        <div class="p-4 bg-white dark:bg-gray-800 rounded-md">
            <div class="flex justify-between">
                <h1 class="text-2xl self-center text-black dark:text-white">
                    Edit Data Transaksi User
                </h1>
            </div>
        </div>
        <div class="p-4 mt-5 bg-white dark:bg-gray-800 rounded-md">
            <form action="{{ route('transaksi.update', $transaksis->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="faktur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nomor Faktur
                    </label>
                    <input type="text" id="faktur" name="faktur" required readonly
                        value="{{ old('faktur', $transaksis->faktur) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="peserta_id_display"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Peserta
                    </label>
                    <select id="peserta_id_display" name="peserta_id_display" required disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Peserta</option>
                        @foreach ($pesertas as $item)
                            <option {{ $transaksis->peserta_id == $item->id ? 'selected' : '' }}
                                value="{{ $item->id }}">
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="peserta_id" value="{{ $transaksis->peserta_id }}">
                <div class="mb-6">
                    <label for="kursus_id_display" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Kursus
                    </label>
                    <select id="kursus_id_display" name="kursus_id_display" required disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Kursus</option>
                        @foreach ($kursuses as $item)
                            <option {{ $transaksis->kursus_id == $item->id ? 'selected' : '' }}
                                value="{{ $item->id }}" data-harga="{{ $item->harga }}">
                                {{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="kursus_id" value="{{ $transaksis->kursus_id }}">
                <div class="mb-6">
                    <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Harga
                    </label>
                    <input type="number" id="harga" name="harga" step="0.01" readonly
                        value="{{ old('harga', $transaksis->harga) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="catatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Catatan
                    </label>
                    <textarea id="catatan" name="catatan" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here...">{{ old('catatan', $transaksis->catatan) }}</textarea>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Simpan
                </button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/transaksi.js') }}"></script>
</x-app-layout>
