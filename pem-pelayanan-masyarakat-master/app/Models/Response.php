<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $table = 'response';

    protected $primaryKey = 'response_id';

    protected $fillable = [
        'report_id',
        'response_date',
        'response',
        'id_petugas',
    ];
}
