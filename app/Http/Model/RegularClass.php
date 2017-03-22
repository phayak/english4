<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class RegularClass extends Model
{
    protected $fillable = ['user_booking_id','user_id','teacher_id','reg1','reg2','reg2elaborate','reg3','reg3elaborate','reg4','reg4elaborate','reg5','reg5elaborate'];

    public $timestamps = true;
}
