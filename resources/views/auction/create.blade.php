<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Auction
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-8 items-center">
                <div>
                    <img class="w-full rounded-xl mb-4" src="{{ $card->cover_image }}" alt="A photo of {{ $card->name }}" />
                    <p class="mb-4">{{ $card->description }}</p>

                    <h3 class="font-bold text-lg mb-1">Card Stats</h3>
                    <div class="space-y-2">
                        <p><span class="font-semibold">Cuteness:</span> {{ $card->cuteness }}</p>
                        <p><span class="font-semibold">Playfulness:</span> {{ $card->playfulness }}</p>
                        <p><span class="font-semibold">Loudness</span> {{ $card->loudness }}</p>
                        <p><span class="font-semibold">Smartness</span> {{ $card->smartness }}</p>
                    </div>
                </div>

                <form class="space-y-4" method="POST" action="{{ route('auction.store') }}">
                    @csrf 

                    <input hidden id="card_id" name="card_id" value="{{$card->id}}" />
                    <input hidden id="seller_id" name="seller_id" value="{{$card->user_id}}" />

                    <div>
                        <x-label for="current_bid" value="Starting Bid" />

                        <x-input id="current_bid" class="block mt-1 w-full" type="text" name="current_bid" :value="old('current_bid')" required autofocus />
                    </div>

                    <div>
                        <x-label for="buyout_price" value="Buyout Price" />

                        <x-input id="buyout_price" class="block mt-1 w-full" type="text" name="buyout_price" :value="old('buyout_price')" />
                    </div>

                    <div>
                        <x-label for="ends_at" value="Auction Ends At" />

                        <x-input id="ends_at" class="block mt-1 w-full" type="datetime-local" name="ends_at" :value="old('ends_at')" />
                    </div>

                    <x-button>Start Auction</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
