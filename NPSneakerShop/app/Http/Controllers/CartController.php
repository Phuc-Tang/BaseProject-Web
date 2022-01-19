<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;
use Session;
use Cart;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\AttributeModel;
use App\Models\ImagesModel;
use App\Models\SexModel;
use App\Models\User;
use App\Models\ProfileModel;
use App\Models\CouponModel;
use App\Models\CityModel;
use App\Models\ProvinceModel;
use App\Models\WardsModel;
use App\Models\FeeshipModel;
use App\Models\OrderModel;
use App\Models\OrderDetailsModel;
use App\Models\ShippingModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
session_start();
class CartController extends Controller
{
    public function show_cart_ajax(Request $request, $customer_id){
        $cate_product = CategoryModel::all();
        $brand_product = BrandModel::all();
        $product = ProductModel::all();
        $city = CityModel::orderby('matp','asc')->get();
        $show_profile = ProfileModel::where('customer_id',$customer_id)->get();
        $show_user = User::where('customer_id',$customer_id)->get();
        return view('pages.cart.show_cart')->with(compact('cate_product','brand_product','product','show_profile','show_user','city'));
        // Cart::destroy();
    }
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach ($cart as $key => $value) {
                if ($value['product_id']==$data['cart_product_id']) {
                    $is_avaiable++;
                }
            }
            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_id' => $data['cart_product_id'],
                    'product_name' => $data['cart_product_name'],
                    'product_image' => $data['cart_product_image'],
                    'product_price' => $data['cart_product_price'],
                    'product_size' => $data['cart_product_size'],
                    'product_quantity' => $data['cart_product_qty'],
                    'qty' => $data['cart_product_quantity'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_image' => $data['cart_product_image'],
                'product_price' => $data['cart_product_price'],
                'product_size' => $data['cart_product_size'],
                'product_quantity' => $data['cart_product_qty'],
                'qty' => $data['cart_product_quantity'],
            );
        }
        Session::put('cart',$cart);
        Session::save();
        // Cart::destroy();
    }

    public function update_cart_ajax( Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            $message = '';

            foreach ($data['cart_qty'] as $key => $qty) {
                $i = 0;
                foreach($cart as $session => $val){
                    $i++;
                    if($val['session_id']==$key && $qty < $cart[$session]['qty']){
                        $cart[$session]['product_quantity'] =  $qty;
                        $message.='<p class="text-primary">['.$i.'] Cập nhật số lượng: '.$cart[$session]['product_name'].' thành công</p>';
                    }elseif($val['session_id']==$key && $qty > $cart[$session]['qty']){
                        $message.='<p class="text-danger">['.$i.'] Cập nhật số lượng: '.$cart[$session]['product_name'].' thất bại</p>';
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('success',$message);
        }else{
            return redirect()->back()->with('success',$message);
        }
    }

    public function delete_cart($session_id){
        $cart = Session::get('cart');
        if($cart==true){
            foreach($cart as $key => $val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('success','Xóa sản phẩm thành công');

        }else{
            return redirect()->back()->with('success','Xóa sản phẩm thất bại');
        }

    }

    public function delete_all_cart(){
        $cart = Session::get('cart');
        if($cart==true){
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back()->with('success','Xóa hết giỏ hàng thành công');
        }
    }

    public function unset_coupon(){
        $coupon = Session::get('coupon');
        if($coupon==true){
            Session::forget('coupon');
            return redirect()->back()->with('success','Thu hồi mã giảm giá thành công');
        }
    }

    public function check_coupon(Request $request){
        $data = $request->all();

        $coupon = CouponModel::where('coupon_code',$data['coupon'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon > 0){
                $coupon_session = Session::get('coupon');
                if($coupon_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable==0){
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return Redirect()->back()->with('success','Thêm mã giảm giá thành công');
            }
        }else{
            return Redirect()->back()->with('error','Giảm giá không chính xác');
        }
    }

    public function select_delivery_home(Request $req){
        $data = $req->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = ProvinceModel::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output.='<option>---Chọn quận huyện---</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
    
            }else{
    
                $select_wards = WardsModel::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option>---Chọn xã phường---</option>';
                foreach($select_wards as $key => $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
            echo $output;
        }
    }

    public function calculate_fee(Request $request){
        $data = $request->all();
        if ($data['matp']) {
            $feeship = FeeshipModel::where('fee_matp', $data['matp'])->where('fee_maqh', $data['maqh'])->where('fee_xaid', $data['xaid'])->get();

            foreach ($feeship as $key => $fee) {
                Session::put('fee', $fee->fee_feeship);
                Session::save();
            }
        }
    }

    public function delete_fee(){
        Session::forget('fee');
        return Redirect()->back()->with('success','Xóa phí vận chuyển thành công');
    }

    public function confirm_order(Request $req){
        $data = $req->all();

        $shipping = new ShippingModel();

        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();

        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()),rand(0,26),5);

        $order = new OrderModel();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $order->created_at = now();
        $order->order_date = $order_date;
        $order->save();


        if(Session::get('cart')==true){
            foreach (Session::get('cart') as $key => $cart) {

                $order_details = new OrderDetailsModel();
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_size = $cart['product_size'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_sales_quantity = $cart['product_quantity'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->save();
            }
        }
        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
    }
}
