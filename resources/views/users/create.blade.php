<x-app-layout>
    <x-slot name="title">
        Create a user
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-center text-2xl font-bold mb-4">Create a user</h1>

                    <form action="{{ route('users.store') }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
                        @csrf
                        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label for="name" class="block text-sm/6 font-semibold text-white">Name</label>
                                <div class="mt-2.5">
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" required class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
                                    @error('name')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="email" class="block text-sm/6 font-semibold text-white">Email</label>
                                <div class="mt-2.5">
                                    <input id="email" type="email" name="email" autocomplete="email" required value="{{ old('email') }}" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
                                    @error('email')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="phone" class="block text-sm/6 font-semibold text-white">Phone</label>
                                <div class="mt-2.5">
                                    <input id="phone" type="text" name="phone" value="{{ old('phone') }}" placeholder="+7XXXXXXXXXX" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
                                    @error('phone')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="role_id" class="block text-sm/6 font-semibold text-white">Role</label>
                                <div class="mt-2.5">
                                    <select id="role_id" name="role_id" autocomplete="role" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white/5 py-1.5 pr-8 pl-3 text-base text-white outline-1 -outline-offset-1 outline-white/10 *:bg-gray-800 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                                        @foreach ($roles as $role)
                                            @if ($role->role !== 'admin')
                                                <option value="{{ $role->id }}">
                                                    {{ ucfirst($role->role) }}
                                                </option>
                                            @endif
                                         @endforeach
                                    </select>
                                    @error('role_id')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="password" class="block text-sm/6 font-semibold text-white">Password</label>
                                <div class="mt-2">
                                    <input id="password" type="password" name="password" autocomplete="new-password" required class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
                                    @error('password')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="password_confirmation" class="block text-sm/6 font-semibold text-white">Re-enter your password for verification</label>
                                <div class="mt-2">
                                    <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <button type="submit" class="block w-full rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Create User</button>
                        </div>
                    </form>

                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="text-center p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ route('users.index') }}" class="btn btn-primary">
                            List of users
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
