<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['judul', 'isi', 'image', 'created_by'])]
class Announcement extends Model
{
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
