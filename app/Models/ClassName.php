<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'id_teacher',
        'id_year'
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'id_class');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'id_teacher');
    }

    public function year()
    {
        return $this->belongsTo(AcademicYear::class, 'id_year');
    }
}
