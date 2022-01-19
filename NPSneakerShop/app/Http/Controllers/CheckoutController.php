<?php

namespace App\Http\Controllers;
use  DB;
use Session;
use Cart;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\AttributeModel;
use App\Models\ImagesModel;
use App\Models\User;
use App\Models\ProfileModel;
use App\Models\PaymentModel;
use App\Models\ShippingModel;
use App\Models\OrderModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
session_start();
class CheckoutController extends Controller
{
    public function order_place(Request $request){

    }
}
