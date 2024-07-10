<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Hub</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .product-box {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            padding: 20px;
            margin: 10px;
            width: 30%
        }

        img {
            max-width: 100%;
            height: auto;
        }

        h3 {
            color: #333333;
        }

        p {
            color: #555555;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        footer {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
            color: #777777;
        }
    </style>
</head>

<body>
    <header>
        <img src="{{ asset('public/assets/web/ASSETS_En/imgs/template/logoFur1.png') }}" alt="Furniture hub">
    </header>
    <p>Dear {{ $data['name'] }},</p>

    <p>Thank you for choosing Furniture Hub.</p>

    {{-- <div class="product-box">
        <h3>Product Details:</h3>
        <p><b>Product Name:</b>{{ $data['productName'] }}</p>
        <img src="{{ asset($data['productImage']) }}" alt="{{ $data['productName'] }}" width="100px">
        <p><b>SKU:</b> {{ $data['productsku'] }}</p>
    </div> --}}

    <p>You have added some products to your shopping cart, We can’t wait to show you why our company is one of the best in the furniture industry.</p>

    <p><b>Contact Us:</b></p>
    <ul>
        <li><a href="tel:01060552252">01060552252</a></li>
        <li><a href="mailto:info@furniturehubapp.com">info@furniturehubapp.com</a></li>
    </ul>

    <p>Please enjoy your experience.</p>

    <p>Best regards,</p>
    <p>Furniture Hub team 🧡</p>
</body>

</html>
