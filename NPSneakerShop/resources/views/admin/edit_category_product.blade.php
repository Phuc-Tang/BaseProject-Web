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
    
    <div class="row">
        <div class="container">
            <div class="col-xs-12 col-md-5 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Sửa danh mục
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
                    <form action="{{URL::to('/update-category-product/'.$category_edit->category_id)}}" method="post">
                        {{@csrf_field()}}
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input type="text" value="{{$category_edit->category_name}}" name="category_name" class="form-control" placeholder="Tên danh mục...">
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label>Bí danh danh mục:</label>
                                <input type="text" value="{{$category_edit->category_alias}}" name="category_alias" class="form-control" placeholder="Tên bí danh...">
                            </div>
                        </div>
                        
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Danh mục gốc:</label>
                                <select name="p_category_id" class="form-control input-sm m-5">
                                    <option value="0">Danh mục gốc</option>
                                    @foreach ($category as $cate)
                                        @if ($cate->p_category_id==0)
                                            <option {{$cate->category_id==$category_edit->p_category_id ? 'selected' : ''}} value="{{ $cate->category_id }}">{{ $cate->category_name }} </option>
                                            @foreach ($category as $cate_sub)
                                                @if($cate_sub->p_category_id!=0 && $cate_sub->p_category_id==$cate->category_id)
                                                    <option {{$cate_sub->category_id==$category_edit->p_category_id ? 'selected' : ''}} value="{{ $cate_sub->category_id }}">{{ '---'.$cate_sub->category_name }} </option>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label>Mô tả:</label>
                                <textarea name="category_desc" class="form-control" id="" cols="30" rows="10">{{$category_edit->category_desc}}</textarea>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Trạng thái:</label>
                                <select name="category_status" class="form-control input-sm m-5">
                                    @if ($category_edit->category_status==1)
                                    <option value="0">Ẩn</option>
                                    <option selected value="1">Hiện</option>
                                    @else
                                    <option selected value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</button>
                    </form>
                </div>
        </div>
        </div>
    </div><!--/.row-->
</div>	<!--/.main-->
@endsection