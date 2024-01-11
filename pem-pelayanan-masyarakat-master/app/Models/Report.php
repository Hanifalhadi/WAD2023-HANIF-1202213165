<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    
    protected $table = 'report';

    protected $primaryKey = 'report_id';

    protected $fillable = [
        'report_date',
        'civitas_id',
        'report_desc',
        'evidence',
        'status'
    ];

    public function user(){
        return $this->hasOne(Civitas::class, 'civitas_id', 'civitas_id');
    }
}