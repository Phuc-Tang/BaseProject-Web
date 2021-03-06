<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WardsModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_xaphuongthitran';
    protected $primaryKey = 'xaid';
    protected $fillable = ['name_xaphuong','type','maqh'];
}
