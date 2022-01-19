<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NPsneaker | Trang bán giày thể thao demo</title>
  <link rel="stylesheet" href="{{asset('public/frontend/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontend/css/index.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontend/css/Sport_shoes.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontend/css/product-details.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontend/css/show_category.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontend/css/sweetalert.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
    integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- MDB icon -->
  <link rel="icon" href="{{asset('public/frontend/images/logo1.ico')}}" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="{{asset('public/frontend/css/mdb.min.css')}}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.min.css" integrity="sha512-bjwk1c6AQQOi6kaFhKNrqoCNLHpq8PT+I42jY/il3r5Ho/Wd+QUT6Pf3WGZa/BwSdRSIjVGBsPtPPo95gt/SLg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <header>
    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
      <i class="fas fa-arrow-up"></i>
    </button>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-light shadow-0 fixed-top">
  <!-- Container wrapper -->
  <div class="container-xxl">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="{{URL::to('/')}}">
      <img src="{{asset('public/frontend/images/logo.png')}}" alt="..." height="36">
    </a>
    

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          {{-- <a class="nav-link" href=" {{URL::to('/')}} ">NPSneakerShop</a> --}}
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
        <?php
          if (Auth::check()){

        ?>
                  <a class="text-reset me-3" href=" {{URL::to('/gio-hang/'.Session::get('customer_id'))}} ">
                    <i class="fas fa-shopping-cart"></i>
                  </a>

                  <div class="dropdown">
                    <a class="text-reset me-3 dropdown-toggle hidden-arrow" data-toggle="dropdown" href="#" id="navbarDropdownMenuLink" role="button"
                    data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell p-2"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                  </ul>
                  </div>

                  <div class="dropdown">
                    <button type="button" class="btn btn-warning me-3 dropdown-toggle" data-toggle="dropdown">
                      <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="rounded-circle" height="25" alt=""
                      loading="lazy" />
                      {{Auth::user()->name}}
                    </button>
                    <ul class="dropdown-menu">
                      @if (Session::get('customer_id'))
                      <li>
                        <a class="dropdown-item" href="{{URL::to('/thong-tin-ca-nhan/'.Session::get('customer_id'))}}">Hồ sơ</a>
                      </li>
                      @endif
                      <li>
                        <a class="dropdown-item" href="#">Cài đặt</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href=" {{URL::to('/log-out')}} ">Đăng xuất</a>
                      </li>
                    </ul>
                  </div>

        <?php
        }else{

        ?>
        <a href=" {{URL::to('/dang-nhap')}} ">
          <button type="button" class="btn btn-link px-3 me-2" data-toggle="modal" data-target="#elegantModalForm">
            Đăng nhập
          </button>
        </a>
        <a href="{{URL::to('/dang-ky')}}">
          <button type="button" class="btn btn-warning me-3">
            Đăng ký tài khoản
          </button>
        </a>
        <?php

        }
        ?>

        <a
          class="btn btn-dark px-3"
          href="#"
          role="button"
          ><i class="fab fa-facebook"></i
        ></a>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

