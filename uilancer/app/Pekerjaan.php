<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'pekerjaan';

<<<<<<< HEAD
    public function skillTag()
    {
        return $this->hasMany('App\SkillTag');
    }
}
=======
    public function skill() {
    	return $this->hasMany(SkillPekerjaan::class);
    }
}
>>>>>>> post-lowongan-UI
