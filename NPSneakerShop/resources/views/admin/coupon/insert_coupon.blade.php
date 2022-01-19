@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm mã giảm giá</h1>
            </div>
        </div>
    </div><!--/.row-->
    
    <div class="row">
        <div class="container">
            <div class="col-xs-12 col-md-5 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thêm mã giảm giá
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

                    
                    <form action=" {{URL::to('/insert-coupon-code')}} " method="post">
                        {{ csrf_field() }}
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Tên mã giảm giá:</label>
                                <input type="text" name="coupon_name" class="form-control">
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label>Mã giảm giá:</label>
                                <input type="text" name="coupon_code" class="form-control">
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label>số lượng:</label>
                                <input type="text" name="coupon_time" class="form-control">
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label>Loại mã:</label>
                                <select name="coupon_condition" class="form-control input-sm m-5">
                                    <option value="0">Giảm theo phần năm</option>
                                    <option value="1">Giảm theo tiền</option>
                                </select>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label>Nhập % hoặc tiền giảm:</label>
                                <input type="text" name="coupon_number" class="form-control" placeholder="Tên bí danh...">
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Thêm</button>
                        </div>

                        {{-- <div class="panel-body">
                            <div class="form-group">
                                <label>Danh mục gốc:</label>
                                <select name="p_category_id" class="form-control input-sm m-5">
                                    <option value="0">Danh mục gốc</option>
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
                        </div> --}}
                    </form>
                    
                </div>
        </div>
        </div>
    </div><!--/.row-->
</div>
@endsection