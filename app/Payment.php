<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $fillable = ['order_id','pament_type_id', 'mumber_of_month','total','date','time','file_slip','status'];
    
    public $timestamps = true;
}
