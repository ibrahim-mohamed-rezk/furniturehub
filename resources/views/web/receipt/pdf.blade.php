<!DOCTYPE html>
<html @if (getCurrentLocale() == 'ar') class="rtl" lang="ar" dir="rtl" @else lang="en" @endif>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('receipt.title') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        body {
            font-family: 'XBRiyaz', Arial, sans-serif;
            direction: {{ getCurrentLocale() == 'ar' ? 'rtl' : 'ltr' }};
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            text-align: {{ getCurrentLocale() == 'ar' ? 'right' : 'left' }};
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 200px;
        }

        h1,h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            word-wrap: break-word;
        }

        th:nth-child(1),
        td:nth-child(1) {
            width: 10%;
        }

        th:nth-child(n+2),
        td:nth-child(n+2) {
            width: 22%;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="logo">
            @if (getCurrentLocale() == 'en')
                <img src="{{ asset(settings('logo')) }}" alt="Logo">
            @else
                <img src="{{ asset(settings('logo_ar')) }}" alt="Logo">
            @endif

        </div>
        <h2>{{ __('receipt.title') }}</h2>
        <table>
            <thead>
                <tr>
                    <th>{{ __('receipt.id') }}</th>
                    <th>{{ __('receipt.product_name') }}</th>
                    <th>{{ __('receipt.price') }}</th>
                    <th>{{ __('receipt.sku_code') }}</th>
                    <th>{{ __('receipt.quantity') }}</th>
                    <th>{{ __('receipt.total') }}</th>
                </tr>
            </thead>
            <tbody>
                {{--  <tr>
                    <td>1</td>
                    <td>ليزي بوي</td>
                    <td>10000 جنيه </td>
                    <td>TRA152</td>
                    <td>1</td>
                    <td>10000 جنيه</td>
                </tr>  --}}
                @foreach ($order_products as $key => $order_product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $order_product->product->details->name ?? __('web.'.$product->extension->title)}}</td>
                        <td>{{ $order_product->product->cost ?? $product->extension->value }}</td>
                        <td>{{ $order_product->count }}</td>
                        <td>{{ ($order_product->product->cost * $order_product->count) ?? ($product->extension->value * $order_product->count) }}</td>
                        


                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">{{ __('receipt.final_total') }}</td>
                    <td>{{ $order->total + $order->remain }} {{ __('web.EGP') }}</td>
                </tr>
                <tr>
                    <td colspan="5">{{ __('receipt.paid') }}</td>
                    <td>{{ $order->total }} {{ __('web.EGP') }}</td>
                </tr>
                <tr>
                    <td colspan="5">{{ __('receipt.left') }}</td>
                    <td>{{ $order->remain }} {{ __('web.EGP') }}</td>
                </tr>
                <tr>
                    <td colspan="5">{{ __('receipt.type') }}</td>
                    <td>{{ $order->payment->payment_type }}</td>
                </tr>
                <tr>
                    <td colspan="5">{{ __('receipt.way') }}</td>
                    <td>{{ $order->payment->payment_id }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        {{ __('receipt.generated_at') }}: {{ date('Y-m-d H:i')}}
    </div>

</body>

</html>