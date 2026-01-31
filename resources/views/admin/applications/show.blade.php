@extends('layouts.app')

@section('noHeader') @endsection
@section('noFooter') @endsection

@section('title', 'Application Details')

@section('content')

<style>

</style>

<div class="container">
<div class="application-view">

    {{-- HEADER --}}
    <div class="app-header">
        <div class="app-title">
            <h1>{{ $application->full_name }}</h1>
            <p class="position">{{ $application->position }}</p>
        </div>

        <span class="status-badge status-{{ $application->status }}">
            {{ ucfirst($application->status) }}
        </span>
    </div>

    {{-- PERSONAL INFO --}}
    <div class="card">
        <h3>👤 Personal Information</h3>
        <div class="info-grid">
            <div class="info-item"><span>Email</span><strong>{{ $application->email }}</strong></div>
            <div class="info-item"><span>Phone</span><strong>{{ $application->phone }}</strong></div>
            <div class="info-item"><span>WhatsApp</span><strong>{{ $application->whatsapp ?? '—' }}</strong></div>
            <div class="info-item"><span>Location</span><strong>{{ $application->country }}</strong></div>
            <div class="info-item"><span>LinkedIn</span>
                {!! $application->linkedin ? '<a href="'.$application->linkedin.'" target="_blank">View Profile</a>' : '<strong>—</strong>' !!}
            </div>
            <div class="info-item"><span>Portfolio</span>
                {!! $application->portfolio ? '<a href="'.$application->portfolio.'" target="_blank">View</a>' : '<strong>—</strong>' !!}
            </div>
        </div>
    </div>

    {{-- EMPLOYMENT --}}
    <div class="card">
        <h3>💼 Employment Details</h3>
        <div class="info-grid">
            <div class="info-item"><span>Employment Type</span><strong>{{ $application->employment_type }}</strong></div>
            <div class="info-item"><span>Availability</span><strong>{{ $application->availability }}</strong></div>
            <div class="info-item"><span>Experience</span><strong>{{ $application->experience }}</strong></div>
            <div class="info-item"><span>Current Role</span><strong>{{ $application->current_role }}</strong></div>
            <div class="info-item"><span>Company</span><strong>{{ $application->company_name ?? '—' }}</strong></div>
        </div>
    </div>

    {{-- RESPONSIBILITIES --}}
    <div class="card">
        <h3>📊 Responsibilities & Achievements</h3>
        <div class="long-text">{{ $application->responsibilities }}</div>
    </div>

    {{-- EDUCATION --}}
    <div class="card">
        <h3>🎓 Education</h3>
        <div class="info-grid">
            <div class="info-item"><span>Qualification</span><strong>{{ $application->qualification }}</strong></div>
            <div class="info-item"><span>Field</span><strong>{{ $application->field_of_study }}</strong></div>
            <div class="info-item"><span>Institution</span><strong>{{ $application->institution }}</strong></div>
            <div class="info-item"><span>Year</span><strong>{{ $application->graduation_year }}</strong></div>
        </div>
    </div>

    {{-- MOTIVATION --}}
    <div class="card">
        <h3>🌟 Motivation</h3>
        <p class="section-label">Why VERITY</p>
        <div class="long-text">{{ $application->why_verity }}</div>
        <p class="section-label">Value Add</p>
        <div class="long-text">{{ $application->value_add }}</div>
    </div>

    {{-- RESUME --}}
    <div class="card">
        <h3>📄 Resume</h3>
        <a href="{{ asset('storage/'.$application->resume) }}" target="_blank" class="btn-primary">
            <i class="fas fa-file-pdf"></i> View Resume
        </a>
    </div>

  

        <a href="{{ route('admin.applications.index') }}" class="btn-outline">
            ← Back to Applications
        </a>
    </div>

</div>
</div>
@endsection
