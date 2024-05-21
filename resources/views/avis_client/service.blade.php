@include('navbar')
<section class="h-full" id="pricing">
    <div class="search-container">
        <input type="text" class="search-input" placeholder="Search...">
        <button class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
  <div class="container">
  @if ($services->isEmpty())
        
        <div class="flex justify-center ">
            <div class="w-44 h-44"><img src="{{ asset('images/9067876.jpg') }}"></div>
        
        </div>
        <div class="text-center">
        <h2 class="text-gray-600 text-2xl font-medium text-center">No services available...</h2>
        </div>
        @else
    <div class="grid01">
        @foreach ($services as $service)
            <div class="card">
                <div class="imgBx"></div>
                <!-- Include the modal specific to this service -->
                <div class="content10">
                    <h2>{{ $service->nom }}</h2>
                    <h2>{{ $service->nom }}</h2>
                </div>
                
                @include('avis_client.modal.create', ['service' => $service])
                @include('avis_client.modal.show')
                <button data-modal-target="createHabitatModal{{ $service->id }}" data-modal-toggle="createHabitatModal{{ $service->id }}" class="w-full flex justify-center items-center open-comment-modal">
                    <p class="text-center text-white">commentaire</p>
                </button>
                <div class="absolute top-12 right-3 shadow-md text-2xl w-36 h-16 rounded-full bg-yellow-300 flex justify-center items-center gap-2 overflow-hidden">
                    <i class="fa-solid fa-bell-concierge"></i>
                
                </div>
                <button button data-modal-target="showHabitatModal{{ $service->id }}" data-modal-toggle="showHabitatModal{{ $service->id }}" class="absolute top-10 left-3 shadow-md text-3xl rounded-full bg-gray-700 flex justify-center items-center text-white p-6 gap-2">
                    <i class="fa-solid fa-comment-dots"></i>
                </button>
                <div class="content">
                    <div class="price">
                        <div class="flex items-center justify-center relative top-8 left-4 h-auto w-52">
                            <div class="flex items-center p-3">
                                <i class="fa-solid fa-star text-yellow-300 text-2xl"></i>
                                <p class="ms-2 text-lg font-bold text-gray-100">4.95</p>
                                <span class="w-1 h-1 mx-1.5 rounded-full bg-gray-400"></span>
                                <p class="text-lg font-medium text-gray-100 underline hover:no-underline">73 reviews</p>
                            </div>
                        </div>
                    </div>
                    <div class="paragraph">
                        <p>{{ $service->description }}</p>
                    </div>
                    <div class="comment-button-container">
                        <button data-modal-target="createHabitatModal{{ $service->id }}" data-modal-toggle="createHabitatModal{{ $service->id }}" class="open-comment-modal">
                            <p class="comment-button-text">Ajouter commentaire</p>
                        </button>
                        <div class="send-button">
                            <i class="fa-regular fa-paper-plane"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>
</section>