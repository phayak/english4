<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class TeacherBooking extends Model
{
	protected $table = 'teacher_bookings';

    protected $fillable = [
    	'teacher_id',
    	'teacher_time_id',
    	'date_teacher',
    	'start_time',
    	'published_at',
    ];

    public $timestamps = true;
    
    protected $dates = ['date_teacher'];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function times()
    {
    	return $this->belongsToMany('App\Time');
    }

    public function getTimeListAttribute()
    {
        return $this->times->lists('id');
    }
    public function getDateTeacherAttribute($date)
    {
        return $this->attributes['date_teacher'] = Carbon::parse($date);
    }
    public function scopePublished($query)
    {
    	$query->where('date_teacher','<=',Carbon::now());
    }
    public function scopeUnpublished($query)
    {
    	$query->where('date_teacher','>',Carbon::now());
    }
}
