<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Panel')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f9;
            color: #333333;
        }
        .wrapper { display: flex; min-height: 100vh; }

        .sidebar {
            width: 250px;
            background: #1e293b;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; bottom: 0; left: 0;
        }
        .sidebar .brand {
            padding: 20px;
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            background: #172033;
            letter-spacing: 1px;
        }
        .sidebar nav { flex: 1; padding-top: 10px; }
        .sidebar nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 22px;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 15px;
            transition: background 0.2s, color 0.2s;
        }
        .sidebar nav a:hover { background: #334155; color: #ffffff; }
        .sidebar nav a.active { background: #10b981; color: #ffffff; }
        .sidebar nav a .icon { width: 20px; text-align: center; font-size: 16px; }

        .sidebar .user-box {
            padding: 14px 22px;
            border-top: 1px solid #334155;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .sidebar .user-box .avatar {
            width: 34px; height: 34px;
            border-radius: 50%;
            background: #10b981;
            color: #ffffff;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 14px;
            flex-shrink: 0;
        }
        .sidebar .user-box .info .name {
            font-size: 14px; font-weight: 600;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .sidebar .user-box .info .role {
            font-size: 12px; color: #94a3b8; text-transform: capitalize;
        }
        .sidebar .logout { border-top: 1px solid #334155; }
        .sidebar .logout button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 22px;
            background: none;
            border: none;
            color: #f87171;
            font-size: 15px;
            font-family: inherit;
            cursor: pointer;
            text-align: left;
            transition: background 0.2s, color 0.2s;
        }
        .sidebar .logout button:hover { background: #dc2626; color: #ffffff; }
        .sidebar .logout button .icon { width: 20px; text-align: center; font-size: 16px; }

        .main { flex: 1; margin-left: 250px; padding: 24px; }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        .header h1 { font-size: 24px; color: #1e293b; }
        .header .user { display: flex; align-items: center; gap: 10px; }
        .header .user .avatar {
            width: 38px; height: 38px;
            border-radius: 50%;
            background: #10b981;
            color: #ffffff;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700;
        }
        .panel {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }
        .panel .panel-header {
            padding: 16px 20px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 16px;
            font-weight: 600;
            color: #1e293b;
        }
        .info-row {
            display: flex;
            padding: 12px 20px;
            border-bottom: 1px solid #f3f4f6;
            font-size: 14px;
        }
        .info-row .label { width: 160px; color: #6b7280; }
        .info-row .value { color: #1e293b; font-weight: 500; }
        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    </style>
</head>
<body>
    <div class="wrapper">
        <aside class="sidebar">
            <div class="brand">USER PANEL</div>
            <nav>
                <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                    <span class="icon">🏠</span> Home
                </a>
            </nav>

            <div class="user-box">
                <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div class="info">
                    <div class="name">{{ Auth::user()->name }}</div>
                    <div class="role">{{ Auth::user()->role }}</div>
                </div>
            </div>

            <div class="logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"><span class="icon">🚪</span> Logout</button>
                </form>
            </div>
        </aside>

        <main class="main">
            <div class="header">
                <h1>@yield('title', 'Home')</h1>
                <div class="user">
                    <span>{{ Auth::user()->name }}</span>
                    <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
