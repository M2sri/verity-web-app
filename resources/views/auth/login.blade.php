@extends('layouts.app')

@section('noHeader') @endsection
@section('noFooter') @endsection

@section('title', 'Admin Login - VERITY')

@section('content')
<div class="login-wrapper">

    <div class="login-card">

        {{-- Logo --}}
        <div class="login-header">
            <img src="{{ asset('assets/Logo Final-01.png') }}"
                 alt="VERITY Logo"
                 class="login-logo">

            <h2>Admin Login</h2>
            <p>Sign in to access the dashboard</p>
        </div>

        {{-- Error Message --}}
        @if(session('error'))
            <div class="login-error">
                {{ session('error') }}
            </div>
        @endif

        {{-- Login Form --}}
        <form method="POST"
              action="{{ route('login.submit') }}"
              class="login-form">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input type="email"
                       name="email"
                       required
                       autofocus
                       placeholder="admin@verity.com">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password"
                       name="password"
                       required
                       placeholder="••••••••">
            </div>

            <button type="submit" class="login-btn">
                Login
            </button>
        </form>

    </div>

</div>
@endsection
