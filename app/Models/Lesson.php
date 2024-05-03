<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public function learnings()
    {
        return $this->hasMany(Learning::class, 'id_lesson');
    }

    public function year()
    {
        return $this->belongsTo(AcademicYear::class, 'id_academic_year');
    }
}
