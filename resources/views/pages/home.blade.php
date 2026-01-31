@extends('layouts.app')

@section('title', 'VERITY - Empowering Businesses')

@section('content')
@include('sections.hero')

    <div class="container">
        <div class="single-column">
            @include('sections.about')
            @include('sections.services')
            @include('sections.subscriptions')
            @include('sections.projects')
            @include('sections.team')
            @include('sections.contact')
        </div>
    </div>
@endsection