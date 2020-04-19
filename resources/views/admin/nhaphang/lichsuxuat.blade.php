@extends('layout.admin')

@section('content')
<link rel="stylesheet" href="{{asset('dist/css/button/menu-hover-button.css')}}">

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-dark font-weight-bold">Lịch sử xuất hàng</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('get-donxuathang-theo-tochuc',[$customer->matc, $customer->id])}}"
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

                            <button class="dropbtn btn btn-dark form-control">Xuất excel</button>
                            <div class="dropdown-content">
                                <a data-toggle="modal" data-target="#phieuxuat">In phiếu</a>
                            </div>
                        </div>
                    </div>
                        <!-- <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" style="width:290px">
                                <thead class=" text-primary">
                                    <th>Tổng số đơn</th>
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                   
                                    $tongdon = 0;
                                    @endphp
                                    @foreach($phieuxuat as $pxuat)
                                    
                                    @endforeach
                                    <tr>
                                        <td>{{($tongdon)}} đơn</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> -->
                    <div class="table-responsive">
                        <table id="datatables" class="table table-bordered table-striped table-hover">

                            <thead class=" text-primary">
                                <th>STT</th>
                                <th>Tên nhân viên</th>
                                <th>Ngày xuất</th>                                
                                <th>Tổ chức</th>
                                <th>Thao tác</th>
                                </th>
                            </thead>
                            <tbody>
                                @php
                                $i=0;
                                @endphp
                                @foreach($phieuxuat as $pxuat)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$pxuat->nhanvien->tennv}}</td>
                                    <td>{{$pxuat->ngayxuat}}</td>
                                    <td>{{$pxuat->tochuc->tentc}}</td>

                                    <td class="left">
                                        <a>
                                            <button type="button" class="btn " data-toggle="modal"
                                                data-target="#showct{{$pxuat->id}}" style="background-color:#605ca8;"><i
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
        
        @include('admin.nhaphang.chitietxuat')
        <!-- Đóng sửa -->
        @include('admin.nhaphang.printphieuxuat')

    </div>
</div>
</div>


@endsection