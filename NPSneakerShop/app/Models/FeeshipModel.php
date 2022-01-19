<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeshipModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_feeship';
    protected $primaryKey = 'fee_id';
    protected $fillable = ['fee_matp','fee_maqh','fee_xaid','fee_feeship'];

    public function city(){
        return $this->belongsTo('App\Models\CityModel','fee_matp');
    }
    public function province(){
        return $this->belongsTo('App\Models\ProvinceModel','fee_maqh');
    }
    public function wards(){
        return $this->belongsTo('App\Models\WardsModel','fee_xaid');
    }
}
