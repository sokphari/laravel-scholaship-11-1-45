<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        .login-link {
            text-align: center;
            margin-top: 16px;
            font-size: 14px;
            color: #777777;
        }
        .login-link a {
            color: #4a90e2;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Register</h2>
        <p class="sub">Create your account</p>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

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

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
            </div>

            <button type="submit" class="btn">Register</button>

            <p class="login-link">Already have an account? <a href="#">Login</a></p>
        </form>
    </div>
</body>
</html>
