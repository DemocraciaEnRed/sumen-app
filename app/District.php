<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    public $incrementing = true; // if IDs are auto-incrementing.
    public $timestamps = true; // if the model should be timestamped.

    public function goals()
    {
        return $this->belongsToMany('App\Goals','goal_district','district_id','goal_id');
    }
}