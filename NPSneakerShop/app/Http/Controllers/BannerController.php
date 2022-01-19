<?php

namespace App\Http\Controllers;
use  DB;
use Session;
use App\Http\Requests;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\AttributeModel;
use App\Models\ImagesModel;
use App\Models\BannerModel;
use Illuminate\Http\Request;
session_start();
class BannerController extends Controller
{
    public function add_banner(){
        $banner = BannerModel::all();
        return view('admin.all_banner')->with(compact('banner'));
    }

    public function save_banner(){
        $data = request()->validate([
            'banner_image' => 'required|image'
        ]);
        $imagePath = request('banner_image')->store('uploads','public');
        $banner = new BannerModel();

        $banner->banner_image = $imagePath;
        $banner->save();
        return redirect('add-banner')->with('success','Nhập data thành công');
    }

    // public function show_banner(){
    //     $all_banner = BannerModel::all();
    //     return view('layout.banner')->with(compact('all_banner'));
       
    // }

    public function delete_banner($banner_id){
        $banner = BannerModel::find($banner_id);

        $destinationPath = 'public/storage/'.$banner->banner_image;
        if(file_exists($destinationPath)){
            unlink($destinationPath);
        }

        $banner->delete();
        return redirect('add-banner')->with('success','Xóa data thành công');
    }
}
