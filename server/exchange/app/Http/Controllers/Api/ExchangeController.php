<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ExchangeRateService;


class ExchangeController extends Controller
{
    protected $exchangeRateService;

    // no error
    const NO_ERROR = '0000'; // 回傳成功

    // error code
    const PARAM_EMPTY = '1000'; // 參數為空

    /**
     * Dependency Injection
     */
    public function __construct(ExchangeRateService $exchangeRateService)
    {
        $this->exchangeRateService = $exchangeRateService;
    }

    /**
     * 貨幣轉換
     * @param string $phone 手機號碼
     * @return array
     */
    public function exchange(Request $request)
    {
        // 過濾參數
        $amount = htmlspecialchars(trim($request->input('amount', ''))); // 金額
        $source = htmlspecialchars(trim($request->input('source', ''))); // 原貨幣
        $target = htmlspecialchars(trim($request->input('target', ''))); // 轉換貨幣

        // 金額尚未填寫
        if (empty($amount)) {
            return [
                'return_code' => self::PARAM_EMPTY,
                'msg' => '請填寫金額！',
            ];
        }

        // 原貨幣尚未填寫
        if (empty($source)) {
            return [
                'return_code' => self::PARAM_EMPTY,
                'msg' => '請填寫金額！',
            ];
        }

        // 轉換貨幣尚未填寫
        if (empty($target)) {
            return [
                'return_code' => self::PARAM_EMPTY,
                'msg' => '請填寫金額！',
            ];
        }

        $rate = $this->exchangeRateService->getExchangeRateData($source); // 取得轉換匯率資訊
        $changeAmount = number_format(round($amount * $rate[$target], 2), 2); // 轉換後金額(四捨五入至小數點第二位、千分位顯示)

        return $result = [
            'return_code' => self::NO_ERROR,
            'data' => [
                'msg' => 'success',
                'amount' => $changeAmount
            ],
        ];
    } 
}
