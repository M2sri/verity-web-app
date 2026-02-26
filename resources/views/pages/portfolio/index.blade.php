@extends('layouts.app')

@section('content')

<!-- ================= HERO ================= -->
<section class="portfolio-hero">
    <div class="container">
        <div class="portfolio-hero-content">
            <span class="hero-badge">Our Portfolio</span>

            <h1 class="hero-title">
                Crafting Digital Products <br>
                That <span class="text-gradient">Drive Real Impact</span>
            </h1>

            <p class="hero-description">
                We build scalable web platforms, high-performance mobile applications,
                and user-centered digital experiences. Each project represents
                strategy, innovation, and measurable business growth.
            </p>

            <div class="hero-actions">
                <a href="#projects" class="btn btn-primary">Explore Projects</a>
                <a href="#process" class="btn btn-outline">Our Process</a>
            </div>
        </div>
    </div>
</section>


<!-- ================= PROJECT GRID ================= -->
<section id="projects" class="portfolio-section">
    <div class="container">

        <div class="section-header">
            <h2>Selected <span class="text-gradient">Work</span></h2>
            <p>
                A curated collection of digital solutions built for startups,
                enterprises, and growing businesses across multiple industries.
            </p>
        </div>

        <!-- FILTER -->
        <div class="portfolio-filter">
            <button class="filter-btn active" data-filter="all">
                All ({{ $projects->count() }})
            </button>

            @foreach($projects->groupBy('category') as $category => $items)
                <button class="filter-btn"
                        data-filter="{{ strtolower(str_replace(' ', '-', $category)) }}">
                    {{ $category }} ({{ $items->count() }})
                </button>
            @endforeach
        </div>

        <!-- GRID -->
        <div class="portfolio-grid">

            @foreach($projects as $project)
                <div class="portfolio-card"
                     data-category="{{ strtolower(str_replace(' ', '-', $project->category)) }}">

                    <div class="portfolio-card-media">
                        <img src="{{ asset($project->thumbnail) }}"
                             alt="{{ $project->title }}">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio.show', $project->slug) }}"
                               class="btn btn-primary btn-sm">
                                View Case Study
                            </a>
                        </div>
                    </div>

                    <div class="portfolio-card-body">
                        <div class="portfolio-meta">
                            <span class="portfolio-category">{{ $project->category }}</span>
                            <span class="portfolio-year">{{ $project->created_at->format('Y') }}</span>
                        </div>

                        <h3>{{ $project->title }}</h3>

                        <p>
                            {{ Str::limit($project->short_description, 140) }}
                        </p>

                        <div class="portfolio-info">
                            <div>
                                <small>Client</small>
                                <strong>{{ $project->client ?? 'Confidential' }}</strong>
                            </div>
                            <div>
                                <small>Industry</small>
                                <strong>{{ $project->industry ?? 'Technology' }}</strong>
                            </div>
                        </div>

                        @if($project->technologies)
                            <div class="portfolio-tech">
                                @foreach(array_slice(explode(',', $project->technologies), 0, 4) as $tech)
                                    <span>{{ trim($tech) }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>

        @if($projects->count() > 6)
        <div class="load-more-wrapper">
            <button id="loadMore" class="btn btn-outline">
                Load More Projects
            </button>
        </div>
        @endif

    </div>
</section>


<!-- ================= PROCESS ================= -->
<section id="process" class="portfolio-process">
    <div class="container">
        <div class="section-header">
            <h2>Our Strategic Approach</h2>
            <p>
                Every project follows a structured methodology to ensure
                clarity, efficiency, and measurable outcomes.
            </p>
        </div>

        <div class="process-grid">
            <div class="process-card">
                <h3>01. Discovery</h3>
                <p>Research, stakeholder interviews, competitor analysis,
                and technical planning to define project direction.</p>
            </div>

            <div class="process-card">
                <h3>02. Design</h3>
                <p>Wireframes, UI systems, UX flows, and interactive prototypes
                validated through real user scenarios.</p>
            </div>

            <div class="process-card">
                <h3>03. Development</h3>
                <p>Modern Laravel architecture, scalable backend systems,
                and performance-focused frontend engineering.</p>
            </div>

            <div class="process-card">
                <h3>04. Optimization</h3>
                <p>Testing, analytics integration, performance improvements,
                and continuous product refinement.</p>
            </div>
        </div>
    </div>
</section>


<!-- ================= CTA 
    <section class="portfolio-cta">
    <div class="container">
        <h2>Ready to Build Something Exceptional?</h2>
        <p>
            Let’s collaborate to design and develop a digital product
            that accelerates your business growth.
        </p>

        <a href="#" class="btn btn-primary">Start Your Project</a>
    </div>
</section>
    
    ================= -->


@endsection


@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/portfolio.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/portfolio.js') }}"></script>
@endpush
