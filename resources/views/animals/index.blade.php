<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-title">
            {{ __('Animals') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (auth()->user()->role_id === 1)
        @include('animals.modal.create')
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Race</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Habitat</th>
                            @if (auth()->user()->role_id === 1)
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
                            @endif
                        
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        @foreach ($animals as $animal)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 flex items-center">
                                @if($animal->image)
                                        <img src="{{ asset($animal->image) }}" alt="animal" class="w-10 h-10 object-cover rounded-full mx-2">
                                    @else
                                        No image
                                    @endif
                                {{ $animal->prenom }}
                            </td>
                                <td class="px-6 py-4">{{ $animal->race }}</td>
                                <td class="px-6 py-4">{{ $animal->habitat->nom }}</td>
                                @if (auth()->user()->role_id === 1)
                                <td class="px-6 py-4">
                                    <button type="button" data-modal-target="editAnimalModal{{ $animal->id }}" data-modal-toggle="editAnimalModal{{ $animal->id }}" class="px-3 py-2 rounded-md bg-blue-500 hover:bg-blue-600"><i class="fa-regular fa-pen-to-square text-white"></i></button>

                                    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-2 rounded-md bg-red-500 hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this animal?')"><i class="fa-regular fa-trash-can text-white font-medium"></i></button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('animals.modal.edit')
</x-app-layout>
