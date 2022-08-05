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

    protected $corgiImages = [
        'https://images.unsplash.com/photo-1644931900689-f56386afd2cd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8Y29yZ2l8fHx8fHwxNjU5NjYyODMw&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=1080',
        'https://corgicare.com/wp-content/uploads/corgi-puppies.jpg',
        'https://images2.minutemediacdn.com/image/upload/c_crop,w_6960,h_3915,x_0,y_521/c_fill,w_1440,ar_16:9,f_auto,q_auto,g_auto/images/voltaxMediaLibrary/mmsport/mentalfloss/01g05dr5ywhn47egkrkd.jpg',
        'https://news.virginia.edu/sites/default/files/Header_corgicrown_EE.jpg',
        'https://image.shutterstock.com/image-photo/corgi-dog-pembroke-welsh-walking-260nw-1676506852.jpg',
        'https://mymodernmet.com/wp/wp-content/uploads/2020/08/welsh-corgi-facts-thumbnail-3.jpg',
        'https://media-be.chewy.com/wp-content/uploads/2018/03/05113729/corgi-sploot-1024x548.jpg',
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
            'cover_image' => Arr::random($this->corgiImages),
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
