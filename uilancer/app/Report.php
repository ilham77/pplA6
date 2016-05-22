<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';
    
    protected $fillable = [
        'keluhan'
    ];
    
    public function user() {
        return $this->hasMany(User::class);
    }
    
}
