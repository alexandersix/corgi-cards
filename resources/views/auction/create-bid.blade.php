<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Place a Bid
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-8 items-center">
                <div>
                    <img class="w-full rounded-xl mb-4" src="{{ $auction->card->cover_image }}" alt="A photo of {{ $auction->card->name }}" />
                </div>
                <div>
                    <p class="mb-4">{{ $auction->card->description }}</p>

                    <h3 class="font-bold text-lg mb-1">Card Stats</h3>
                    <div class="space-y-2 mb-4">
                        <p><span class="font-semibold">Cuteness:</span> {{ $auction->card->cuteness }}</p>
                        <p><span class="font-semibold">Playfulness:</span> {{ $auction->card->playfulness }}</p>
                        <p><span class="font-semibold">Loudness</span> {{ $auction->card->loudness }}</p>
                        <p><span class="font-semibold">Smartness</span> {{ $auction->card->smartness }}</p>
                    </div>

                    <h3 class="font-bold text-lg mb-1">Auction Details</h3>
                    <div class="space-y-2 mb-4">
                        <p><span class="font-semibold">Seller:</span> {{ $auction->seller->name }}</p>
                        <p><span class="font-semibold">Current Bid:</span> ${{ $auction->displayCurrentBid }}</p>
                        <p><span class="font-semibold">Buyout Price:</span> ${{ $auction->displayBuyoutPrice }}</p>
                        <p><span class="font-semibold">Ends At:</span> {{ $auction->ends_at->toDayDateTimeString() }}</p>
                    </div>

                    <form class="mb-4" method="POST" action="{{ route('auction.place-bid', ['auction' => $auction]) }}">
                        @csrf 

                        <div class="mb-4">
                            <x-label for="proposed_bid" value="Amount" />

                            <x-input id="proposed_bid" class="block mt-1 w-full" type="text" name="proposed_bid" :value="old('proposed_bid')" required autofocus />
                        </div>

                        <x-button>Place Bid</x-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
