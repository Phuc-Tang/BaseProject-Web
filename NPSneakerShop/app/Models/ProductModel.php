<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_name','product_alias','product_color','product_quantity','product_price','product_image','product_sku','product_category_id','product_brand_id','product_sex_id','product_content','product_sex','product_status'];
    public function category(){
        return $this->belongsTo('App\Models\CategoryModel','product_category_id');
    }
    public function brand(){
        return $this->belongsTo('App\Models\BrandModel','product_brand_id');
    }
    public function sex(){
        return $this->belongsTo('App\Models\SexModel','product_sex_id');
    }
    public function attribute(){
        return $this->hasMany('App\Models\AttributeModel','product_id');
    }
}
