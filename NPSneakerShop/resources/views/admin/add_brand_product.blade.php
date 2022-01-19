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
                        Thêm thương hiệu
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

                    <form action=" {{URL::to('/save-brand-product')}} " method="post">
                        {{ csrf_field() }}
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Tên thương hiệu:</label>
                                <input type="text" name="brand_name" class="form-control" placeholder="Tên thương hiệu...">
                            </div>
                        </div>
    
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Mô tả:</label>
                                <textarea name="brand_desc" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
    
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Trạng thái:</label>
                                <select name="brand_status" class="form-control input-sm m-5">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>
                            <button type="submit" name="add_brand_product" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Thêm</button>
                        </div>
                    </form>
                </div>
        </div>
        </div>
    </div><!--/.row-->
</div>
@endsection