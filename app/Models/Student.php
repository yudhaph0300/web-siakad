<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    // attribut yang dapat di isi
    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function classname()
    {
        return $this->belongsTo(ClassName::class, 'id_class');
    }

    public function lesson_value()
    {
        return $this->hasOne(LessonValue::class);
    }
}
