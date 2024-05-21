@foreach ($alimentations as $alimentation)
    <div id="editAlimentationModal{{ $alimentation->id }}" tabindex="-1" aria.hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Alimentation
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="editAlimentationModal{{ $alimentation->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5">
                    <form action="{{ route('alimentation_quotidienne.update', $alimentation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="date_alimentation"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                            <input type="date" name="date_alimentation" id="date_alimentation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                value="{{ $alimentation->date_alimentation }}" required>
                            @error('date_alimentation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="heure_alimentation"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Heure</label>
                            <input type="time" name="heure_alimentation" id="heure_alimentation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                value="{{ $alimentation->heure_alimentation }}" required>
                            @error('heure_alimentation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="animal_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Animal</label>
                            <select name="animal_id" id="animal_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                                <option value="">Select Animal</option>
                                @foreach ($animals as $animal)
                                    <option value="{{ $animal->id }}"
                                        @if ($animal->id == $alimentation->animal_id) selected @endif>
                                        {{ $animal->prenom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="type_nourriture"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type
                                Nourriture</label>
                            <input type="text" name="type_nourriture" id="type_nourriture"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                value="{{ $alimentation->type_nourriture }}" required>
                            @error('type_nourriture')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="quantite_nourriture"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantité</label>
                            <input type="number" name="quantite_nourriture" id="quantite_nourriture"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                value="{{ $alimentation->quantite_nourriture }}" required>
                            @error('quantite_nourriture')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <div class="mt-4">
                            <button type="submit"
                                class="block w-full bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 focus:outline-none font-medium rounded-lg text-white text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                                Alimentation</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endforeach
