<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-title">
            {{ __('Alimentation Quotidienne') }} 
        </h2>
    </x-slot>

    <div class="py-12" id="deletable-div">
        <!-- Include create modal -->
        @if (auth()->user()->role_id === 3)
        @include('alimentation_quotidienne.modal.create')
        @endif


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <!-- Table headers -->
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Heure</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Type Nourriture</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Quantité</th>
                            @if (auth()->user()->role_id === 3)
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
                            @endif
                        </tr>            
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        @if($alimentations)
                            @foreach ($alimentations as $alimentation)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $alimentation->date_alimentation }}</td>
                                    <td class="px-6 py-4">{{ $alimentation->heure_alimentation }}</td>
                                    <td class="px-6 py-4">{{ $alimentation->type_nourriture }}</td>
                                    <td class="px-6 py-4">{{ $alimentation->quantite_nourriture }}</td>
                                    @if (auth()->user()->role_id === 3)
                                    <td class="px-6 py-4">
                                         <button type="button" data-modal-target="editAlimentationModal{{ $alimentation->id }}" data-modal-toggle="editAlimentationModal{{ $alimentation->id }}" class="px-3 py-2 rounded-md bg-blue-500 hover:bg-blue-600"><i class="fa-regular fa-pen-to-square text-white"></i></button>                                      
                                        <form action="{{ route('alimentation_quotidienne.destroy', $alimentation->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-2 rounded-md bg-red-500 hover:bg-red-600" onclick="return confirm('{{ __('Are you sure you want to delete this alimentation?') }}')"><i class="fa-regular fa-trash-can text-white font-medium"></i></button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($alimentations as $alimentation)
        @include('alimentation_quotidienne.modal.edit')
    @endforeach

</x-app-layout>
