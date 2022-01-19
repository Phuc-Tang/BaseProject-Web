<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;
use Session;
use App\Http\Requests;
use App\Models\BrandModel;
use Illuminate\Support\Facades\Redirect;
session_start();
class BrandProduct extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand_product() {
        $this->AuthLogin();
        $brand = BrandModel::all();
        return view('admin.add_brand_product')->with(compact('brand'));
    }

    public function all_brand_product() {
        $this->AuthLogin();
        $brand = BrandModel::paginate(5);
        return view('admin.all_brand_product')->with(compact('brand'));

    }
    
    public function save_brand_product() {
        $this->AuthLogin();
        $data = request()->validate([
            'brand_name' => 'required',
            'brand_desc' => 'required',
            'brand_status' => 'required',
        ]);
        $brand = new BrandModel();
        $brand->brand_name = $data['brand_name'];
        $brand->brand_desc = $data['brand_desc'];
        $brand->brand_status = $data['brand_status'];
        $brand->save();

        return redirect('add-brand-product')->with('success','Nhập data thành công');
    }

    public function unactive_brand_product($brand_product_id) {
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

    public function active_brand_product($brand_product_id) {
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    
    public function edit_brand_product($brand_product_id) {
        $this->AuthLogin();
        $brand = BrandModel::all();
        $brand_edit = BrandModel::find($brand_product_id);
        return view('admin.edit_brand_product')->with(compact('brand_edit','brand'));
    }

    public function update_brand_product($brand_product_id) {
        $this->AuthLogin();
        $data = request()->validate([
            'brand_name' => 'required',
            'brand_desc' => 'required',
            'brand_status' => 'required',
        ]);
        $brand = brandModel::find($brand_product_id);
        $brand->brand_name = $data['brand_name'];
        $brand->brand_desc = $data['brand_desc'];
        $brand->brand_status = $data['brand_status'];
        $brand->save();

        return redirect('add-brand-product')->with('success','Cập nhật data thành công');
    }

    public function delete_brand_product($brand_product_id) {
        $this->AuthLogin();
        $category = BrandModel::find($brand_product_id);
        $category->delete();
        return redirect('all-brand-product')->with('success','Xóa data thành công');
    }
}
