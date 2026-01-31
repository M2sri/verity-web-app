@extends('layouts.admin')

@section('title', 'Job Applications - VERITY')

@section('admin-content')

{{-- ================= FILTER BAR ================= --}}
<div class="filter-card fade-in">
    <div class="filter-header">
        <h4><i class="fas fa-filter"></i> Filter Applications</h4>
    </div>

    <form method="GET" action="{{ route('admin.applications.index') }}" class="filter-form">
        <div class="filter-grid">

            {{-- Position --}}
            <div class="filter-group">
                <label><i class="fas fa-briefcase"></i> Position</label>
                <select name="position" class="filter-select">
                    <option value="">All Positions</option>
                    @foreach ($positions as $position)
                        <option value="{{ $position }}" @selected(request('position') == $position)>
                            {{ $position }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Status --}}
            <div class="filter-group">
                <label><i class="fas fa-tag"></i> Status</label>
                <select name="status" class="filter-select">
                    <option value="">All Statuses</option>
                    @foreach (['pending','reviewed','shortlisted','rejected','hired'] as $status)
                        <option value="{{ $status }}" @selected(request('status') == $status)>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Actions --}}
            <div class="filter-group">
                <label>&nbsp;</label>
                <div class="filter-actions">
                    <button type="submit" class="filter-btn">
                        <i class="fas fa-filter"></i> Apply
                    </button>
                    <a href="{{ route('admin.applications.index') }}" class="reset-btn">
                        <i class="fas fa-redo"></i> Reset
                    </a>
                </div>
            </div>

        </div>
    </form>
</div>

{{-- ================= APPLICATIONS TABLE ================= --}}
<div class="table-card fade-in" style="--delay:0.2s">

    <div class="table-responsive">
        <table class="applications-table">
            <thead>
                <tr>
                    <th>Applicant</th>
                    <th>Position</th>
                    <th>Current Role</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Date Applied</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($applications as $app)
                <tr>
                    <td>
                        <div class="applicant-cell">
                            <div class="applicant-avatar-sm {{ $app->status }}">
                                {{ strtoupper(substr($app->full_name, 0, 1)) }}
                            </div>
                            <div>
                                <strong>{{ $app->full_name }}</strong>
                                <span class="applicant-email">{{ $app->email }}</span>
                            </div>
                        </div>
                    </td>

                    <td><span class="position-badge">{{ $app->position }}</span></td>
                    <td>{{ $app->current_role }}</td>
                    <td>{{ $app->country }}</td>

                    <td>
                        <span class="status-badge status-{{ $app->status }}">
                            {{ ucfirst($app->status) }}
                        </span>
                    </td>

                    <td>
                        <span>{{ $app->created_at->format('M d, Y') }}</span><br>
                        <small>{{ $app->created_at->format('h:i A') }}</small>
                    </td>

                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.applications.show', $app->id) }}" class="action-btn view-btn">
                                <i class="fas fa-eye"></i>
                            </a>

                            <form method="POST" action="{{ route('admin.applications.status', $app->id) }}">
                                @csrf
                                <select name="status" class="status-select" onchange="this.form.submit()">
                                    @foreach (['pending','reviewed','shortlisted','rejected','hired'] as $status)
                                        <option value="{{ $status }}" @selected($app->status === $status)>
                                            {{ ucfirst($status) }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="empty-state">
                        <p>No applications found.</p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{-- ✅ Pagination (only if needed) --}}
{{-- ✅ Compact Pagination --}}
@if ($applications->hasPages())
    <div class="pagination-wrapper">
        <div class="compact-pagination">
            {{-- Previous Page Link --}}
            @if ($applications->onFirstPage())
                <span class="page-link disabled">
                    <i class="fas fa-chevron-left"></i>
                </span>
            @else
                <a href="{{ $applications->previousPageUrl() }}" class="page-link">
                    <i class="fas fa-chevron-left"></i>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @php
                $current = $applications->currentPage();
                $last = $applications->lastPage();
                $start = max(1, $current - 1);
                $end = min($last, $current + 1);
                
                if ($start > 2) {
                    $start = max(1, $current);
                    $end = min($last, $current + 2);
                }
                
                if ($end < $last - 1) {
                    $start = max(1, $current - 2);
                    $end = min($last, $current + 1);
                }
            @endphp

            {{-- First Page Link --}}
            @if ($start > 1)
                <a href="{{ $applications->url(1) }}" class="page-link">1</a>
                @if ($start > 2)
                    <span class="page-dots">...</span>
                @endif
            @endif

            {{-- Page Number Links --}}
            @for ($page = $start; $page <= $end; $page++)
                @if ($page == $current)
                    <span class="page-link active">{{ $page }}</span>
                @else
                    <a href="{{ $applications->url($page) }}" class="page-link">{{ $page }}</a>
                @endif
            @endfor

            {{-- Last Page Link --}}
            @if ($end < $last)
                @if ($end < $last - 1)
                    <span class="page-dots">...</span>
                @endif
                <a href="{{ $applications->url($last) }}" class="page-link">{{ $last }}</a>
            @endif

            {{-- Next Page Link --}}
            @if ($applications->hasMorePages())
                <a href="{{ $applications->nextPageUrl() }}" class="page-link">
                    <i class="fas fa-chevron-right"></i>
                </a>
            @else
                <span class="page-link disabled">
                    <i class="fas fa-chevron-right"></i>
                </span>
            @endif
        </div>
        
        <div class="pagination-info">
            Showing <strong>{{ $applications->firstItem() ?? 0 }}-{{ $applications->lastItem() ?? 0 }}</strong>
            of <strong>{{ $applications->total() }}</strong> applications
        </div>
    </div>
@endif

</div>

@endsection
