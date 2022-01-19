<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;
use Session;
use App\Http\Requests;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_product() {
        $this->AuthLogin();
        $category = CategoryModel::all();
        return view('admin.add_category_product')->with(compact('category'));
    }

    public function all_category_product() {
        $this->AuthLogin();
        $category = CategoryModel::paginate(6);
        return view('admin.all_category_product')->with(compact('category'));

    }
    
    public function save_category_product() {
        $this->AuthLogin();
        $data = request()->validate([
            'category_name' => 'required',
            'category_alias' => 'required',
            'p_category_id' => 'required',
            'category_desc' => 'required',
            'category_status' => 'required',
        ]);
        $category = new CategoryModel();
        $category->category_name = $data['category_name'];
        $category->category_alias = $data['category_alias'];
        $category->p_category_id = $data['p_category_id'];
        $category->category_desc = $data['category_desc'];
        $category->category_status = $data['category_status'];
        $category->save();

        return redirect('add-category-product')->with('success','Nhập data thành công');
    }

    public function unactive_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    public function active_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    
    public function edit_category_product($category_product_id) {
        $this->AuthLogin();
        $category = CategoryModel::all();
        $category_edit = CategoryModel::find($category_product_id);
        return view('admin.edit_category_product')->with(compact('category_edit','category'));
    }

    public function update_category_product($category_product_id) {
        $this->AuthLogin();
        $data = request()->validate([
            'category_name' => 'required',
            'category_alias' => 'required',
            'p_category_id' => 'required',
            'category_desc' => 'required',
            'category_status' => 'required',
        ]);
        $category = CategoryModel::find($category_product_id);
        $category->category_name = $data['category_name'];
        $category->category_alias = $data['category_alias'];
        $category->p_category_id = $data['p_category_id'];
        $category->category_desc = $data['category_desc'];
        $category->category_status = $data['category_status'];
        $category->save();

        return redirect('add-category-product')->with('success','Cập nhật data thành công');
    }

    public function delete_category_product($category_product_id) {
        $this->AuthLogin();
        $category = CategoryModel::find($category_product_id);
        $category->delete();
        return redirect('all-category-product')->with('success','Xóa data thành công');
    }

    //End Function Admin Page
}
