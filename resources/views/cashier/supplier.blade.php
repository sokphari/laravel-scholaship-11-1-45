@extends('layouts.cashier')

@section('title', 'Supplier')

@section('content')
    <div class="panel">
        <div class="panel-header">
            <span>Suppliers</span>
            <a href="#" class="btn btn-success">+ Add Supplier</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($suppliers ?? [] as $supplier)
                    <tr>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->phone ?? '-' }}</td>
                        <td>{{ $supplier->email ?? '-' }}</td>
                        <td>{{ $supplier->address ?? '-' }}</td>
                        <td>
                            <span class="badge {{ ($supplier->status ?? true) ? 'active' : 'inactive' }}">
                                {{ ($supplier->status ?? true) ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #9ca3af;">No suppliers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
