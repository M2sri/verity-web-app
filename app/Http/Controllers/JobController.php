<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class JobController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'position' => 'required|string',
            'employment_type' => 'required|string',
            'availability' => 'required|string',
            'experience' => 'required|string',
            'current_role' => 'required|string|max:255',
            'responsibilities' => 'required|string',
            'qualification' => 'required|string',
            'field_of_study' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'graduation_year' => 'required|integer|min:1970|max:' . (date('Y') + 5),
            'why_verity' => 'required|string',
            'value_add' => 'required|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'declaration_accuracy' => 'required|accepted',
            'declaration_privacy' => 'required|accepted'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle resume upload
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Create application
        $application = JobApplication::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'country' => $request->country,
            'linkedin' => $request->linkedin,
            'portfolio' => $request->portfolio,
            'position' => $request->position,
            'employment_type' => $request->employment_type,
            'availability' => $request->availability,
            'experience' => $request->experience,
            'current_role' => $request->current_role,
            'company_name' => $request->company_name,
            'responsibilities' => $request->responsibilities,
            'qualification' => $request->qualification,
            'field_of_study' => $request->field_of_study,
            'institution' => $request->institution,
            'graduation_year' => $request->graduation_year,
            'why_verity' => $request->why_verity,
            'value_add' => $request->value_add,
            'resume_path' => $resumePath,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent')
        ]);

        //Send notification email (optional)
        Mail::to('Hello@verity-tech.net')->send(new JobApplicationReceived($application));

        return redirect()->route('pages.home')
            ->with('success', 'Thank you for your application! We will review it and get back to you soon.');
    }



}