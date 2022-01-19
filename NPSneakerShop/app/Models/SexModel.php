<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SexModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_product_sex';
    protected $primaryKey = 'sex_id';
    protected $fillable = ['sex_name','sex_alias'];
    public function product() {
        return $this->hasMany('App\Models\ProductModel');
    }
}
