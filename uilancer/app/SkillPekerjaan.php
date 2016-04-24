<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillPekerjaan extends Model
{
    protected $table = 'skillpekerjaan';

    public function pekerjaan() {
    	return $this->belongsTo(Pekerjaan::class);
    }
}
