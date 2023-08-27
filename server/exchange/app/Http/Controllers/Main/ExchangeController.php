<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExchangeController extends Controller
{
    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        // 匯率資料
        $data['currencies'][0] = 'TWD';
        $data['currencies'][1] = 'JPY';
        $data['currencies'][2] = 'USD';

        return view('main.exchange', $data);
    }
}



