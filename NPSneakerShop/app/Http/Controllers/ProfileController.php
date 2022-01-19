<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\AttributeModel;
use App\Models\ImagesModel;
use App\Models\BannerModel;
use App\Models\SexModel;
use App\Models\User;
use App\Models\ProfileModel;
class ProfileController extends Controller
{
    public function profile($customer_id){
        $profile = ProfileModel::where('customer_id',$customer_id)->get();
        $check = ProfileModel::all();
        $customer = User::where('customer_id',$customer_id)->first(); 

        return view('pages.login.profile')->with(compact('customer','profile','check'));
    }

    public function add_profile($customer_id){
        $add_profile = ProfileModel::where('customer_id',$customer_id)->get();
        $only_customer = User::find($customer_id);
        return view('pages.login.add_profile')->with(compact('add_profile','only_customer'));
    }

    public function save_profile(Request $request, $customer_id){
        if($request->isMethod('post')){
            $data = $request->all();
            foreach($data['address'] as $key => $val) {

                $save_profile = new ProfileModel;
                $save_profile->customer_id = $customer_id;
                $save_profile->address = $val;
                $save_profile->gender = $data['gender'][$key];
                $save_profile->phone = $data['phone'][$key];
                $save_profile->mobile = $data['mobile'][$key];
                $save_profile->save();
            }
        }
        return Redirect('/thong-tin-ca-nhan/'.$customer_id)->with('success','thêm thông tin cá nhân thành công');
    }
   
}
