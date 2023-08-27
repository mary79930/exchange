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
        // 幣別種類
        $currencies[0] = 'TWD';
        $currencies[1] = 'JPY';
        $currencies[2] = 'USD';

        $params = [
            'amount' => rand(), // 隨機產生數值
            'source' => $currencies[rand(0, 2)], // 隨機取得幣別種類
            'target' => $currencies[rand(0, 2)] // 隨機取得幣別種類
        ];

        $response = $this->call('GET', '/exchange', $params);

        $response->dump()->dumpHeaders(); // 顯示相關資訊

        $response->assertStatus(200);
    }
}
