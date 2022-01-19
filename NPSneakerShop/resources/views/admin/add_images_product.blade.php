@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <h1 class="page-header">Ảnh chi tiết sản phẩm</h1>
            </div>
        </div>
    </div><!--/.row-->
    
    <div class="row">
        <div class="container">
            <div class="col-xs-12 col-md-5 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Danh sách ảnh
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

                    <form action=" {{URL::to('/insert-images/'.$pro_id)}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3" align="right"></div>
                            <div class="col-md-6">
                                <input type="file" class="form-control" id="#file" name="file[]" accept="image/*" multiple>
                                <span id="error_gallery"></span>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" name="upload" name="taianh" value="Tải ảnh" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                    
                    <div class="panel-body">
                        <input type="hidden" value=" {{$pro_id}} " name="pro_id" class="pro_id">
                        <form>
                            @csrf
                            <div class="bootstrap-table" id="gallery_load">

                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>
@endsection