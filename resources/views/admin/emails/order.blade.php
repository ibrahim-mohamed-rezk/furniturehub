<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You from Furniture Hub</title>
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

    <p>Thank you for trusting Furniture Hub. We hope you enjoy your recent purchase from us. Loyal customers like you
        allow us to do the work we love.</p>

    <p>If you have feedback you wish to share with a specific department, please feel free to email our customer service
        department at <a href="mailto:info@furniturehubapp.com">info@furniturehubapp.com</a>.</p>

    {{--  <p>Finally, if you enjoyed the experience, <a href="#">You can sign up to stay in touch with our latest offers and news.</a></p>  --}}

    <p>0000000000000000000000000000000000000</p>

    <p>Thank you for your time.</p>

    <p>Best regards,</p>
    <p>Furniture Hub team 🧡</p>
</body>

</html>
