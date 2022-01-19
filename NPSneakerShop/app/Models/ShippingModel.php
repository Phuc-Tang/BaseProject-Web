<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_shipping';
    protected $primaryKey = 'shipping_id';
    protected $fillable = ['shipping_name','shipping_address','shipping_phone','shipping_email','shipping_notes','shipping_method'];

}
