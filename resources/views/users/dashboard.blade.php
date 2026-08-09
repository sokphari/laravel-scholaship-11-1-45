@extends('layouts.user')

@section('title', 'Home')

@section('content')
    <div class="panel">
        <div class="panel-header">Welcome, {{ Auth::user()->name }}!</div>
        <div class="info-row">
            <span class="label">Name</span>
            <span class="value">{{ Auth::user()->name }}</span>
        </div>
        <div class="info-row">
            <span class="label">Email</span>
            <span class="value">{{ Auth::user()->email }}</span>
        </div>
        <div class="info-row">
            <span class="label">Role</span>
            <span class="value">{{ ucfirst(Auth::user()->role) }}</span>
        </div>
        <div class="info-row">
            <span class="label">Status</span>
            <span class="value">{{ Auth::user()->status ? 'Active' : 'Inactive' }}</span>
        </div>
        <div class="info-row">
            <span class="label">Member Since</span>
            <span class="value">{{ Auth::user()->created_at ? Auth::user()->created_at->format('d M Y') : '-' }}</span>
        </div>
    </div>
@endsection
