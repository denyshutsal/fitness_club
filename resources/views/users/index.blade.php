<x-app-layout>
    <x-slot name="title">
        Users
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Users List</h1>

                    <table class="table-auto w-full border">
                        <thead>
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Role</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Phone</th>
                            <th class="border px-4 py-2">Created</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-4 py-2 text-center">{{ $user->id }}</td>
                                    <td class="px-4 py-2 text-center">{{ $user->role }}</td>
                                    <td class="px-4 py-2 text-center">{{ $user->name }}</td>
                                    <td class="px-4 py-2 text-center">{{ $user->email }}</td>
                                    <td class="px-4 py-2 text-center">{{ $user->phones->first()?->phone ?? '-' }}</td>
                                    <td class="px-4 py-2 text-center">{{ $user->created_at }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Profile</a>
                                        @if($user->role !== 'admin')
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm text-green-600">Edit</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm text-red-600"
                                                        onclick="return confirm('Are you sure you want to delete this user?')">
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
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            Create User
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
