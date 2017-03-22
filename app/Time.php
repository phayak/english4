<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{

    protected $fillable = ['time_th'];
   	public function teacherbookings()
   	{
   		return $this->belongsToMany('App\TeacherBooking');
   	}
}
