<?php

use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Card::class);
            $table->foreignIdFor(User::class, 'seller_id');
            $table->foreignIdFor(User::class, 'buyer_id')->nullable();
            $table->unsignedInteger('starting_bid')->default(0);
            $table->unsignedInteger('buyout_price')->nullable();
            $table->unsignedInteger('selling_price')->nullable();
            $table->dateTime('sold_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auctions');
    }
};
