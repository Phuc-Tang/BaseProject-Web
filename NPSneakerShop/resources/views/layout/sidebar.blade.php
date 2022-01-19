<nav id="sidebar">
    <div class="p-4 pt-5">
      <h5>Menu</h5>
      <ul class="list-unstyled components mb-5">
        <li>
          <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Danh mục sản phẩm</a>
          <ul class="collapse list-unstyled scrollable-menu scrollbar" id="pageSubmenu1">
            @foreach ($all_category as $key => $cate_pro)
            @if ($cate_pro->p_category_id == 0)
            <li>
              <a href=" {{URL::to('/danh-muc-san-pham/'.$cate_pro->category_id.$cate_pro->category_alias)}} ">
                <input type="radio" value="{{ $cate_pro->category_id }}"> {{ $cate_pro->category_name }}
              </a>
            @endif
              <ul class="collapse list-unstyled" id="pageSubmenu1">
                @foreach ($all_category as $key => $cate_sub)
                @if ($cate_sub->p_category_id != 0 && $cate_sub->p_category_id==$cate_pro->category_id)
                <li>
                  <a href="{{URL::to('/danh-muc-san-pham/'.$cate_sub->category_id.$cate_pro->category_alias)}}">
                    <input type="radio" value="{{ $cate_sub->category_id }}"> {{ $cate_sub->category_name }}
                   </a>
                @endif
                @endforeach
              </ul>
            </li>
            @endforeach
          </ul>
        </li>
        <li>
          <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Thương hiệu sản phẩm</a>
          <ul class="collapse list-unstyled scrollable-menu scrollbar" id="pageSubmenu2">
            @foreach ($all_brand as $key => $brand)
            <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id.$brand->brand_desc)}}"><input type="radio"> {{ $brand->brand_name }} </a></li>
            @endforeach
          </ul>
        </li>
        <li>
          <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Giới tính</a>
          <ul class="collapse list-unstyled" id="pageSubmenu3">
            @foreach ($all_sex as $key => $sex)
            <li><a href="{{URL::to('/gioi-tinh/'.$sex->sex_id.$sex->sex_alias)}}"><input type="radio"> {{ $sex->sex_name }}</a></li>
            @endforeach
          </ul>
        </li>
        <li>
          <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Màu sắc</a>
          <ul class="collapse list-unstyled scrollable-menu scrollbar" id="pageSubmenu4">
            <li><a href="#"><input type="radio"> Trắng</a></li>
            <li><a href="#"><input type="radio"> Đen</a></li>
            <li><a href="#"><input type="radio"> Cam</a></li>
            <li><a href="#"><input type="radio"> Vàng</a></li>
            <li><a href="#"><input type="radio"> Đỏ</a></li>
            <li><a href="#"><input type="radio"> Xanh</a></li>
            <li><a href="#"><input type="radio"> Tím</a></li>
            <li><a href="#"><input type="radio"> Hồng</a></li>
            <li><a href="#"><input type="radio"> Caro</a></li>
            <li><a href="#"><input type="radio"> Jungle</a></li>
          </ul>
        </li>
      </ul>
      <div class="mb-5">
        <h5>Size</h5>
        <div class="tagcloud">
          <a href="#" class="tag-cloud-link p-3">30</a>
          <a href="#" class="tag-cloud-link p-3">31</a>
          <a href="#" class="tag-cloud-link p-3">32</a>
          <a href="#" class="tag-cloud-link p-3">33</a>
          <a href="#" class="tag-cloud-link p-3">34</a>
          <a href="#" class="tag-cloud-link p-3">35</a>
          <a href="#" class="tag-cloud-link p-3">36</a>
          <a href="#" class="tag-cloud-link p-3">37</a>
          <a href="#" class="tag-cloud-link p-3">38</a>
          <a href="#" class="tag-cloud-link p-3">39</a>
          <a href="#" class="tag-cloud-link p-3">40</a>
          <a href="#" class="tag-cloud-link p-3">41</a>
          <a href="#" class="tag-cloud-link p-3">42</a>
          <a href="#" class="tag-cloud-link p-3">43</a>
          <a href="#" class="tag-cloud-link p-3">44</a>
          <a href="#" class="tag-cloud-link p-3">45</a>
        </div>
      </div>
    </div>
  </nav>