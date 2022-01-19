@extends('admin_layout')
@section('admin_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <h1 class="page-header">Phí vận chuyển</h1>
            </div>
        </div>
    </div><!--/.row-->
    
    <div class="row">
        <div class="container">
            <div class="col-xs-12 col-md-5 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thêm phí vận chuyển
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

                    <form action=" {{URL::to('/insert-delivery')}} " method="post">
                        @csrf
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Chọn thành phố:</label>
                                <select name="city" class="form-control input-sm m-5 choose city" id="city">
                                    <option value="">---Chọn tỉnh thành phố---</option>
                                    @foreach ($city as $key => $ci)
                                    <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Chọn quận huyện:</label>
                                <select name="province" class="form-control input-sm m-5 province choose" id="province">
                                    <option value="">---Chọn quận huyện---</option>
                                </select>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Chọn xã phường:</label>
                                <select name="wards" class="form-control input-sm m-5 wards" id="wards">
                                    <option value="">---Chọn xã phường---</option>
                                </select>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Phí vận chuyển:</label>
                                <input type="text" name="fee_ship" class="form-control fee_ship">
                            </div>
                            <button type="button" name="add_delivery" class="btn btn-primary add_delivery"> Thêm</button>
                        </div>
                    </form>
                </div>
                <div id="load_delivery">

                </div>
        </div>
        </div>
    </div><!--/.row-->
</div>
@endsection