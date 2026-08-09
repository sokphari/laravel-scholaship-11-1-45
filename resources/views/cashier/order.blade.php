@extends('layouts.cashier')

@section('title', 'Order')

@section('content')
    <div class="panel">
        <div class="panel-header">
            <span>Orders</span>
            <a href="#" class="btn btn-success">+ New Order</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Invoice</th>
                    <th>Customer</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders ?? [] as $order)
                    <tr>
                        <td>{{ $order->invoice ?? '#' }}</td>
                        <td>{{ $order->customer ?? '-' }}</td>
                        <td>{{ $order->items ?? 0 }}</td>
                        <td>Rp {{ number_format($order->total ?? 0, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ ($order->status ?? 'pending') === 'completed' ? 'active' : 'pending' }}">
                                {{ $order->status ?? 'pending' }}
                            </span>
                        </td>
                        <td>{{ $order->created_at ?? '-' }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: #9ca3af;">No orders yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
