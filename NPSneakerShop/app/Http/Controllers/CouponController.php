<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CouponModel;
use Illuminate\Support\Facades\Redirect;
class CouponController extends Controller
{
    public function insert_coupon(){
        return view('admin.coupon.insert_coupon');
    }

    public function insert_coupon_code(Request $req){
        $data = $req->all();

        $coupon = new CouponModel;

        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->save();
        return Redirect('insert-coupon')->with('success','Thêm mã giảm giá thành công');
    }

    public function all_coupon(){
        $coupon = CouponModel::orderby('created_at','desc')->get();
        return view('admin.coupon.list_coupon')->with(compact('coupon'));
    }

    public function delete_coupon($coupon_id){
        $coupon = CouponModel::find($coupon_id);

        $coupon->delete();
        return Redirect('all-coupon')->with('success','Xóa mã giảm giá thành công');
    }
}
