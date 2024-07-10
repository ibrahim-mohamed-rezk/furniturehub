<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Furniture Hub</title>
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
    <p>Welcome To Furniture Hub</p>
    <p>Dear {{ $data['name'] }},</p>

    <p>Welcome to the Furniture Hub family! You've joined +60K users who trust Furniture Hub.</p>

    <p>Buying furniture and decoration has never been easier and faster!</p>

    {{--  <p>Download Furniture Hub App to enjoy the full experience:</p>
    <a href="https://play.google.com/store/apps/details?id=org.furniture.hub.app">
        <img src="google_play_icon.png" alt="Google Play">
    </a>
    <a href="https://www.apple.com/app-store/">
        <img src="app_store_icon.png" alt="App Store">
    </a>
    <a href="https://appgallery.huawei.com/#/app/C101058731">
        <img src="huawei_appgallery_icon.png" alt="Huawei AppGallery">
    </a>  --}}

    <p>You can also keep up with all the latest news by following us on social media:</p>
    <ul>
        <li>Facebook: <a href="https://www.facebook.com/furniturehubapp?mibextid=ZbWKwL">Furniture Hub on Facebook</a>
        </li>
        <li>Instagram: <a href="https://instagram.com/furniturehubeg?igshid=MTk0NTkyODZkYg==">Furniture Hub on
                Instagram</a></li>
    </ul>

    <p>We hope this is the beginning of a long and trusted relationship.</p>

    <p>Warm regards,</p>
    <p>Furniture Hub team 🧡</p>
</body>

</html>
