<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_display_currency_converts_correctly()
    {
        $user = User::factory()->create([
            'currency' => 12345,
        ]);

        $expectedConversion = '123.45';

        $this->assertEquals($expectedConversion, $user->displayCurrency);
    }
}
