<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Your Cards
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-8 w-full">
                @foreach ($cards as $card)
                    <div class="flex flex-col justify-between bg-white overflow-hidden shadow rounded-lg">
                        <div>
                            <div class="px-4 pt-5 pb-2 sm:px-4">
                                <h3 class="font-bold text-lg">{{ $card->name }}</h3>
                            </div>
                            <div class="px-4 py-3 sm:p-4">
                                <img class="rounded-lg mb-2" src="{{$card->cover_image}}" alt="A picture of {{$card->name}}" />
                                <p>{{ $card->description }}</p>
                            </div>
                        </div>
                        <div class="px-4 py-4 sm:px-4">
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View Card</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
