@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn hàng</h1>
            </div>
        </div>
    </div><!--/.row-->
    
    <div class="col-xs-12 col-md-7 col-lg-12">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách đơn hàng</div>
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
                                    <th style="width:5%">STT</th>
                                  <th style="width:20%">Mã đơn hàng</th>
                                  <th style="width:20%">Ngày đặt</th>
                                  <th style="width:20%">Tình trạng đơn hàng</th>
                                  <th style="width:30%">Tùy chọn</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($order as $key => $ord)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td> {{$ord->order_code}} </td>
                                    <td> {{$ord->created_at}} </td>
                        
                                    <td> @if($ord->order_status==1)
                                            Đơn hàng mới
                                        @elseif($ord->order_status==2)
                                            Đã xử lý
                                        @else
                                            Đơn hàng đã hủy
                                        @endif
                                     </td>
                                    <td>
                                        <a href=" {{URL::to('/view-order/'.$ord->order_code)}} " class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> Xem đơn hàng</a>
                                        <a href=" {{URL::to('/del-order/'.$ord->order_code)}} " class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa đơn hàng</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>	<!--/.main-->
@endsection