<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = ['date', 'ip', 'name','email','subject','msg','view'];

    public $timestamps = true;
}
