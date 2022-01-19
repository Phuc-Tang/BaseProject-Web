@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm</h1>
        </div>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            
            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách sản phẩm</div>
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
                                        <th width="20%">Tên Sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th width="20%">Ảnh sản phẩm</th>
                                        <th>Thuộc tính</th>
                                        <th>Màu sắc</th>
                                        <th>Số lượng</th>
                                        <th>Danh mục</th>
                                        <th>Thương hiệu</th>
                                        <th>Giới tính</th>
                                        <th>Trạng thái</th>
                                        <th width="14%">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $pro)
                                    <tr>
                                        <td>{{ $pro->product_name }}</td>
                                        <td>{{ $pro->product_price }}</td>
                                        <td>
                                            <img src="{{ URL::to('public/storage/'.$pro->product_image) }}"  width="200px" class="thumbnail">
                                        </td>
                                        <td><p><a href=" {{URL::to('/add-attribute/'.$pro->product_id)}} ">Thêm thuộc tính</a></p>
                                            <p><a href=" {{URL::to('/add-images/'.$pro->product_id)}} ">Thêm ảnh sản phẩm</a></p>
                                        </td>
                                        <td>{{ $pro->product_color }}</td>
                                        <td>{{ $pro->product_quantity }}</td>
                                        <td>{{ $pro->category['category_name'] }}</td>
                                        <td>{{ $pro->brand['brand_name'] }}</td>
                                        <td> {{ $pro->sex['sex_name'] }} </td>
                                        <td>
                                            <?php
                                            if($pro->product_status==0){
                                            ?>
                                            <a href=" {{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                            <?php
                                            }else{
                                            ?>
                                            <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="{{URL::to('edit-product/'.$pro->product_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
                                            <a href="{{URL::to('delete-product/'.$pro->product_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <span> {!! $product->render() !!} </span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>	<!--/.main-->
@endsection