<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public function classname()
    {
        return $this->hasMany(ClassName::class);
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }
}
