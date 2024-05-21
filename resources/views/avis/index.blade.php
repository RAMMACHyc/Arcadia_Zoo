<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-title">
            {{ __('Avis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden ">
                <div class="p-6 ">


                    @if (session('success'))

                        {{ session('success') }}
                    @endif 


                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pseudo
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Commentaire
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Visible
                                </th>
                                @if (auth()->user()->role_id === 1)

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                                @endif
                            
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($avis as $avi)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $avi->pseudo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $avi->commentaire }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($avi->isVisible)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Yes
                                    </span>
                                    @else
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        No
                                    </span>
                                    @endif
                                </td>
                                @if (auth()->user()->role_id === 1)
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex">
                                    <form action="{{ route('avis.toggle-visibility', $avi) }}" method="POST"
                                        class="inline-block mr-2">
                                        @csrf
                                        @method('POST')
                                        
                                        <button type="submit" class="px-3 py-2 rounded-md bg-gray-800 hover:bg-gray-900 text-white">
                                        @if ($avi->isVisible)
                                        <i class="fa-solid fa-eye"></i>
                                        @else
                                        <i class="fa-solid fa-eye-slash"></i>
                                        @endif
                                        </button>
                                    </form>
                                    <form action="{{ route('avis.destroy', $avi) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-2 rounded-md bg-red-500 hover:bg-red-600"
                                            onclick="return confirm('Are you sure you want to delete this avis?')">
                                            <i class="fa-regular fa-trash-can text-white font-medium"></i>
                                        </button>
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
    </div>
</x-app-layout>