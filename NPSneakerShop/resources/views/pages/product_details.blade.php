@extends('welcome')
@section('content')
    <main class="mt-5 pt-5">
        <div class="container-fluid mt-4">
            <div class="details">
                <p class="category-name text-center pt-lg-5 mt-3">Chi tiết sản phẩm</p>
            </div>
            <div class="row">

                <div class="col-sm-5">
                    <div class="fotorama">
                        @foreach ($images as $img)
                            <img src="{{ URL::to('public/storage/uploads/' . $img->image) }}">
                        @endforeach
                    </div>
                    <p class="text-size text-center">Mô tả sản phẩm</p>
                    <div>
                        {!! $product_details->product_content !!}
                    </div>
                </div>
                <div class="col-sm-7">
                    <form action="">
                        @csrf
                        <div class="mb-3 pl-4">
                            <p class="text-size">Size</p>
                            <div class="col-md-6 size-wrapper">
                                @foreach ($attribute as $attr)
                                    @if ($attr->stock == 0)
                                        <div class="box-size mt-2 mr-1">
                                            <input type="radio" id="{{ $attr->size }}"
                                                class="hidebx cart_product_size_{{ $product_details->product_id }}"
                                                value="{{ $attr->size }}" name="cart_product_size[]" disabled>
                                            <label for="{{ $attr->size }}" class="lbl-radio1">{{ $attr->size }}</i>
                                            </label>
                                        </div>
                                    @endif
                                    @if ($attr->stock != 0)
                                        <div class="box-size mt-2 mr-1">
                                            <input type="radio" id="{{ $attr->size }}"
                                                class="hidebx cart_product_size_{{ $product_details->product_id }}"
                                                value="{{ $attr->size }}" name="cart_product_size[]">
                                            <label for="{{ $attr->size }}" class="lbl-radio"> {{ $attr->size }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="price-sneakers text-size font-weight-bold">Số lượng còn:
                                    {{ $product_details->product_quantity }}
                                </div>
                            </div>
                            <div class="mb-3 pl-4">
                                <input type="hidden" value="{{ $product_details->product_id }}" name="id_hidden"
                                    class="cart_product_id_{{ $product_details->product_id }}">
                                <input type="hidden" value="{{ $product_details->product_name }}"
                                    class="cart_product_name_{{ $product_details->product_id }}">
                                <input type="hidden" value="{{ $product_details->product_image }}"
                                    class="cart_product_image_{{ $product_details->product_id }}">
                                <input type="hidden" value="{{ $product_details->product_price }}"
                                    class="cart_product_price_{{ $product_details->product_id }}">
                                <input type="hidden" value="{{ $product_details->product_quantity }}"
                                    class="cart_product_quantity_{{ $product_details->product_id }}">

                                <div class="mb-3">
                                    <p class="name-sneakers"> {{ $product_details->product_name }} </p>
                                    <p class="price-sneakers text-warning text-size font-weight-bold">
                                        {{ number_format($product_details->product_price) . ' VND' }}</p>
                                    <div class="mb-3">
                                        Số lượng: <input type="number" name="cart_product_qty[]" min="1" value="1"
                                            class="text-center result cart_product_qty_{{ $product_details->product_id }}"
                                            id="quantity1">
                                    </div>
                                    <input type="hidden" name="productid_hidden"
                                        value=" {{ $product_details->product_id }} ">
                                    @if (Session::get('customer_id'))
                                        <button type="button" class="btn btn-warning add-to-cart" name="add-to-cart"
                                            data-id_product="{{ $product_details->product_id }}">Thêm vào giỏ</button>
                                    @else
                                        <button type="button" class="btn btn-warning error-to-add" name="error-to-add">Thêm
                                            vào giỏ</button>
                                    @endif
                                    <a href="#" class="btn btn-warning btn-price">Mua</a>
                                    <a href="#" class="btn btn-warning btn-price"><i class="fas fa-heart"></i></a>
                                </div>

                                <p class="text-size mb-2">Thông tin sản phẩm</p>
                                <table class="table table-hover text-details">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>{{ $product_details->product_name }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Thương hiệu</td>
                                            <td> {{ $product_details->brand['brand_name'] }} </td>
                                        </tr>
                                        <tr>
                                            <td>Màu sắc</td>
                                            <td> {{ $product_details->product_color }} </td>
                                        </tr>
                                        <tr>
                                            <td>Chất liệu</td>
                                            <td>N/A</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </form>
                </div>
            </div>


            <h2 class="fw-bold mb-2 mt-2 shoe-brands">
                <p class="category-name">Sản phẩm cùng thương hiệu: {{ $product_details->brand['brand_name'] }}</p>
            </h2>

            <div class="row">
              <div class="owl-carousel owl-theme">
      
                @foreach ($product_related as $bra)
                @if ($product_details->brand['brand_id']==$bra->product_brand_id)
                <div class="align-items-center">
                  <a href="{{URL::to('/chi-tiet-san-pham/'.$bra->product_id.$bra->product_alias)}}">
                  <img src="{{ URL::to('public/storage/'.$bra->product_image) }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h6 class="card-title text-black">{{($bra->product_name)}}</h6>
                    <p class="card-text text-warning">{{number_format($bra->product_price).' VND'}}</p>
                  </a>
                  </div>
                </div>
                @endif
                @endforeach
                
              </div>
            </div>

            <h2 class="fw-bold mb-2 mt-3 shoe-brands">
                <p class="category-name">Sản phẩm cùng danh mục: {{ $product_details->category['category_name'] }}
            </h2>

            <div class="row">
              <div class="owl-carousel owl-theme">
      
                @foreach ($product_related as $cate)
                @if ($product_details->category['category_id']==$cate->product_category_id)
                <div class="align-items-center">
                  <a href="{{URL::to('/chi-tiet-san-pham/'.$cate->product_id.$cate->product_alias)}}">
                  <img src="{{ URL::to('public/storage/'.$cate->product_image) }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h6 class="card-title text-black">{{($cate->product_name)}}</h6>
                    <p class="card-text text-warning">{{number_format($cate->product_price).' VND'}}</p>
                  </a>
                  </div>
                </div>
                @endif
                @endforeach
                
              </div>
            </div>
        </div>
        </div>
    </main>
@endsection
