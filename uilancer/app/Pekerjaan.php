<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'pekerjaan';

    public function skillTag()
    {
        return $this->hasMany('App\SkillTagPekerjaan');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function applyManager() {
        return $this->hasMany(ApplyManager::class);
    }
}
