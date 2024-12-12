<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'location',
        'salary',
        'user_id',
    ];

    // Relationship with User (Job is posted by a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Applications
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
