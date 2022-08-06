<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Card;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Auctions/Index', [
            'auctions' => Auction::query()
                ->with(['buyer', 'card', 'seller'])
                ->whereNull('sold_at')
                ->where('ends_at', '>', Carbon::now())
                ->orderByDesc('created_at')
                ->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Card $card)
    {
        return Inertia::render('Auctions/Create', [
            'card' => $card,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hasOngoingAuction = Auction::query()
            ->where('card_id', $request->input('card_id'))
            ->whereNull('sold_at')
            ->exists();

        if ($hasOngoingAuction) {
            return redirect(route('auction.index'))->with('error', 'That card is already up for auction!');
        }

        $auction = Auction::create([
            'card_id' => $request->input('card_id'),
            'seller_id' => $request->input('seller_id'),
            'current_bid' => $request->input('current_bid') * 100,
            'buyout_price' => $request->input('buyout_price') * 100,
            'ends_at' => $request->input('ends_at'),
        ]);

        return redirect(route('auction.index'))->with('success', 'Auction started successfully.');
    }

    public function createBid(Auction $auction)
    {
        return view('auction.create-bid', [
            'auction' => $auction,
        ]);
    }

    public function storeBid(Request $request, Auction $auction)
    {
        if ($auction->hasEnded()) {
            return redirect(route('auction.index'))->with('error', 'Sorry, that auction has already ended!');
        }

        $convertedProposedBid = $request->input('proposed_bid') * 100;

        if ($convertedProposedBid <= $auction->current_bid) {
            return back()->with('error', 'Sorry, your bid is less than the current bid for this auction');
        }

        $auction->current_bid = $convertedProposedBid;
        $auction->save();

        return back()->with('success', 'Your bid has been accepted!');
    }

    public function storeBuyout(Auction $auction)
    {
        if ($auction->hasEnded()) {
            return redirect(route('auction.index'))->with('error', 'Sorry, that auction has already ended!');
        }

        if (auth()->user()->currency < $auction->buyout_price) {
            return back()->with('error', 'Sorry, you don\'t have enough money for that transaction');
        }

        $auction->current_bid = $auction->buyout_price;
        $auction->sold_at = Carbon::now();
        $auction->save();

        $purchasedCard = $auction->card;
        $purchasedCard->user_id = auth()->id();
        $purchasedCard->save();

        /** @var User $buyer */
        $buyer = auth()->user();
        $buyer->currency = $buyer->currency - $auction->buyout_price;
        $buyer->save();

        $seller = $auction->seller;
        $seller->currency = $seller->currency + $auction->buyout_price;
        $seller->save();

        return redirect(route('dashboard'))->with('success', 'You won the auction!');
    }
}
