<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobApplication extends Model
{

    const STATUSES = [
        'new' => 'New',
        'reviewed' => 'Reviewed', 
        'shortlisted' => 'Shortlisted',
        'interview' => 'Interview',
        'rejected' => 'Rejected',
        'hired' => 'Hired',
    ];
    
    public static function statusStats()
    {
        return collect(self::STATUSES)->mapWithKeys(function($label, $status) {
            return [$status => self::where('status', $status)->count()];
        })->toArray();
    }
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'whatsapp',
        'country',
        'linkedin',
        'portfolio',
        'position',
        'employment_type',
        'availability',
        'experience',
        'current_role',
        'company_name',
        'responsibilities',
        'qualification',
        'field_of_study',
        'institution',
        'graduation_year',
        'why_verity',
        'value_add',
        'resume_path',
        'status',
        'ip_address',
        'user_agent'
    ];

    

    protected $casts = [
        'graduation_year' => 'integer',
    ];

    // Status scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeReviewed($query)
    {
        return $query->where('status', 'reviewed');
    }

    public function scopeShortlisted($query)
    {
        return $query->where('status', 'shortlisted');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function scopeHired($query)
    {
        return $query->where('status', 'hired');
    }

    // Helper methods
    public function getStatusColor()
    {
        return match($this->status) {
            'pending' => 'warning',
            'reviewed' => 'info',
            'shortlisted' => 'primary',
            'rejected' => 'danger',
            'hired' => 'success',
            default => 'secondary'
        };
    }

    public function getEmploymentTypeIcon()
    {
        return match($this->employment_type) {
            'Full-time' => 'briefcase',
            'Part-time' => 'clock',
            'Contract' => 'file-contract',
            'Internship' => 'graduation-cap',
            default => 'user'
        };
    }

    
}