@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <h1 class="page-header">Mã giảm giá sản phẩm</h1>
            </div>
        </div>
    </div><!--/.row-->
    
    <div class="col-xs-12 col-md-7 col-lg-12">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách mã</div>
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
                                  <th>Tên mã</th>
                                  <th>Code</th>
                                  <th>Số lượng</th>
                                  <th >Loại</th>
                                  <th>Số giảm giá</th>
                                  <th >Tùy chọn</th>
                                </tr>
                              </thead>
                              <tbody>

                                @foreach ($coupon as $key => $cou)
                                <tr>
                                    <td> {{ $cou->coupon_name }} </td>
                                    <td> {{ $cou->coupon_code }} </td>
                                    <td> {{ $cou->coupon_time }} </td>
                                    <td> 
                                        @if ($cou->coupon_condition==1)
                                        Giảm theo tiền
                                        @elseif($cou->coupon_condition==0)
                                        Giảm theo %
                                        @endif
                                    </td>
                                    <td>
                                        @if ($cou->coupon_condition==0)
                                            Giảm {{ $cou->coupon_number}}%
                                        @elseif($cou->coupon_condition==1)
                                        Giảm {{number_format($cou->coupon_number).' VND'}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{URL::to('edit-coupon/'.$cou->coupon_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                                        <a href="{{URL::to('delete-coupon/'.$cou->coupon_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa mã giảm giá này không?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                              
                            </tbody>
                        </table>
                        {{-- <span> {!! $coupon->render() !!} </span> --}}
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>	<!--/.main-->
@endsection