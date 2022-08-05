<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Seeder;

class CardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testUser = User::find(1);

        Card::factory()
            ->withUser($testUser)
            ->withDescription()
            ->withStatus()
            ->withCuteness()
            ->withPlayfulness()
            ->withLoudness()
            ->withSmartness()
            ->count(5)
            ->create();
    }
}
