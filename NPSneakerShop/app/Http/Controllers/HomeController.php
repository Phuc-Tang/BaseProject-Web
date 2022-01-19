<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\AttributeModel;
use App\Models\ImagesModel;
use App\Models\BannerModel;
use App\Models\SexModel;
use App\Models\User;
use App\Models\ProfileModel;
use Auth;
use Session;
session_start();
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $all_product = ProductModel::orderby('created_at','desc')->limit(10)->get();
        $pre_product =ProductModel::where('product_status','1')->limit(10)->get();
        $all_category = CategoryModel::all();
        $all_brand = BrandModel::all();
        $all_sex = SexModel::all();
        $all_banner = BannerModel::all();
        $customer = User::all();
        $profile = ProfileModel::all();
        return view('pages.home')->with(compact('all_category','all_product','all_brand','all_sex','all_banner','pre_product','customer','profile'));
    }

    public function dangnhap(){
        return view('pages.login.login');
    }
    public function dangky(){
        return view('pages.login.sign-up');
    }

    public function sign_up(Request $req){
        User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>bcrypt($req->password)
        ]);
        return redirect('dang-ky')->with('success','Đăng ký tài khoản thành công');
    }

    public function sign_in(Request $req){

        

        if(Auth::attempt($req->only('email','password'))){
            $id = Auth::id();
          Session::put('customer_id',$id);
            return redirect('/');
        }else{
            return redirect()->back()->with('warning','Sai tài khoản hoặc mật khẩu');
        }
    }

    public function log_out(){
        Auth::logout();
        Session::forget('customer_id');
        return redirect()->back();
    }

    public function search(Request $request){
        $keywords = $request->keywords_submit;

        $search_product = ProductModel::where('product_name','like','%'.$keywords.'%')->get();
        $all_category = CategoryModel::all();
        $all_brand = BrandModel::all();
        $all_sex = SexModel::all();
        $attribute = AttributeModel::all();

        return view('pages.search')->with(compact('search_product','all_category','all_brand','all_sex'));
    }

}

