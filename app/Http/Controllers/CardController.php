<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $availableCards = Card::query()
            ->where('user_id', auth()->id())
            ->whereDoesntHave('latestAuction', function (Builder $query) {
                $query->whereNull('sold_at');
            })
            ->get();

        return Inertia::render('Dashboard', [
            'cards' => $availableCards,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        return Inertia::render('Cards/Show', [
            'card' => $card,
        ]);
    }
}
