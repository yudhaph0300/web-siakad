<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
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
        return $this->hasMany(ClassName::class);
    }

    public function learnings()
    {
        return $this->hasMany(Learning::class);
    }
}
