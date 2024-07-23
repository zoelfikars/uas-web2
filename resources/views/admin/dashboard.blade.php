@section('title', 'Dashboard')
<x-app-layout>
    <div class="py-24">
        <div class="max-w-7xl mx-auto h-screen sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-blue-100 dark:bg-gray-900 p-4 rounded-lg flex items-center">
                                <div class="text-blue-600 dark:text-white">
                                    <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-lg font-semibold dark:text-white">{{ __('Total Peserta') }}</h2>
                                    <p class="text-2xl dark:text-white">{{ $totalUsers }}</p>
                                </div>
                            </div>
                            <div class="bg-blue-100 dark:bg-gray-900 p-4 rounded-lg flex items-center">
                                <div class="text-blue-600 dark:text-white">
                                    <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-lg font-semibold dark:text-white">{{ __('Total Admin') }}</h2>
                                    <p class="text-2xl dark:text-white">{{ $totalAdmins }}</p>
                                </div>
                            </div>
                            <div class="bg-blue-100 dark:bg-gray-900 p-4 rounded-lg flex items-center">
                                <div class="text-blue-600 dark:text-white">
                                    <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-lg font-semibold dark:text-white">{{ __('Total Kursus') }}</h2>
                                    <p class="text-2xl dark:text-white">{{ $totalCourses }}</p>
                                </div>
                            </div>
                            <div class="bg-blue-100 dark:bg-gray-900 p-4 rounded-lg flex items-center">
                                <div class="text-blue-600 dark:text-white">
                                    <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-lg font-semibold dark:text-white">{{ __('Total Materi') }}</h2>
                                    <p class="text-2xl dark:text-white">{{ $totalMaterials }}</p>
                                </div>
                            </div>
                            <div class="bg-blue-100 dark:bg-gray-900 p-4 rounded-lg flex items-center">
                                <div class="text-blue-600 dark:text-white">
                                    <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-lg font-semibold dark:text-white">{{ __('Materi tanpa jadwal') }}</h2>
                                    <p class="text-2xl dark:text-white">{{ $materialsWithoutSchedule }}</p>
                                </div>
                            </div>
                            <div class="bg-blue-100 dark:bg-gray-900 p-4 rounded-lg flex items-center">
                                <div class="text-blue-600 dark:text-white">
                                    <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-lg font-semibold dark:text-white">{{ __('Total Data Transaksi') }}</h2>
                                    <p class="text-2xl dark:text-white">{{ $totalTransactions }}</p>
                                </div>
                            </div>
                            <div class="bg-blue-100 dark:bg-gray-900 p-4 rounded-lg flex items-center">
                                <div class="text-blue-600 dark:text-white">
                                    <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-lg font-semibold dark:text-white">{{ __('Total Pendapatan Transaksi') }}</h2>
                                    <p class="text-2xl dark:text-white">@rupiah($totalTransactionValue)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
