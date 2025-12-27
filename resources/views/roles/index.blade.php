<x-app-layout>
    <x-slot name="title">
        Roles
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Roles List</h1>

                    <table class="table-auto w-full border">
                        <thead>
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Role</th>
                            <th class="border px-4 py-2">Users</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="px-4 py-2 text-center">{{ $role->id }}</td>
                                    <td class="px-4 py-2 text-center">{{ $role->role }}</td>
                                    <td class="px-4 py-2 text-center">{{ $role->users_count }}</td>
                                    <td class="px-4 py-2 text-center">
                                        @if($role->role !== 'admin')
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm text-red-600"
                                                        onclick="return confirm('Are you sure you want to delete this role?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if(session('error'))
                    <div class="alert alert-success text-center text-red-600">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success text-center text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ route('roles.create') }}" class="btn btn-primary">
                            Add role
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
