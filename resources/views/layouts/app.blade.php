<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VERITY - IT Solutions')</title>
    <meta name="description" content="Empowering businesses with trusted IT solutions through custom development, ERP systems, and cybersecurity.">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/projects.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/portfolio.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/portfolio-show.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sections.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/subscriptions.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/application-view.css') }}">

    
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">
    
    @stack('styles')
</head>
<body>
{{-- HEADER --}}
@if (!View::hasSection('noHeader'))
<header>
    <div class="container">
        <div class="header-content">
            <div class="header-logo">
                <a href="{{ route('pages.home') }}#home">
                    <img src="{{ asset('assets/Logo Final-01.png') }}" alt="VERITY IT Solutions Logo">
                </a>
            </div>

            <button class="menu-toggle" id="mobileMenuBtn" aria-label="Toggle navigation menu">
                <i class="fas fa-bars"></i>
            </button>

                <nav id="mobileNav">
                    <ul>
                        <li><a href="{{ route('pages.home') }}#home">Home</a></li>
                        <li><a href="{{ route('pages.home') }}#about">About</a></li>
                        <li><a href="{{ route('pages.home') }}#pricing">Services</a></li>
                        <li><a href="{{ route('pages.home') }}#projects">Projects</a></li>
                        <li><a href="{{ route('pages.home') }}#team">Our Team</a></li>
                        <li><a href="{{ route('pages.home') }}#contact">Contact</a></li>
                        <li><a href="{{ route('careers') }}">Join Us</a></li>
                    </ul>
                </nav>


<div class="theme-switcher">
    <button class="btn btn-icon" id="themeToggle" aria-label="Toggle dark mode">
        <i class="fas fa-moon"></i>
    </button>
</div>
        </div>
    </div>
</header>
@endif

    
    <main>
        @yield('content')
    </main>
    
   

    @if (!View::hasSection('noFooter'))
<footer>
     @include('partials.footer')
</footer>
@endif
    
    <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="{{ asset('assets/js/services.js') }}"></script>
            <script src="{{ asset('assets/js/faq.js') }}"></script>
                <script src="{{ asset('assets/js/projects.js') }}"></script>
                    <script src="{{ asset('assets/js/portfolio.js') }}"></script>
                        <script src="{{ asset('assets/js/portfolio-show.js') }}"></script>
                                <script src="{{ asset('assets/js/team.js') }}"></script>


    @stack('scripts')
</body>
</html>