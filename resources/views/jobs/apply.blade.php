@extends('layouts.app')
@section('noHeader') @endsection
@section('noFooter') @endsection

@section('title', 'Join VERITY - Career Opportunities')

@section('content')
<div class="container">
    <div class="single-column">
        <!-- Theme Toggle -->
        <div class="theme-toggle-container">
            <button id="themeToggle" class="theme-toggle-btn">
                <i class="fas fa-moon"></i>
                <span>Dark Mode</span>
            </button>
        </div>

        <!-- Progress Bar -->
        <div class="multi-step-progress">
            <div class="progress-bar">
                <div class="progress-fill" id="progressFill"></div>
            </div>
            <div class="step-indicators">
                @php $steps = ['Personal', 'Position', 'Employment', 'Experience', 'Education', 'Motivation', 'Resume']; @endphp
                @foreach($steps as $index => $step)
                <div class="step-indicator {{ $index === 0 ? 'active' : '' }}" data-step="{{ $index + 1 }}">
                    <span class="step-number">{{ $index + 1 }}</span>
                    <span class="step-label">{{ $step }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Form Container -->
        <section class="section job-form-section">
            <div class="job-form-header">
                <h1>Join VERITY Technology Solutions</h1>
                <p class="lead">Empowering Businesses with Trusted IT Solutions</p>
                <p class="subtitle">Complete the form below. You can navigate between sections using Next/Previous buttons.</p>
            </div>

            <form id="jobApplicationForm" class="job-application-form multi-step-form" action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Step 1: Personal Information -->
                <div class="form-step active" data-step="1">
                    <div class="step-header">
                        <h2><span class="step-icon">👤</span> Personal Information</h2>
                        <p class="step-description">Please provide your contact details and professional profiles.</p>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="full_name">Full Name *</label>
                            <input type="text" id="full_name" name="full_name" required 
                                   placeholder="Enter your full name"
                                   class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required 
                                   placeholder="your.email@example.com"
                                   class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required 
                                   placeholder="+20 XXX XXX XXXX"
                                   class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="whatsapp">WhatsApp Number</label>
                            <input type="tel" id="whatsapp" name="whatsapp" 
                                   placeholder="+20 XXX XXX XXXX"
                                   class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="country">Country / City *</label>
                            <input type="text" id="country" name="country" required 
                                   placeholder="Cairo, Egypt"
                                   class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="linkedin">LinkedIn Profile</label>
                            <input type="url" id="linkedin" name="linkedin" 
                                   placeholder="https://linkedin.com/in/username"
                                   class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="portfolio">Portfolio / GitHub / Behance</label>
                            <input type="url" id="portfolio" name="portfolio" 
                                   placeholder="https://github.com/username"
                                   class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Step 2: Position Applied For -->
                <div class="form-step" data-step="2">
                    <div class="step-header">
                        <h2><span class="step-icon">🎯</span> Position Applied For</h2>
                        <p class="step-description">Select the position you're interested in.</p>
                    </div>
                    
                    <div class="position-grid">
                        @php
                            $positions = [
                                'Application Developer (Flutter)',
                                'Web Developer (Frontend)',
                                'Web Developer (Backend)',
                                'Full Stack Developer',
                                'ERP Developer',
                                'Penetration Tester / Cybersecurity Specialist',
                                'Network Engineer',
                                'Graphic Designer',
                                'UI/UX Designer',
                                'Marketing Specialist',
                                'Social Media Specialist',
                                'Content Writer',
                                'Project Manager',
                                'QA / Software Tester',
                                'IT Support Engineer'
                            ];
                        @endphp
                        
                        <div class="position-options">
                            @foreach($positions as $position)
                            <label class="position-checkbox">
                                <input type="radio" name="position" value="{{ $position }}" 
                                       {{ $loop->first ? 'required' : '' }}>
                                <span class="checkbox-custom"></span>
                                <span class="position-label">{{ $position }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Step 3: Employment Type -->
                <div class="form-step" data-step="3">
                    <div class="step-header">
                        <h2><span class="step-icon">💼</span> Employment Type</h2>
                        <p class="step-description">Select your preferred employment type and availability.</p>
                    </div>
                    
                    <div class="employment-grid">
                        <label class="employment-option">
                            <input type="radio" name="employment_type" value="Full-time" checked>
                            <div class="employment-card">
                                <i class="fas fa-briefcase"></i>
                                <span>Full-time</span>
                            </div>
                        </label>
                        
                        <label class="employment-option">
                            <input type="radio" name="employment_type" value="Part-time">
                            <div class="employment-card">
                                <i class="fas fa-clock"></i>
                                <span>Part-time</span>
                            </div>
                        </label>
                        
                        <label class="employment-option">
                            <input type="radio" name="employment_type" value="Contract">
                            <div class="employment-card">
                                <i class="fas fa-file-contract"></i>
                                <span>Contract / Freelance</span>
                            </div>
                        </label>
                        
                        <label class="employment-option">
                            <input type="radio" name="employment_type" value="Internship">
                            <div class="employment-card">
                                <i class="fas fa-graduation-cap"></i>
                                <span>Internship</span>
                            </div>
                        </label>
                    </div>
                    
                    <div class="availability-section">
                        <label class="availability-label">Available to start:</label>
                        <div class="availability-options">
                            <label class="availability-option">
                                <input type="radio" name="availability" value="Immediate">
                                <span>Immediate</span>
                            </label>
                            <label class="availability-option">
                                <input type="radio" name="availability" value="2 weeks">
                                <span>2 weeks</span>
                            </label>
                            <label class="availability-option">
                                <input type="radio" name="availability" value="1 month">
                                <span>1 month</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Professional Experience -->
                <div class="form-step" data-step="4">
                    <div class="step-header">
                        <h2><span class="step-icon">📊</span> Professional Experience</h2>
                        <p class="step-description">Tell us about your work experience and achievements.</p>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Years of Experience *</label>
                            <div class="experience-options">
                                @php
                                    $experiences = [
                                        '0-1 year' => '0–1 year',
                                        '1-3 years' => '1–3 years',
                                        '3-5 years' => '3–5 years',
                                        '5+ years' => '5+ years'
                                    ];
                                @endphp
                                
                                @foreach($experiences as $value => $label)
                                <label class="experience-option">
                                    <input type="radio" name="experience" value="{{ $value }}" 
                                           {{ $loop->first ? 'required' : '' }}>
                                    <span class="option-label">{{ $label }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="current_role">Current / Most Recent Role *</label>
                            <input type="text" id="current_role" name="current_role" required 
                                   placeholder="e.g., Senior Web Developer"
                                   class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" id="company_name" name="company_name" 
                                   placeholder="Your current or previous company"
                                   class="form-control">
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="responsibilities">Briefly describe your responsibilities and achievements *</label>
                            <textarea id="responsibilities" name="responsibilities" rows="4" required 
                                      placeholder="Describe your key responsibilities, achievements, and contributions..."
                                      class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Step 5: Education -->
                <div class="form-step" data-step="5">
                    <div class="step-header">
                        <h2><span class="step-icon">🎓</span> Education</h2>
                        <p class="step-description">Provide your educational background.</p>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="qualification">Highest Qualification *</label>
                            <select id="qualification" name="qualification" required class="form-control">
                                <option value="">Select your highest qualification</option>
                                <option value="High School">High School</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Bachelor's Degree">Bachelor's Degree</option>
                                <option value="Master's Degree">Master's Degree</option>
                                <option value="PhD">PhD</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="field_of_study">Field of Study *</label>
                            <input type="text" id="field_of_study" name="field_of_study" required 
                                   placeholder="e.g., Computer Science, Business Administration"
                                   class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="institution">Institution Name *</label>
                            <input type="text" id="institution" name="institution" required 
                                   placeholder="University or Institution name"
                                   class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="graduation_year">Graduation Year *</label>
                            <input type="number" id="graduation_year" name="graduation_year" required 
                                   min="1970" max="{{ date('Y') + 5 }}"
                                   placeholder="YYYY"
                                   class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Step 6: Motivation & Fit -->
                <div class="form-step" data-step="6">
                    <div class="step-header">
                        <h2><span class="step-icon">🌟</span> Motivation & Fit</h2>
                        <p class="step-description">Tell us why you want to join VERITY and what you can contribute.</p>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label for="why_verity">Why do you want to work with VERITY Technology Solutions? *</label>
                            <textarea id="why_verity" name="why_verity" rows="4" required 
                                      placeholder="Tell us what attracts you to VERITY and how you align with our values..."
                                      class="form-control"></textarea>
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="value_add">What value do you think you can add to our team? *</label>
                            <textarea id="value_add" name="value_add" rows="4" required 
                                      placeholder="Describe your unique skills, experience, and how you can contribute..."
                                      class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Step 7: Resume Upload & Declaration -->
                <div class="form-step" data-step="7">
                    <div class="step-header">
                        <h2><span class="step-icon">📄</span> Resume Upload</h2>
                        <p class="step-description">Upload your resume and accept the declarations.</p>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label for="resume">Upload your CV / Resume (PDF preferred, max 5MB) *</label>
                            <div class="file-upload-area">
                                <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required 
                                       class="file-input">
                                <div class="file-upload-box">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p>Drag & drop your resume here or click to browse</p>
                                    <span class="file-info">Supports: PDF, DOC, DOCX (Max 5MB)</span>
                                </div>
                                <div class="file-preview" id="filePreview"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="declaration-section">
                        <h4>Declaration</h4>
                        <div class="declaration-checkboxes">
                            <label class="declaration-checkbox">
                                <input type="checkbox" name="declaration_accuracy" required>
                                <span class="checkbox-custom"></span>
                                <span>I confirm that all information provided is accurate and complete.</span>
                            </label>
                            
                            <label class="declaration-checkbox">
                                <input type="checkbox" name="declaration_privacy" required>
                                <span class="checkbox-custom"></span>
                                <span>I agree that VERITY Technology Solutions may store my information for recruitment purposes.</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="form-navigation">
                    <button type="button" class="btn btn-outline" id="prevBtn">
                        <i class="fas fa-arrow-left"></i> Previous
                    </button>
                    
                    <div class="step-counter">
                        <span id="currentStep">1</span> of {{ count($steps) }}
                    </div>
                    
                    <button type="button" class="btn btn-outline" id="nextBtn">
                        Next <i class="fas fa-arrow-right"></i>
                    </button>
                    
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-paper-plane"></i> Submit Application
                    </button>
                </div>
            </form>
        </section>
    </div>
</div>

<style>
/* Theme Variables */
:root {
    /* Light Theme */
    --primary-color: #3498db;
    --primary-dark: #2980b9;
    --text-color: #2c3e50;
    --text-secondary: #7f8c8d;
    --bg-primary: #ffffff;
    --bg-secondary: #f8f9fa;
    --card-bg: #ffffff;
    --border-color: #e1e8ed;
    --shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    --shadow-hover: 0 5px 20px rgba(0, 0, 0, 0.1);
    --transition: all 0.3s ease;
}

.dark-mode {
    /* Dark Theme */
    --primary-color: #4da6ff;
    --primary-dark: #3399ff;
    --text-color: #ecf0f1;
    --text-secondary: #bdc3c7;
    --bg-primary: #1a1a1a;
    --bg-secondary: #2d2d2d;
    --card-bg: #252525;
    --border-color: #404040;
    --shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    --shadow-hover: 0 5px 20px rgba(0, 0, 0, 0.3);
}

body {
    background-color: var(--bg-primary);
    color: var(--text-color);
    transition: var(--transition);
}

/* Theme Toggle */
.theme-toggle-container {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
}

.theme-toggle-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 25px;
    color: var(--text-color);
    cursor: pointer;
    transition: var(--transition);
}

.theme-toggle-btn:hover {
    background: var(--bg-secondary);
    transform: translateY(-2px);
}

/* Multi-step Progress */
.multi-step-progress {
    background: var(--card-bg);
    border-radius: 12px;
    padding: 25px;
    margin-bottom: 30px;
    border: 1px solid var(--border-color);
    box-shadow: var(--shadow);
}

.progress-bar {
    height: 6px;
    background: var(--bg-secondary);
    border-radius: 3px;
    margin-bottom: 25px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: var(--primary-color);
    width: 14.28%; /* 100% / 7 steps */
    transition: width 0.5s ease;
}

.step-indicators {
    display: flex;
    justify-content: space-between;
    position: relative;
}

.step-indicator {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    position: relative;
    z-index: 2;
}

.step-indicator::before {
    content: '';
    position: absolute;
    top: 14px;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 3px;
    background: var(--primary-color);
    transition: width 0.3s ease;
}

.step-indicator.active .step-number {
    background: var(--primary-color);
    color: white;
    transform: scale(1.1);
}

.step-indicator.active .step-label {
    color: var(--primary-color);
    font-weight: 600;
}

.step-number {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--bg-secondary);
    border-radius: 50%;
    color: var(--text-secondary);
    font-weight: 600;
    font-size: 0.9rem;
    transition: var(--transition);
}

.step-label {
    font-size: 0.85rem;
    color: var(--text-secondary);
    text-align: center;
    transition: var(--transition);
}

/* Form Steps */
.form-step {
    display: none;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.5s ease, transform 0.5s ease;
}

.form-step.active {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

.step-header {
    text-align: center;
    margin-bottom: 40px;
    padding-bottom: 20px;
    border-bottom: 2px solid var(--border-color);
}

.step-header h2 {
    color: var(--primary-color);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    font-size: 1.5rem;
}

.step-icon {
    font-size: 1.8rem;
}

.step-description {
    color: var(--text-secondary);
    font-size: 1rem;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Form Navigation */
.form-navigation {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 40px;
    padding-top: 25px;
    border-top: 1px solid var(--border-color);
    position: relative;
}

.step-counter {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    background: var(--bg-secondary);
    padding: 8px 20px;
    border-radius: 20px;
    font-weight: 600;
    color: var(--primary-color);
    border: 1px solid var(--border-color);
}

#submitBtn {
    display: none;
}

#submitBtn.show {
    display: block;
}

/* Form Controls */
.form-section {
    background: var(--card-bg);
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 30px;
    border: 1px solid var(--border-color);
    box-shadow: var(--shadow);
    transition: var(--transition);
}

.form-section:hover {
    box-shadow: var(--shadow-hover);
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: var(--text-color);
    font-weight: 500;
    font-size: 0.95rem;
}

.form-control {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    background: var(--bg-secondary);
    color: var(--text-color);
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
}

.form-control::placeholder {
    color: var(--text-secondary);
    opacity: 0.7;
}

textarea.form-control {
    min-height: 120px;
    resize: vertical;
}

/* Position Grid */
.position-grid {
    background: var(--bg-secondary);
    border-radius: 8px;
    padding: 20px;
}

.position-options {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 15px;
}

.position-checkbox {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 15px;
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.position-checkbox:hover {
    border-color: var(--primary-color);
    background: rgba(52, 152, 219, 0.05);
}

.position-checkbox input[type="radio"] {
    display: none;
}

.checkbox-custom {
    width: 20px;
    height: 20px;
    border: 2px solid var(--border-color);
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.position-checkbox input[type="radio"]:checked + .checkbox-custom {
    background: var(--primary-color);
    border-color: var(--primary-color);
}

.position-checkbox input[type="radio"]:checked + .checkbox-custom::after {
    content: '✓';
    color: white;
    font-size: 12px;
    font-weight: bold;
}

.position-label {
    color: var(--text-color);
    font-size: 0.95rem;
}

/* Employment Type */
.employment-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-bottom: 25px;
}

.employment-option input[type="radio"] {
    display: none;
}

.employment-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    padding: 25px 20px;
    background: var(--bg-secondary);
    border: 2px solid var(--border-color);
    border-radius: 8px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.employment-card i {
    font-size: 2rem;
    color: var(--primary-color);
    margin-bottom: 5px;
}

.employment-card span {
    color: var(--text-color);
    font-weight: 500;
    font-size: 1rem;
}

.employment-option input[type="radio"]:checked + .employment-card {
    border-color: var(--primary-color);
    background: rgba(52, 152, 219, 0.1);
    transform: translateY(-2px);
}

.availability-section {
    background: var(--bg-secondary);
    border-radius: 8px;
    padding: 20px;
}

.availability-label {
    display: block;
    margin-bottom: 15px;
    color: var(--text-color);
    font-weight: 500;
}

.availability-options {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.availability-option {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
}

.availability-option input[type="radio"] {
    display: none;
}

.availability-option span {
    padding: 8px 16px;
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 20px;
    color: var(--text-color);
    transition: all 0.2s ease;
}

.availability-option input[type="radio"]:checked + span {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
}

/* Experience Options */
.experience-options {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.experience-option {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
}

.experience-option input[type="radio"] {
    display: none;
}

.experience-option .option-label {
    padding: 10px 20px;
    background: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: 6px;
    color: var(--text-color);
    transition: all 0.2s ease;
    min-width: 100px;
    text-align: center;
}

.experience-option input[type="radio"]:checked + .option-label {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
}

/* File Upload */
.file-upload-area {
    position: relative;
    margin-top: 10px;
}

.file-input {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
    z-index: 2;
}

.file-upload-box {
    border: 2px dashed var(--border-color);
    border-radius: 8px;
    padding: 40px 20px;
    text-align: center;
    background: var(--bg-secondary);
    transition: all 0.3s ease;
    position: relative;
    z-index: 1;
}

.file-upload-box:hover {
    border-color: var(--primary-color);
    background: rgba(52, 152, 219, 0.05);
}

.file-upload-box i {
    font-size: 3rem;
    color: var(--primary-color);
    margin-bottom: 15px;
}

.file-upload-box p {
    color: var(--text-color);
    margin-bottom: 10px;
    font-size: 1rem;
}

.file-info {
    color: var(--text-secondary);
    font-size: 0.9rem;
}

.file-preview {
    margin-top: 15px;
    padding: 15px;
    background: var(--bg-secondary);
    border-radius: 6px;
    border: 1px solid var(--border-color);
    display: none;
}

.file-preview.active {
    display: block;
}

/* Declaration */
.declaration-section {
    margin-top: 30px;
    padding-top: 25px;
    border-top: 1px solid var(--border-color);
}

.declaration-section h4 {
    color: var(--text-color);
    margin-bottom: 20px;
    font-size: 1.1rem;
}

.declaration-checkboxes {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.declaration-checkbox {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    cursor: pointer;
}

.declaration-checkbox input[type="checkbox"] {
    display: none;
}

.declaration-checkbox .checkbox-custom {
    flex-shrink: 0;
    margin-top: 2px;
}

.declaration-checkbox input[type="checkbox"]:checked + .checkbox-custom {
    background: var(--primary-color);
    border-color: var(--primary-color);
}

.declaration-checkbox span:not(.checkbox-custom) {
    color: var(--text-color);
    font-size: 0.95rem;
    line-height: 1.5;
}

/* Buttons */
.btn {
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-primary {
    background: var(--primary-color);
    color: white;
}

.btn-primary:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

.btn-outline {
    background: transparent;
    border: 2px solid var(--border-color);
    color: var(--text-color);
}

.btn-outline:hover {
    border-color: var(--primary-color);
    color: var(--primary-color);
}

/* Responsive */
@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .position-options {
        grid-template-columns: 1fr;
    }
    
    .employment-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .step-indicators {
        display: none;
    }
    
    .step-counter {
        position: static;
        transform: none;
    }
    
    .form-navigation {
        flex-direction: column;
        gap: 15px;
    }
}

@media (max-width: 480px) {
    .form-section {
        padding: 20px;
    }
    
    .employment-grid {
        grid-template-columns: 1fr;
    }
    
    .availability-options {
        flex-direction: column;
        gap: 10px;
    }
    
    .experience-options {
        flex-direction: column;
        gap: 10px;
    }
    
    .step-header h2 {
        flex-direction: column;
        gap: 10px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Theme Management
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = themeToggle.querySelector('i');
    const themeText = themeToggle.querySelector('span');
    
    // Check for saved theme or system preference
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
        document.body.classList.add('dark-mode');
        themeIcon.className = 'fas fa-sun';
        themeText.textContent = 'Light Mode';
    }
    
    // Theme Toggle Handler
    themeToggle.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
        
        if (document.body.classList.contains('dark-mode')) {
            themeIcon.className = 'fas fa-sun';
            themeText.textContent = 'Light Mode';
            localStorage.setItem('theme', 'dark');
        } else {
            themeIcon.className = 'fas fa-moon';
            themeText.textContent = 'Dark Mode';
            localStorage.setItem('theme', 'light');
        }
    });
    
    // Multi-step Form Logic
    const steps = document.querySelectorAll('.form-step');
    const stepIndicators = document.querySelectorAll('.step-indicator');
    const progressFill = document.getElementById('progressFill');
    const currentStepDisplay = document.getElementById('currentStep');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    
    let currentStep = 1;
    const totalSteps = steps.length;
    
    // Initialize form
    updateStep();
    
    // Next Button Handler
    nextBtn.addEventListener('click', function() {
        if (validateStep(currentStep)) {
            if (currentStep < totalSteps) {
                currentStep++;
                updateStep();
            }
        }
    });
    
    // Previous Button Handler
    prevBtn.addEventListener('click', function() {
        if (currentStep > 1) {
            currentStep--;
            updateStep();
        }
    });
    
    // Update step display
    function updateStep() {
        // Hide all steps
        steps.forEach(step => {
            step.classList.remove('active');
        });
        
        // Show current step
        steps[currentStep - 1].classList.add('active');
        
        // Update progress bar
        const progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
        progressFill.style.width = `${progressPercentage}%`;
        
        // Update step indicators
        stepIndicators.forEach((indicator, index) => {
            indicator.classList.remove('active');
            if (index < currentStep) {
                indicator.classList.add('active');
            }
        });
        
        // Update step counter
        currentStepDisplay.textContent = currentStep;
        
        // Update button states
        prevBtn.style.display = currentStep === 1 ? 'none' : 'flex';
        nextBtn.style.display = currentStep === totalSteps ? 'none' : 'flex';
        submitBtn.classList.toggle('show', currentStep === totalSteps);
    }
    
    // Validate current step
    function validateStep(step) {
        const currentStepElement = steps[step - 1];
        const requiredFields = currentStepElement.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.style.borderColor = '#e74c3c';
                
                // Scroll to first invalid field
                if (isValid === false) {
                    field.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            } else {
                field.style.borderColor = '';
            }
            
            // Special validation for radio groups
            if (field.type === 'radio' && field.name) {
                const radioGroup = currentStepElement.querySelectorAll(`input[name="${field.name}"]:checked`);
                if (radioGroup.length === 0) {
                    isValid = false;
                    const groupContainer = field.closest('.experience-options, .availability-options');
                    if (groupContainer) {
                        groupContainer.style.border = '2px solid #e74c3c';
                        groupContainer.style.padding = '10px';
                        groupContainer.style.borderRadius = '8px';
                    }
                }
            }
        });
        
        if (!isValid) {
            alert('Please fill in all required fields in this section before proceeding.');
        }
        
        return isValid;
    }
    
    // File upload preview
    const fileInput = document.getElementById('resume');
    const filePreview = document.getElementById('filePreview');
    
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validate file size (5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be less than 5MB');
                this.value = '';
                filePreview.innerHTML = '';
                filePreview.classList.remove('active');
                return;
            }
            
            filePreview.innerHTML = `
                <div style="display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-file" style="font-size: 2rem; color: var(--primary-color);"></i>
                    <div>
                        <strong>${file.name}</strong>
                        <div style="color: var(--text-secondary); font-size: 0.9rem;">
                            ${(file.size / 1024 / 1024).toFixed(2)} MB
                        </div>
                    </div>
                </div>
            `;
            filePreview.classList.add('active');
        } else {
            filePreview.innerHTML = '';
            filePreview.classList.remove('active');
        }
    });
    
    phoneInputs.forEach(input => {
    input.addEventListener('blur', function () {
        let value = this.value.trim();

        if (!value) return;

        // Remove spaces only
        value = value.replace(/\s+/g, '');

        // If user didn't type country code, add it once
        if (!value.startsWith('+')) {
            value = '+20' + value;
        }

        this.value = value;
    });
});

    
    // Form submission validation
    const form = document.getElementById('jobApplicationForm');
    form.addEventListener('submit', function(e) {
        // Check declaration checkboxes
        const declaration1 = document.querySelector('input[name="declaration_accuracy"]');
        const declaration2 = document.querySelector('input[name="declaration_privacy"]');
        
        if (!declaration1.checked || !declaration2.checked) {
            e.preventDefault();
            alert('Please accept both declaration statements before submitting.');
            return;
        }
        
        // Validate file upload
        if (!fileInput.files.length) {
            e.preventDefault();
            alert('Please upload your resume before submitting.');
            return;
        }
        
        // Show loading state
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
        submitBtn.disabled = true;
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowRight' || e.key === 'Enter') {
            if (currentStep < totalSteps) {
                nextBtn.click();
            }
        } else if (e.key === 'ArrowLeft') {
            if (currentStep > 1) {
                prevBtn.click();
            }
        }
    });
    
    // Allow jumping to specific step by clicking on progress indicator
    stepIndicators.forEach((indicator, index) => {
        indicator.addEventListener('click', function() {
            const stepNumber = parseInt(this.getAttribute('data-step'));
            if (stepNumber < currentStep) {
                // Allow going back to previous steps
                currentStep = stepNumber;
                updateStep();
            }
        });
    });
});
</script>
@endsection