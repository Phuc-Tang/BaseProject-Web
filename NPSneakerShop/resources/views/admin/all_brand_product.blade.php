@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <h1 class="page-header">Thương hiệu sản phẩm</h1>
            </div>
        </div>
    </div><!--/.row-->
    
    <div class="col-xs-12 col-md-7 col-lg-12">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách thương hiệu</div>
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
                    <div class="bootstrap-table">
                        <table class="table table-bordered">

                              <thead>
                                <tr class="bg-primary">
                                  <th>Tên thương hiệu</th>
                                  <th style="width:15%">Hiển thị</th>
                                  <th style="width:15%">Tùy chọn</th>
                                </tr>
                              </thead>
                              <tbody>

                                @foreach ($brand as $key => $brand_pro)
                                <tr>
                                    <td> {{ $brand_pro->brand_name }} </td>
                        
                                    <td>
                                        <?php
                                        if($brand_pro->brand_status==0){
                                        ?>
                                        <a href=" {{URL::to('/unactive-brand-product/'.$brand_pro->brand_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                        <?php
                                        }else{
                                        ?>
                                        <a href="{{URL::to('/active-brand-product/'.$brand_pro->brand_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="{{URL::to('edit-brand-product/'.$brand_pro->brand_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                                        <a href="{{URL::to('delete-brand-product/'.$brand_pro->brand_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa thương hiệu này không?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                              
                            </tbody>
                        </table>
                        <span> {!! $brand->render() !!} </span>
                    </div>
                    <div class="container">
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>	<!--/.main-->
@endsection