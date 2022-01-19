@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thông tin vận chuyển đơn hàng</h1>
        </div>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            
            <div class="panel panel-primary">
                <div class="panel-heading">Xem thông tin</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                            @endif
                            <table class="table table-bordered" style="margin-top:20px;">				
                                <thead>
                                    <tr class="bg-primary">
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Email</th>
                                        <th>Ghi chú</th>
                                        <th>Hình thức thanh toán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $shipping->shipping_name }}</td>
                                        <td>{{ $shipping->shipping_phone }}</td>
                                        <td>{{ $shipping->shipping_address }}</td>
                                        <td>{{ $shipping->shipping_email }}</td>
                                        <td>{{ $shipping->shipping_notes }}</td>
                                        <td>
                                            @if ( $shipping->shipping_method==1)
                                                Thanh toán bằng thẻ ghi nợ
                                            @elseif ($shipping->shipping_method==2)
                                                Thanh toán bằng thẻ ATM
                                            @else
                                                Thanh toán bằng tiền mặt
                                            @endif
                                        </td>
                                    
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-12 col-lg-12">
            
            <div class="panel panel-primary">
                <div class="panel-heading">Xem đơn hàng</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                            @endif
                            <table class="table table-bordered" style="margin-top:20px;">				
                                <thead>
                                    <tr class="bg-primary">
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Size</th>
                                        <th>Số lượng</th>
                                        <th>Số lượng kho</th>
                                        <th>Giá</th>
                                        <th>Mã giảm giá</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 0;
                                    $total = 0;
                                @endphp
                                    @foreach ($order_details as $key => $details)
                                    @php
                                    $i++;
                                    $subtotal = $details->product_price*$details->product_sales_quantity;
                                    $total+=$subtotal;
                                @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{ $details->product_name }}</td>
                                        <td>{{ $details->product_size }}</td>
                                        <td>
                                            <input type="number" min="1" value="{{ $details->product_sales_quantity }}" name="product_sales_quantity" class="text-center" disabled>
                                            <input type="hidden" name="order_product_id" class="order_product_id" value=" {{$details->product_id}} ">
                                        </td>
                                        <td> {{ $details->product->product_quantity }} </td>
                                        <td>{{ number_format($details->product_price). ' VND' }}</td>
                                        <td>
                                            @if ($details->product_code!='no')
                                                {{$details->product_coupon}}
                                            @else
                                            Không có mã giảm giá
                                            @endif
                                        </td>
                                        <td>{{ number_format($subtotal). ' VND' }}</td>
                                    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- {{ number_format($total). ' VND' }} --}}
                        @php
                            $total_coupon = 0;
                        @endphp
                        @if ($coupon_condition==0)
                            @php
                                $total_after_coupon = ($total*$coupon_number)/100;
                                $total_coupon = $total-$total_after_coupon;
                            @endphp
                        @else
                            @php
                                $total_coupon = $total-$coupon_number;
                            @endphp
                        @endif
                        @if ($coupon_condition==0)
                        <p class="text-danger">Giảm giá: {{ number_format($coupon_number). ' %' }}</p>
                        @else
                        <p class="text-danger">Giảm giá: {{ number_format($coupon_number). ' VND' }}</p>
                        @endif
                        <p class="text-danger">Phí ship: {{ number_format($details->product_feeship). ' VND' }}</p>
                        <p class="text-danger">Thanh toán: {{ number_format($total_coupon-$details->product_feeship). ' VND' }}</p>
                        <div class="col-4">
                            @foreach ($order as $key => $or)
                            @if ($or->order_status==1)
                            <form action="">
                                @csrf
                                <select name="" id="" class="form-control order_details" aria-label="Default select example">
                                    <option id="{{$or->order_id}}" selected value="1">Chưa xử lí</option>
                                    <option id="{{$or->order_id}}" value="2">Đã xử lý - Đã giao hàng</option>
                                </select>
                            </form>
                            @else
                            <form action="">
                                @csrf
                                <select name="" id="" class="form-control order_details" aria-label="Default select example">
                                    <option id="{{$or->order_id}}" value="1">Chưa xử lí</option>
                                    <option id="{{$or->order_id}}" selected value="2">Đã xử lý - Đã giao hàng</option>
                                </select>
                            </form>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>	<!--/.main-->
@endsection