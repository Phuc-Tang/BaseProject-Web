<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_product_attribute';
    protected $primaryKey = 'attribute_id';
    protected $fillable = ['product_id','sku','price','size','stock'];

    public function product() {
        return $this->hasMany('App\Models\ProductModel');
    }
}
