<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Cangkulin</title>
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            margin: 0;
        }

        .navbar {
            background: #2e7d32;
            padding: 14px;
            color: white;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 1px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }

        .auth-wrapper {
            min-height: calc(100vh - 52px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 390px;
            background: white;
            padding: 24px 24px 22px;
            border-radius: 12px;
            border: 1px solid #c8e6c9;
            box-shadow: 0 4px 18px rgba(0,0,0,0.12);
        }

        .container h2 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 4px;
        }

        .container p.subtitle {
            text-align: center;
            font-size: 12px;
            color: #78909c;
            margin-top: 0;
            margin-bottom: 18px;
        }

        label {
            font-size: 13px;
            display: block;
            margin-top: 10px;
            color: #455a64;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #b0bec5;
            font-size: 13px;
        }

        input:focus {
            outline: none;
            border-color: #43a047;
            box-shadow: 0 0 0 2px rgba(67,160,71,0.15);
        }

        button {
            width: 100%;
            padding: 10px;
            background: #43a047;
            color:white;
            border:none;
            border-radius:6px;
            margin-top:18px;
            font-size: 14px;
            font-weight: bold;
            cursor:pointer;
        }

        button:hover { background: #2e7d32; }

        .bottom-text {
            text-align:center;
            margin-top:12px;
            font-size:12px;
            color:#607d8b;
        }

        .bottom-text a { color:#ef6c00; text-decoration:none; font-weight:bold; }
        .bottom-text a:hover { text-decoration:underline; }
    </style>
</head>
<body>

<div class="navbar">CANGKULIN</div>

<div class="auth-wrapper">
    <div class="container">
        <h2>Register</h2>
        <p class="subtitle">Buat akun admin untuk mengakses sistem Cangkulin.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label>Nama</label>
            <input type="text" name="name" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>No HP</label>
            <input type="text" name="no_hp" required>

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Daftar</button>

            <p class="bottom-text">
                Sudah punya akun? <a href="{{ route('login') }}">Login</a>
            </p>
        </form>
    </div>
</div>

</body>
</html>
