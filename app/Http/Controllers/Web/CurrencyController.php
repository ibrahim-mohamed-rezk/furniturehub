<?php

namespace App\Http\Controllers\Web;

use App\Services\Currency\CurrencyService;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    public function setCurrency($currency_id)
    {
        (new CurrencyService())->setCurrency($currency_id);
        $response = redirect()->back();
        $response->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', '0');
        return $response;
    }
}
