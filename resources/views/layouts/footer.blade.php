<footer
    class="bg-white shadow mx-auto py-6 px-4 sm:px-6 lg:px-8 dark:bg-gray-800 {{ Auth::user()->role == 'admin' ? 'sm:ml-64' : '' }}">
    <div class="w-full mx-auto w-full p-4 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ date('Y') }} <a
                href="https://flowbite.com/" class="hover:underline">Muhamad Zulfikar Fikri</a>. All Rights Reserved.
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            @if (Auth::user()->role == 'admin')
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="hover:underline me-4 md:me-6">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('peserta.index') }}" class="hover:underline me-4 md:me-6">Peserta</a>
                </li>
                <li>
                    <a href="{{ route('transaksi.index') }}" class="hover:underline me-4 md:me-6">Transaksi</a>
                </li>
                <li>
                    <a href="{{ route('kursus.index') }}" class="hover:underline me-4 md:me-6">Kursus</a>
                </li>
                <li>
                    <a href="{{ route('materi.index') }}" class="hover:underline me-4 md:me-6">Materi</a>
                </li>
                <li>
                    <a href="{{ route('jadwal.index') }}" class="hover:underline">Jadwal</a>
                </li>
            @else
                <li>
                    <a href="{{ route('kursus') }}" class="hover:underline me-4 md:me-6">Kursus</a>
                </li>
                <li>
                    <a href="{{ route('jadwal') }}" class="hover:underline me-4 md:me-6">Jadwal</a>
                </li>
                <li>
                    <a href="{{ route('riwayat') }}" class="hover:underline me-4 md:me-6">Riwayat Transaksi</a>
                </li>
            @endif
        </ul>
    </div>
</footer>
