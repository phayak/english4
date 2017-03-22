<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = ['pay_type', 'user_id', 'package_id','number_of_month','coupon_id','price_total','status','date_start','date_end'];

    public $timestamps = true;

}
