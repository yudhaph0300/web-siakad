<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonValue extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'id_learning',
        'id_student',
        'ko1',
        'ko2',
        'sub1',
        'sub2',
        'praktik',
        'uts_uas',
    ];
    public function learning()
    {
        return $this->belongsTo(Learning::class, 'id_learning');
    }


    public function student()
    {
        return $this->belongsTo(Student::class, 'id_student');
    }
}
