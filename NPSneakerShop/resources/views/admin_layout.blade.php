<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard | NPSneakerShop Admin</title>
<link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('public/backend/css/datepicker3.css')}}" rel="stylesheet">
<link href="{{asset('public/backend/css/styles.css')}}" rel="stylesheet">
<link rel="icon" href="{{asset('public/frontend/images/logo1.ico')}}" type="image/x-icon" />
<meta name="csrf-token" content="{{csrf_token()}}">

<script src="{{asset('public/backend/js/lumino.glyphs.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">NPSneakerShop Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 
							<?php
							$name = Session::get('admin_name');
							if ($name) {
								echo $name;
							}
							?>
							<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{URL::to('/logout')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>

			<li><a href="{{URL::to('dashboard')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>

			<li class="sub-btn"><a href="#"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Danh mục <i class="fas fa-caret-down"></i></a></li>
			<ul class="nav menu sub-menu" style="display: none">
				<li style="padding-left: 25px"><a href="{{URL::to('add-category-product')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
					<path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
					<path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
				  </svg> Thêm danh mục sản phẩm</a></li>
				<li style="padding-left: 25px"><a href="{{URL::to('all-category-product')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
					<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
					<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
				  </svg> Liệt kê danh mục sản phẩm</a></li>
			</ul>

			<li class="sub-btn"><a href="#"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Thương hiệu <i class="fas fa-caret-down"></i></a></li>
			<ul class="nav menu sub-menu" style="display: none">
				<li style="padding-left: 25px"><a href="{{URL::to('add-brand-product')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
					<path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
					<path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
				  </svg> Thêm thương hiệu sản phẩm</a></li>
				<li style="padding-left: 25px"><a href="{{URL::to('all-brand-product')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
					<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
					<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
				  </svg> Liệt kê thương hiệu</a></li>
			</ul>

			<li class="sub-btn"><a href="#"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Sản phẩm <i class="fas fa-caret-down"></i></a></li>
			<ul class="nav menu sub-menu" style="display: none">
				<li style="padding-left: 25px"><a href="{{URL::to('add-product')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
					<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
				  </svg> Thêm sản phẩm</a></li>
				<li style="padding-left: 25px"><a href="{{URL::to('all-product')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
				  </svg> Liệt kê sản phẩm</a></li>
			</ul>
			<li class="sub-btn"><a href="#"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Mã giảm giá <i class="fas fa-caret-down"></i></a></li>
			<ul class="nav menu sub-menu" style="display: none">
				<li style="padding-left: 25px"><a href="{{URL::to('insert-coupon')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
					<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
				  </svg> Thêm mã giảm giá</a></li>
				<li style="padding-left: 25px"><a href="{{URL::to('all-coupon')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
				  </svg> Danh sách mã giảm giá</a></li>
			</ul>
			<li class="sub-btn"><a href="#"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Phí vận chuyển <i class="fas fa-caret-down"></i></a></li>
			<ul class="nav menu sub-menu" style="display: none">
				<li style="padding-left: 25px"><a href="{{URL::to('delivery')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
					<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
				  </svg> Quản lí vận chuyển</a></li>
			</ul>
			<li class="sub-btn"><a href="#"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Đơn hàng <i class="fas fa-caret-down"></i></a></li>
			<ul class="nav menu sub-menu" style="display: none">
				<li style="padding-left: 25px"><a href="{{URL::to('/manage-order')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
					<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
				  </svg> Quản lí đơn hàng</a></li>
			</ul>
			<li class="sub-btn"><a href="#"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Tài khoản <i class="fas fa-caret-down"></i></a></li>
			<ul class="nav menu sub-menu" style="display: none">
				<li style="padding-left: 25px"><a href="{{URL::to('/list-customer')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
					<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
				  </svg> Quản lí tài khoản</a></li>
			</ul>

		</ul>
		
	</div><!--/.sidebar-->
		
	@yield('admin_content')
		  

	<script src="{{asset('public/backend/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('public/backend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/backend/js/chart.min.js')}}"></script>
	<script src="{{asset('public/backend/js/chart-data.js')}}"></script>
	<script src="{{asset('public/backend/js/easypiechart.js')}}"></script>
	<script src="{{asset('public/backend/js/easypiechart-data.js')}}"></script>
	<script src="{{asset('public/backend/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
	<script>
		CKEDITOR.replace('ckeditor');
		CKEDITOR.config.pasteFromWordPromptCleanup = true;
		CKEDITOR.config.pasteFromWordRemoveFontStyles = false;
		CKEDITOR.config.pasteFromWordRemoveStyles = false;
		CKEDITOR.config.language = "vi";
		CKEDITOR.config.ProcessHTMLEntities = false;
		CKEDITOR.config.entities_latin = false;
		CKEDITOR.config.ForceSimpleAmpersand = true;
		CKEDITOR.replace('ckeditor1');
	</script>

	<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

	<script>
		$('#calendar').datepicker({
		});

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

		$(document).ready(function(){
			$('.sub-btn').click(function(){
				$(this).next('.sub-menu').slideToggle();
			});
		});
	</script>	
	<script>
		$('#calendar').datepicker({
		});
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
		});
		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});
	</script>
		<script>
			$('#calendar').datepicker({
			});
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
		<script type="text/javascript">
			var editor = CKEDITOR.replace('content',{
				language:'vi',
				filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
				filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
				filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				var maxField = 10; //Input fields increment limitation
				var addButton = $('.add_button_attribute'); //Add button selector
				var wrapper = $('.field_wrapper'); //Input field wrapper
				var fieldHTML = '<div class="remove"><input class="form-control" style="width: 23%; float:left; margin:2px" placeholder="SKU" type="text" name="sku[]" value=""/>   <input class="form-control" style="width: 23%; float:left; margin:2px" placeholder="Loại sản phẩm" type="text" name="price[]" value="Mới" />   <input class="form-control" style="width: 23%; float:left; margin:2px" placeholder="Kích thước" type="text" name="size[]" value=""/>   <input class="form-control" style="width: 23%; float:left; margin:2px" placeholder="Tình trạng" type="text" name="stock[]" value=""/><a href="javascript:void(0);" class="remove_button_attribute"> <i class="far fa-minus-square"></i></a></div>'; //New input field html 
				var x = 1; //Initial field counter is 1
				
				//Once add button is clicked
				$(addButton).click(function(){
					//Check maximum number of input fields
					if(x < maxField){ 
						x++; //Increment field counter
						$(wrapper).append(fieldHTML); //Add field html
					}
				});
				
				//Once remove button is clicked
				$(wrapper).on('click', '.remove_button_attribute', function(e){
					e.preventDefault();
					$(this).parent('.remove').remove(); //Remove field html
					x--; //Decrement field counter
				});
			});

			$(document).ready(function(){
				load_gallery();
				function load_gallery(){
					var pro_id = $('.pro_id').val();
					var _token = $('input[name="_token"]').val();

					$.ajax({
						url:" {{URL::to('/save-images')}} ",
						method:"POST",
						data:{pro_id:pro_id,_token:_token},
						success:function(data){
							$('#gallery_load').html(data);
						}
					});
				}
			});

			$('#file').change(function(){
				var error = '';
				var files = $('#file')[0].files;

				if(files.length>6){
					error+='<p>Bạn chỉ được chọn tối đa 6 ảnh</p>';
				}else if(files.length==''){
					error+='<p>Không được bỏ trống ảnh</p>';
				}else if(files.size > 5000000){
					error+='<p>File ảnh không được lớn hơn 5MB</p>';
				}

				if(error==''){

				}else{
					$('#file').val('');
					$('#error_gallery').html('<span class="text-danger">'+error+'</span>');
					return false;
				}
			});

			$(document).on('change','.file_image',function(){
				var gal_id = $(this).data('gal_id');
				var image = document.getElementById('file-'+gal_id).files[0];

				var form_data = new FormData();

				form_data.append("file",document.getElementById("file-"+gal_id).files[0]);
				form_data.append("gal_id",gal_id);
				$.ajax({
					url:" {{URL::to('/update-images')}} ",
					method:"POST",
					headers:{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					data:form_data,
					contentType:false,
					cache:false,
					processData:false,
					success:function(data){
						load_gallery();
						$('#error_gallery').html('<span class="text-danger">Cập nhật hình ảnh thành công</span>');
					}
				});
			});
		</script>
<script>
	$(document).ready(function(){
		fetch_delivery();
		function fetch_delivery(){
    		var _token = $('input[name="_token"]').val();
			$.ajax({
				url : "{{URL::to('/select-feeship')}}",
				method: 'POST',
				data:{_token:_token},
				success:function(data){
					$('#load_delivery').html(data);
				}
			});
		}

		$(document).on('blur','.fee_feeship_edit',function(){
			var feeship_id = $(this).data('feeship_id');
			var fee_value = $(this).text();
			var _token = $('input[name="_token"]').val();

			$.ajax({
				url : "{{URL::to('/update-delivery')}}",
				method: 'POST',
				data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
				success:function(data){
					fetch_delivery();
				}
			});
		});

		$('.add_delivery').click(function(){

			var city = $('.city').val();
			var province = $('.province').val();
			var wards = $('.wards').val();
			var fee_ship = $('.fee_ship').val();
			var _token = $('input[name="_token"]').val();

			$.ajax({
				url :" {{URL::to('/insert-delivery')}} ",
				method: 'POST',
				data:{city:city, province:province ,wards:wards, fee_ship:fee_ship, _token:_token},
				success:function(data){
					fetch_delivery();
				}
    		});
		});

		$('.choose').on('change',function(){
			var action = $(this).attr('id');
			var ma_id = $(this).val();
			var _token = $('input[name="_token"]').val();
			var result = '';

			if(action=='city'){
				result = 'province';
			}else{
				result = 'wards';
			}
			$.ajax({
				url :" {{URL::to('/select-delivery')}} ",
				method: 'POST',
				data:{action:action,ma_id:ma_id,_token:_token},
				success:function(data){
					$('#'+result).html(data);
				}
    		});
    	});
	});
</script>
<script>
	$( function() {
	  $( "#datepicker" ).datepicker({
		  prevText:"Tháng trước",
		  nextText:"Tháng sau",
		  dateFormat:"yy-mm-dd",
		  monthNames: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
		  dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
		  duration: "slow"
	  });
	  $( "#datepicker2" ).datepicker({
		  prevText:"Tháng trước",
		  nextText:"Tháng sau",
		  dateFormat:"yy-mm-dd",
		  monthNames: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
		  dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7","Chủ nhật"],
		  duration: "slow"
	  });
	} );
	</script>
<script>
	$(document).ready(function(){

		var chart = new Morris.Bar({

			element: 'chart',
			lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766856'],
			hideHover: 'auto',
			parseTime: false,

			xkey: 'period',

			ykeys: ['order','sales','profit','quantity'],
			labels: ['Đơn hàng', 'doanh số', 'lợi nhuận', 'số lượng']
		});

		$('.dashboard-filter').change(function(){
			var dashboard_value = $(this).val();
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url: " {{URL::to('/dashboard-filter')}} ",
				method: "POST",
				dataType: "JSON",
				data:{dashboard_value:dashboard_value, _token:_token},
				success:function(data){
					chart.setData(data);
				}
			});
		});

		$('#btn-dashboard-filter').click(function(){
			var _token = $('input[name="_token"]').val();

			var from_date = $('#datepicker').val();
			var to_date = $('#datepicker2').val();

			$.ajax({
				url: " {{URL::to('/filter-by-date')}} ",
				method: "POST",
				dataType: "JSON",
				data: {from_date:from_date, to_date:to_date, _token:_token},

				success:function(data){
					chart.setData(data);
				}
			});
		});
	});
</script>
<script>
	$('.order_details').change(function(){
		var order_status = $(this).val();
		var order_id = $(this).children(":selected").attr("id");
		var _token = $('input[name="_token"]').val();

		quantity = [];
		$("input[name='product_sales_quantity']").each(function(){
			quantity.push($(this).val());
		});

		order_product_id = [];
		$("input[name='order_product_id']").each(function(){
			order_product_id.push($(this).val());
		});
		
		$.ajax({
				url: " {{URL::to('/update-order-qty')}} ",
				method: "POST",
				dataType: "JSON",
				data: {order_status:order_status, order_id:order_id, quantity:quantity, order_product_id:order_product_id,  _token:_token},

				success:function(data){
					alert('Cập nhật số lượng thành công');
					// location.reload();
				}
			});
		
	});
</script>
</body>

</html>
