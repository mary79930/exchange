<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExchangeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // 匯率資料
        $currencies[0] = 'TWD';
        $currencies[1] = 'JPY';
        $currencies[2] = 'USD';

        $params = [
            'amount' => rand(),
            'source' => $currencies[rand(0, 2)], 
            'target' => $currencies[rand(0, 2)]
        ];

        $response = $this->call('GET', '/exchange', $params);

        $response->dump()->dumpHeaders();

        $response->assertStatus(200);
    }
}
