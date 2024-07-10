<?php
namespace App\Services\Product\Rate;

use App\Models\Product;
use App\Models\Rate;

/**
 * Class based Helper to Send Notifications
 */
class RateService
{
    public function usersRate($products)
    {
        $rates = [];
        foreach ($products as $key => $product)
        {
            $rates[$key]['rate'] = $this->rate($product);
            $rates[$key]['user_id'] = $product->id;
        }
        return $rates;
    }
    public function getRate($product, $num =null)
    {
        $rates = [
            'count'=>$this->count($product,$num),
            'rate'=>$this->rate($product,$num),
        ];
        return $rates;
    }

    private function rate($product, $num = null)
    {
        $rates = 0;
        $count = $this->count($product);
        if ($count == 0)
        {
            return $rates;
        }
        $query = Rate::where('product_id',$product->id);
        if($num)
        {
            $query->where('rate',$num);
        }
        $rates = $query->sum('rate') / $count;
        return round($rates,1);
    }

    private function count($product, $num = null)
    {
        $query = Rate::where('product_id',$product->id);
        if($num)
        {
            $query->where('rate',$num);
        }
        $rates = $query->count();
        return $rates;
    }
}


