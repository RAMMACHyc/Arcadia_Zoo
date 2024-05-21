<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-title">
            {{ __('User List') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        @include('users.modal.create')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Email</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Role</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
                        </tr>            
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        @foreach ($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">{{ $user->role ? $user->role->name : 'N/A' }}</td> <!-- Assuming you have defined a relationship between User and Role -->
                            <td class="px-6 py-4">
                                <button type="button" data-modal-target="editUserModal{{ $user->id }}" data-modal-toggle="editUserModal{{ $user->id }}" class="px-3 py-2 rounded-md bg-blue-500 hover:bg-blue-600"><i class="fa-regular fa-pen-to-square text-white"></i></button>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-2 rounded-md bg-red-500 hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa-regular fa-trash-can text-white font-medium"></i></button>
                                </form>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('users.modal.edit')
</x-app-layout>
