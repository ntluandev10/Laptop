@extends('back-end.master')
@section('title')
Trang sửa user
@endsection
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Sửa {{$user->full_name}}</small>
                </h1>
            </div>
            <div class="col-lg-12">
                @if ($message = Session::get('thongbao'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Lỗi!</strong> Vui lòng xem lại.
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/user/sua/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label>họ và tên</label>
                        <input class="form-control" value="{{$user->full_name}}" name="fullname" placeholder="Vui lòng nhập tên" />
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input class="form-control" readonly="" value="{{$user->email}}" name="email" placeholder="Vui lòng nhập email" />
                    </div>
                    <div class="form-group">
                        <label><input type="checkbox" name="changePassword" id="changePassword"> Đổi password</label>
                        <input class="form-control password" disabled="" type="password" name="password" placeholder="Vui lòng nhập password" />
                    </div>
                    <div class="form-group">
                        <label>password Again</label>
                        <input class="form-control password" disabled="" type="password" name="passwordAgain" placeholder="Vui lòng nhập  lại password" />
                    </div>
                    <div class="form-group">
                        <label>Quyền hạn</label>
                        <label class="radio-inline">
                            <input name="level" value="1"
                            @if($user->level == 1)
                            {{"checked"}}
                            @endif
                             type="radio">ADMIN
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="0"
                            @if($user->level == 0)
                            {{"checked"}}
                            @endif
                            type="radio">KHÁCH
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" value="{{$user->phone}}" name="phone" placeholder="Vui lòng nhập phone" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" value="{{$user->address}}" name="address" placeholder="Vui lòng nhập address" />
                    </div>
                    <button type="submit" class="btn btn-default">Sửa user</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if ($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                } else {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection