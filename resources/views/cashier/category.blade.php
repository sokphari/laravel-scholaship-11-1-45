@extends('layouts.cashier')

@section('title', 'Category')

@section('content')
    <div class="panel">
        <div class="panel-header">
            <span>Categories</span>
            <a href="#" class="btn btn-success">+ Add Category</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Products</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories ?? [] as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->products_count ?? $category->products->count() ?? 0 }}</td>
                        <td>
                            <span class="badge {{ ($category->status ?? true) ? 'active' : 'inactive' }}">
                                {{ ($category->status ?? true) ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center; color: #9ca3af;">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
