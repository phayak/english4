<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable = ['class_teacher_id', 'teacher_id', 'user_id','text'];

    public $timestamps = true;
}
