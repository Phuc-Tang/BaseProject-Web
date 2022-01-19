<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;
use Session;
use App\Http\Requests;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\AttributeModel;
use App\Models\ImagesModel;
use App\Models\BannerModel;
use App\Models\SexModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
session_start();
class ProductController extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product() {
        $this->AuthLogin();
        $category = CategoryModel::all();
        $brand = BrandModel::all();
        $sex = SexModel::all();
        $product = ProductModel::all();
        return view('admin.add_product')->with(compact('category','brand','product','sex'));
    }

    public function all_product() {
        $this->AuthLogin();
        $category = CategoryModel::all();
        $brand = BrandModel::all();
        $sex = SexModel::all();
        $product = ProductModel::paginate(5);
        return view('admin.all_product')->with(compact('brand','category','product','sex'));

    }
    
    public function save_product() {
        $this->AuthLogin();
        $data = request()->validate([
            'product_name' => 'required',
            'product_alias' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_color' => 'required',
            'product_status' => 'required',
            'product_category' => 'required',
            'product_brand' => 'required',
            'product_sku' => 'required',
            'product_content' => 'required',
            'product_sex' => 'required',
            'product_status' => 'required',
            'product_image' => 'required|image'
        ]);

        $imagePath = request('product_image')->store('uploads','public');
        $product = new ProductModel();

        $product->product_name = $data['product_name'];
        $product->product_alias = $data['product_alias'];
        $product->product_price = $data['product_price'];
        $product->product_quantity = $data['product_quantity'];
        $product->product_color = $data['product_color'];
        $product->product_status = $data['product_status'];
        $product->product_category_id = $data['product_category'];
        $product->product_brand_id = $data['product_brand'];
        $product->product_sku = $data['product_sku'];
        $product->product_content = $data['product_content'];
        $product->product_sex_id = $data['product_sex'];
        $product->product_status = $data['product_status'];
        $product->product_image = $imagePath;

        $product->save();
        return redirect('add-product')->with('success','Nhập data thành công');
    }

    public function unactive_product($product_id) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function active_product($product_id) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }
    
    public function edit_product($product_id) {
        $this->AuthLogin();
        $category = CategoryModel::all();
        $brand = BrandModel::all();
        $sex = SexModel::all();
        $product = ProductModel::find($product_id);
        return view('admin.edit_product')->with(compact('product','category','brand','sex'));

    }

    public function update_product(Request $request,$product_id) {
        $this->AuthLogin();
        $data = request()->validate([
            'product_name' => 'required',
            'product_alias' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_color' => 'required',
            'product_sex' => 'required',
            'product_status' => 'required',
            'product_category' => 'required',
            'product_brand' => 'required',
            'product_sku' => 'required',
            'product_content' => 'required',
            'product_status' => 'required',
            'product_image' => 'required|image'
        ]);

        $product = ProductModel::find($product_id);

        $image = request('product_image');
        if($image){
            $destinationPath = 'public/storage/'.$product->product_image;
            if(file_exists($destinationPath)){
                unlink($destinationPath);
            }
            $imagePath = request('product_image')->store('uploads','public');
            $product->product_name = $data['product_name'];
            $product->product_alias = $data['product_alias'];
            $product->product_price = $data['product_price'];
            $product->product_quantity = $data['product_quantity'];
            $product->product_color = $data['product_color'];
            $product->product_sex_id = $data['product_sex'];
            $product->product_category_id = $data['product_category'];
            $product->product_brand_id = $data['product_brand'];
            $product->product_sku = $data['product_sku'];
            $product->product_content = $data['product_content'];
            $product->product_status = $data['product_status'];
            $product->product_image = $imagePath;
        }else{
            $product->product_name = $data['product_name'];
            $product->product_alias = $data['product_alias'];
            $product->product_price = $data['product_price'];
            $product->product_quantity = $data['product_quantity'];
            $product->product_color = $data['product_color'];
            $product->product_sex_id = $data['product_sex'];
            $product->product_category_id = $data['product_category'];
            $product->product_brand_id = $data['product_brand'];
            $product->product_sku = $data['product_sku'];
            $product->product_content = $data['product_content'];
            $product->product_status = $data['product_status'];
        }
        $product->save();
        return redirect('all-product')->with('success','Cập nhật data thành công');
    }

    public function delete_product($product_id) {
        $this->AuthLogin();
        $product = ProductModel::find($product_id);

        $destinationPath = 'public/storage/'.$product->product_image;
        if(file_exists($destinationPath)){
            unlink($destinationPath);
        }

        $product->delete();
        return redirect('all-product')->with('success','Xóa data thành công');
    }

    public function show_category_home($category_id){
        $category = CategoryModel::find($category_id);
        $all_brand = BrandModel::all();
        $all_sex = SexModel::all();
        $cate_product = ProductModel::where('product_category_id',$category->category_id)->get();
        $all_category = CategoryModel::all();

        return view('pages.show_category')->with(compact('category','cate_product','all_category','all_brand','all_sex'));
    }

    public function show_brand_home($brand_id){
        $brand = BrandModel::find($brand_id);
        $all_brand = BrandModel::all();
        $all_sex = SexModel::all();
        $brand_product = ProductModel::where('product_brand_id',$brand->brand_id)->get();
        $all_category = CategoryModel::all();

        return view('pages.show_brand')->with(compact('brand','brand_product','all_category','all_brand','all_sex'));
    }

    public function show_sex_home($sex_id){
        $sex = SexModel::find($sex_id);
        $all_sex = SexModel::all();
        $all_brand = BrandModel::all();
        $sex_product = ProductModel::where('product_sex_id',$sex->sex_id)->get();
        $all_category = CategoryModel::all();

        return view('pages.show_age')->with(compact('all_brand','all_category','all_sex','sex_product','sex'));
    }

    public function show_product(){
        $all_product = ProductModel::paginate(12);
        $all_category = CategoryModel::all();
        $all_brand = BrandModel::all();
        $all_sex = SexModel::all();
        return view('pages.all_product')->with(compact('all_product','all_category','all_brand','all_sex'));
    }

    public function product_details($product_id){
        $product_details = ProductModel::find($product_id);
        $category = CategoryModel::all();
        $brand = BrandModel::all();
        $sex = SexModel::all();
        $attribute = AttributeModel::where('product_id',$product_details->product_id)->orderby('size','asc')->get();
        $images = ImagesModel::where('product_id',$product_details->product_id)->get();
        $product_related = ProductModel::whereNotIn('product_id',[$product_id])->get();
        
        return view('pages.product_details')->with(compact('product_details','category','brand','attribute','product_related','images','sex'));
    }
    public function show_stock(Request $request){
        $id =  $request->id;
        $size =  $request->size;
        $stock = AttributeModel::where('product_id',$id)->where('size',$size)->first();

        echo '<p class="mt-2 text-warning" style="font-size:20px;">Size này còn còn '.$stock->stock.' sản phẩm </p>';
    }

}
