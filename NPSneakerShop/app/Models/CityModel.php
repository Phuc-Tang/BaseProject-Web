<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_tinhthanhpho';
    protected $primaryKey = 'matp';
    protected $fillable = ['name_city','type'];
}
