<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['doctor_id', 'day', 'start_time', 'end_time'])]
class Schedule extends Model
{
    //
    use HasFactory;
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
