<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Cangkulin</title>
    <style>
        body { font-family: Arial; background: #e8f5e9; }
        .navbar {
            background: #2e7d32;
            padding: 15px;
            color: white;
            text-align: center;
        }
        .container {
            width: 380px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            border: 1px solid #c8e6c9;
        }
        input { width: 100%; padding: 8px; margin-top: 8px; border-radius: 5px; border: 1px solid #aaa; }
        button { width: 100%; padding: 10px; background: #43a047; color:white; border:none; border-radius:5px; margin-top:15px; }
        a { color:#ef6c00; }
    </style>
</head>
<body>

<div class="navbar">CANGKULIN</div>

<div class="container">
    <h2 style="text-align:center;">Register</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label>Nama</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>No Hp</label>
        <input type="No Hp" name="No Hp" required>

        <label>username</label>
        <input type="username" name="username" required>

        <label>password</label>
        <input type="password" name="password" required>

        <button type="submit">Daftar</button>

        <p style="text-align:center;margin-top:10px;">
            Sudah punya akun? <a href="{{ route('login') }}">Login</a>
        </p>
    </form>
</div>

</body>
</html>
