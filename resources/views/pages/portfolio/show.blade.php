@extends('layouts.app')

@section('content')

<section class="case-wrapper">
    <div class="container">

        <!-- Breadcrumb -->
        <div class="case-breadcrumb">
            <a href="{{ route('portfolio.index') }}">Portfolio</a>
            <span>/</span>
            <span class="current">{{ $project->title }}</span>
        </div>

        <!-- Main Layout -->
        <div class="case-layout">

            <!-- LEFT : Overview -->
            <div class="case-content">
                <h2>Project Overview</h2>

                <p>{!! $project->description !!}</p>

                <h3>Challenges</h3>
                <p>
                    The project required scalable backend architecture,
                    optimized performance, and seamless user experience
                    across multiple devices and user roles.
                </p>

                <h3>Solution</h3>
                <p>
                    We designed a modular Laravel-based system,
                    implemented efficient database structure,
                    and built a clean responsive interface
                    aligned with modern UI/UX standards.
                </p>
            </div>

            <!-- RIGHT : Image -->
            <div class="case-image">
                <img src="{{ asset($project->thumbnail) }}" alt="{{ $project->title }}">

                <!-- Bottom Meta Section -->
        <div class="case-bottom">

            <div class="bottom-header">
                <span class="project-category">{{ $project->category }}</span>
                <h3>{{ $project->title }}</h3>
                <p class="short-desc">{{ $project->short_description }}</p>
            </div>

            <div class="bottom-grid">

                <div>
                    <small>Client</small>
                    <strong>{{ $project->client ?? 'Confidential' }}</strong>
                </div>

                <div>
                    <small>Industry</small>
                    <strong>{{ $project->industry ?? 'Technology' }}</strong>
                </div>

                <div>
                    <small>Year</small>
                    <strong>{{ $project->created_at->format('Y') }}</strong>
                </div>

            </div>

            @if($project->technologies)
                <div class="tech-tags">
                    @foreach(explode(',', $project->technologies) as $tech)
                        <span>{{ trim($tech) }}</span>
                    @endforeach
                </div>
            @endif

        </div>
            </div>
            
        </div>

        

    </div>
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/portfolio-show.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/portfolio-show.js') }}"></script>
@endpush
