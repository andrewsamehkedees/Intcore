<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h1>Hello,</h1>

    <p>Thank you for registering with us. Please click the link below to verify your email address:</p>

    <p><a href="{{ url('/verify-email?token=' . $token) }}">Verify Email</a></p>

    <p>If you did not register with us, please ignore this email.</p>

    <p>Thanks,<br>Your Team</p>
</body>
</html>
