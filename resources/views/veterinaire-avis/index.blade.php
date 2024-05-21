<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-title">
            {{ __('Veterinaire Avis for ') }} 
        </h2>
    </x-slot>

    <div class="py-12" id="deletable-div">
        @if (auth()->user()->role_id === 2)
        @include('veterinaire-avis.modal.create')
        @endif


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Animal</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">État de l'animal</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nourriture</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Grammage</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">commentaire</th>
                            @if (auth()->user()->role_id === 2)
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
                            @endif
                        
                        </tr>            
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        @if($avis)
                            @foreach ($avis as $avisItem)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $avisItem->animal->prenom }}</td>
                                    <td class="px-6 py-4">{{ $avisItem->date_passage }}</td>
                                    <td class="px-6 py-4">{{ $avisItem->etat_animal }}</td>
                                    <td class="px-6 py-4">{{ $avisItem->nourriture }}</td>
                                    <td class="px-6 py-4">{{ $avisItem->grammage_nourriture }}</td>
                                    <td class="px-6 py-4">{{ $avisItem->comment }}</td>
                                    
                                    @if (auth()->user()->role_id === 2)
                                    <td class="px-6 py-4">
                                        <button type="button" data-modal-target="editAvisModal{{ $avisItem->id }}" data-modal-toggle="editAvisModal{{ $avisItem->id }}" class="px-3 py-2 rounded-md bg-blue-500 hover:bg-blue-600"><i class="fa-regular fa-pen-to-square text-white"></i></button>                                        
                                        <form action="{{ route('veterinaire-avis.destroy', $avisItem->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-2 rounded-md bg-red-500 hover:bg-red-600" onclick="return confirm('{{ __('Are you sure you want to delete this avis?') }}')"><i class="fa-regular fa-trash-can text-white font-medium"></i></button>
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

   
    @include('veterinaire-avis.modal.edit')
</x-app-layout>
