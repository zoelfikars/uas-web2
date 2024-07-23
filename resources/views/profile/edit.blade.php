<x-app-layout>
    <div class="pt-6 py-12 h-auto {{ Auth::user()->role == 'admin' ? 'sm:ml-64' : 'max-w-7xl mx-auto' }}">
        <div class="p-4 bg-white dark:bg-gray-800 rounded-md">
            <div class="flex justify-between">
                <h1 class="text-2xl text-black self-center dark:text-white">
                    {{ __('Profile') }}
                </h1>
            </div>
        </div>
        <div class="p-4 mt-5 bg-white dark:bg-gray-800 rounded-md">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
        <div class="p-4 mt-5 bg-white dark:bg-gray-800 rounded-md">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>
        <div class="p-4 mt-5 bg-white dark:bg-gray-800 rounded-md">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
