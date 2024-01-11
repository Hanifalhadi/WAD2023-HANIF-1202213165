<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Civitas extends Authenticable
{
    use HasFactory;   

    protected $table = 'civitas';

    protected $fillable = [
        'civitas_id',
        'name',
        'username',
        'password',
        'no_telp',
    ];
}