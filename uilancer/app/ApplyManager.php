<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplyManager extends Model
{
    protected $table = 'apply_manager';
    protected $fillable = ['status'];

    public function pekerjaan()
    {
        return $this->belongsTo('App\Pekerjaan','pekerjaan_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
