<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['subject'] }}</title>
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
        <img src="{{asset('public/assets/web/ASsets_Ar/imgs/template/logoFurAR.png')}}" alt="Furniture hub">
    </header>
    <section style="padding: 20px;">
        <h3> Hi {{$data['name']}}, Welcome to the Affiliate System! </h3>
        <p><b>Email:</b> {{ $data['email'] }}</p>
        <p><b>Password:</b> {{ $data['password'] }}</p>
        <p>You can add users to your Network by sharing your <a href="{{ $data['url'] }}">{{ $data['url'] }}</a></p>
        <p>You can manage your affiliate members and orders by visiting your <a href="{{ $data['dashboard'] }}">{{ $data['dashboard'] }}</a></p>
        <p><b>Contact Us:</b></p>
        <ul>
            <li><a href="tel:01060552252">01060552252</a></li>
            <li><a href="mailto:info@furniturehubapp.com">info@furniturehubapp.com</a></li>
        </ul>
    </section>
    <footer>
        <p>Thank You!</p>
    </footer>
</body>
</html>
