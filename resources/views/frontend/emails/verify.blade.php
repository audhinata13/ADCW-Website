<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Verifikasi Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .email-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        h1 {
            color: #333333;
        }

        p {
            color: #555555;
            font-size: 16px;
            line-height: 1.5;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #4CAF50;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            color: #999999;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h1>Hi {{ $user->name }},</h1>
        <p>Terima kasih telah mendaftar. Untuk mengaktifkan akun Anda, silakan klik tombol di bawah ini:</p>

        <a href="{{ url('/verify-email/' . $token) }}" class="btn">Verifikasi Email</a>

        <p>Jika Anda tidak merasa melakukan pendaftaran, silakan abaikan email ini.</p>

        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>

</html>
