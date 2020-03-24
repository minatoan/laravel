@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lịch sử bill</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('get-likebill-theo-tochuc',[$customer->matc, $customer->id])}}"
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
                                    <button type="submit" class="btn btn-primary form-control">Tìm</button>
                                </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table id="datatables" class="table table-bordered table-striped table-hover">

                            <thead class=" text-primary">
                                <th>STT</th>
                                <th>Tên nhân viên</th>
                                <th>Ngày tạo</th>
                                <th>Bàn</th>
                                <th>Tổ chức</th>
                                <th>Thao tác</th>
                                </th>
                            </thead>
                            <tbody>
                                @php
                                $i=0;
                                @endphp
                                @foreach($bill as $bbl)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$bbl->nhanvien->tennv}}</td>
                                    <td>{{$bbl->ngaytao}}</td>
                                    <td>{{$bbl->ban->tenban}}</td>
                                    <td>{{$bbl->ban->tochuc->tentc}}</td>

                                    <td class="left">
                                        <a>
                                            <button type="button" class="btn " data-toggle="modal"
                                                data-target="#showct{{$bbl->id}}" style="background-color:#605ca8;"><i
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
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Thống kê bill</h4>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" style="width:290px">
                                <thead class=" text-primary">
                                    <th>Tổng số bill</th>
                                    <th>Tổng tiền bán ra</th>
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                    $ttt = 0;
                                    $tongbill = 0;
                                    @endphp
                                    @foreach($bill as $bi)
                                    <?php                                        
                                        $ttt +=  $bi->tongtien ;
                                        $tsl[0] =  $bi->id;
                                        count($tsl);
                                        $tongbill += count($tsl);
                                        ?>
                                    @endforeach
                                    <tr>
                                        <td>{{($tongbill)}} bill</td>
                                        <td>{{number_format($ttt,0,",",".")}} VNĐ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Sửa -->
        <!-- Modal -->
        @include('admin.order.chitietbill')

        <!-- Đóng sửa -->
    </div>
</div>
</div>


@endsection