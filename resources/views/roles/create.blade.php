<x-app-layout>
    <x-slot name="title">
        Add role
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add role') }}
        </h2>
    </x-slot>

     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-center text-2xl font-bold mb-4">Add role</h1>

                    <form action="{{ route('roles.store') }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
                        @csrf
                        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label for="role" class="block text-sm/6 font-semibold text-white">Role</label>
                                <div class="mt-2.5">
                                    <input id="role" type="text" name="role" placeholder="Role title" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
                                    @error('role')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <button type="submit" class="block w-full rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Add role</button>
                        </div>
                    </form>

                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="text-center p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ route('roles.index') }}" class="btn btn-primary">
                            List of roles
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
