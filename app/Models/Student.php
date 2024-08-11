<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'email', 'age', 'image', 'gender', 'track_id','grade'
    ];

    public function track()
    {
        return $this->belongsTo(Track::class, 'track_id');
    }
}

