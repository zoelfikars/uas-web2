<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('css/report.css') }}"> --}}
    <style>
        #transaksi {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #transaksi td,
        #transaksi th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #transaksi tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #transaksi tr:hover {
            background-color: #ddd;
        }

        #transaksi th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .no-column {
            width: 30px;
            white-space: nowrap;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="m-5">
        <h1 class="text-2xl font-bold">Laporan Transaksi</h1>
        <div class="relative overflow-x-auto">
            <table id="transaksi" class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-white uppercase bg-blue-700">
                    <tr>
                        <th scope="col" class="p-4 no-column">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No Faktur
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pembeli
                        </th>
                        <th scope="col" class="px-6 py-3">
                            harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            tanggal dibuat
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksi as $item)
                        <tr class="bg-white hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $item->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->faktur }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                @rupiah($item->harga)
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d-m-Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <td colspan="10" class="px-6 py-4 text-center">
                                Tidak ada data transaksi.
                            </td>
                        </tr>
                    @endforelse
                    @if ($transaksi->isNotEmpty())
                        <tr class="bg-white border-b">
                            <th colspan="3" class="px-6 py-4">
                                {{ __('Total Pendapatan') }}
                            </th>
                            <th colspan="7" class="px-6 py-4">
                                @rupiah($totalHarga)
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
