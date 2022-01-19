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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
session_start();
class AttributeController extends Controller
{
    public function add_attribute($product_id) {
        $attribute = AttributeModel::paginate(10);
        $stock = AttributeModel::where('product_id',$product_id)->sum('stock');
        $product_by_id = ProductModel::find($product_id);
        return view('admin.add_attribute')->with(compact('product_by_id','attribute','stock'));
    }
    
    public function save_attribute(Request $request, $product_id) {

        if($request->isMethod('post')){
            $data = $request->all();
            foreach($data['sku'] as $key => $val) {

                $attribute = new AttributeModel;
                $attribute->product_id = $product_id;
                $attribute->sku = $val;
                $attribute->price = $data['price'][$key];
                $attribute->size = $data['size'][$key];
                $attribute->stock = $data['stock'][$key];
                $attribute->save();
            }
        }
        return Redirect('/add-attribute/'.$product_id)->with('success','Nhập data thành công');
    }

    public function delete_attribute($attribute_id) {
        $attribute = AttributeModel::find($attribute_id);
        $attribute->delete();
        return redirect('/add-attribute/'.$attribute->product_id)->with('success','Xóa data thành công');
    }
}
