@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <h1 class="page-header">Thuộc tính sản phẩm</h1>
            </div>
        </div>
    </div><!--/.row-->
    
    <div class="row">
        <div class="container">
            <div class="col-xs-12 col-md-5 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thêm thuộc tính
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

                    
                    <form action=" {{URL::to('/save-attribute/'.$product_by_id->product_id)}} " method="post">
                        {{ csrf_field() }}
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Tên sản phẩm:</label>
                                <input type="text" name="product_name" value="{{$product_by_id->product_name}}" class="form-control" disabled placeholder="">
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label>Mã sản phẩm:</label>
                                <input type="text" name="product_sku" value="{{$product_by_id->product_sku}}" class="form-control" disabled placeholder="">
                            </div>
                        </div>

                        <div class="field_wrapper panel-body">
                            <label>Thuộc tính:</label>
                            <div class="form-group">
                                <input class="form-control" style="width: 23%; float:left; margin:2px" placeholder="SKU" type="text" name="sku[]" value=""/>
                                <input class="form-control" style="width: 23%; float:left; margin:2px" placeholder="Loại sản phẩm" type="text" name="price[]" value="Mới"/>
                                <input class="form-control" style="width: 23%; float:left; margin:2px" placeholder="Kích thước"  type="text" name="size[]" value=""/>
                                <input class="form-control" style="width: 23%; float:left; margin:2px" placeholder="Tình trạng"  type="text" name="stock[]" value=""/>
                                <a href="javascript:void(0);" class="add_button_attribute" title="Add field"><i class="far fa-plus-square"></i></a>
                            </div>
                        </div>
                        
                        <div class="panel-body">
                            <div class="form-group">
                                <button type="submit" name="add_attribute" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Thêm</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div><!--/.row-->

    
    <div class="row">
        <div class="container">
            <div class="col-xs-12 col-md-5 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Danh sách thuộc tính
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
                    
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <table class="table table-bordered">
    
                                  <thead>
                                    <tr class="bg-primary">
                                      <th>Mã sản phẩm</th>
                                      <th>Loại sản phẩm</th>
                                      <th>Kích thước sản phẩm</th>
                                      <th>Tình trạng sản phẩm</th>
                                      <th>Tùy chọn</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($attribute as $attr)
                                    <tr>
                                        <td> {{ $attr->sku }} </td>
                                        <td> {{ $attr->price }} </td>
                                        <td> {{ $attr->size }} </td>
                                        <td> {{ $attr->stock }} </td>
                    
                                        <td>
                                            <a href="{{URL::to('edit-attribute/'.$attr->attribute_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                                            <a href="{{URL::to('delete-attribute/'.$attr->attribute_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa thuộc tính của sản phẩm này không?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <span class="text-xs-center"> {!! $attribute->onEachSide(1)->render() !!} </span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>
@endsection