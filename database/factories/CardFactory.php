<?php

namespace Database\Factories;

use App\Enums\CardStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    protected $corgiNames = [
        'Leia',
        'Donut',
        'Cookie',
        'Sam',
        'Hammy',
        'Olivia',
        'Bob',
        'Ein',
        'Big Booper',
        'Potato Sack',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => null,
            'name' => Arr::random($this->corgiNames),
            'cover_image' => 'https://via.placeholder.com/500',
            'description' => null,
            'status' => CardStatus::Normal,
            'cuteness' => 0,
            'playfulness' => 0,
            'loudness' => 0,
            'smartness' => 0,
        ];
    }

    public function withUser(?User $user = null): static
    {
        return $this->state(function () use ($user) {
            return [
                'user_id' => $user?->id ?? User::factory()->create()->id,
            ];
        });
    }

    public function withDescription(?string $description = null): static
    {
        return $this->state(function () use ($description) {
            return [
                'description' => $description ?? fake()->paragraph(),
            ];
        });
    } 

    public function withStatus(?CardStatus $status = null): static
    {
        return $this->state(function () use ($status) {
            return [
                'status' => $status ?? Arr::random(CardStatus::cases())->value,
            ];
        });
    }

    public function withCuteness(?int $score = null): static
    {
        return $this->state(function () use ($score) {
            return [
                'cuteness' => $score ?? fake()->numberBetween(0, 100)
            ];
        });
    }

    public function withPlayfulness(?int $score = null): static
    {
        return $this->state(function () use ($score) {
            return [
                'playfulness' => $score ?? fake()->numberBetween(0, 100)
            ];
        });
    }

    public function withLoudness(?int $score = null): static
    {
        return $this->state(function () use ($score) {
            return [
                'loudness' => $score ?? fake()->numberBetween(0, 100)
            ];
        });
    }

    public function withSmartness(?int $score = null): static
    {
        return $this->state(function () use ($score) {
            return [
                'smartness' => $score ?? fake()->numberBetween(0, 100)
            ];
        });
    }
}
