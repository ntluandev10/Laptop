<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="admin/home">Admin - @if(Auth::check()) {{Auth::user()->full_name}} @endif</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                @if(Auth::check())
                <li><a href="#"><i class="fa fa-user fa-fw"></i> {{Auth::user()->full_name}}</a>
                <li class="divider"></li>
                <li><a href="admin/user/sua/{{Auth::user()->id}}"><i class="fa fa-user fa-fw"></i> Thông tin cá nhân</a>
                </li>
                <li class="divider"></li>
                <li><a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i> đăng xuất</a>
                </li>
                @endif
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="admin/home"><i class="fa fa-dashboard fa-fw"></i> Quản trị</a>
                </li>
                <li>
                    <a href="admin/theloai/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> Thể loại<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/theloai/danhsach">Danh sách thể loại</a>
                        </li>
                        <li>
                            <a href="admin/theloai/them">Thêm thể loại</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="admin/sanpham/danhsach"><i class="fa fa-cube fa-fw"></i> Sản phẩm<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/sanpham/danhsach">Danh sách sản phẩm</a>
                        </li>
                        <li>
                            <a href="admin/sanpham/them">Thêm sản phẩm</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="admin/donhang/danhsach"><i class="fa fa-list-alt fa-fw"></i> Đơn hàng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/donhang/danhsach">Danh sách đơn hàng</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="admin/chitietdonhang/danhsach"><i class="fa fa-th-list fa-fw"></i> Chi tiết đơn hàng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/chitietdonhang/danhsach">Danh sách chi tiết đơn hàng</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="admin/khachhang/danhsach"><i class="fa fa-users fa-fw"></i> Khách hàng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/khachhang/danhsach">Danh sách khách hàng</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="admin/tintuc/danhsach"><i class="fa fa-newspaper-o fa-fw"></i> Tin tức<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/tintuc/danhsach">Danh sách tin tức</a>
                        </li>
                        <li>
                            <a href="admin/tintuc/them">Thêm tintuc</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="admin/slide/danhsach"><i class="fa fa-sliders fa-fw"></i> Slide<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/slide/danhsach">Danh sách slide</a>
                        </li>
                        <li>
                            <a href="admin/slide/them">Thêm slide</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="admin/user/danhsach"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/user/danhsach">Danh sách User</a>
                        </li>
                        <li>
                            <a href="admin/user/them">Thêm User</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>