<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_banner';
    protected $primaryKey = 'banner_id';
    protected $fillable = ['banner_image'];
}
