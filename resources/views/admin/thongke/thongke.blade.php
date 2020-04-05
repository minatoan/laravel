@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Thống kê</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{route('get-timkiem-theo-thongke',[$customer->matc, $customer->id])}}"
                            method="get">
                            <div class="form-group row">
                                <div class="col-sm-1.5" style="padding-right: 7px">
                                    <label class="col-form-label">Từ ngày</label>
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
                    <div class="row">

                        <div class="col-md-4">
                            <!-- Widget: user widget style 1 -->
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-success">
                                    <h3 class="widget-user-username">Bán hàng</h3>
                                    <h5 class="widget-user-desc">(order)</h5>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        @php
                                        $tongtien = 0;
                                        $tongsoly = 0;
                                        $tongbill = 0;
                                        @endphp
                                        @foreach($bill as $bi)
                                        <?php                                        
                                            $tsl[0] =  $bi->id;
                                            count($tsl);
                                            $tongbill += count($tsl);
                                            $tongtien += $bi->tongtien;

                                            $ctbill = DB::table('chitietbill')->where('mabill', $bi->id)->get();
                                            ?>
                                        @endforeach
                                        @foreach($chitietbill as $ctbill)
                                        <?php                                        
                                $tongsoly += $ctbill->soluong;
                                ?>

                                        @endforeach

                                        <?php 
                                        ?>

                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h4>{{($tongbill)}}</h4>
                                                <span class="description-text">Tổng số bill</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h4 class="">{{($tongsoly)}}</h4>
                                                <span class="description-text">Tổng lượng bán ra</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h4 class="">{{number_format($tongtien,0,",",".")}} VNĐ</h4>
                                                <span class="description-text">Tổng tiền bán ra</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                        <div class="col-md-4">
                            <!-- Widget: user widget style 1 -->
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                @php
                                $tongtienkho = 0;
                                $tongsospkho = 0;
                                $tongphieunhap = 0;
                                $tongsppn = 0;
                                @endphp
                                @foreach($phieunhap as $pnhap)
                                <?php                                        
                                            $tongsophieu[0] =  $pnhap->id;
                                            count($tongsophieu);
                                            $tongphieunhap += count($tongsophieu);
                                            $tongtienkho += $pnhap->tongtien;                                            
                                            ?>
                                @endforeach
                                @foreach($ctphieunhap as $ctpn)
                                <?php
                                // $tongsosanpham[0] =  $ctpn->mahang;
                                // count($tongsosanpham);
                                // $tongsppn += count($tongsosanpham);
                                $tongsospkho += $ctpn->soluong;
                                ?>
                                @endforeach
                                <div class="widget-user-header bg-info">
                                    <h3 class="widget-user-username">Nhập kho</h3>
                                    <h5 class="widget-user-desc">(Phiếu nhập)</h5>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h4>{{$tongphieunhap}}</h4>
                                                <span class="description-text">Tổng số phiếu nhập</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h4>{{$tongsospkho}}</h4>
                                                <span class="description-text">Tổng lượng nhập vào</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h4>{{number_format($tongtienkho,0,",",".")}} VNĐ</h4>
                                                <span class="description-text">Tổng tiền nhập vào</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>

                        <div class="col-md-4">
                            <!-- Widget: user widget style 1 -->
                            <div class="card card-widget widget-user">
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

                                <div class="widget-user-header bg-warning">
                                    <h3 class="widget-user-username">Lương</h3>
                                    <h5 class="widget-user-desc">(Lương nhân viên)</h5>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-12 border-center">
                                            <div class="description-block">
                                                <h4 class="">{{number_format($tong,0,",",".")}} VNĐ</h4>
                                                <span class="description-text">Tổng lương</span>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        {{-- <div class="col-sm-6 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header"></h5>
                                            <span class="description-text">Tổng lượng xuất ra</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div> --}}
                                        <!-- /.col -->
                                        <!-- <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">35</h5>
                                            <span class="description-text">PRODUCTS</span>
                                        </div>
                                    </div> -->
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                    </div>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                {{-- <div class="col-md-4">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fas fa-box"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Tổng tiền nhập kho</span>
                                        <span class="info-box-number">{{number_format($tongtienkho,0,",",".")}}
                                VNĐ</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Tổng tiền order</span>
                            <span class="info-box-number">{{number_format($tongtien,0,",",".")}} VNĐ</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div> --}}
                <?php
                            $a = $tongtien - $tongtienkho - $tong;
                            ?>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-donate"></i></span>

                        <div class="info-box-content">
                            <h4> <span class="info-box-text">Tổng danh thu = (Tổng tiền bán hàng - (Tổng tiền nhập kho +
                                    Tổng tiền lương) )</span> </h4>
                            <h5> <span class="description-text"> {{number_format($tongtien,0,",",".")}} - (
                                    {{number_format($tongtienkho,0,",",".")}} + {{number_format($tong,0,",",".")}} ) =
                                    {{number_format($a,0,",",".")}} VNĐ</span> </h5>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div>
        </section>
    </div>
</div>
<!-- Sửa -->

</div>
</div>
</div>



@endsection