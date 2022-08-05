<?php

namespace Database\Seeders;

use App\Models\Auction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class AuctionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('id', '<', 4)->get();
        $sequenceData = [];

        foreach ($users as $user) {
            array_push($sequenceData, ['seller_id' => $user->id]);
        }

        Auction::factory()
            ->count(20)
            ->state(new Sequence(
                ...$sequenceData
            ))
            ->withCurrentBid()
            ->withBuyoutPrice()
            ->create();
    }
}
