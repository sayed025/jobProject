<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'user_id',
        'cover_letter',
    ];

    // Relationship with Job
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    // Relationship with User (User who applied for the job)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
