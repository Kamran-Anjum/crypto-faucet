<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Password Link - {{ $app_settings->app_name }}</title>
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

        <p>We received a request to reset your password for your <a href="https://cogentdevs.com" style="color: #3498db; text-decoration: none;"><strong>{{ $app_settings->app_name }}</strong></a> account.</p>

        <p>Click the button below to create your new password:</p>

        <a href="http://localhost:8000/reset-password/{{ $data['user_id'] }}-{{ bin2hex(random_bytes(10)) }}" style="background-color: #3498db; color: #ffffff; padding: 12px 25px; text-decoration: none; border-radius: 5px; display: inline-block; font-weight: bold;">Create New Password</a>
        <!-- <a href="https://cogentdevs.com/reset-password/{{ $data['user_id'] }}-{{ bin2hex(random_bytes(10)) }}" style="background-color: #3498db; color: #ffffff; padding: 12px 25px; text-decoration: none; border-radius: 5px; display: inline-block; font-weight: bold;">Create New Password</a> -->

        <p>If you did not request a password reset, please ignore this email or contact support if you have concerns.</p>

        <p class="footer">
            Regards,<br>
            {{ $app_settings->app_name }} - Team
        </p>
    </div>
</body>
</html>
