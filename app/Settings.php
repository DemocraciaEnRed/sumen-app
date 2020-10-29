<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    public $incrementing = true; // if IDs are auto-incrementing.
    public $timestamps = true; // if the model should be timestamped.

    public function getCastedValueAttribute()
      {
          switch ($this->type) {
            case 'int':
            case 'integer':
                return intval($this->value);
                break;
            case 'float':
                return floatval($this->value);
                break;
            case 'bool':
            case 'boolean':
                return boolval($this->value);
                break;
            case 'json':
                return json_decode($this->value);
            default:
                return $this->value;
          }
      }
}
