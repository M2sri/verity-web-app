@extends('layouts.admin')

@section('title', 'Admin Dashboard - VERITY')
@section('page-title', 'Dashboard Overview')

@section('admin-content')

{{-- ================= STATS CARDS ================= --}}
<div class="dashboard-stats fade-in" style="--delay: 0.1s">

    @php
        $total = \App\Models\JobApplication::count();
        $pending = \App\Models\JobApplication::where('status','pending')->count();
        $shortlisted = \App\Models\JobApplication::where('status','shortlisted')->count();
        $hired = \App\Models\JobApplication::where('status','hired')->count();
        $rate = $total > 0 ? round(($hired / $total) * 100) : 0;
    @endphp

    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-layer-group"></i></div>
        <h3>{{ $total }}</h3>
        <p>Total Applications</p>
    </div>

    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-clock"></i></div>
        <h3>{{ $pending }}</h3>
        <p>Pending Review</p>
    </div>

    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-star"></i></div>
        <h3>{{ $shortlisted }}</h3>
        <p>Shortlisted</p>
    </div>

    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
        <h3>{{ $hired }}</h3>
        <p>Hired ({{ $rate }}%)</p>
    </div>
</div>

{{-- ================= RECENT APPLICATIONS ================= --}}
<div class="dashboard-content fade-in" style="animation-delay: 0.2s">
    <div class="content-grid">

        <div class="content-card">
            <div class="card-header">
                <h3>Recent Applications</h3>
                <a href="{{ route('admin.applications.index') }}" class="view-all">
                    View All <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="applications-list">
                @forelse ($recentApplications as $application)
                    <div class="application-item">
                        <div class="applicant-avatar {{ $application->status }}">
                            {{ strtoupper(substr($application->full_name, 0, 1)) }}
                        </div>

                        <div class="applicant-info">
                            <strong>{{ $application->full_name }}</strong>
                            <span>{{ $application->position }}</span>
                        </div>

                        <span class="status-badge status-{{ $application->status }}">
                            {{ ucfirst($application->status) }}
                        </span>
                    </div>
                @empty
                    <p class="empty-state">No applications found.</p>
                @endforelse
            </div>
        </div>

        {{-- QUICK ACTION --}}
        <div class="content-card">
            <h3>Quick Actions</h3>

            <a href="{{ route('admin.applications.index') }}" class="quick-action">
                <i class="fas fa-users"></i>
                View Applications
            </a>
        </div>

    </div>
</div>

@endsection
