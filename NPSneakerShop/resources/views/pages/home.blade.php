@extends('welcome')
@section('content')
<main>
  @include('layout.banner')
  @include('layout.nav')

  <section id="brand" class="container">
    <div class="row">
      <img class="img-fluid col-lg-2 col-md-4 col-6" src="{{asset('public/frontend/images/nike.gif')}}" alt="">
      <img class="img-fluid col-lg-2 col-md-4 col-6" src="{{asset('public/frontend/images/adidas.gif')}}" alt="">
      <img class="img-fluid col-lg-2 col-md-4 col-6" src="{{asset('public/frontend/images/converse.gif')}}" alt="">
      <img class="img-fluid col-lg-2 col-md-4 col-6" src="{{asset('public/frontend/images/puma.gif')}}" alt="">
      <img class="img-fluid col-lg-2 col-md-4 col-6" src="{{asset('public/frontend/images/balenciaga.gif')}}" alt="">
      <img class="img-fluid col-lg-2 col-md-4 col-6" src="{{asset('public/frontend/images/bitis.gif')}}" alt="">
    </div>
  </section>
  
  <div class="container-fluid py-5">
    <div class="row">
      <div class="col-sm-3">
        <div class="align-items-center hover-zoom ripple bg-image one" >
          <img src="{{asset('public/frontend/images/Male.gif')}}" alt="">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.233)">
            <div class="details">
              <h2 class="text-warning">Giày nam</h2>
              <a class="btn btn-outline-light btn-lg btn-sale" href="#!" role="button">Shop now</a>
            </div>
          </div>
          <div class="hover-overlay hover-zoom">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)">
              <div class="details">
                @foreach ($all_sex as $sex)
                @if ($sex->sex_id == 1)
                <h2 class="text-warning">Giày nam</h2>
                <a class="btn btn-outline-light btn-lg btn-sale" href="{{URL::to('/gioi-tinh/'.$sex->sex_id.$sex->sex_alias)}}" role="button">Shop now</a>
                @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="align-items-center hover-zoom ripple bg-image one" >
          <img src="{{asset('public/frontend/images/Female.gif')}}" alt="">
          <div class="" style="background-color: rgba(0, 0, 0, 0.233)">
            <div class="details">
              <h2 class="text-warning">Giày nữ</h2>
              <a class="btn btn-outline-light btn-lg btn-sale" href="{{URL::to('/gioi-tinh/'.$sex->sex_id.$sex->sex_alias)}}" role="button">Shop now</a>
            </div>
          </div>
          <div class="hover-overlay hover-zoom">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.418)">
              <div class="details">
                @foreach ($all_sex as $sex)
                @if ($sex->sex_id == 2)
                <h2 class="text-warning">Giày nữ</h2>
                <a class="btn btn-outline-light btn-lg btn-sale" href="{{URL::to('/gioi-tinh/'.$sex->sex_id.$sex->sex_alias)}}" role="button">Shop now</a>
                @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="align-items-center hover-zoom ripple bg-image one" >
          <img src="{{asset('public/frontend/images/Unisex.gif')}}" alt="">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.233)">
            <div class="details">
              <h2 class="text-warning">Giày Unisex</h2>
              <a class="btn btn-outline-light btn-lg btn-sale" href="#!" role="button">Shop now</a>
            </div>
          </div>
          <div class="hover-overlay hover-zoom">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.418)">
              <div class="details">
                @foreach ($all_sex as $sex)
                @if ($sex->sex_id == 3)
                <h2 class="text-warning">Giày Unisex</h2>
                <a class="btn btn-outline-light btn-lg btn-sale" href="{{URL::to('/gioi-tinh/'.$sex->sex_id.$sex->sex_alias)}}" role="button">Shop now</a>
                @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="align-items-center hover-zoom ripple bg-image one" >
          <img src="{{asset('public/frontend/images/Unisex.gif')}}" alt="">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.233)">
            <div class="details">
              <h2 class="text-warning">Giày Unisex</h2>
              <a class="btn btn-outline-light btn-lg btn-sale" href="#!" role="button">Shop now</a>
            </div>
          </div>
          <div class="hover-overlay hover-zoom">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.418)">
              <div class="details">
                @foreach ($all_sex as $sex)
                @if ($sex->sex_id == 3)
                <h2 class="text-warning">Giày Unisex</h2>
                <a class="btn btn-outline-light btn-lg btn-sale" href="{{URL::to('/gioi-tinh/'.$sex->sex_id.$sex->sex_alias)}}" role="button">Shop now</a>
                @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

    <div class="container">
      <div class="text-center mt-2 py-5">
        <p class="font-weight-bold text-warning text-header">Sản phẩm mới nhất</p>
        <hr class="line-header mx-auto bg-black opacity-100">
        <p class="font-weight-bold">Bạn có thể tham khảo một số sản phẩm mới nhất ở đây.</p>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="owl-carousel owl-theme">

          @foreach ($all_product as $product)
          <div class="align-items-center">
            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id.$product->product_alias)}}">
            <img src="{{ URL::to('public/storage/'.$product->product_image) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h6 class="card-title text-black">{{($product->product_name)}}</h6>
              <p class="card-text text-warning">{{number_format($product->product_price).' VND'}}</p>
            </a>
            </div>
          </div>
          @endforeach
          
        </div>
      </div>
    </div>

    <div class="p-5 text-center bg-image mt-5" style="background-image: url('https://cdn.fbsbx.com/v/t59.2708-21/260492165_407722201025351_3504542379536766469_n.gif?_nc_cat=110&fallback=1&ccb=1-5&_nc_sid=041f46&_nc_ohc=GG0Ser0JBdQAX9T1THp&_nc_ht=cdn.fbsbx.com&oh=03_AVLB7UHctsHNH31bbAaNYjeykfkz96jGFcpg0ymWWkUIPQ&oe=61E4ACAF');height: 400px;">
      <div class="mask">
        <div class="d-flex justify-content-end align-items-center h-100 container">
          <div class="text-white">
            <h1 class="mb-3 text-white">Săn hàng sale 20%</h1>
            <h4 class="mb-3 text-white">Áp dụng đến hết ngày 31 tháng 12 năm 2021</h4>
            <a class="btn btn-outline-light btn-lg btn-sale" href="#!" role="button">Shop now</a>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="text-center mt-2 py-5">
        <p class="font-weight-bold text-warning text-header">Sản phẩm nổi bật</p>
        <hr class="line-header mx-auto bg-black opacity-100">
        <p class="font-weight-bold">Bạn có thể tham khảo một số sản phẩm nổi bật ở đây.</p>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="owl-carousel owl-theme">

          @foreach ($pre_product as $product)
          <div class="align-items-center">
            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id.$product->product_alias)}}">
              <img src="{{ URL::to('public/storage/'.$product->product_image) }}" alt="">
            </a>
            <div class="card-body">
              <h6 class="card-title text-black">{{($product->product_name)}}</h6>
              <p class="card-text text-warning">{{number_format($product->product_price).' VND'}}</p>
            </a>
            </div>
          </div>
          @endforeach
          
        </div>
      </div>
    </div>

    <div class="container-fluid about-us">
      <div class="container mt-3">
        <div class="row">
          <div class="col-sm">
            <h2 class="fw-bold mb-3 mt-3 shoe-brands">Về shop</h2>
            <img src="{{('public/frontend/images/Banner-shop.gif')}}" alt="Responsive image" class="img-fluid">
            <p class="shop-text about-shop">TÊN SHOP - Đây là một dự án Website mua sắm <strong>về thời trang sneakers
                tại Đà Nẵng</strong>, chúng tôi luôn đem đến cho các bạn những sản phẩm <strong>seakers chất
                lượng</strong> và <strong>chính hãng</strong> đến từ các <strong>thương hiệu nổi tiếng </strong>trên
              toàn thế giới, các <strong>Global Brands</strong> đang thịnh hành cho đến hiện tại. Các mẫu
              <strong>sneakers</strong> này nhằm hướng đến các bạn trẻ yêu thích thời trang cũng như đam mê với nó, mang
              lại cho các bạn phong cách mới lạ, trẻ trung, đồng thời bắt kịp cùng xu hương chung đang thịnh hành trên
              khắp thế giới.
            </p>
            <p class="shop-text about-shop">
              Nhu cầu <strong>mua và sử dụng</strong> các loại giày ngày càng nhiều. Trên thị trường ngày càng xuất hiện nhiều cửa hàng, công ty chuyên mua bán, cung cấp đầy đủ các mẫu giày. Chính vì vậy việc <strong>giới thiệu và đưa sản phẩm của mình đến tay người dùng</strong> là một trong những <strong>nhu cầu thiết yếu</strong>.
              Ngày nay cùng với sự phát triển nhanh chóng của Internet, <strong>các hình thức mua và bán hàng hóa</strong> cho mọi người ngày càng đa dạng và phát triển hơn. Với sự phát triển mạnh mẽ của <strong>thương mại điện tử</strong> giúp chúng ta <strong>tiết kiệm các chi phí nhờ chi phí vận chuyển trung gian, chi phí giao dịch</strong>. Hơn nữa thương mại điện tử còn giúp con người có thể  <strong>tìm kiếm tự động</strong> theo mục đích khác nhau, tự động <strong>cung cấp thông tin</strong> theo nhu cầu và sở thích của con người. Giờ đây, con người có thể ngồi ở nhà mà có thể mua sắm mọi thứ theo ý muốn và các website bán hàng trên mạng có thể giúp ta làm được điều đó. 
            </p>
          </div>
          <div class="col-sm">
            <div class="row">
              <h2 class="fw-bold mb-3 mt-3 shoe-brands">Tin tức</h2>
              <div class="col-sm-4">
                <a href="https://giaygiare.vn/vi-sao-jordan-dior-gia-vai-tram-trieu.html"><img src="{{('public/frontend/images/News-1.gif')}}"
                    alt=""></a>
              </div>
              <div class="col-sm-8 shop-text">
                <a href="https://giaygiare.vn/vi-sao-jordan-dior-gia-vai-tram-trieu.html" class="text-decoration-none">
                  <strong>Vì sao mẫu sneaker Jordan Dior lại có giá vài trăm triệu ?</strong>
                </a>
              </div>
              <div class="col-sm-4">
                <a
                  href="https://genk.vn/mau-giay-duoc-chap-va-nghe-thuat-tu-9-doi-sneakers-dinh-dam-nhat-nam-2018-20190104144703184.chn"><img
                    src="{{('public/frontend/images/News-2.gif')}}" alt=""></a>
              </div>
              <div class="col-sm-8 shop-text">
                <a href="https://genk.vn/mau-giay-duoc-chap-va-nghe-thuat-tu-9-doi-sneakers-dinh-dam-nhat-nam-2018-20190104144703184.chn"
                  class="text-decoration-none">
                  <strong>Mẫu giày được chấp vá nghệ thuật từ 9 đôi sneakers đình đám nhất năm 2018</strong>
                </a>
              </div>
              <div class="col-sm-4">
                <a href="https://giaysneakerhcm.com/giay-vans-slip-on-xuat-hien-tren-phim-squid-games/"><img
                    src="{{('public/frontend/images/News-3.gif')}}" alt=""></a>
              </div>
              <div class="col-sm-8 shop-text">
                <a href="https://giaysneakerhcm.com/giay-vans-slip-on-xuat-hien-tren-phim-squid-games/"
                  class="text-decoration-none">
                  <strong>Giày Vans Slip-On màu trắng nào xuất hiện trên phim Squid Games</strong>
                </a>
              </div>
              <div class="col-sm-4">
                <a href="https://giaysneakerhcm.com/nike-air-jordan-2022-dep/"><img src="{{('public/frontend/images/News-4.gif')}}" alt=""></a>
              </div>
              <div class="col-sm-8 shop-text">
                <a href="https://giaysneakerhcm.com/nike-air-jordan-2022-dep/" class="text-decoration-none">
                  <strong>Top Nike Air Jordan 2022 đẹp: Ngày phát hành, giá cập nhật mới nhất</strong>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
@endsection