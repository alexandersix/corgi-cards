<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'seller_id',
        'buyer_id',
        'current_bid',
        'buyout_price',
        'selling_price',
        'sold_at',
        'ends_at',
    ];

    protected $casts = [
        'sold_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function getDisplayCurrentBidAttribute(): string
    {
        return (string) round($this->current_bid / 100, 2);
    }

    public function getDisplayBuyoutPriceAttribute(): string
    {
        return (string) round($this->buyout_price / 100, 2);
    }

    public function getDisplaySellingPriceAttribute(): string
    {
        return (string) round($this->selling_price / 100, 2);
    }
}
