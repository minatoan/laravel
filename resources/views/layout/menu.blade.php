<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('order-get', $customer->matc)}}" class="brand-link">
        <!-- <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">            -->
        <i class="fas fa-mug-hot" style="padding-left:30px"><span class="brand-text font-weight-light">
                {{$customer->tochuc->tentc}}</span></i>
    </a>
    <base href="{{asset('')}}">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            @if($customer->quyen == '1')
            <div class="info">
                <a class="d-block">Chủ quán: {{$customer->tennv}}</a>
            </div>
            @elseif($customer->quyen == '0')
            <div class="info">
                <a class="d-block">Thu ngân: {{$customer->tennv}}</a>
            </div>
            @else($customer->quyen == '2')
            <div class="info">
                <a class="d-block">Admin: {{$customer->tennv}}</a>
            </div>
            @endif
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            @if($customer->quyen == '2')

                <li class="nav-item">
                    <a href="admin/tochuc" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Tổ chức

                        </p>
                    </a>
                </li>

                

                <li class="nav-item">
                    <a href="admin/admin" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Nhân viên

                        </p>
                    </a>
                </li>
                @endif
                @if($customer->quyen == '1' or $customer->quyen == '0')
                <li class="nav-item">
                    <a href="{{route('get-nhanvien-theo-tochucnhanvien', [$customer->matc, $customer->id])}}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Tổ chức

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-th"></i>
                        <p>Danh mục
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('get-loaiban-theo-tochuc', [$customer->matc, $customer->id])}}"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loại bàn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-ban-theo-tochuc', [$customer->matc, $customer->id])}}"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bàn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-loaimon-theo-tochuc', [$customer->matc, $customer->id])}}"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loại món</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-menu-theo-tochuc', [$customer->matc, $customer->id])}}"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-ncc-theo-tochuc', [$customer->matc, $customer->id])}}"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhà cung cấp</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Nhân viên
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('get-nhanvien-theo-tochuc', [$customer->matc, $customer->id])}}"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thông tin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-lichsuluong-theo-tochuc', [$customer->matc, $customer->id])}}"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lương nhân viên</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">CHỨC NĂNG</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            Bán hàng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('order-get', [$customer->matc])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trang order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-bill-theo-tochuc', [$customer->matc, $customer->id])}}"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chi tiết bill</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>
                            Kho
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('get-hanghoa-theo-tochuc', [$customer->matc, $customer->id])}}"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nguyên liệu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-nhaphang-theo-tochuc', [$customer->matc, $customer->id])}}"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhập kho</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-donnhap-theo-tochuc', [$customer->matc, $customer->id])}}"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lịch sử nhập kho</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-xuathang-theo-tochuc', [$customer->matc, $customer->id])}}"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Xuất kho</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-donxuat-theo-tochuc', [$customer->matc, $customer->id])}}"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lịch sử xuất kho</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">

                    <a href="{{route('get-thongke-theo-tochuc', [$customer->matc, $customer->id])}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Thống kê
                        </p>
                    </a>
                </li>

                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>