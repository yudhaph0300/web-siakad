<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'id_teacher');
    }

    public function learnings()
    {
        return $this->hasMany(Learning::class);
    }

    public function year()
    {
        return $this->belongsTo(AcademicYear::class, 'id_academic_year');
    }
}
