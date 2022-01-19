<?php

namespace App\Http\Controllers;
use  DB;
use Session;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\AttributeModel;
use App\Models\ImagesModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
session_start();
class ImagesController extends Controller
{
    public function add_images($product_id) {
        $pro_id = $product_id;
        return view('admin.add_images_product')->with(compact('pro_id'));
    }

    public function save_images(Request $request) {

        $product_id = $request->pro_id;
        $product = ProductModel::all();
        $gallery = ImagesModel::where('product_id', $product_id)->get();
        $gallery_count = $gallery->count();
        $output = '<form>
                        '.csrf_field().'
                        <table class="table table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th>Thứ tự</th>
                                <th>Hình ảnh</th>
                                <th>Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                        ';
        if($gallery_count>0){
            $i = 0;
            foreach($gallery as $key => $gal){
                $i++;
                $output.='
                            <tr>
                                <td> '.$i.' </td>
                                <td>
                                <img src="'.URL('public/storage/uploads/'.$gal->image).'" class="thumbnail" width="300px">
                                <input type="file" class="file_image" style="width:40%" data-gal-id="'.$gal->image_id.'" id="file-'.$gal->image_id.'" name="file" accept="image/*"/>
                                </td>
                                <td> 

                                <a href="'.URL('delete-images/'.$gal->image_id).'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                                </td>
                            </tr>
                        ';
            }
        }else{
            $output.='<tr>
                            <td colspan="4"> sản phẩm này chưa cho thư viện ảnh </td>
                        </tr>';
        }
        $output.='</tbody>
                </table>
                </form>';
        echo $output;
    }

    public function insert_images(Request $request, $pro_id){
        $get_image = $request->file('file');
        if ($get_image) {
            foreach ($get_image as $image) {
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move('public/storage/uploads/',$new_image);
                $gallery = new ImagesModel();
                $gallery->image = $new_image;
                $gallery->product_id = $pro_id;
                $gallery->save();
            }
        }
        return redirect()->back();
    }

    public function update_images(Request $request){
        $get_image = $request->file('file');
        $gal_id = $request->gal_id;
        if ($get_image) {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('public/storage/uploads/',$new_image);
                $gallery = ImagesModel::find($gal_id);
                unlink('public/storage/uploads/'.$gallery->image);
                $gallery->image = $new_image;
                $gallery->save();
        }
    }

    public function delete_images($image_id){
        $images = ImagesModel::find($image_id);
        $destinationPath = 'public/storage/uploads/'.$images->image;
        if(file_exists($destinationPath)){
            unlink($destinationPath);
        }
        $images->delete();
        return redirect()->back();
    }
}
