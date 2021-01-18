@extends('back-end.master')
@section('title')
Trang danh sách đươn hàng
@endsection
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn hàng
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
                        <th>Tên khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Hình thức thanh toán</th>
                        <th>Ghi chú</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donhang as $dh)
                    <tr class="even gradeC" align="center">
                        <td>{{$dh->id}}</td>
                        <td>{{$dh->bill->name}}</td>
                        <td>{{$dh->date_order}}</td>
                        <td>{{$dh->total}}</td>
                        <td>{{$dh->payment}}</td>
                        <td>{{$dh->note}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/donhang/xoa/{{$dh->id}}"> Xóa</a></td>
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