</header>
{{-- @include('layout.banner') --}}
  @yield('content')

  <footer>
    <!-- Footer -->
    <footer class="bg-dark text-center text-white">
      <!-- Grid container -->
      <div class="container p-4 mt-1">
        <!-- Section: Social media -->
        <section class="mb-4">
          <!-- Facebook -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
              class="fab fa-facebook-f"></i></a>

          <!-- Twitter -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

          <!-- Google -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

          <!-- Instagram -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

          <!-- Linkedin -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
              class="fab fa-linkedin-in"></i></a>

          <!-- Github -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
        </section>
        <!-- Section: Social media -->

        <!-- Section: Form -->
        <section class="">
          <form action="">
            <!--Grid row-->
            <div class="row d-flex justify-content-center">
              <!--Grid column-->
              <div class="col-auto mt-2">
                <p class="pt-2 footer-text">
                  <strong>Địa chỉ email</strong>
                </p>
              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-md-5 col-12">
                <!-- Email input -->
                <div class="form-outline form-white mb-4">
                  <input type="email" id="form5Example21" class="form-control" />
                </div>
              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-auto footer-text">
                <!-- Submit button -->
                <button type="submit" class="btn btn-outline-light mb-2 mt-2">
                  Đăng ký
                </button>
              </div>
              <!--Grid column-->
            </div>
            <!--Grid row-->
          </form>
        </section>
        <!-- Section: Form -->

        <!-- Section: Text -->
        <section class="mb-4">
          <p class="footer-text">
            Đăng ký nhận thông tin về các sản phẩm giày sắp tới của chúng tôi.
          </p>
        </section>
        <!-- Section: Text -->

        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <p class="text-uppercase about-for-us">Về shop</p>

              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-white text-decoration-none" style="font-family: calibri;">Giới thiệu</a>
                </li>
                <li>
                  <a href="#!" class="text-white text-decoration-none" style="font-family: calibri;">Tuyển dụng</a>
                </li>
                <li>
                  <a href="#!" class="text-white text-decoration-none" style="font-family: calibri;">Chính sách bảo
                    mật</a>
                </li>
                <li>
                  <a href="#!" class="text-white text-decoration-none" style="font-family: calibri;">Điều khoản dịch
                    vụ</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <p class="text-uppercase about-for-us">Hỗ trợ</p>

              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-white text-decoration-none" style="font-family: calibri;">Hotline: 0796 000
                    000</a>
                </li>
                <li>
                  <a href="#!" class="text-white text-decoration-none" style="font-family: calibri;">Các câu hỏi thường
                    gặp</a>
                </li>
                <li>
                  <a href="#!" class="text-white text-decoration-none" style="font-family: calibri;">Hướng dẫn đặt
                    hàng</a>
                </li>
                <li>
                  <a href="#!" class="text-white text-decoration-none" style="font-family: calibri;">Chính sách đổi
                    trả</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <p class="text-uppercase about-for-us">Thành viên</p>

              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-white text-decoration-none" style="font-family: calibri;">Tăng Thượng
                    Phúc</a>
                </li>
                <li>
                  <a href="#!" class="text-white text-decoration-none"
                    style="font-family: calibri;">ttphuc.20it6@vku.udn.vn</a>
                </li>
                <li>
                  <a href="#!" class="text-white text-decoration-none" style="font-family: calibri;">Võ Văn Nhất</a>
                </li>
                <li>
                  <a href="#!" class="text-white text-decoration-none"
                    style="font-family: calibri;">vvnhat.20it6@vku.udn.vn</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <p class="text-uppercase about-for-us">Địa chỉ</p>

              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-white text-decoration-none" style="font-family: calibri;">470 Trần Đại Nghĩa,
                    Ngũ Hành Sơn, Đà Nẵng</a>
                </li>
                <li>
                  <a href="#!" class="text-white text-decoration-none" style="font-family: calibri;">Phone: 0796 000
                    000</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2021 Copyright:
        <a class="text-white" href="#">NPShoes.com</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
  integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('public/frontend/jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('public/frontend/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
  integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
  integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('public/frontend/js/owl carousel.js')}}"></script>
<script src="{{asset('public/frontend/js/Sport_shoes.js')}}"></script>
<script src="{{asset('public/frontend/js/popper.js')}}"></script>
<script src="{{asset('public/frontend/js/main.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/product-details.js')}}"></script>
<script src="{{asset('public/frontend/js/sweetalert.js')}}"></script>
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script>
  CKEDITOR.replace('ckeditor');
  CKEDITOR.replace('ckeditor1');
</script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<!-- MDB -->
<script type="text/javascript" src="{{asset('public/frontend/js/mdb.min.js')}}"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.min.js" integrity="sha512-cWEytOR8S4v/Sd3G5P1Yb7NbYgF1YAUzlg1/XpDuouZVo3FEiMXbeWh4zewcYu/sXYQR5PgYLRbhf18X/0vpRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    $(document).ready(function(){
     
      $('.add-to-cart').click(function(){
        var size =$('.hidebx:checked').val();
        var id = $(this).data('id_product');
        var cart_product_id = $('.cart_product_id_' + id).val();
        var cart_product_name = $('.cart_product_name_' + id).val();
        var cart_product_image = $('.cart_product_image_' + id).val();
        var cart_product_price = $('.cart_product_price_' + id).val();
        var cart_product_size = $('.hidebx:checked').val();
        var cart_product_quantity = $('.cart_product_quantity_' + id).val();
        var cart_product_qty = $('.cart_product_qty_' + id).val();
        var _token = $('input[name="_token"]').val();
        if (parseInt(cart_product_qty)>parseInt(cart_product_quantity)) {
          swal("Lỗi", "Vui lòng đặt nhỏ hơn " + cart_product_quantity + " sản phẩm", "warning");
        }else{
          $.ajax({
            url: " {{URL::to('/add-cart-ajax')}} ",
            type: "POST",
            data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_size:cart_product_size,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity},
            success:function(){
              swal("Đã thêm", "Thêm sản phẩm vào giỏ hàng thành công", "success");
            }
          });
        }
      });
    });
