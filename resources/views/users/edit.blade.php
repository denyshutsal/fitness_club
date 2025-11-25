<x-app-layout>
    <x-slot name="title">
        Edit a user
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit a user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Edit a user</h1>

                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label for="name" class="block text-sm/6 font-semibold text-white">Name</label>
                                <div class="mt-2.5">
                                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" autocomplete="name" required class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
                                    @error('name')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="email" class="block text-sm/6 font-semibold text-white">Email</label>
                                <div class="mt-2.5">
                                    <input id="email" type="email" name="email" required autocomplete="email" value="{{ old('email', $user->email) }}" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
                                    @error('email')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 text-center">
                            <button type="submit" class="block w-full rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Update</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary inline-block m-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
