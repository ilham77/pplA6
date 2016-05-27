<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Statistic extends Authenticatable
{

protected $table = 'statistic';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tanggal','jml_freelancer','jml_job','jml_done','jml_report'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
 
}
