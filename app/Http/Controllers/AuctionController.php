<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Card;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auction.index', [
            'auctions' => Auction::with(['buyer', 'card', 'seller'])->orderByDesc('created_at')->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Card $card)
    {
        return view('auction.create', [
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auction $auction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        //
    }
}
