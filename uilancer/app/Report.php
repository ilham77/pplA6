<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';
    
    protected $fillable = [
        'keluhan','reported_name','pelapor'
    ];
    
    protected $hidden = [
    'reported_id'
    ];

    
}
