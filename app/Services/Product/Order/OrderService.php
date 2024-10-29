<?php

namespace App\Services\Product\Order;

use App\Models\Cobon;
use App\Models\Offer;
use App\Services\Currency\CurrencyService;
use App\Services\Product\Cart\CartService;
use App\Models\CobonProduct;
use App\Models\CobonCategory;
use App\Models\Product;

class OrderService
{
    public function calculate($requestData)
    {
        $cobon_discount = 0;
        $offer_discount = 0;
        $total = 0;
        $currency = (new CurrencyService())->getCurrency();
        $cart = (new CartService())->carts()['data'];
        $total_products = round($cart['total_cart'], 2);
        $total += $total_products;
        $cobon = $this->checkCobon($requestData['cobon'] ?? null, $total, $cart);

        if ($cobon['check_valid'] == true) {
            $cobon_discount = $cobon['discount'];
            $total =  $cobon['total'];
        }
        $offer = $this->checkOffer($total);
        if ($offer['check_valid'] == true) {
            $offer_discount = $offer['discount'];
            $total =  $offer['total'];
        }
        $total_delivery = settings('shipping_cost') / $currency->value;
        $tax_value = settings('tax_cost') / $currency->value;
        return
            [
                'total_products' => $total_products,
                'total_delivery' => $total_delivery,
                'tax_value' => $tax_value,
                'offer' => $offer,
                'cobon' => $cobon,
                'total' => round($total, 2),
            ];
    }

    private function checkCobon($cobon, $total, $cart)
    {
        $currency = (new CurrencyService())->getCurrency();
        $res =
            [
                'msg' => null,
                'discount' => 0,
                'cobon_id' => null,
                'check_valid' => false,
            ];

        $cobons = Cobon::where('code', $cobon)->where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->orderBy('id', 'DESC')->get();
        foreach ($cobons as $cobon) {
            $discount = 0;
            $msg = null;
            if ($cobon && $cobon->type == "product") {
                $ids = [];
                $product_ids = CobonProduct::where('cobon_id', $cobon->id)->pluck('product_id')->toArray();
                $ids = array_merge($ids, $product_ids);
                foreach ($cart['carts'] as $cartItem) {

                    $productId = $cartItem->product_id;
                    if (in_array($productId, $ids)) {

                        $res['cobon_id'] = $cobon->id;
                        if ($cobon->status == 'value') {
                            $discount = round($cobon->discount / $currency->value, 0);
                            $msg = __('web.cobon_discount') . ' ' . $discount . $currency->symbol;
                        } else {
                            $discount =  round(($cartItem->product->cost_discount ?? $cartItem->product->cost) * ($cartItem->count) * ($cobon->discount / 100) / $currency->value, 0);
                            $msg = __('web.cobon_discount') . ' ' . $discount . $currency->symbol;
                        }
                        $total = $total - $discount;

                        $res['msg'] = $msg;
                        $res['total'] = $total < 0 ? 0 : $total;
                        $res['discount'] = $discount;
                        $res['check_valid'] = true;
                    }
                }
                break;
            } elseif ($cobon && $cobon->type == "category") {
                $ids = [];
                $category_ids = CobonCategory::where('cobon_id', $cobon->id)->pluck('category_id')->toArray();
                $ids = array_merge($ids, $category_ids);
                foreach ($cart['carts'] as $cartItem) {
                    $productId = $cartItem->product_id;
                    $category_id = Product::where('id', $productId)->value('category_id');
                    if (in_array($category_id, $ids)) {

                        $res['cobon_id'] = $cobon->id;
                        if ($cobon->status == 'value') {
                            $discount = round($cobon->discount / $currency->value, 0);
                            $msg = __('web.cobon_discount') . ' ' . $discount . $currency->symbol;
                        } else {
                            $discount =  round(($cartItem->product->cost_discount   ?? $cartItem->product->cost)  * ($cartItem->count) * ($cobon->discount / 100) / $currency->value, 0);
                            $msg = __('web.cobon_discount') . ' ' . $discount . $currency->symbol;
                        }
                        $total -= $discount;
                        $res['msg'] = $msg;
                        $res['total'] = $total < 0 ? 0 : $total;
                        $res['discount'] = $discount;
                        $res['check_valid'] = true;
                    }
                }
            } elseif ($cobon && $cobon->type == "all") {
                $res['cobon_id'] = $cobon->id;
                if ($cobon->status == 'value') {
                    $discount = round($cobon->discount / $currency->value, 2);
                    $msg = __('web.cobon_discount') . ' ' . $discount . $currency->symbol;
                } else {
                    $discount =  round($total * ($cobon->discount / 100) / $currency->value, 2);
                    $msg = __('web.cobon_discount') . ' ' . $discount . $currency->symbol;
                }
                $total -= $discount;
                $res['msg'] = $msg;
                $res['total'] = $total < 0 ? 0 : $total;
                $res['discount'] = $discount;
                $res['check_valid'] = true;
            } elseif ($cobon && $cobon->type == "sales") {
                $res['cobon_id'] = $cobon->id;
                $discount =  round($total * ($cobon->discount / 100) / $currency->value, 2);
                $msg = __('web.cobon_discount') . ' ' . $discount . $currency->symbol;
                $total -= $discount;
                $res['msg'] = $msg;
                $res['total'] = $total < 0 ? 0 : $total;
                $res['discount'] = $discount;
                $res['check_valid'] = true;
            }
        }

        return $res;
    }

    private function checkOffer($total)
    {
        $currency = (new CurrencyService())->getCurrency();
        $res =
            [
                'msg' => null,
                'discount' => 0,
                'offer_id' => null,
                'check_valid' => false,
            ];
        $offer = Offer::where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->orderBy('id', 'DESC')->first();

        if ($offer) {
            $res['offer_id'] = $offer->id;
            if ($offer->status == 'value') {
                $discount = round($offer->discount / $currency->value, 2);
                $msg = __('web.offer_discount') . ' ' . $discount . $currency->symbol;
            } else {
                $discount =  round(($total * ($offer->discount / 100)) / $currency->value, 2);
                $msg = __('web.cobon_discount') . ' ' . $discount . $currency->symbol;
            }
            $total -= $discount;
            $res['msg'] = $msg;
            $res['total'] = $total < 0 ? 0 : $total;
            $res['discount'] = $discount;
            $res['check_valid'] = true;
        }
        return $res;
    }
}
