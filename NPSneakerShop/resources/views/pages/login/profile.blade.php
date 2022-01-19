@extends('welcome')
@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 pt-5">
                <h1 class="page-header">Thông tin cá nhân</h1>
            </div>
        </div><!--/.row-->
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
              <li class="breadcrumb-item active" aria-current="page">Thông tin người dùng</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">

        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-chat/ava3.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{$customer->name}}</h5>
              {{-- <p class="text-muted mb-4">{{$file->address}}</p> --}}
              <div class="d-flex justify-content-center mb-2">

                <a href="{{URL::to('/them-thong-tin-ca-nhan/'.$customer->customer_id)}}"><button type="button" class="btn btn-warning">Thêm hồ sơ</button></a>

                <button type="button" class="btn btn-outline-primary ms-1">Cập nhật</button>

              </div>
            </div>
          </div>
          @foreach ($profile as $file)
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fas fa-globe fa-lg text-warning"></i>
                  <p class="mb-0">https://npsneaker.com</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                  <p class="mb-0">npsneaker</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                  <p class="mb-0">@npsneaker</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                  <p class="mb-0">npsneaker</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                  <p class="mb-0">npsneaker</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Họ và tên </p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$customer->name}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Giới tính</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$file->gender}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Địa chỉ Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$customer->email}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Số điện thoại</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$file->phone}}</p>
                 
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Di động</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$file->mobile}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Địa chỉ</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$file->address}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection