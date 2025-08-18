<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f6f6f6; padding: 20px; margin: 0;">
    <table align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <tr>
            <td style="background-color: #4a90e2; padding: 20px; text-align: center; color: #ffffff;">
                <h2 style="margin: 0;">📩 New Contact Message</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; color: #333333;">
                <p style="font-size: 16px; margin: 0 0 15px 0;">
                    You have received a new contact email from <strong>{{ $data['name'] }}</strong>.
                </p>

                <h3 style="color: #4a90e2; margin-top: 0;">User Details</h3>
                <table cellpadding="5" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tr style="background-color: #f9f9f9;">
                        <td width="150"><strong>Name:</strong></td>
                        <td>{{ $data['name'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{{ $data['email'] }}</td>
                    </tr>
                    <tr style="background-color: #f9f9f9;">
                        <td><strong>Phone:</strong></td>
                        <td>{{ $data['phone'] }}</td>
                    </tr>
                </table>

                <h3 style="color: #4a90e2;">Subject</h3>
                <p style="margin: 0 0 15px 0;">{{ $data['subject'] }}</p>

                <h3 style="color: #4a90e2;">Message</h3>
                <p style="background-color: #f9f9f9; padding: 15px; border-radius: 6px; line-height: 1.5;">
                    {{ $data['message'] }}
                </p>

                <p style="margin-top: 25px; font-size: 14px; color: #888888;">
                    Thank you,<br>
                    <strong>{{ $app_settings->app_name }} Team</strong>
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
