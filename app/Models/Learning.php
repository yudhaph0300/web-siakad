<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learning extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public function classname()
    {
        return $this->belongsTo(ClassName::class, 'id_class');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'id_lesson');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'id_teacher');
    }

    public function lesson_value()
    {
        return $this->hasMany(LessonValue::class, 'id_learning');
    }
}
