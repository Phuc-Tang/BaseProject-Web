{{-- <div class="container mt-3">
    <ul class="nav justify-content-center">
      @foreach ($all_category as $key => $cate_pro)
      @if ($cate_pro->p_category_id == 0)
      <li class="nav-item nav-text">
        <a class="nav-link" href="{{URL::to('/danh-muc-san-pham/'.$cate_pro->category_id.$cate_pro->category_alias)}}">{{ $cate_pro->category_name }}</a>
      </li>
      @endif
      @endforeach
      <li class="nav-item nav-text">
        <a class="nav-link" href="#">Giày bóng đá</a>
      </li>
      <li class="nav-item nav-text">
        <a class="nav-link" href="#">Giày bóng rổ</a>
      </li>
      <li class="nav-item nav-text">
        <a class="nav-link" href="#">Giày chạy bộ</a>
      </li>
      <li class="nav-item nav-text">
        <a class="nav-link" href="#">Giày thời trang</a>
      </li>
      <li class="nav-item nav-text">
        <a class="nav-link" href="#">Giày sandal</a>
      </li>
    </ul>
  </div> --}}

  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-0 sticky-top" style="z-index: 999999999;">
    <div class="container">
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item pr-2 active">
            <a class="nav-link text-uppercase font-weight-bold text-hover" href=" {{URL::to('/trang-chu')}} " style="font-size: 15px">Trang chủ</a>
          </li>
          <li class="nav-item pr-2">
            <a class="nav-link text-uppercase font-weight-bold text-hover" href=" {{URL::to('/san-pham')}} " style="font-size: 15px">Cửa hàng</a>
          </li>
          <li class="nav-item pr-2">
            <a class="nav-link text-uppercase font-weight-bold text-hover" href="#" style="font-size: 15px">Chúng tôi</a>
          </li>
          <li class="nav-item pr-2">
            <a class="nav-link text-uppercase font-weight-bold text-hover" href="#" style="font-size: 15px">Blog</a>
          </li>
          <li class="nav-item pr-2">
            <a class="nav-link text-uppercase font-weight-bold text-hover" href="#" style="font-size: 15px">Liên hệ</a>
          </li>
        </ul>
      </div>

      <div class="d-flex align-items-center">
        <form action=" {{URL::to('/tim-kiem')}} " method="post">
          {{ csrf_field() }}
        <div class="input-group">
          <div class="form-outline">
            <input type="search" id="form1" class="form-control" name="keywords_submit" />
            <label class="form-label" for="form1">Search</label>
          </div>
          <button type="submit" class="btn btn-warning">
            <i class="fas fa-search"></i>
          </button>
        </div>
        </form>
      </div>
    </div>
  </nav>