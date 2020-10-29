<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    public $incrementing = true; // if IDs are auto-incrementing.
    public $timestamps = true; // if the model should be timestamped.

    public function goals()
    {
        return $this->belongsToMany('App\Goal','goal_company','company_id','goal_id');
    }
    public function logo()
    {
        return $this->morphOne('App\ImageFile', 'imageable');
    }
}