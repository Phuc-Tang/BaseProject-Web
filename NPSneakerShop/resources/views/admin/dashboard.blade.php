@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thống kê đơn hàng doanh số</h1>
			</div>
		</div><!--/.row-->
									
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"> {{$product}} </div>
							<div class="text-muted">Sản phẩm</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked basket "><use xlink:href="#stroked-basket"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"> {{$attribute}} </div>
							<div class="text-muted">Số lượng sản phẩm</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"> {{$customer}} </div>
							<div class="text-muted">Người dùng</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"> {{$order}} </div>
							<div class="text-muted">Đơn hàng</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<form autocomplete="off">
			@csrf
			<div class="col-md-2">
				<p>Từ ngày: <input type="text" id="datepicker" class="form-control">
				<input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
			</div>
			<div class="col-md-2">
				<p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
			</div>
			<div class="col-md-2">
				<p>Lọc theo: 
					<select class="dashboard-filter form-control">
						<option>-----Chọn-----</option>
						<option value="7ngay">7 ngày trước</option>
						<option value="thangtruoc">tháng trước</option>
						<option value="thangnay">tháng này</option>
						<option value="365ngayqua">365 ngày qua</option>
					</select>
				</p>
			</div>
		</form>

		<div class="container-fluid col-md-12">
			<div id="chart" style="height: 300px;"></div>
		</div>
		
		{{-- <div class="row">
			<div class="col-md-12">
				<div class="panel panel-red">
					<div class="panel-heading dark-overlay"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Lịch</div>
					<div class="panel-body">
						<div id="calendar"></div>
					</div>
				</div>
			</div><!--/.col-->
		</div><!--/.row--> --}}
	</div>	<!--/.main-->
@endsection