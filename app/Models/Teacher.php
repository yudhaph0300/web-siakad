<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    // attribut yang dapat di isi
    protected $fillable = [
        'nik', 'name', 'username', 'password', 'role', 'image'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
