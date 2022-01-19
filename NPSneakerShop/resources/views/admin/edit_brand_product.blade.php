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
    
    <div class="row">
        <div class="container">
            <div class="col-xs-12 col-md-5 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Sửa thương hiệu
                    </div>
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
                    <form action="{{URL::to('/update-brand-product/'.$brand_edit->brand_id)}}" method="post">
                        {{@csrf_field()}}
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Tên thương hiệu:</label>
                                <input type="text" value="{{$brand_edit->brand_name}}" name="brand_name" class="form-control" placeholder="Tên thương hiệu...">
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label>Mô tả:</label>
                                <textarea name="brand_desc" class="form-control" id="" cols="30" rows="10">{{$brand_edit->brand_desc}}</textarea>
                            </div>

                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Trạng thái:</label>
                                <select name="brand_status" class="form-control input-sm m-5">
                                    @if ($brand_edit->brand_status==1)
                                    <option value="0">Ẩn</option>
                                    <option selected value="1">Hiện</option>
                                    @else
                                    <option selected value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                    @endif
                                </select>
                            </div>
                            <button class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</button>
                        </div>

                    </form>
                </div>
        </div>
        </div>
    </div><!--/.row-->
</div>	<!--/.main-->
@endsection