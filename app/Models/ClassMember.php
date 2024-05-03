<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassMember extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function classname()
    {
        return $this->belongsTo(ClassName::class);
    }

    public function lesson_value()
    {
        return $this->hasMany(LessonValue::class);
    }
}
