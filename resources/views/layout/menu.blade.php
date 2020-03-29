<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('order-get', $customer->matc)}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Coffee</span>
    </a>
    <base href="{{asset('')}}">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            
            @if($customer->quyen == '1')
                <div class="info">
                <a class="d-block">Admin: {{$customer->tennv}}</a>
                </div>
            @elseif($customer->quyen == '0')
                <div class="info">
                <a  class="d-block">Nhân viên: {{$customer->tennv}}</a>
                </div>
            @endif
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                

                <li class="nav-item">
                    <a href="admin/tochuc" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>                        
                        <p>
                            Tổ chức
                            {{-- <span class="right badge badge-danger">New</span> --}}
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
                            <a href="{{route('get-loaiban-theo-tochuc', [$customer->matc, $customer->id])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loại bàn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-ban-theo-tochuc', [$customer->matc, $customer->id])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bàn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-loaimon-theo-tochuc', [$customer->matc, $customer->id])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loại món</p>
                            </a>
                        </li>                        
                        <li class="nav-item">
                            <a href="{{route('get-menu-theo-tochuc', [$customer->matc, $customer->id])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-ncc-theo-tochuc', [$customer->matc, $customer->id])}}" class="nav-link">
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
                            <a href="{{route('get-nhanvien-theo-tochuc', [$customer->matc, $customer->id])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thông tin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tính lương</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-header">CHỨC NĂNG</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Trang chủ
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="admin/order/{{$customer->matc}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trang order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-bill-theo-tochuc', [$customer->matc, $customer->id])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chi tiết bill</p>
                            </a>
                        </li>                        
                    </ul>
                </li>
                
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                        <p>
                            Kho
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('get-hanghoa-theo-tochuc', [$customer->matc, $customer->id])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nguyên liệu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-nhaphang-theo-tochuc', [$customer->matc, $customer->id])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhập kho</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-donnhap-theo-tochuc', [$customer->matc, $customer->id])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lịch sử nhập kho</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Xuất kho</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lịch sử xuất kho</p>
                            </a>
                        </li>                    
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Thống kê
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/examples/invoice.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/profile.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/e_commerce.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E-commerce</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/projects.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project_add.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project_edit.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Edit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project_detail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Detail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/contacts.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contacts</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Extras
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/examples/login.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Login</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/register.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Register</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/forgot-password.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Forgot Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/recover-password.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Recover Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/lockscreen.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lockscreen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Legacy User Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/language-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Language Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/404.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 404</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/500.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 500</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/pace.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pace</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/blank.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blank Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Starter Page</p>
                            </a>
                        </li>
                    </ul>
                </li> -->
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>