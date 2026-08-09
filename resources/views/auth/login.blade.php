<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
        }
        .card h2 {
            text-align: center;
            margin-bottom: 8px;
            color: #333333;
        }
        .card p.sub {
            text-align: center;
            color: #777777;
            margin-bottom: 24px;
        }
        .form-group {
            margin-bottom: 16px;
        }
        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: #333333;
            font-weight: 600;
        }
        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cccccc;
            border-radius: 6px;
            font-size: 15px;
        }
        .form-group input:focus {
            outline: none;
            border-color: #4a90e2;
        }
        .form-group .error {
            color: #e74c3c;
            font-size: 13px;
            margin-top: 4px;
        }
        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background: #4a90e2;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }
        .btn:hover {
            background: #357abd;
        }
        .register-link {
            text-align: center;
            margin-top: 16px;
            font-size: 14px;
            color: #777777;
        }
        .register-link a {
            color: #4a90e2;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Login</h2>
        <p class="sub">Welcome back</p>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Login</button>

            <p class="register-link">Don't have an account? <a href="#">Register</a></p>
        </form>
    </div>
</body>
</html>
