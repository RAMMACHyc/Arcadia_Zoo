@include('navbar')
<div class="">
    <div class="flex justify-center">
        @if ($habitats->isEmpty())

        <div class="w-full h-[34rem] p-[12rem]">
            <div class="flex justify-center">
                <div class="w-44 h-full"><img src="{{ asset('images/9067876.jpg') }}"></div>
            </div>
       
        <div class="text-center">
            <h2 class="text-gray-600 text-2xl font-medium text-center">No habitats available...</h2>
        </div>
        </div>
        @else
        <div class="grid grid-cols-2 gap-6 py-[10rem]">
            @foreach ($habitats as $habitat)
            <div class="card1 shadow-md">
                <img class="w-full h-[305px] object-cover hover:blur-sm" src="{{ asset($habitat->image) }}" />
                <div class="textBox">
                    <h1 class="text head">{{ $habitat->nom }}</h1>
                    <span class="text-gray-200">{{ $habitat->description }}</span>
                    <p class="text price">Animals</p>
                    <div class="flex gap-4">
                        @foreach ($habitat->animals as $animal)
                        <div class="w-20 h-20 rounded-full overflow-hidden">
                            <img class="object-cover w-20 h-20" src="{{ asset($animal->image) }}" alt="" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@include('footer')