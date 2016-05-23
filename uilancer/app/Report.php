<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';
    
    protected $fillable = [
        'judul','keluhan','reported_name','pelapor','asal_instansi'
    ];
    
    protected $hidden = [
    'reported_id'
    ];

    
}
