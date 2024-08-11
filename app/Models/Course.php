<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'type', 
        'total_duration', 
        'level', 
        'track_id'
    ];

    // Define the relationship with Track
    public function track()
    {
        return $this->belongsTo(Track::class);
    }
}
