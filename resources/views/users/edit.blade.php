<x-app-layout>
    <x-slot name="title">
        Edit a user
    </x-slot>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit a user') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-center text-2xl font-bold mb-4">Edit a user</h2>

                    {{-- Name, Email, Role, Phone block --}}
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
                                <label for="role" class="block text-sm/6 font-semibold text-white">Role</label>
                                <div class="mt-2.5">
                                    <select id="role" name="role" autocomplete="role" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white/5 py-1.5 pr-8 pl-3 text-base text-white outline-1 -outline-offset-1 outline-white/10 *:bg-gray-800 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                                        <option value="employee">Employee</option>
                                        <option value="visitor">Visitor</option>
                                    </select>
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
                            <div class="sm:col-span-2">
                                <label for="phone" class="block text-sm/6 font-semibold text-white">Phone</label>
                                <div class="mt-2.5">
                                    <input id="phone" type="text" name="phone" value="{{ old('phone', $user->phones->first()?->phone ? '+' . $user->phones->first()->phone : '') }}" placeholder="+7XXXXXXXXXX"
                                           class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
                                    @error('phone')
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

            {{-- Password block --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-center text-2xl font-bold mb-4">Change Password</h2>

                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
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

                        <div class="mt-10 text-center">
                            <button type="submit" class="block w-full rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
