<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonValue extends Model
{
    use HasFactory;
    public function learning()
    {
        return $this->belongsTo(Learning::class, 'id_learning');
    }

    public function class_member()
    {
        return $this->belongsTo(ClassMember::class, 'id_classmember');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'id_student');
    }
}
