<?php

namespace App\Http\Controllers;
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
use App\Models\AttributeModel;
use App\Models\ProductModel;
use App\Models\StatisticModel;
use Carbon\Carbon;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manage_order(){
        $order = OrderModel::orderby('created_at','desc')->get();
        return view('admin.order.manage_order')->with(compact('order'));
    }

    public function view_order($order_code){
        $order_details = OrderDetailsModel::where('order_code',$order_code)->get();
        $order = OrderModel::where('order_code',$order_code)->get();


        foreach($order as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = User::where('customer_id',$customer_id)->first();
        $profile = ProfileModel::where('customer_id',$customer_id)->first();
        $shipping = ShippingModel::where('shipping_id',$shipping_id)->first();
        
        $order_details = OrderDetailsModel::with('product')->where('order_code',$order_code)->get();

        foreach ($order_details as $key => $order_d) {
            $product_coupon = $order_d->product_coupon;
        }
        if ($product_coupon != 'no') {
            $coupon = CouponModel::where('coupon_code',$product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }else{
            $coupon_condition = 1;
            $coupon_number = 0;
        }

        return view('admin.order.view_order')->with(compact('order_details','customer','shipping','order_details','coupon_condition','coupon_number','product_coupon','order'));
    }

    public function update_order_qty(Request $req){
        $data = $req->all();
		$order = OrderModel::find($data['order_id']);
		$order->order_status = $data['order_status'];
		$order->save();

        $order_date = $order->order_date;
        $statistic = StatisticModel::where('order_date',$order_date)->get();
        if ($statistic) {
            $statistic_count = $statistic->count();
        }else{
            $statistic_count = 0;
        }

        if($order->order_status==2){
            $total_order = 0;
            $sales = 0;
            $profit = 0;
            $quantity = 0;
			foreach($data['order_product_id'] as $key => $product_id){

				$product = ProductModel::find($product_id);
				$product_quantity = $product->product_quantity;
				$product_sold = $product->product_sold;

                $product_price = $product->product_price;
                $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

				foreach($data['quantity'] as $key2 => $qty){
						if($key==$key2){
								$pro_remain = $product_quantity - $qty;
								$product->product_quantity = $pro_remain;
								$product->product_sold = $product_sold + $qty;
								$product->save();
                                
                                $quantity+=$qty;
                                $total_order+=1;
                                $sales+=$product_price*$qty;
                                $profit = $sales*20/100;
						}
				}
			}
            if($statistic_count > 0){
                $statistic_update = StatisticModel::where('order_date',$order_date)->first();
                $statistic_update->sales = $statistic_update->sales + $sales;
                $statistic_update->profit = $statistic_update->profit + $profit;
                $statistic_update->quantity = $statistic_update->quantity + $quantity;
                $statistic_update->total_order = $statistic_update->total_order + $total_order;
                $statistic_update->save();
            }else{
                $statistic_new = new StatisticModel();
                $statistic_new->order_date = $order_date;
                $statistic_new->sales = $sales;
                $statistic_new->profit = $profit;
                $statistic_new->quantity = $quantity;
                $statistic_new->total_order = $total_order;
                $statistic_new->save();
            }
		}
    }
}
