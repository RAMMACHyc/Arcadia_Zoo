<div id="createHabitatModal{{ $service->id }}" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">add avis</h3>
            <button type="button" class="close-button" data-modal-hide="createHabitatModal{{ $service->id }}">
                <svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="pseudo{{ $service->id }}" class="form-label">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo{{ $service->id }}" class="form-input" required>
                    @error('pseudo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="commentaire{{ $service->id }}" class="form-label">commentaire</label>
                    <textarea name="commentaire" id="commentaire{{ $service->id }}" rows="3" class="form-textarea" required></textarea>
                    @error('commentaire')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="service_id" value="{{ $service->id }}">
                <button type="submit" class="submit-button">Envoyer</button>
            </form>
        </div>
    </div>
</div>