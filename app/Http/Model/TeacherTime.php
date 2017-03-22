<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class TeacherTime extends Model
{
    protected $fillable = ['teacher_id', 'date_teacher', 'start_time'];

    public $timestamps = true;
}
