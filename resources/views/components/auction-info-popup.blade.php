@isset($myOngoingAuction)
    <div class="bg-white rounded shadow-slate-50 drop-shadow-md max-w-sm fixed bottom-4 right-4 p-4">
        <h3 class="font-bold text-lg">
            Auction in progress
        </h3>

        <p><span class="font-semibold">Card for sale:</span> {{ $myOngoingAuction->card->name }}</p>
        <p><span class="font-semibold">Auction Ends:</span>: {{ $timeRemaining }}</p>
    </div>
@endisset
