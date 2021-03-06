@extends('layout.admin')

@section('content')
<link rel="stylesheet" href="{{asset('dist/css/button/menu-hover-button.css')}}">

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-dark font-weight-bold">Lịch sử nhập hàng</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('get-donnhaphang-theo-tochuc',[$customer->matc, $customer->id])}}"
                            method="get">
                            <div class="form-group row">
                                <div class="col-sm-1.5" style="padding-right: 7px">
                                    <label class="col-form-label">Tìm từ ngày</label>
                                    <input type="date" name="dateform" class="form-control">
                                </div>
                                <div class="col-sm-1.5 " style="padding-right: 7px">
                                    <label class="col-form-label">Đến ngày</label>
                                    <input type="date" name="dateto" class="form-control">
                                </div>
                                <div class="col-sd-1.5 ">
                                    <label class="col-form-label" style="color: #ffffff">.</label>
                                    <button type="submit" class="btn btn-outline-primary form-control">Tìm</button>
                                </div>

                        </form>
                        <div class="col-sd-2 dropdown" style="padding-left: 7px">
                            <label class="col-form-label" style="color: #ffffff">.</label>

                            <button class="dropbtn btn btn-dark form-control">Xuất file</button>
                            <div class="dropdown-content">
                                <a data-toggle="modal" data-target="#nhaphang">In phiếu</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" style="width:290px">
                            <thead class=" text-primary">
                                <th>Tổng số đơn</th>
                                <th>Tổng tiền nhập vào</th>
                                </th>
                            </thead>
                            <tbody>
                                @php
                                $ttt = 0;
                                $tongdon = 0;
                                $tongsospkho = 0;
                                @endphp
                                @foreach($phieunhap as $pnhap)
                                <?php                                        
                                        $ttt +=  $pnhap->tongtien ;
                                        $tsl[0] =  $pnhap->id;
                                        count($tsl);
                                        $tongdon += count($tsl);
                                        ?>
                                @endforeach

                                <tr>
                                    <td>{{($tongdon)}} đơn</td>

                                    <td>{{number_format($ttt,0,",",".")}} VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table id="datatables" class="table table-bordered table-striped table-hover">

                            <thead class=" text-primary">
                                <th>STT</th>
                                <th>Tên nhân viên</th>
                                <th>Ngày nhập</th>
                                <th>Tổ chức</th>
                                <th>Nhà cung cấp</th>
                                <th>Ghi chú</th>

                                <th>Thao tác</th>
                                </th>
                            </thead>
                            <tbody>
                                @php
                                $i=0;
                                @endphp
                                @foreach($phieunhap as $pnhap)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$pnhap->nhanvien->tennv}}</td>
                                    <td>{{$pnhap->ngaynhap}}</td>
                                    <td>{{$pnhap->tochuc->tentc}}</td>
                                    <td>{{$pnhap->nhacungcap->tenncc}}</td>
                                    <td>{{$pnhap->nhacungcap->ghichu}}</td>
                                    <td class="left">
                                        <a>
                                            <button type="button" class="btn " data-toggle="modal"
                                                data-target="#showct{{$pnhap->id}}" style="background-color:#605ca8;"><i
                                                    class="fas fa-copy" style="color:#ffffff"> Xem chi tiết</i>
                                            </button> </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </form>
                    <br>
                    <!-- bang thong ke -->

                </div>

            </div>
        </div>
        <!-- Sửa -->
        <!-- Modal -->

        @include('admin.nhaphang.chitietnhap')
        <!-- Đóng sửa -->
        @include('admin.nhaphang.printnhaphang')

    </div>
</div>
</div>


@endsection