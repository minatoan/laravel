@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Thống kê</h1>
                            </div>

                        </div>
                    </div><!-- /.container-fluid -->
                </section>
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
                                            <h5 class="description-header">{{($tongbill)}}</h5>
                                            <span class="description-text">Tổng số bill</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">{{($tongsoly)}}</h5>
                                            <span class="description-text">Tổng lượng bán ra</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">{{number_format($tongtien,0,",",".")}} VNĐ</h5>
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
                                            <h5 class="description-header">{{$tongphieunhap}}</h5>
                                            <span class="description-text">Tổng số phiếu nhập</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">{{$tongsospkho}}</h5>
                                            <span class="description-text">Tổng lượng nhập vào</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">{{number_format($tongtienkho,0,",",".")}} VNĐ</h5>
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
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            @php
                                        $tongsospkhoxuat = 0;
                                        $tongphieuxuat = 0;
                            @endphp
                            @foreach($phieuxuat as $pxuat)
                                            <?php                                        
                                            $tsphieu[0] =  $pxuat->id;
                                            count($tsphieu);
                                            $tongphieuxuat += count($tsphieu);
                                            ?>
                                @endforeach
                                @foreach($ctphieuxuat as $ctpx)
                                <?php    

                                $tongsospkhoxuat += $ctpx->soluong;
                                ?>
                                @endforeach
                            <div class="widget-user-header bg-warning">
                                <h3 class="widget-user-username">Xuất kho</h3>
                                <h5 class="widget-user-desc">(Phiếu xuất)</h5>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">{{$tongphieuxuat}}</h5>
                                            <span class="description-text">Tổng số phiếu xuất</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">{{$tongsospkhoxuat}}</h5>
                                            <span class="description-text">Tổng lượng xuất ra</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
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
                            <div class="col-md-4">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fas fa-box"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Tổng tiền nhập kho</span>
                                        <span class="info-box-number">{{number_format($tongtienkho,0,",",".")}} VNĐ</span>
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
                            </div>
                            <?php
                            $a = $tongtien - $tongtienkho;
                            ?>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <div class="info-box">
                                    <span class="info-box-icon bg-danger"><i class="fas fa-donate"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Tổng danh thu</span>
                                        <span class="info-box-number">{{number_format($a,0,",",".")}} VNĐ</span>
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
            <!-- Sửa -->

        </div>
    </div>
</div>



@endsection