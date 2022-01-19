@extends('welcome')
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12 pt-5">
                    <h1 class="page-header">Giỏ hàng</h1>
                </div>
            </div>
            <!--/.row-->
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ URL::to('/') }}">Trang chủ</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ URL::to('/san-pham') }}">Cửa hàng</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Giỏ hàng
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <form action="">
                @csrf
                <input type="hidden" name="shipping_email" class="shipping_email">
                <input type="hidden" name="shipping_name" class="shipping_name">
                <input type="hidden" name="shipping_address" class="shipping_address">
                <input type="hidden" name="shipping_phone" class="shipping_phone">
                <input type="hidden" name="shipping_notes" class="shipping_notes">

                @if (Session::get('fee'))
                    <input type="hidden" name="order_fee" class="order_fee" value="{{ Session::get('fee') }}">
                @else
                    <input type="hidden" name="order_fee" class="order_fee" value="20000">
                @endif

                @if (Session::get('coupon'))
                    @foreach (Session::get('coupon') as $key => $cou)
                        <input type="hidden" name="order_coupon" class="order_coupon" value="{{ $cou['coupon_code'] }}">
                    @endforeach
                @else
                    <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                @endif

            </form>

            <section class="container-fluid">
                <div class="container-fluid">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {!! session('success') !!}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {!! session('error') !!}
                        </div>
                    @endif
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col">
                            {{-- <p><span class="h2">Shopping Cart </span><span class="h4">(1 item in your cart)</span></p> --}}

                            <form action="{{ URL::to('/update-cart-ajax') }}" method="POST">
                                @csrf
                                <div class=" card mb-4">
                                    <div class="card-body p-2">

                                        @if (Session::get('cart') == true)

                                            @php
                                                $total = 0;
                                                
                                            @endphp
                                            @foreach (Session::get('cart') as $key => $cart)
                                                @php
                                                    $subtotal = $cart['product_price'] * $cart['product_quantity'];
                                                    $total += $subtotal;
                                                @endphp

                                                <div class="row align-items-center">
                                                    <div class="col-md-2">
                                                        <img src="{{ URL::to('public/storage/' . $cart['product_image']) }}"
                                                            class="img-fluid" alt="Generic placeholder image">
                                                    </div>
                                                    <div class="col-md-3 d-flex justify-content-center">
                                                        <div>
                                                            <p
                                                                class="small text-muted mt-4 pb-2 d-flex justify-content-center">
                                                                Tên sản phẩm</p>
                                                            <p class="lead fw-normal mb-0 text-center">
                                                                {{ $cart['product_name'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 d-flex justify-content-center">
                                                        <div>
                                                            <p class="small text-muted mb-4 pb-2">Size</p>
                                                            <p class="lead fw-normal mb-0">{{ $cart['product_size'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex justify-content-center">
                                                        <div>
                                                            <p
                                                                class="small text-muted mb-2 pb-2 d-flex justify-content-center">
                                                                Số lượng</p>
                                                            <p class="lead fw-normal mb-0">
                                                                <input id="form1" min="1"
                                                                    name="cart_qty[{{ $cart['session_id'] }}]"
                                                                    value="{{ $cart['product_quantity'] }}" type="number"
                                                                    class="form-control form-control-sm text-center cart_quantity result" />
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex justify-content-center">
                                                        <div>
                                                            <p
                                                                class="small text-muted mb-4 pb-2 d-flex justify-content-center">
                                                                Giá</p>
                                                            <p class="lead fw-normal mb-0">
                                                                {{ number_format($cart['product_price']) . ' VND' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex justify-content-center">
                                                        <div>
                                                            <p
                                                                class="small text-muted mb-4 pb-2 d-flex justify-content-center">
                                                                Tổng giá</p>
                                                            <p class="lead fw-normal mb-0 text-warning font-weight-bold">
                                                                {{ number_format($subtotal) . ' VND' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class=" d-flex justify-content-center">
                                                        <div>
                                                            <a href="{{ URL::to('/delete-cart/' . $cart['session_id']) }}"
                                                                onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')"
                                                                class="btn btn-danger"><span
                                                                    class="glyphicon glyphicon-trash"></span> Xóa</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endforeach
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-end my-2">
                                        <a href="{{ URL::to('/delete-all-cart') }}"
                                            class="btn btn-danger btn-lg me-2 text-white">Xóa tất cả</a>
                                        <button type="submit" class="btn btn-success btn-lg">Cập nhật</button>
                                    </div>
                                </div>
                            </form>

                            <div class="card">
                                <div class="row">
                                    <div class="col-md-4 card-body">
                                        <form method="POST">
                                            @csrf
                                            <div class="card-body p-4">
                                                @foreach ($show_user as $key => $user)
                                                    <span class="small text-muted me-2 font-weight-bold">Thông tin khách
                                                        hàng</span>
                                                    <hr class="mt-0 mb-4">

                                                    <span class="small text-muted me-2 font-weight-bold">Tên khách
                                                        hàng</span>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="shipping_name" name="shipping_name"
                                                                class="form-control shipping_name"
                                                                value="{{ $user->name }}">
                                                        </div>
                                                    </div>

                                                    <span class="small text-muted me-2 font-weight-bold">Email</span>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="shipping_email" name="shipping_email"
                                                                class="form-control shipping_email"
                                                                value="{{ $user->email }}">
                                                        </div>
                                                    </div>
                                                @endforeach

                                                @foreach ($show_profile as $pro => $file)
                                                    <span class="small text-muted me-2 font-weight-bold">Số điện
                                                        thoại</span>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="shipping_phone" name="shipping_phone"
                                                                class="form-control shipping_phone"
                                                                value="{{ $file->phone }}">
                                                        </div>
                                                    </div>

                                                    <span class="small text-muted me-2 font-weight-bold">Địa chỉ</span>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" id="shipping_address" name="shipping_address"
                                                                class="form-control shipping_address"
                                                                value="{{ $file->address }}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <span class="small text-muted me-2 font-weight-bold">Ghi chú</span>
                                                <div class="row">
                                                    <div class="col">
                                                        <textarea name="shipping_notes" id="shipping_notes" cols="30" rows="5" class="shipping_notes"></textarea>
                                                    </div>
                                                </div>

                                                <span class="small text-muted me-2 font-weight-bold">Phương thức thanh
                                                    toán</span>
                                                <div class="row">
                                                    <div class="col">
                                                        <select id="payment_select" name="payment_select" class="form-select payment_select" aria-label="Default select example">
                                                            <option name="payment_option" value="1">Thanh toán bằng tiền mặt</option>
                                                            <option name="payment_option" value="2">Thanh toán bằng thẻ ATM
                                                            </option>
                                                            <option name="payment_option" value="3">Thanh toán bằng thẻ nợ
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col mt-3">
                                                        <a href="{{ URL::to('/san-pham') }}" type="button"
                                                        class="btn btn-light btn-lg me-2">Tiếp tục mua hàng</a>
                                                        @if (Session::get('fee')==false)
                                                        <a  type="button"
                                                        name="send_order"
                                                        class="btn btn-warning btn-lg text-white calculate_delivery">Đặt hàng</a>
                                                        @else
                                                        <a  type="button"
                                                        name="send_order"
                                                        class="btn btn-warning btn-lg text-white send_order">Đặt hàng</a>
                                                        @endif
                                                  </div>
                                                </div>
                                            </div>
                                            @if (Session::get('fee'))
                                                <input type="hidden" name="order_fee" class="order_fee" value="{{ Session::get('fee') }}">
                                            @else
                                                <input type="hidden" name="order_fee" class="order_fee" value="20000">
                                            @endif

                                            @if (Session::get('coupon'))
                                                @foreach (Session::get('coupon') as $key => $cou)
                                                    <input type="hidden" name="order_coupon" class="order_coupon" value="{{ $cou['coupon_code'] }}">
                                                @endforeach
                                            @else
                                                <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                                            @endif
                                        </form>
                                    </div>
                                    <div class="col-md-4 card-body">
                                        <div class="card-body p-4">
                                            <form>
                                                @csrf
                                                <span class="small text-muted me-2 font-weight-bold">Phí vận chuyển</span>
                                                <hr class="mt-0 mb-4">

                                                <span class="small text-muted me-2 font-weight-bold">Chọn thành phố</span>
                                                <div class="row">
                                                    <div class="col">
                                                        <select  name="city" class="form-control mt-2 choose city" id="city"
                                                            aria-label="Default select example">
                                                            <option  value="">---Chọn tỉnh thành phố---</option>
                                                            @foreach ($city as $key => $ci)
                                                                <option required value="{{ $ci->matp }}">{{ $ci->name_city }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="small text-muted me-2 mt-3 font-weight-bold">Chọn quận
                                                            huyện:</label>
                                                        <select name="province" class="form-control mt-2 province choose"
                                                            id="province" aria-label="Default select example">
                                                            <option  required value="">---Chọn quận huyện---</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="small text-muted me-2 mt-3 font-weight-bold">Chọn xã
                                                            phường:</label>
                                                        <select name="wards" class="form-control mt-2 mb-3 wards" id="wards"
                                                            aria-label="Default select example">
                                                            <option  required value="">---Chọn xã phường---</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="button" name="calculate_order"
                                                    class="btn btn-warning calculate_delivery">Tính phí ship</button>
                                                <button type="button" name="calculate_del"
                                                    class="btn btn-warning delete_delivery">Xóa phí ship</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-4 card-body">
                                        <div class="card-body p-4">
                                            <span class="small text-muted me-2 font-weight-bold">Hóa đơn</span>
                                            <hr class="mt-0 mb-4">

                                            <div class="row pt-1">
                                                <div class="col mb-3">
                                                    <span class="small text-muted me-2 font-weight-bold">Tổng giá:</span>
                                                    <span
                                                        class="lead fw-normal text-warning  font-weight-bold float-end">{{ number_format($total) . ' VND' }}</span>
                                                </div>
                                            </div>

                                            <div class="row pt-1">
                                                <div class="col mb-3">
                                                    @if (Session::get('fee'))

                                                        <span class="small text-muted me-2 font-weight-bold">Phí
                                                            ship:</span> <span
                                                            class="lead fw-normal text-warning  font-weight-bold float-end">{{ number_format(Session::get('fee')) . ' VND' }}</span>
                                                    @elseif(Session::get('fee')==false)
                                                        <span class="small text-muted me-2 font-weight-bold">Phí
                                                            ship:</span> <span
                                                            class="lead fw-normal text-warning  font-weight-bold float-end">{{ number_format(0) . ' VND' }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            @if (Session::get('coupon'))
                                                @foreach (Session::get('coupon') as $key => $cou)
                                                    <div class="row pt-1">
                                                        <div class="col mb-3">
                                                            <span class="small text-muted me-2 font-weight-bold">Mã giảm
                                                                giá:</span>
                                                            <span
                                                                class="lead fw-normal text-warning  font-weight-bold float-end">
                                                                @if ($cou['coupon_condition'] == 0)

                                                                    <span
                                                                        class="lead fw-normal text-warning  font-weight-bold float-end">
                                                                        {{ $cou['coupon_number'] }} %
                                                                    </span>

                                                                    @php
                                                                        $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                                    @endphp
                                                        </div>
                                                    </div>


                                                @elseif($cou['coupon_condition']==1)

                                                    {{ number_format($cou['coupon_number']) . ' VND' }}

                                                    <p>
                                                        @php
                                                            $total_coupon = $total - $cou['coupon_number'];
                                                        @endphp
                                                    </p>


                                                @endif
                                            @endforeach
                                            </span>
                                            <div class="row pt-1">
                                                <div class="col mb-3">
                                                    @if ($cou['coupon_condition'] == 0)
                                                        <span class="small text-muted me-2 font-weight-bold">Tổng
                                                            giảm:</span>
                                                        <span
                                                            class="lead fw-normal text-warning font-weight-bold float-right">
                                                            {{ number_format($total_coupon) . ' VND' }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row pt-1">
                                                <div class="col mb-1">
                                                    @if ($cou['coupon_condition'] == 0 && Session::get('fee'))
                                                        <span class="small text-muted me-2 font-weight-bold">Thành tiền:</span> <span
                                                            class="lead fw-normal text-warning  font-weight-bold float-end">{{ number_format($total - $total_coupon + Session::get('fee')) . ' VND' }}</span>
                                                    @elseif ($cou['coupon_condition'] == 0)
                                                        <span class="small text-muted me-2 font-weight-bold">Thành tiền:</span> <span
                                                            class="lead fw-normal text-warning  font-weight-bold float-end">{{ number_format($total - $total_coupon + 0) . ' VND' }}</span>
                                                    @elseif($cou['coupon_condition']==1 && Session::get('fee'))
                                                        <span class="small text-muted me-2 font-weight-bold">Thành tiền:</span> <span
                                                            class="lead fw-normal text-warning  font-weight-bold float-end">{{ number_format($total_coupon + Session::get('fee')) . ' VND' }}</span>
                                                    @elseif($cou['coupon_condition']==1)
                                                        <span class="small text-muted me-2 font-weight-bold">Thành tiền:</span> <span
                                                            class="lead fw-normal text-warning  font-weight-bold float-end">{{ number_format($total_coupon + 0) . ' VND' }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            @endif
                                            @if (Session::get('fee') && !Session::get('coupon'))
                                                <hr>
                                                <span class="small text-muted me-2 font-weight-bold">Thành tiền:</span>
                                                <span
                                                    class="lead fw-normal text-warning  font-weight-bold float-end">{{ number_format($total + Session::get('fee')) . ' VND' }}</span>
                                            @endif
                                            @if (!Session::get('fee') && !Session::get('coupon'))
                                                <hr>
                                                <span class="small text-muted me-2 font-weight-bold">Thành tiền:</span>
                                                <span
                                                    class="lead fw-normal text-warning  font-weight-bold float-end">{{ number_format($total + 0) . ' VND' }}</span>
                                            @endif
                                            <hr>

                                            <span class="small text-muted me-2 font-weight-bold">Nhập mã giảm giá:</span>
                                            <form action="{{ URL::to('/check-coupon') }}" method="POST">
                                                @csrf

                                                <div class="row pt-1">
                                                    <div class="col mb-3">
                                                        <input type="text" name="coupon" class="form-control"
                                                            placeholder="Nhập mã giảm giá">
                                                        <input type="submit"
                                                            class=" btn btn-warning btn-lg text-white check_coupon"
                                                            name="check_coupon" value="Nhập mã giảm giá">
                                                        @if (Session::get('coupon'))
                                                            <a href="{{ URL::to('/unset-coupon') }}" type="submit"
                                                                class=" btn btn-warning btn-lg text-white check_coupon">Hoàn
                                                                tác mã</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        </div>
    @else
        @php
            echo 'Bạn chưa có sản phẩm nào trong giỏ hàng';
        @endphp
        @endif
        </div>
        </div>
        </div>
    </section>
    </div>
    </section>
@endsection
