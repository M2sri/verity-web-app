@extends('layouts.app')

@section('content')
<div class="container text-center" style="padding: 120px 20px;">
    <h2>✅ Application Submitted</h2>

    @if(session('success'))
        <p class="mt-3">{{ session('success') }}</p>
    @endif

    <p class="mt-4 text-muted">
        You will be redirected to the home page shortly…
    </p>
</div>

<script>
    setTimeout(function () {
        window.location.href = "{{ route('pages.home') }}";
    }, 3000); // 3 seconds
</script>
@endsection
