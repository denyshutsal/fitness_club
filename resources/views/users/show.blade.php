<x-app-layout>
    <x-slot name="title">
        User details
    </x-slot>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User details') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">User details</h2>
                    <div class="flex flex-col items-center">
                        <img class="w-24 h-24 mb-6 rounded-full" src="https://placehold.co/24x24" alt="{{ $user->name }}"/>
                        <h3 class="mb-2 text-base">{{ $user->name }}</h3>
                        <p class="mb-2 text-base">{{ $user->role->role }}</p>
                        <p class="mb-2 text-base">{{ $user->email }}</p>
                        <p class="mb-2 text-base">{{ $user->phones->first()?->phone ? '+' . $user->phones->first()->phone : 'Phone number not provided' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
