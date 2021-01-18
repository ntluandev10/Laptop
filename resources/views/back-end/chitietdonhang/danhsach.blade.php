@extends('back-end.master')
@section('title')
Trang danh sách chi tiết đơn hàng
@endsection
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết đơn hàng
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chitietdonhang as $ctdh)
                    <tr class="even gradeC" align="center">
                        <td>{{$ctdh->id}}</td>
                        <td>{{$ctdh->id_bill}}</td>
                        <td>{{$ctdh->product->name}}</td>
                        <td>{{$ctdh->quantity}}</td>
                        <td>{{$ctdh->unit_price}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/chitietdonhang/xoa/{{$ctdh->id}}"> Xóa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection