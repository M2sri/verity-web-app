<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - VERITY')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Base styles to ensure full screen coverage */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
    
<div class="admin-container">
    {{-- ================= SIDEBAR ================= --}}
    <aside class="admin-sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('assets/Logo Final-01.png') }}"
     class="sidebar-logo"
     alt="VERITY Logo">

            <h3>VERITY Admin</h3>
            <button class="theme-toggle" onclick="toggleTheme()">
                <i class="fas fa-moon"></i>
            </button>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}"
               class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <div class="nav-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <span>Dashboard</span>
                @if(request()->routeIs('admin.dashboard'))
                <div class="active-indicator"></div>
                @endif
            </a>

            <a href="{{ route('admin.applications.index') }}"
               class="nav-item {{ request()->routeIs('admin.applications*') ? 'active' : '' }}">
                <div class="nav-icon">
                    <i class="fas fa-users"></i>
                </div>
                <span>Job Applications</span>
                <span class="badge badge-pill badge-primary">{{ \App\Models\JobApplication::pending()->count() }}</span>
                @if(request()->routeIs('admin.applications*'))
                <div class="active-indicator"></div>
                @endif
            </a>

            <a href="#" class="nav-item">
                <div class="nav-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <span>Projects</span>
            </a>

            <a href="#" class="nav-item">
                <div class="nav-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <span>Settings</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="user-details">
                    <strong>Admin User</strong>
                    <span>Administrator</span>
                </div>
                <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="logout-btn" title="Logout">
        <i class="fas fa-sign-out-alt"></i>
    </button>
</form>

            </div>
        </div>
    </aside>

    {{-- ================= MAIN CONTENT ================= --}}
    <main class="admin-main">


        {{-- Success/Error Messages --}}
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        {{-- Main Content --}}
        @yield('admin-content')
    </main>
</div>

{{-- Notification System --}}
<div id="notification-container"></div>

<script>
// Theme Toggle
function toggleTheme() {
    const body = document.body;
    const themeToggle = document.querySelector('.theme-toggle i');
    const currentTheme = localStorage.getItem('theme') || 'light';
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
    
    body.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    
    if (newTheme === 'dark') {
        themeToggle.className = 'fas fa-sun';
        body.classList.add('dark-mode');
    } else {
        themeToggle.className = 'fas fa-moon';
        body.classList.remove('dark-mode');
    }
}

// Apply saved theme on load
document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.body.setAttribute('data-theme', savedTheme);
    
    if (savedTheme === 'dark') {
        document.querySelector('.theme-toggle i').className = 'fas fa-sun';
        document.body.classList.add('dark-mode');
    }
    
    // Update current time
    updateTime();
    setInterval(updateTime, 60000);
    
    // Initialize hover effects
    initHoverEffects();
});

// Time update function
function updateTime() {
    const now = new Date();
    const timeElement = document.querySelector('.current-time');
    if (timeElement) {
        timeElement.textContent = now.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        });
    }
}

// Hover effects initialization
function initHoverEffects() {
    const cards = document.querySelectorAll('.stat-card, .content-card, .filter-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
}

// Notification system
function showNotification(message, type = 'info', duration = 5000) {
    const container = document.getElementById('notification-container');
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    
    const icons = {
        success: 'fa-check-circle',
        error: 'fa-times-circle',
        warning: 'fa-exclamation-triangle',
        info: 'fa-info-circle'
    };
    
    notification.innerHTML = `
        <div class="notification-icon">
            <i class="fas ${icons[type] || 'fa-info-circle'}"></i>
        </div>
        <div class="notification-message">${message}</div>
        <button class="notification-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    container.appendChild(notification);
    
    // Remove notification after duration
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, duration);
}

// Export function for dashboard
window.exportData = function() {
    showNotification('Preparing dashboard export...', 'info');
    
    setTimeout(() => {
        showNotification('Export completed successfully', 'success');
        
        // Simulate file download
        const data = 'Dashboard Export Data';
        const blob = new Blob([data], { type: 'text/csv' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'dashboard-export.csv';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }, 1500);
};

// Mobile menu toggle
const mobileMenuBtn = document.createElement('button');
mobileMenuBtn.className = 'mobile-menu-toggle';
mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
mobileMenuBtn.onclick = function() {
    document.querySelector('.admin-sidebar').classList.toggle('active');
};

document.addEventListener('DOMContentLoaded', function() {
    if (window.innerWidth <= 768) {
        document.body.appendChild(mobileMenuBtn);
        
        // Close sidebar when clicking outside
        document.addEventListener('click', function(e) {
            const sidebar = document.querySelector('.admin-sidebar');
            const isMobile = window.innerWidth <= 768;
            
            if (isMobile && sidebar.classList.contains('active') && 
                !sidebar.contains(e.target) && 
                e.target !== mobileMenuBtn && 
                !mobileMenuBtn.contains(e.target)) {
                sidebar.classList.remove('active');
            }
        });
    }
    
    // Handle window resize
    window.addEventListener('resize', function() {
        const sidebar = document.querySelector('.admin-sidebar');
        if (window.innerWidth > 768) {
            sidebar.classList.remove('active');
            if (mobileMenuBtn.parentElement) {
                mobileMenuBtn.remove();
            }
        } else {
            if (!mobileMenuBtn.parentElement) {
                document.body.appendChild(mobileMenuBtn);
            }
        }
    });
});

</script>
@stack('scripts')
</body>
</html>

