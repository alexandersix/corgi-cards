<?php

namespace App\View\Components;

use App\Models\Auction;
use Carbon\Carbon;
use Illuminate\View\Component;

class AuctionInfoPopup extends Component
{
    public ?Auction $myOngoingAuction;

    public string $timeRemaining;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->myOngoingAuction = Auction::query()
            ->with('card')
            ->where('seller_id', auth()->id())
            ->whereNull('sold_at')
            ->where('ends_at', '>', Carbon::now())
            ->first();

        if (is_null($this->myOngoingAuction)) {
            $this->timeRemaining = '0';
            return;
        }

        $this->timeRemaining = $this->myOngoingAuction->ends_at
            ->from(
                ['parts' => 4, 'join' => true]
            );
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.auction-info-popup');
    }
}
