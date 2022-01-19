@extends('welcome')
@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 pt-5">
                <h1 class="page-header">Thêm thông tin cá nhân</h1>
            </div>
        </div><!--/.row-->
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
              <li class="breadcrumb-item active" aria-current="page">Thêm thông tin người dùng</li>
            </ol>
          </nav>
        </div>
      </div>
      <form action="{{URL::to('/save-profile/'.$only_customer->customer_id)}}" method="post">
        @csrf
        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-4">
              <div class="card-body text-center">
                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-chat/ava3.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3"></h5>
                <p class="text-muted mb-1">Full Stack Developer</p>
                <p class="text-muted mb-4"> address </p>
                <div class="d-flex justify-content-center mb-2">
                  <button type="submit" name="add_profile" class="btn btn-warning">Lưu hồ sơ</button>
                </div>
              </div>
            </div>
            <div class="card mb-4 mb-lg-0">
              <div class="card-body p-0">
                <ul class="list-group list-group-flush rounded-3">
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fas fa-globe fa-lg text-warning"></i>
                    <p class="mb-0">https://mdbootstrap.com</p>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                    <p class="mb-0">mdbootstrap</p>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                    <p class="mb-0">@mdbootstrap</p>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                    <p class="mb-0">mdbootstrap</p>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                    <p class="mb-0">mdbootstrap</p>
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
                    <input type="text" name="name" value="{{$only_customer->name}}" class="form-control" disabled placeholder="{{$only_customer->name}}">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Giới tính</p>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="gender[]" value="" class="form-control">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Địa chỉ Email</p>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="email" value="{{$only_customer->email}}" class="form-control" disabled placeholder="{{$only_customer->email}}">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Số điện thoại</p>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="phone[]" value="" class="form-control">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Di động</p>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="mobile[]" value="" class="form-control">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Địa chỉ</p>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="address[]" value="" class="form-control">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection