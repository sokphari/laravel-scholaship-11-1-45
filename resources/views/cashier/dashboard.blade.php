@extends('layouts.cashier')

@section('title', 'Dashboard')

@section('content')
    <style>
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
        .stat-card .label { font-size: 14px; color: #777777; margin-bottom: 8px; }
        .stat-card .value { font-size: 28px; font-weight: 700; color: #1e293b; }
        .stat-card.product { border-left-color: #4a90e2; }
        .stat-card.category { border-left-color: #10b981; }
        .stat-card.order { border-left-color: #f59e0b; }
        .stat-card.supplier { border-left-color: #ec4899; }
        .stat-card.revenue { border-left-color: #8b5cf6; }
    </style>

    <div class="stats">
        <div class="stat-card product">
            <div class="label">Products</div>
            <div class="value">{{ $productCount ?? 0 }}</div>
        </div>
        <div class="stat-card category">
            <div class="label">Categories</div>
            <div class="value">{{ $categoryCount ?? 0 }}</div>
        </div>
        <div class="stat-card order">
            <div class="label">Orders Today</div>
            <div class="value">{{ $orderCount ?? 0 }}</div>
        </div>
        <div class="stat-card supplier">
            <div class="label">Suppliers</div>
            <div class="value">{{ $supplierCount ?? 0 }}</div>
        </div>
        <div class="stat-card revenue">
            <div class="label">Revenue Today</div>
            <div class="value">Rp {{ number_format($revenue ?? 0, 0, ',', '.') }}</div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-header">Recent Orders</div>
        <table>
            <thead>
                <tr>
                    <th>Invoice</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentOrders ?? [] as $order)
                    <tr>
                        <td>{{ $order->invoice ?? '#' }}</td>
                        <td>{{ $order->customer ?? '-' }}</td>
                        <td>Rp {{ number_format($order->total ?? 0, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ ($order->status ?? 'pending') === 'completed' ? 'active' : 'pending' }}">
                                {{ $order->status ?? 'pending' }}
                            </span>
                        </td>
                        <td>{{ $order->created_at ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #9ca3af;">No orders yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
