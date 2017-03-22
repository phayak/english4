<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBooking extends Model
{
	protected $fillable = [
    	'teacher_id',
    	'user_id',
    	'teacher_time_id',
    	'time_id',
        'date',
        'datetime_start',
    	'datetime_end',
    	'start_time',
        'end_time',
    	'class_type',
    	'status',
        'room_video',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
