@section('title', 'Transaksi')
<x-app-layout>
    <div class="p-4 mt-14 h-auto sm:h-screen sm:ml-64">
        <div class="p-4 bg-white dark:bg-gray-800 rounded-md">
            <h1 class="text-2xl text-black dark:text-white">
                Data Transaksi User
            </h1>
        </div>
        <div class="p-4 mt-5 bg-white dark:bg-gray-800 rounded-md">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                faktur
                            </th>
                            <th scope="col" class="px-6 py-3">
                                peserta
                            </th>
                            <th scope="col" class="px-6 py-3">
                                kursus
                            </th>
                            <th scope="col" class="px-6 py-3">
                                harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                catatan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                tanggal dibuat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                tanggal diupdate
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksis as $item)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->faktur }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->kursus->nama }}
                                </td>
                                <td class="px-6 py-4">
                                    @rupiah($item->harga)
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->catatan }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->updated_at }}
                                </td>
                                <td>
                                    <form class="flex gap-2" action="{{ route('transaksi.destroy', $item->id) }}"
                                        method="POST">
                                        <a href="{{ route('transaksi.edit', $item->id) }}">
                                            <button type="button"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-1 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                </svg>
                                            </button>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-1 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            <svg class="w-6 h-6 text-white hover:text-dark" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td colspan="10" class="px-6 py-4 text-center">
                                    Tidak ada data transaksi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $transaksis->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
