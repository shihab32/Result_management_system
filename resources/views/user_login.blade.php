<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #0f172a, #1d4ed8, #60a5fa);
            padding: 20px;
        }

        .login-box {
            width: 100%;
            max-width: 420px;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(14px);
            border-radius: 20px;
            padding: 35px 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.25);
            color: white;
        }

        .login-box h2 {
            text-align: center;
            font-size: 30px;
            margin-bottom: 10px;
        }

        .login-box p {
            text-align: center;
            margin-bottom: 25px;
            color: #dbeafe;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 13px 14px;
            border: none;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }

        .form-group input:focus {
            box-shadow: 0 0 0 3px rgba(255,255,255,0.25);
        }

        .login-btn {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 10px;
            background: #facc15;
            color: #111827;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: #eab308;
            transform: translateY(-1px);
        }

        .extra-links {
            text-align: center;
            margin-top: 18px;
        }

        .extra-links a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .extra-links a:hover {
            text-decoration: underline;
        }

        .error-message {
            background: rgba(239, 68, 68, 0.20);
            border: 1px solid rgba(239, 68, 68, 0.45);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .success-message {
            background: rgba(34, 197, 94, 0.20);
            border: 1px solid rgba(34, 197, 94, 0.45);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>User Login</h2>
        <p>Login to access your dashboard</p>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error-message">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('user.login.submit') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <div class="extra-links">
            <a href="#">Forgot Password?</a>
        </div>
    </div>

</body>
</html>