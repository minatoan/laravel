@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lịch sử Lương</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('get-timkiem-theo-luong',[$customer->matc, $customer->id])}}"
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
                        <table class="table table-bordered table-striped table-hover" style="width:290px">
                            <thead class=" text-primary">
                                <th>Tổng tiền lương phải trả</th>
                                </th>
                            </thead>
                            <tbody>
                                @php
                                $ttt = 0;
                                $tong = 0;
                                @endphp 
                                @foreach($tinhluong as $tl)
                                <?php
                                                if($tl->giokt > $tl->giobd){
                                                    $tinhgio = abs(strtotime($tl->giokt) - strtotime($tl->giobd)) / 3600;
                                                }elseif($tl->giokt < $tl->giobd){
                                                    $tinhgio = 24 - abs(strtotime($tl->giokt) - strtotime($tl->giobd)) / 3600 ;
                                                }                                                
                                                $tongluong = (($tl->luongcb * $tinhgio * $tl->songaylam) + $tl->tienthuong) - $tl->tienphat ;
                                                $tong += $tongluong
                                    ?>
                                @endforeach
                                <tr>
                                    <td>{{number_format($tong,0,",",".")}} VNĐ</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table id="datatables" class="table table-bordered table-striped table-hover">

                            <thead class=" text-primary">
                                <th>STT</th>
                                <th>Tên nhân viên</th>
                                <th>Ngày</th>
                                <th>Lương cơ bản</th>
                                <th>Ca làm</th>
                                <th>Số ngày làm</th>
                                <th>Tiền thưởng</th>
                                <th>Tiền phạt</th>
                                <th>Tổng lương</th>
                                </th>
                            </thead>
                            <tbody>
                                @php
                                $i=0;
                                $tongluong = 0;

                                @endphp
                                @foreach($tinhluong as $tl)
                                <?php
                                                if($tl->giokt > $tl->giobd){
                                                    $tinhgio = abs(strtotime($tl->giokt) - strtotime($tl->giobd)) / 3600;
                                                }elseif($tl->giokt < $tl->giobd){
                                                    $tinhgio = 24 - abs(strtotime($tl->giokt) - strtotime($tl->giobd)) / 3600 ;
                                                }
                                                
                                                $tongluong = (($tl->luongcb * $tinhgio * $tl->songaylam) + $tl->tienthuong) - $tl->tienphat ;

                                    ?>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$tl->nhanvien->tennv}}</td>
                                    <td>{{$tl->ngay}}</td>
                                    <td>{{number_format($tl->luongcb,0,",",".")}}/h </td>
                                    <td>{{$tl->calam}} // {{$tl->giobd}}h - {{$tl->giokt}}h ({{$tinhgio}}h)</td>
                                    <td>{{$tl->songaylam}}</td>
                                    <td>{{number_format($tl->tienthuong,0,",",".")}} VNĐ</td>
                                    <td>{{number_format($tl->tienphat,0,",",".")}} VNĐ</td>
                                    <td>{{number_format($tongluong,0,",",".")}} VNĐ</td>






                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </form>
                    <br>

                </div>

            </div>
        </div>
        <!-- Sửa -->
        <!-- Modal -->

        <!-- Đóng sửa -->
    </div>
</div>
</div>


@endsection