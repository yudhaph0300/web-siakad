<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    // attribut yang dapat di isi
    protected $fillable = [
        'name', 'username', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
