<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auction>
 */
class AuctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'card_id' => function (array $attributes) {
                return Card::factory()
                    ->withDescription()
                    ->withStatus()
                    ->withCuteness()
                    ->withPlayfulness()
                    ->withLoudness()
                    ->withSmartness()
                    ->create([
                        'user_id' => $attributes['seller_id']
                    ])->id;
            },
            'seller_id' => User::factory(),
            'buyer_id' => null,
            'current_bid' => 0,
            'buyout_price' => null,
            'selling_price' => null,
            'sold_at' => null,
            'ends_at' => Carbon::now()->addMinutes(5),
        ];
    }

    public function withCard(Card $card): static
    {
        return $this->state(function () use ($card) {
            return [
                'card_id' => $card->id,
            ];
        });
    }

    public function withSeller(User $seller): static
    {
        return $this->state(function () use ($seller) {
            return [
                'seller_id' => $seller->id,
            ];
        });
    }

    public function withBuyer(?User $buyer = null): static
    {
        return $this->state(function () use ($buyer) {
            return [
                'buyer_id' => $buyer?->id ?? User::factory(),
            ];
        });
    }

    public function withCurrentBid(?int $currentBid = null): static
    {
        return $this->state(function () use ($currentBid) {
            return [
                'current_bid' => $currentBid ?? fake()->numberBetween(0, 10000000),
            ];
        });
    }

    public function withBuyoutPrice(?int $buyoutPrice = null): static
    {
        return $this->state(function () use ($buyoutPrice) {
            return [
                'buyout_price' => $buyoutPrice ?? fake()->numberBetween(0, 10000000),
            ];
        });
    }

    public function withSellingPrice(?int $sellingPrice = null): static
    {
        return $this->state(function () use ($sellingPrice) {
            return [
                'selling_price' => $sellingPrice ?? fake()->numberBetween(0, 10000000),
            ];
        });
    }

    public function withSoldAt(?Carbon $soldAt = null): static
    {
        return $this->state(function (array $attributes) use ($soldAt) {
            $adjustedSoldAt = null;

            if ($soldAt->lt($attributes['created_at'])) {
                $adjustedSoldAt = $attributes['created_at'];
            }

            if ($soldAt->gt($attributes['ends_at'])) {
                $adjustedSoldAt = $attributes['ends_at'];
            }

            return [
                'sold_at' => $adjustedSoldAt ?? $soldAt,
            ];
        });
    }

    public function endsAt(?Carbon $endsAt = null): static
    {
        return $this->state(function () use ($endsAt) {
            return [
                'ends_at' => $endsAt ?? Carbon::now()->addMinutes(30),
            ];
        });
    }
}
