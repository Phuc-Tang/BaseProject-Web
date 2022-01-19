@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục sản phẩm</h1>
            </div>
        </div>
    </div><!--/.row-->
    
    <div class="col-xs-12 col-md-7 col-lg-12">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách danh mục</div>
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
                                  <th>Tên danh mục</th>
                                  <th>Bí danh</th>
                                  <th>Danh mục gốc</th>
                                  <th style="width:15%">Hiển thị</th>
                                  <th style="width:15%">Tùy chọn</th>
                                </tr>
                              </thead>
                              <tbody>

                                @foreach ($category as $key => $cate_pro)
                                <tr>
                                    <td> {{ $cate_pro->category_name }} </td>
                                    <td> {{ $cate_pro->category_alias }} </td>
                                    <td>
                                        @if ($cate_pro->p_category_id==0)
                                            ---
                                        @else
                                            @foreach($category as $key => $cate_sub)
                                                @if($cate_sub->category_id==$cate_pro->p_category_id)
                                                    {{$cate_sub->category_name}}
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <?php
                                        if($cate_pro->category_status==0){
                                        ?>
                                        <a href=" {{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                        <?php
                                        }else{
                                        ?>
                                        <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="{{URL::to('edit-category-product/'.$cate_pro->category_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                                        <a href="{{URL::to('delete-category-product/'.$cate_pro->category_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục sản phẩm này không?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                              
                            </tbody>
                        </table>
                        <span> {!! $category->render() !!} </span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>	<!--/.main-->
@endsection