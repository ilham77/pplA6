<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillTagPekerjaan extends Model
{
    //
    protected $table = 'skillTag_pekerjaan';

    public function pekerjaan()
    {
        return $this->belongsTo('App\Pekerjaan','pekerjaan_id');
    }
}
