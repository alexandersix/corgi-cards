<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Auction House
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-8 w-full mb-12">
                @foreach ($auctions as $auction)
                    <div class="flex flex-col justify-between bg-white overflow-hidden shadow rounded-lg">
                        <div>
                            <div class="px-4 pt-5 pb-2 sm:px-4">
                                <h3 class="font-bold text-lg">{{ $auction->card->name }}</h3>
                            </div>
                            <div class="px-4 py-3 sm:p-4">
                                <img class="rounded-lg mb-2" src="{{$auction->card->cover_image}}" alt="A picture of {{$auction->card->name}}" />
                                <p>{{ $auction->card->description }}</p>

                                <h4 class="font-bold text mb-1 mt-6">Card Stats</h4>
                                <div class="space-y-2 pb-6">
                                    <p><span class="font-semibold">Cuteness:</span> {{ $auction->card->cuteness }}</p>
                                    <p><span class="font-semibold">Playfulness:</span> {{ $auction->card->playfulness }}</p>
                                    <p><span class="font-semibold">Loudness</span> {{ $auction->card->loudness }}</p>
                                    <p><span class="font-semibold">Smartness</span> {{ $auction->card->smartness }}</p>
                                </div>

                                <h4 class="font-bold text mb-1 mt-3">Auction Details</h4>
                                <div class="space-y-2 mb-6">
                                    <p><span class="font-semibold">Seller:</span> {{ $auction->seller->name }}</p>
                                    <p><span class="font-semibold">Current Bid:</span> ${{ $auction->displayCurrentBid }}</p>
                                    <p><span class="font-semibold">Buyout Price:</span> ${{ $auction->displayBuyoutPrice }}</p>
                                    <p><span class="font-semibold">Ends At:</span> {{ $auction->ends_at->toDayDateTimeString() }}</p>
                                </div>

                            </div>
                        </div>
                        <div class="px-4 py-4 sm:px-4">
                            <a href="{{ route('auction.create-bid', ['auction' => $auction]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Place Bid
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $auctions->links() }}
        </div>
    </div>
</x-app-layout>
