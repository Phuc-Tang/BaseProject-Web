<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_image_product';
    protected $primaryKey = 'image_id';
    protected $fillable = ['product_id','image'];
}
