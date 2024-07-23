@section('title', 'Materi')
<x-app-layout>
    <div class="p-4 mt-14 h-auto sm:h-screen sm:ml-64">
        <div class="p-4 bg-white dark:bg-gray-800 rounded-md">
            <div class="flex justify-between">
                <h1 class="text-2xl self-center text-black dark:text-white">
                    Form Edit Materi
                </h1>
            </div>
        </div>
        <div class="p-4 mt-5 bg-white dark:bg-gray-800 rounded-md">
            <form action="{{ route('materi.update', $materis->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="kursus_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Kursus
                    </label>
                    <select id="kursus_id" name="kursus_id" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Kursus</option>
                        @foreach ($kursuses as $item)
                            <option {{ $materis->kursus_id == $item->id ? 'selected' : '' }}
                                value="{{ $item->id }}">
                                {{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Judul
                    </label>
                    <input type="text" id="judul" name="judul" required
                        value="{{ old('judul', $materis->judul) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="deskripsi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tulis deskripsi disini...">{{ old('deskripsi', $materis->deskripsi) }}</textarea>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Simpan
                </button>
            </form>
        </div>
    </div>

</x-app-layout>
