@extends('layout.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Tính lương nhân viên</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#them">Thiết
                                lập lương</button>
                        </div>
                        <button class="btn btn-warning"> Công thức tính lương: [(Lương x Số giờ làm/ngày x Số ngày làm)
                            + Tiền thưởng] - tiền phạt = Tổng lương
                        </button>
                        <br>
                        </br>
                        <div class="table-responsive">

                            <table id="datatables" class="table table-bordered table-striped"
                                >
                                <thead class=" text-primary">
                                    <th>STT</th>
                                    <th>Tên nhân viên</th>
                                    <th>Ngày</th>
                                    <th>Lương</th>
                                    <th>Ca làm</th>
                                    <th>Số giờ làm/ngày</th>
                                    <th>Số ngày làm</th>
                                    <th>Tiền thưởng</th>
                                    <th>Tiền phạt</th>
                                    <th>Tổng lương</th>
                                    <th>Ghi chú</th>
                                    <th>Thao tác</th>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    $tinhgio = 0;
                                
                                    $tongluong = 0;
                                    @endphp

                                    <?php 
                                            $ctluong  = DB::table('tinhluong')->where('manv', $nhanvien->id)->orderBy('id', 'DESC')->get();
                                            // dd($ctluong);
                                        ?>

                                    @foreach($ctluong as $tl)
                                    <?php
                                                $ten = DB::table('nhanvien')->where('id', $tl->manv)->first(); 
                                                if($tl->giokt > $tl->giobd){
                                                    $tinhgio = abs(strtotime($tl->giokt) - strtotime($tl->giobd)) / 3600;
                                                }elseif($tl->giokt < $tl->giobd){
                                                    $tinhgio = 24 - abs(strtotime($tl->giokt) - strtotime($tl->giobd)) / 3600 ;
                                                }
                                                
                                                $tongluong = (($tl->luongcb * $tinhgio * $tl->songaylam) + $tl->tienthuong) - $tl->tienphat ;

                                    ?>
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$ten->tennv}}</td>
                                        <td>{{$tl->ngay}}</td>
                                        <td>{{number_format($tl->luongcb,0,",",".")}}/h </td>
                                        <td>{{$tl->calam}}</td>
                                        <td>{{$tinhgio}}h ({{$tl->giobd}}h - {{$tl->giokt}}h)</td>
                                        <td>{{$tl->songaylam}} ngày</td>
                                        <td>{{number_format($tl->tienthuong,0,",",".")}} VNĐ</td>
                                        <td>{{number_format($tl->tienphat,0,",",".")}} VNĐ</td>
                                        <td>{{number_format($tongluong,0,",",".")}} VNĐ</td>
                                        <td>{{$tl->ghichu}}</td>

                                        <td class="left">
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#sua{{$tl->id}}"><i class="far fa-edit"
                                                    style="color:black"> Cập nhật</i>
                                            </button>
                                            <a href="{{route('luong-xoa',$tl->id)}}"><button type="button"
                                                    class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                                </button>
                                            </a>
                                            
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sửa -->
            @include('admin.luongnv.sua')

            <!-- Đóng sửa -->
        </div>
        <!-- thêm -->
        @include('admin.luongnv.them')
        <!--đóng thêm -->
    </div>
</div>
@endsection