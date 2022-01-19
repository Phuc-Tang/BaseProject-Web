<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Đăng nhập admin</title>

<link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('public/backend/css/datepicker3.css')}}" rel="stylesheet">
<link href="{{asset('public/backend/css/styles.css')}}" rel="stylesheet">
<link rel="icon" href="{{asset('public/frontend/images/logo1.ico')}}" type="image/x-icon" />

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

	
	<div class="row" >
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
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
					<form role="form" action="{{URL::to('/admin-dashboard')}}" method="post">
						{{ csrf_field() }}
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="admin_email" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="admin_password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button class="btn btn-primary">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	

	
	
		

	<script src="{{asset('public/backend/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/backend/js/chart.min.js')}}"></script>
	<script src="{{asset('public/backend/js/chart-data.js')}}"></script>
	<script src="{{asset('public/backend/js/easypiechart.js')}}"></script>
	<script src="{{asset('public/backend/js/easypiechart-data.js')}}"></script>
	<script src="{{asset('public/backend/js/bootstrap-datepicker.js')}}"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
