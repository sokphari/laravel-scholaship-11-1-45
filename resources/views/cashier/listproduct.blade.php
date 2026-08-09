@extends('layouts.cashier')

@section('title', 'List Product')

@section('content')
    <div class="panel">
        <div class="panel-header">
            <span>Products</span>
            <div style="display: flex; gap: 8px; align-items: center;">
                <input type="text" class="search-box" placeholder="Search product...">
                <a href="#" class="btn btn-success">+ Add Product</a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Unit Price</th>
                    <th>Sale Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products ?? [] as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name ?? '-' }}</td>
                        <td>Rp {{ number_format($product->unit_price ?? 0, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($product->sale_price ?? 0, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $product->status ? 'active' : 'inactive' }}">
                                {{ $product->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #9ca3af;">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
