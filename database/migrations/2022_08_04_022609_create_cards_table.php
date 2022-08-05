<?php

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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->string('name');
            $table->text('cover_image');
            $table->text('description')->nullable();
            $table->string('status')->default('normal');
            $table->unsignedInteger('cuteness')->default(0);
            $table->unsignedInteger('playfulness')->default(0);
            $table->unsignedInteger('loudness')->default(0);
            $table->unsignedInteger('smartness')->default(0);
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
        Schema::dropIfExists('cards');
    }
};
