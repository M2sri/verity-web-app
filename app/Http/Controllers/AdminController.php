<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;

class AdminController extends Controller
{
    public function dashboard()
{
    return view('admin.dashboard', [
        'recentApplications' => \App\Models\JobApplication::latest()->take(3)->get(),
        'stats' => [
            'total' => \App\Models\JobApplication::count(),
            'pending' => \App\Models\JobApplication::where('status', 'pending')->count(),
            'shortlisted' => \App\Models\JobApplication::where('status', 'shortlisted')->count(),
            'hired' => \App\Models\JobApplication::where('status', 'hired')->count(),
        ],
    ]);
}



    public function index(Request $request)
    {
        $query = JobApplication::query();

        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->position) {
            $query->where('position', $request->position);
        }

        return view('admin.applications.index', [
    'applications' => $query->latest()->paginate(4),
    'positions' => JobApplication::distinct()->orderBy('position')->pluck('position')
]);

    }

    public function show($id)
    {
        return view('admin.applications.show', [
            'application' => JobApplication::findOrFail($id)
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,reviewed,shortlisted,rejected,hired'
        ]);

        JobApplication::findOrFail($id)->update([
            'status' => $request->status
        ]);

        return back()->with('success','Status updated');
    }
}
