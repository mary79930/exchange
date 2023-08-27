<?php

namespace App\Services;

class ExchangeRateService
{
    /**
     * 取得匯率轉換資訊
     * @return array
     */
    public function getExchangeRateData($source)
    {
        switch($source) {
            // 台幣
            case 'TWD':
                $result['TWD'] = 1;
                $result['JPY'] = 3.669;
                $result['USD'] = 0.03281;
                break;

            // 日幣
            case 'JPY':
                $result['TWD'] = 0.26956;
                $result['JPY'] = 1;
                $result['USD'] = 0.00885;
                break;

            // 美金
            case 'USD':
                $result['TWD'] = 30.444;
                $result['JPY'] = 111.801;
                $result['USD'] = 1;
                break;
        }

        return $result;
    }
}
