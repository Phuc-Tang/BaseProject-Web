@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lý banner</h1>
            </div>
        </div>
    </div><!--/.row-->
    
    <div class="row">
        <div class="container">
            <div class="col-xs-12 col-md-5 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thêm banner
                    </div>

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

                    
                    <form method="post" action="{{URL::to('/save-banner')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="panel-body" >
                            <label>Banner</label>
                            <input required id="img" type="file" name="banner_image" class="form-control hidden" onchange="changeImg(this)">
                            <img id="avatar" class="thumbnail" width="300px" src="{{asset('public/backend/img/new_seo-10-512.png')}}">
                        </div>
                        
                        <div class="panel-body">
                            <div class="form-group">
                                <button type="submit" name="add_banner" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Thêm</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div><!--/.row-->

    
    <div class="row">
        <div class="container">
            <div class="col-xs-12 col-md-5 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Danh sách banner
                    </div>

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
                        <div class="bootstrap-table">
                            <table class="table table-bordered">
    
                                  <thead>
                                    <tr class="bg-primary">
                                      <th>STT</th>
                                      <th width="50%">Ảnh banner</th>
                                      <th>Ngày thêm</th>
                                      <th>Tùy chọn</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($banner as $bann)
                                    <tr>
                                        <td> {{$bann->banner_id}} </td>
                                        <td> <img src="{{ URL::to('public/storage/'.$bann->banner_image) }}"  width="200px" class="thumbnail"> </td>
                                        <td> {{$bann->created_at}} </td>
                    
                                        <td>
                                            <a href="{{URL::to('delete-banner/'.$bann->banner_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa thuộc tính của sản phẩm này không?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                  
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>
@endsection