<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class TrialClass extends Model
{
    //
    protected $fillable = ['user_booking_id','user_id','teacher_id','1a','1b','1c','1d','1e','1f','1instructor','2a','2b','2c','2instructor','3a','3b','3instructor','4instructor','5English','6English'];

    public $timestamps = true;
}
