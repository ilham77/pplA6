<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['rating','testimoni'];

    public function freelancer(){
    	return $this->belongsTo(User::class);
    }

    public function jobGiver(){
    	return $this->belongsTo(User::class);
    }

    public function pekerjaan(){
    	return $this->belongsTo(Pekerjaan::class);
    }
}
