@section('title', 'Peserta')
<x-app-layout>
    <div class="p-4 mt-14 h-auto sm:h-screen sm:ml-64">
        <div class="p-4 bg-white dark:bg-gray-800 rounded-md">
            <div class="p-6 text-gray-900 flex">
                <div class="w-32 h-36 bg-blue-100 rounded-lg">
                    <svg class="w-32 h-auto text-blue-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex gap-6 justify-between p-4 leading-normal">
                    <div class="left">
                        <h1><strong class="text-blue-900">Nama</strong></h1>
                        <h1><strong class="text-blue-900">Email</strong></h1>
                    </div>
                    <div class="right">
                        @foreach ($pesertas as $item)
                            <p>: {{ $item->name }}</p>
                            <p>: {{ $item->email }}</p>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 mt-5 bg-white dark:bg-gray-800 rounded-md">
            <div class="flex justify-between">
                <h1 class="text-2xl text-black self-center dark:text-white">
                    Data Transaksi User
                </h1>
                @foreach ($pesertas as $item)
                    <a href="{{ route('transaksi.createWithUserId', ['id' => $item->id]) }}"
                        class="flex gap-2 items-center place-content-center p-3 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Tambah Data
                    </a>
                @endforeach
            </div>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $item)
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
                                <td class="px-6 py-4">
                                    {{ $item->updated_at }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $transaksi->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
