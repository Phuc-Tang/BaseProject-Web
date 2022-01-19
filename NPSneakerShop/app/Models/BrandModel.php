<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_brand';
    protected $primaryKey = 'brand_id';
    protected $fillable = ['brand_name','category_desc','category_status','p_brand_id'];
    public function product() {
        return $this->hasMany('App\Models\ProductModel');
    }
}
