<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    protected $table='employee';

   function countryList(){
   		return $this->hasOne('App\Country','id','country');
   }
}
