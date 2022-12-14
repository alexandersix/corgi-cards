<?php

namespace App\Models;

use App\Enums\CardStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'cover_image',
        'status',
        'cuteness',
        'playfulness',
        'loudness',
        'smartness',
    ];

    protected $casts = [
        'status' => CardStatus::class,
    ];

    public function auctions(): HasMany
    {
        return $this->hasMany(Auction::class);
    }

    public function latestAuction(): HasOne
    {
        return $this->hasOne(Auction::class)->latest();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
