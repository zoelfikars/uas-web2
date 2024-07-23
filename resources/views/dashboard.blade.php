@section('title', 'Beranda')
<x-app-layout>
    <section class="dark:bg-gray-900">
        <div
            class="py-8 px-4 mx-auto flex flex-col items-center justify-center max-w-screen-xl text-center lg:py-16 lg:px-12">
            <a href="{{ route('kursus') }}"
                class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
                role="alert">
                <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3">New</span> <span
                    class="text-sm font-medium">Cek Kursus yang tersedia yuk!</span>
                <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Temukan kursus untuk upgrade skill kamu di Courseku</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                Platform pembelajaran online berbasis web yang kami siapkan untuk upgrade skill kamu, hanya dengan
                berlangganan kursus kamu bisa upgrade skill apapun yang tersedia di layanan kami.</p>
        </div>
        <div class="bg-dark-500 relative w-full py-8 px-4 mx-auto flex gap-2 items-center justify-center max-w-screen-xl text-center lg:py-16 lg:px-12 overflow-x-hidden"
            data-carousel="slide">
            <div class="flex flex-wrap justify-center">
                @foreach ($kursuses as $item)
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 mb-4 px-2">
                        <div
                            class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 h-full">
                            <a href="#">
                                <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                            </a>
                            <div class="p-5 flex flex-col justify-between h-full">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $item->nama }}</h5>
                                </a>
                                <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-white">
                                    @rupiah($item->harga)
                                </h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->deskripsi }}</p>
                                <form action="{{ route('kursus.search') }}">
                                    <input type="hidden" name="key" value="{{ $item->nama }}">
                                    <button type="submit"
                                        class="items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Lihat
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="flex items-center">
                    <a href="{{ route('kursus') }}"
                        class="text-blue-700 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600 font-bold">
                        Lebih banyak
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
