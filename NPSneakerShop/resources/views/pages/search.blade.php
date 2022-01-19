@extends('product_layout')
@section('product_content')
<div id="content" class="p-4 p-md-5 pt-5">
  <div class="container text-center"><p class="category-name">Kết quả tìm kiếm</p></div>
  <div class="row">
    @foreach($search_product as $product)
      <div class="col-sm-3">
          <div class="card sneakers shadow-0" style="width: 18rem;">
              <a href=" {{URL::to('/chi-tiet-san-pham/'.$product->product_id.$product->product_alias)}}">
                <img src="{{ URL::to('public/storage/'.$product->product_image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                <h6 class="card-title text-black"> {{($product->product_name)}} </h6>
                <p class="card-text text-warning">{{number_format($product->product_price).' VND'}}</p>
                </div>
              </a>
          </div>
      </div>
    @endforeach
  </div>
</div>
@endsection