<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cashier Panel')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f9;
            color: #333333;
        }
        .wrapper { display: flex; min-height: 100vh; }

        /* Sidebar */
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
        .sidebar nav a.active { background: #4a90e2; color: #ffffff; }
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
            background: #4a90e2;
            color: #ffffff;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 14px;
            flex-shrink: 0;
        }
        .sidebar .user-box .info { overflow: hidden; }
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

        /* Main content */
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
            background: #4a90e2;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }
        .panel table { width: 100%; border-collapse: collapse; }
        .panel table th, .panel table td {
            padding: 12px 20px;
            text-align: left;
            font-size: 14px;
        }
        .panel table thead th {
            background: #f9fafb;
            color: #6b7280;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }
        .panel table tbody tr { border-top: 1px solid #f3f4f6; }
        .panel table tbody tr:hover { background: #f9fafb; }
        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge.active { background: #d1fae5; color: #065f46; }
        .badge.pending { background: #fef3c7; color: #92400e; }
        .badge.inactive { background: #fee2e2; color: #991b1b; }
        .btn {
            padding: 8px 14px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            color: #ffffff;
            background: #4a90e2;
            text-decoration: none;
            display: inline-block;
        }
        .btn-sm { padding: 5px 10px; font-size: 12px; }
        .btn-danger { background: #ef4444; }
        .btn-success { background: #10b981; }
        .btn-warning { background: #f59e0b; }
        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .search-box {
            padding: 8px 12px;
            border: 1px solid #cccccc;
            border-radius: 6px;
            font-size: 14px;
            min-width: 220px;
        }
        @media (max-width: 768px) {
            .sidebar { width: 200px; }
            .main { margin-left: 200px; }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="brand">CASHIER PANEL</div>
            <nav>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="icon">📊</span> Dashboard
                </a>
                <a href="{{ route('listproduct') }}" class="{{ request()->routeIs('listproduct') ? 'active' : '' }}">
                    <span class="icon">🛒</span> List Product
                </a>
                <a href="{{ route('order') }}" class="{{ request()->routeIs('order') ? 'active' : '' }}">
                    <span class="icon">📦</span> Order
                </a>
                <a href="{{ route('category') }}" class="{{ request()->routeIs('category') ? 'active' : '' }}">
                    <span class="icon">🗂️</span> Category
                </a>
                <a href="{{ route('supplier') }}" class="{{ request()->routeIs('supplier') ? 'active' : '' }}">
                    <span class="icon">🚚</span> Supplier
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

        <!-- Main content -->
        <main class="main">
            <div class="header">
                <h1>@yield('title', 'Dashboard')</h1>
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
