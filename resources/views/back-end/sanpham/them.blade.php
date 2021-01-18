@extends('back-end.master')
@section('title')
Trang Thêm sản phẩm
@endsection
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
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
                <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="name" placeholder="Vui lòn nhập tên sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select name="idtype" class="form-control">
                            <option value="">Chọn thể loại</option>
                            @foreach($theloai as $tl)
                            <option value="{{$tl->id}}">{{$tl->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea class="form-control ckeditor" name="summary" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control ckeditor" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Đơn giá</label>
                        <input class="form-control" name="unitprice" placeholder="Vui lòn nhập đơn giá" />
                    </div>
                    <div class="form-group">
                        <label>Giá khuyến mãi</label>
                        <input class="form-control" name="promotionprice" placeholder="Vui lòn nhập giá khuyến mãi" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="image" id="">
                    </div>
                    <div class="form-group">
                        <label>Đơn vị</label>
                        <input class="form-control" name="unit" placeholder="Vui lòn nhập đơn vị" />
                    </div>
                    <div class="form-group">
                        <label>Nổi bật</label>
                        <label class="radio-inline">
                            <input name="new" value="1" checked="" type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="new" value="0" type="radio">Không
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm sản phẩm</button>
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