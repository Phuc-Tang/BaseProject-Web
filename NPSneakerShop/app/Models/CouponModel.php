<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_coupon';
    protected $primaryKey = 'coupon_id';
    protected $fillable = ['coupon_name','coupon_code','coupon_time','coupon_number','coupon_condition'];

    public function product() {
        return $this->hasMany('App\Models\ProductModel');
    }
}
