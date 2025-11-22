<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Cangkulin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e8f5e9;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background: #2e7d32;
            padding: 15px;
            color: white;
            text-align: center;
            font-size: 20px;
        }
        .container {
            width: 350px;
            margin: 60px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            border: 1px solid #c8e6c9;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 8px;
            border-radius: 5px;
            border: 1px solid #aaa;
        }
        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background: #43a047;
            color: white;
            border: none;
            border-radius: 5px;
        }
        button:hover { background: #2e7d32; }
        a { color: #ef6c00; }
    </style>
</head>
<body>

<div class="navbar">CANGKULIN</div>

<div class="container">
    <h2 style="text-align:center;">Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Username</label>
        <input type="username" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>

        <p style="text-align:center;margin-top:10px;">
            Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
        </p>
    </form>
</div>

</body>
</html>
