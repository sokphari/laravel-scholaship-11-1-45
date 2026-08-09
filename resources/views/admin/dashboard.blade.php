<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f9;
            color: #333333;
        }
        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: #1e293b;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
        }
        .sidebar .brand {
            padding: 20px;
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            background: #172033;
            letter-spacing: 1px;
        }
        .sidebar nav {
            flex: 1;
            padding-top: 10px;
        }
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
        .sidebar nav a:hover {
            background: #334155;
            color: #ffffff;
        }
        .sidebar nav a.active {
            background: #4a90e2;
            color: #ffffff;
        }
        .sidebar nav a .icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }
        .sidebar .logout {
            border-top: 1px solid #334155;
        }
        .sidebar .logout a {
            color: #f87171;
        }
        .sidebar .logout a:hover {
            background: #dc2626;
            color: #ffffff;
        }

        /* Main content */
        .main {
            flex: 1;
            margin-left: 250px;
            padding: 24px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        .header h1 {
            font-size: 24px;
            color: #1e293b;
        }
        .header .user {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .header .user .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #4a90e2;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        /* Stat cards */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }
        .stat-card {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border-left: 4px solid #4a90e2;
        }
        .stat-card .label {
            font-size: 14px;
            color: #777777;
            margin-bottom: 8px;
        }
        .stat-card .value {
            font-size: 28px;
            font-weight: 700;
            color: #1e293b;
        }
        .stat-card.product { border-left-color: #4a90e2; }
        .stat-card.category { border-left-color: #10b981; }
        .stat-card.user { border-left-color: #f59e0b; }
        .stat-card.order { border-left-color: #8b5cf6; }
        .stat-card.supplier { border-left-color: #ec4899; }
        .stat-card.report { border-left-color: #06b6d4; }

        /* Recent table */
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
        .panel table {
            width: 100%;
            border-collapse: collapse;
        }
        .panel table th,
        .panel table td {
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
        .panel table tbody tr {
            border-top: 1px solid #f3f4f6;
        }
        .panel table tbody tr:hover {
            background: #f9fafb;
        }
        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge.active { background: #d1fae5; color: #065f46; }
        .badge.pending { background: #fef3c7; color: #92400e; }
        .badge.inactive { background: #fee2e2; color: #991b1b; }

        /* Chart section */
        .chart-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 24px;
        }
        .chart-panel {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            padding: 20px;
        }
        .chart-panel h3 {
            font-size: 16px;
            color: #1e293b;
            margin-bottom: 16px;
        }
        .chart-box {
            position: relative;
            height: 300px;
        }
        @media (max-width: 768px) {
            .chart-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="brand">ADMIN PANEL</div>
            <nav>
                <a href="#" class="active"><span class="icon">📊</span> Dashboard</a>
                <a href="#"><span class="icon">🛒</span> Product</a>
                <a href="#"><span class="icon">🗂️</span> Categories</a>
                <a href="#"><span class="icon">👤</span> User</a>
                <a href="#"><span class="icon">📦</span> Order</a>
                <a href="#"><span class="icon">🚚</span> Supplier</a>
                <a href="#"><span class="icon">📈</span> Report</a>
                <a href="#"><span class="icon">⚙️</span> Settings</a>
            </nav>
            <div class="logout">
                <a href="#"><span class="icon">🚪</span> Logout</a>
            </div>
        </aside>

        <!-- Main content -->
        <main class="main">
            <div class="header">
                <h1>Dashboard</h1>
                <div class="user">
                    <span>Admin</span>
                    <div class="avatar">A</div>
                </div>
            </div>

            <!-- Important data stats -->
            <div class="stats">
                <div class="stat-card product">
                    <div class="label">Products</div>
                    <div class="value">{{ $productCount ?? 0 }}</div>
                </div>
                <div class="stat-card category">
                    <div class="label">Categories</div>
                    <div class="value">{{ $categoryCount ?? 0 }}</div>
                </div>
                <div class="stat-card user">
                    <div class="label">Users</div>
                    <div class="value">{{ $userCount ?? 0 }}</div>
                </div>
                <div class="stat-card order">
                    <div class="label">Orders</div>
                    <div class="value">{{ $orderCount ?? 0 }}</div>
                </div>
                <div class="stat-card supplier">
                    <div class="label">Suppliers</div>
                    <div class="value">{{ $supplierCount ?? 0 }}</div>
                </div>
                <div class="stat-card report">
                    <div class="label">Reports</div>
                    <div class="value">{{ $reportCount ?? 0 }}</div>
                </div>
            </div>

            <!-- Charts -->
            <div class="chart-row">
                <div class="chart-panel">
                    <h3>Data Distribution</h3>
                    <div class="chart-box">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
                <div class="chart-panel">
                    <h3>Orders by Status</h3>
                    <div class="chart-box">
                        <canvas id="donutChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent data table -->
            <div class="panel">
                <div class="panel-header">Recent Users</div>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentUsers ?? [] as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <span class="badge {{ $user->status ? 'active' : 'inactive' }}">
                                        {{ $user->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center; color: #9ca3af;">No recent users.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script>
        const productCount = {{ $productCount ?? 0 }};
        const categoryCount = {{ $categoryCount ?? 0 }};
        const userCount = {{ $userCount ?? 0 }};
        const orderCount = {{ $orderCount ?? 0 }};
        const supplierCount = {{ $supplierCount ?? 0 }};

        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: ['Products', 'Categories', 'Users', 'Orders', 'Suppliers'],
                datasets: [{
                    data: [productCount, categoryCount, userCount, orderCount, supplierCount],
                    backgroundColor: ['#4a90e2', '#10b981', '#f59e0b', '#8b5cf6', '#ec4899'],
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        new Chart(document.getElementById('donutChart'), {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'Completed', 'Canceled'],
                datasets: [{
                    data: [{{ $pendingOrders ?? 0 }}, {{ $completedOrders ?? 0 }}, {{ $canceledOrders ?? 0 }}],
                    backgroundColor: ['#f59e0b', '#10b981', '#ef4444'],
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</body>
</html>
