@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm</h1>
            </div>
        </div><!--/.row-->
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">Sửa sản phẩm</div>
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
                    <div class="panel-body">
                        <form method="post" action="{{URL::to('/update-product/'.$product->product_id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-12">
                                    <div class="form-group" >
                                        <label>Tên sản phẩm</label>
                                        <input required type="text" value="{{$product->product_name}}" name="product_name" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Tên phụ</label>
                                        <input required type="text" value="{{$product->product_alias}}" name="product_alias" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Giá sản phẩm</label>
                                        <input required type="number" value="{{$product->product_price}}" name="product_price" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Số lượng</label>
                                        <input required type="text" value="{{$product->product_quantity}}" name="product_quantity" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Ảnh sản phẩm</label>
                                        <input required id="img" type="file" name="product_image" class="form-control hidden" onchange="changeImg(this)">
                                        <img id="avatar" class="thumbnail" width="300px" src="{{ URL::to('public/storage/'.$product->product_image) }}">
                                    </div>
                                    <div class="form-group" >
                                        <label>Nội dung</label>
                                        <textarea name="product_content" class="form-control" id="ckeditor1" cols="30" rows="10">{{$product->product_content}}"</textarea>
                                    </div>
                                    <div class="form-group" >
                                        <label>Danh mục sản phẩm</label>
                                        <select required name="product_category" class="form-control">
                                            @foreach ($category as $cate)
                                                @if ($cate->p_category_id==0)

                                                    <option {{($cate->category_id==$product->product_category_id) ? 'selected' : ''}} value="{{ $cate->category_id }}">{{ $cate->category_name }} </option>

                                                    @foreach ($category as $cate_sub)
                                                        @if($cate_sub->p_category_id!=0 && $cate_sub->p_category_id==$cate->category_id)
                                                            <option {{($cate_sub->category_id==$product->product_category_id) ? 'selected' : ''}} value="{{ $cate_sub->category_id }}">{{ '---'.$cate_sub->category_name }} </option>
                                                        @endif
                                                    @endforeach
                                                    
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Thương hiệu sản phẩm</label>
                                        <select required name="product_brand" class="form-control">
                                            @foreach ($brand as $bra)

                                                    <option {{($bra->brand_id==$product->product_brand_id) ? 'selected' : ''}} value="{{ $bra->brand_id }}">{{ $bra->brand_name }} </option>

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Giới tính</label>
                                        <select required name="product_sex" class="form-control">
                                            @foreach ($sex as $sx)

                                                    <option {{($sx->sex_id==$product->product_sex_id) ? 'selected' : ''}} value="{{ $sx->sex_id }}">{{ $sx->sex_name }} </option>

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Màu sắc</label>
                                        <input required type="text" value="{{$product->product_color}}" name="product_color" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Mã SKU</label>
                                        <input required type="text" value="{{$product->product_sku}}" name="product_sku" class="form-control">
                                    </div>
                                    <div class="form-group hidden" >
                                        <label>Trạng thái</label>
                                        <select required name="product_status" class="form-control">
                                            <option value="1">Ẩn</option>
                                            <option value="0">Hiện</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</button>
                                    <a href="{{URL::to('all-product')}}" class="btn btn-danger">Hủy bỏ</a>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>	<!--/.main-->
@endsection