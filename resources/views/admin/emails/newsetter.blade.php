<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Offer from Furniture Hub</title>
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

    <p>Once part of Furniture Hub, always part of Furniture Hub. So we happily tell you about our new offer!</p>

    <p>($data['message'])</p>

    <p>What are you waiting for? Get shopping now!</p>

    <p>Best regards,</p>
    <p>Furniture Hub team 🧡</p>
</body>

</html>
