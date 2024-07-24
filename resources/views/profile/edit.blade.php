<x-app-layout>
    <div class="p-4 {{ Auth::user()->role == 'admin' ? 'sm:ml-64 mt-14' : 'max-w-7xl mx-auto sm:px-6 lg:px-8' }}">
        <div class="p-4 bg-white dark:bg-gray-800 rounded-md">
            <div class="flex justify-between">
                <h1 class="text-2xl self-center text-black dark:text-white">
                    Edit Profil
                </h1>
            </div>
        </div>
        <div class="p-4 mt-5 bg-white dark:bg-gray-800 rounded-md">
            @include('profile.partials.update-profile-information-form')

        </div>
        <div class="p-4 mt-5 bg-white dark:bg-gray-800 rounded-md">
            @include('profile.partials.update-password-form')

        </div>
        <div class="p-4 mt-5 bg-white dark:bg-gray-800 rounded-md">
            @include('profile.partials.delete-user-form')

        </div>
    </div>
</x-app-layout>
