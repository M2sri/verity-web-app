<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            
            // Personal Information
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp')->nullable();
            $table->string('country');
            $table->string('linkedin')->nullable();
            $table->string('portfolio')->nullable();
            
            // Position & Employment
            $table->string('position');
            $table->string('employment_type');
            $table->string('availability');
            
            // Experience
            $table->string('experience');
            $table->string('current_role');
            $table->string('company_name')->nullable();
            $table->text('responsibilities');
            
            // Education
            $table->string('qualification');
            $table->string('field_of_study');
            $table->string('institution');
            $table->year('graduation_year');
            
            // Motivation
            $table->text('why_verity');
            $table->text('value_add');
            
            // Resume
            $table->string('resume_path');
            
            // Status
            $table->enum('status', ['pending', 'reviewed', 'shortlisted', 'rejected', 'hired'])
                  ->default('pending');
            
            // Metadata
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
}