</script>
<script>
  $(document).ready(function(){
    $('.error-to-add').click(function(){
      swal("Lỗi", "Bạn cần phải đăng nhập trước khi đặt hàng", "error");
    });
    $('.add-profile').click(function(){
      swal("Lỗi", "Bạn đã có hồ sơ cá nhân rồi", "error");
    });
  });

</script>
<script>
  $(function(){
  var current_page_URL = location.href;
  $( "a" ).each(function() {
     if ($(this).attr("href") !== "#") {
       var target_URL = $(this).prop("href");
       if (target_URL == current_page_URL) {
          $('nav a').parents('li, ul').removeClass('active');
          $(this).parent('li').addClass('active');
          return false;
       }
     }
  });
});
</script>
<script>
  $("input:radio").on('click', function() {
var id = $('input[name="id_hidden"]').val();
    var size =  $('.hidebx:checked').val();
    var _token = $('input[name="_token"]').val();
    $.ajax({
        url  : '{{url('/load-stock')}}',
        method: 'GET',
        data:{size:size,id:id,_token:_token},
        success: function(data){
        $('#load-stock').html(data);
        }
        });
  });
</script>
<script>
  //Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<script>
  $(document).ready(function(){
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
				url :" {{URL::to('/select-delivery-home')}} ",
				method: 'POST',
				data:{action:action,ma_id:ma_id,_token:_token},
				success:function(data){
					$('#'+result).html(data);
				}
    	});
    });

    $('.calculate_delivery').click(function(){
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();

            if(matp == '' && maqh =='' && xaid ==''){
              swal("Lỗi", "Bạn cần phải chọn phí vận chuyển trước khi đặt hàng", "error");
            }else{
                $.ajax({
                url : "{{URL::to('/calculate-fee')}}",
                method: 'POST',
                data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                  success:function(){
                    location.reload();
                  }
                });
            }
    });

    $('.delete_delivery').click(function(){
            var _token = $('input[name="_token"]').val();
                $.ajax({
                url : "{{URL::to('/delele-fee')}}",
                method: 'GET',
                data:{_token:_token},
                success:function(){
                   location.reload();
                }
                });

    });
  });
</script>
<script>
  $(document).ready(function(){
     
     $('.send_order').click(function(){
        swal({
          title: "Xác nhận đơn hàng",
          text: "Hãy kiểm tra thông tin sản phẩm trong giỏ hàng trước khi đặt",
          type: "info",
          showCancelButton: true,
          confirmButtonClass: "btn-success",
          confirmButtonText: "Đặt hàng",
          cancelButtonText: "Hủy",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            var shipping_email = $('#shipping_email').val();
            var shipping_name = $('#shipping_name').val();
            var shipping_address = $('#shipping_address').val();
            var shipping_phone = $('#shipping_phone').val();
            var shipping_notes = $('#shipping_notes').val();
            var shipping_method = $('#payment_select').val();

            var order_fee = $('.order_fee').val();
            var order_coupon = $('.order_coupon').val();

            var _token = $('input[name="_token"]').val();
              $.ajax({
                url: " {{URL::to('/confirm-order')}} ",
                method: 'POST',
                data:{shipping_email:shipping_email,
                shipping_name:shipping_name, 
                shipping_address:shipping_address,
                shipping_phone:shipping_phone, 
                shipping_notes:shipping_notes,
                order_fee:order_fee, 
                _token:_token,
                order_coupon:order_coupon,
                shipping_method:shipping_method},
                success:function(){
                  swal("Đã đặt hàng", "Bạn có thể tiếp tục mua hàng", "success");
                }
              });
              whidow.setTimeout(function(){
                location.reload();
              },3000);
          } else {
            swal("Đóng", "Đã hủy đặt hàng thành công", "error");
          }
        });
     });
   });
</script>
</body>

</html>