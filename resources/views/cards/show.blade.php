<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $card->name }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-8 items-center">
                <div>
                    <img class="w-full rounded-xl mb-4" src="{{ $card->cover_image }}" alt="A photo of {{ $card->name }}" />
                    <a href="{{ route('auction.create', ['card' => $card]) }}" class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Sell
                    </a>
                </div>
                <div>
                    <p class="mb-4">{{ $card->description }}</p>

                    <h3 class="font-bold text-lg mb-1">Card Stats</h3>
                    <div class="space-y-2">
                        <p><span class="font-semibold">Cuteness:</span> {{ $card->cuteness }}</p>
                        <p><span class="font-semibold">Playfulness:</span> {{ $card->playfulness }}</p>
                        <p><span class="font-semibold">Loudness</span> {{ $card->loudness }}</p>
                        <p><span class="font-semibold">Smartness</span> {{ $card->smartness }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
