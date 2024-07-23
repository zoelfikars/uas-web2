@section('title', 'Riwayat')
<x-app-layout>
    <div class="py-12 h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        faktur
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        nama kursus
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayats as $item)
                                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $item->faktur }}
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $riwayats->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
