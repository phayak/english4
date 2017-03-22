<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon';

    protected $fillable = ['unit', 'use_unit', 'code','name','discount','coupon_date_start','coupon_date_end'];

    public $timestamps = true;
}
