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
                    <div class="panel-heading">Thêm sản phẩm</div>
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
                        <form method="post" action="{{URL::to('/save-product')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-12">
                                    <div class="form-group" >
                                        <label>Tên sản phẩm</label>
                                        <input required type="text" name="product_name" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Tên phụ</label>
                                        <input required type="text" name="product_alias" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Giá sản phẩm</label>
                                        <input required type="number" name="product_price" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>số lượng</label>
                                        <input required type="text" name="product_quantity" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Ảnh sản phẩm</label>
                                        <input required id="img" type="file" name="product_image" class="form-control hidden" onchange="changeImg(this)">
                                        <img id="avatar" class="thumbnail" width="300px" src="{{asset('public/backend/img/new_seo-10-512.png')}}">
                                    </div>
                                    <div class="form-group" >
                                        <label>Nội dung</label>
                                        <textarea name="product_content" class="form-control" id="ckeditor1" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group" >
                                        <label>Danh mục sản phẩm</label>
                                        <select required name="product_category" class="form-control">
                                            <option value="">---Chọn danh mục---</option>
                                            @foreach ($category as $cate)
                                            @if ($cate->p_category_id==0)
                                            <option value="{{ $cate->category_id }}">{{ $cate->category_name }} </option>
                                                @foreach ($category as $cate_sub)
                                                    @if($cate_sub->p_category_id!=0 && $cate_sub->p_category_id==$cate->category_id)
                                                        <option value="{{ $cate_sub->category_id }}">{{ '---'.$cate_sub->category_name }} </option>
                                                    @endif
                                                @endforeach
                                            @endif
                                             @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Thương hiệu sản phẩm</label>
                                        <select required name="product_brand" class="form-control">
                                            <option value="">---Chọn thương hiệu---</option>
                                            @foreach ($brand as $bra)
                                            <option value="{{ $bra->brand_id }}">{{ $bra->brand_name }} </option>
                                             @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Giới tính</label>
                                        <select required name="product_sex" class="form-control">
                                            <option value="">---Chọn giới tính---</option>
                                            @foreach ($sex as $sx)
                                            <option value="{{ $sx->sex_id }}">{{ $sx->sex_name }} </option>
                                             @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Màu sắc</label>
                                        <input required type="text" name="product_color" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Mã SKU</label>
                                        <input required type="text" name="product_sku" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Trạng thái</label>
                                        <select name="product_status" class="form-control input-sm m-5">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiện</option>
                                        </select>
                                    </div>
                                    <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                                    <a href="#" class="btn btn-danger">Hủy bỏ</a>
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