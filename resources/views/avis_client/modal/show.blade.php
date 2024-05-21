<div id="showHabitatModal{{ $service->id }}" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">commentaires</h3>
            <button type="button" class="close-button" data-modal-hide="showHabitatModal{{ $service->id }}">
                <svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <div class="modal-body">
            @if ($service->avis->isEmpty())
                <span class="text-gray-600 text-lg font-medium"><span class="p-2 text-xl text-gray-400"><i class="fa-solid fa-comment-slash"></i></span>No comments available for this service.</span>
            @else
                <ul>
                    @foreach ($service->avis as $avis)
                
                        @if ($avis->isVisible)
                            <li class="border-b-[1px] border-gray-200 p-3">
                                <span class="text-blue-500 text-xl font-bold"><span class="p-1"><i class="fa-regular fa-user"></i></span>{{ $avis->pseudo }}</span><span class="text-lg"> : {{ $avis->commentaire }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>