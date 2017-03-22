<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teacher';

    protected $fillable = ['img', 'name', 'title','vdo_link','status'];

    public $timestamps = true;
}
