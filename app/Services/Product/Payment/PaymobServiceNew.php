<?php

namespace App\Services\Product\Payment;

use Illuminate\Support\Facades\Http;

class PaymobServiceNew
{
    private $api_key = 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SnVZVzFsSWpvaWFXNXBkR2xoYkNJc0luQnliMlpwYkdWZmNHc2lPakUxTmpRMU1Td2lZMnhoYzNNaU9pSk5aWEpqYUdGdWRDSjkuV1Z5R0lKQnhGRVVjMk91dWY3bGY3SXFvWEFkeGxHRlZ6MXdHMmN3R2dFbk04N1hyMFJGQzlKamJZY0hNQmxweFhPSzEwejA1ajQtd09CQ05WRE54SVE=';
    private $secret_key = 'egy_sk_test_d27335b6c51afb1fa88939cbf87203a387c80c3cd7c6d889107e9068033b0ea4';

    private $public_key = 'egy_pk_test_3o94BB4J2QWwIRQfxHmcjx6zQUusilTf';
    private $token ;
    private $id ;
    private $integration_id ;
    private $total;
    private $total_cents;
    private $iframe_token;
    private $order;
    private $user;
    private $carts;
    public function __construct($order,$user,$iframe_token,$integration_id,$carts)
    {
        $this->total = (double)$order->total;
        $this->total_cents = $this->total * 100;
        $this->iframe_token = $iframe_token;
        $this->integration_id = $integration_id;
        $this->order = $order;
        $this->user = $user;
        $this->carts = $carts;
    }
    public function getPublicKey()
    {
        return $this->public_key;
    }
    public function intention()
    {

        $url = "https://accept.paymob.com/v1/intention/";
        $items = [];
        foreach ($this->carts as $cart) {
            $items[] = [
                'name' => $cart->product->details->name ?? "NA",
                'amount' => (double)($cart->product->cost_discount ?? $cart->product->cost ?? $cart->extension->value) ?? 0,
                'description' => "NA",
                'quantity' => $cart->count ?? 1,
            ];
        }
//        dd($items);
        $payment_methods= [];
//        $payment_methods[0]= (int)$this->integration_id;
        $payment_methods[0]= 4628514;
//        dd($payment_methods);
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Token '.$this->secret_key,
        ])->post($url, [
            'amount' => $this->total_cents,
            'currency' => 'EGP',
            'payment_methods' => $payment_methods,
            'billing_data' => [
                "apartment" => "NA",
                "email" => $this->user->email,
                "floor" => "NA",
                "first_name" => $this->user->name  ?? "NA",
                "street" => "NA",
                "building" => "NA",
                "phone_number" => $this->user->phone ?? "NA",
                "shipping_method" => "NA",
                "postal_code" => "NA",
                "city" => "NA",
                "country" => "NA",
                "last_name" =>$this->user->name,
                "state" => "NA"
            ],
            'items' => [],
            'customer' => [
                'first_name' => $this->user->first_name,
                'last_name' => $this->user->last_name,
                'email' => $this->user->email,
            ]
        ]);

        return $response->json();
    }


}