<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function doctorProfile()
    {
        return $this->belongsTo(DoctorProfile::class);
    }
}
