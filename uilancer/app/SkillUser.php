<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillUser extends Model
{
	protected $table = 'skilluser';

    public function user() {
        return $this->belongsTo(User::class);
    }
}
