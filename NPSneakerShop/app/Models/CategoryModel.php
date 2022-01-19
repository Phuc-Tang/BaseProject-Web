<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_category_product';
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_name','category_alias','category_desc','category_status','p_category_id'];

    public function product() {
        return $this->hasMany('App\Models\ProductModel');
    }
}
