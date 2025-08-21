<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Account Activation - {{ $app_settings->app_name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ddd;
        }
        .button {
            display: inline-block;
            background: #28a745;
            color: #fff !important;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Dear {{ $data['name'] }},</p>

        <p>Click the button below to activate your <a href="https://faucet.cogentproducts.co" target="_blank">{{ $app_settings->app_name }}</a> account:</p>

        <a href="http://localhost:8000/account/activate/{{ $data['user_id'] }}/{{ $data['slug'] }}" class="button">Activate Account</a>
        <!-- <a href="https://faucet.cogentproducts.co/account/activate/{{ $data['user_id'] }}/{{ $data['slug'] }}" class="button">Activate Account</a> -->

        <p class="footer">
            Regards,<br>
            {{ $app_settings->app_name }} - Team
        </p>
    </div>
</body>
</html>
