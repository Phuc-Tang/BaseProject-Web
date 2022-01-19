@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách khách hàng đã đăng ký</h1>
        </div>
    </div><!--/.row-->
    <div id="navbar" class="row">
    </div>
    <div class="row">
    	<div class="col-sm-12">

        	<table class="table table-striped">
            	<thead>
                    <tr id="tbl-first-row">
                        <td width="5%">STT</td>
                        <td width="30%">Họ và tên</td>
                        <td width="25%">Email</td>
                        <td width="25%">Ngày tạo</td>
                        <td width="25%">Delete</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($user as $cus)
                    @php
                        $i++;
                    @endphp
                        <tr>
                            <td>{{$i}}</td>
                            <td> {{$cus->name}} </td>
                            <td> {{$cus->email}} </td>
                            <td> {{$cus->created_at}} </td>
                            <td><a href="" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a></td>
                        </tr>
                    @endforeach
                </tbody>
			</table>
        </div>
    </div>
</div>
@endsection