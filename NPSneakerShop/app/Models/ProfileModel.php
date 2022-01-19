<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_profile';
    protected $primaryKey = 'profile_id';
    protected $fillable = ['customer_id','gender','phone','mobile','address'];

    public function User(){
        return $this->belongsTo('App\Models\User','customer_id'); 
    }
}
