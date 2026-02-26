<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

// app/Http/Controllers/PortfolioController.php

class PortfolioController extends Controller
{
   // In your PortfolioController.php

public function index()
{
    $projects = Project::where('status', 'published')
        ->orderBy('featured', 'desc')
        ->orderBy('created_at', 'desc')
        ->paginate(12);
    
    $featuredProjects = Project::where('featured', true)
        ->where('status', 'published')
        ->orderBy('created_at', 'desc')
        ->take(2)
        ->get();
    
    return view('pages.portfolio.index', compact('projects', 'featuredProjects'));
}

    // In your PortfolioController.php
public function show($slug)
{
    $project = Project::where('slug', $slug)->firstOrFail();
    
    // Get previous and next projects for navigation
    $previousProject = Project::where('id', '<', $project->id)
        ->orderBy('id', 'desc')
        ->first();
    
    $nextProject = Project::where('id', '>', $project->id)
        ->orderBy('id', 'asc')
        ->first();
    
    return view('pages.portfolio.show', compact('project', 'previousProject', 'nextProject'));
}
}

