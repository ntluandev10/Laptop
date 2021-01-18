@extends('back-end.master')
@section('title')
Trang Thêm user
@endsection
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Thêm</small>
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
                <form action="admin/user/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label>họ và tên</label>
                        <input class="form-control" name="fullname" placeholder="Vui lòng nhập tên" />
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input class="form-control" name="email" placeholder="Vui lòng nhập email" />
                    </div>
                    <div class="form-group">
                        <label>password</label>
                        <input class="form-control password" type="password" name="password" placeholder="Vui lòng nhập password" />
                    </div>
                    <div class="form-group">
                        <label>password Again</label>
                        <input class="form-control password" type="password" name="passwordAgain" placeholder="Vui lòng nhập  lại password" />
                    </div>
                    <div class="form-group">
                        <label>Quyền hạn</label>
                        <label class="radio-inline">
                            <input name="level" value="1" checked="" type="radio">ADMIN
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="0" type="radio">KHÁCH
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm user</button>
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