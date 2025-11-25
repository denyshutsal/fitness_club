<x-app-layout>
    <x-slot name="title">
        Update user password
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update user password') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-center text-2xl font-bold mb-4">Updating user <span class="text-green-500"> {{ $user->name }}'s</span> password</h1>

                    <form action="{{ route('users.password.update', $user->id) }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
                    @csrf
                        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label for="password" class="block text-sm/6 font-semibold text-white">New Password</label>
                                <div class="mt-2.5">
                                    <input type="password" name="password" id="password" required autocomplete="new-password"
                                           class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500">
                                    @error('password')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="password_confirmation" class="block text-sm/6 font-semibold text-white">Confirm New Password</label>
                                <div class="mt-2.5">
                                    <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password"
                                           class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500">
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <button type="submit" class="block w-full rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Update Password</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary inline-block m-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
