<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'pekerjaan';

    public function skillTag()
    {
        return $this->hasMany('App\SkillTag');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
