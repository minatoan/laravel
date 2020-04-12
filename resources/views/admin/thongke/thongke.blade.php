@extends('layout.admin')

@section('content')
<style>
    .btn-success{
        background-color: green !important;
    }
    .paginate_button a{
        background-color: red;
    }
</style>
<link rel="stylesheet" href="{{asset('dist/css/button/menu-hover-button.css')}}">
<div class="content">
    <div class="container-fluid">
        <div class="row">
        </div>
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
                            <div class="col-sd-1.5 "style="padding-right: 7px">
                                <label class="col-form-label" style="color: #ffffff">.</label>
                                <button type="submit" class="btn btn-info form-control">Tìm</button>
                            </div>
                            
                    </form>
                </div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-primary">
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
                                        @foreach($ctbill as $ctbilll)
                                        <?php                                        
                                            $tongsoly += $ctbilll->soluong;
                                            
                                        ?>
                                        @endforeach
                                        @endforeach

                                <?php 
                                        ?>
                               
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h4 >{{($tongbill)}}</h4>
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
                                            $ctpnn = DB::table('ctphieunhap')->where('maphieunhap', $pnhap->id)->get();
                                        
                                            ?>
                                            @foreach($ctpnn as $ctpnnn)
                                <?php
                                // $tongsosanpham[0] =  $ctpn->mahang;
                                // count($tongsosanpham);
                                // $tongsppn += count($tongsosanpham);
                                $tongsospkho += $ctpnnn->soluong;
                                ?>
                                @endforeach
                                @endforeach
                            <div class="widget-user-header bg-danger">
                                <h3 class="widget-user-username">Nhập kho</h3>
                                <h5 class="widget-user-desc">(Phiếu nhập)</h5>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h4>{{$tongphieunhap}}</h4>
                                            <span class="description-text">Tổng phiếu nhập</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h4 >{{$tongsospkho}}</h4>
                                            <span class="description-text">Tổng lượng nhập</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h4 >{{number_format($tongtienkho,0,",",".")}} VNĐ</h4>
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
                            </div> --}}
                            <?php
                            $a = $tongtien - $tongtienkho - $tong;
                            ?>
                            <!-- /.col -->
                            <div class="col-md-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-donate"></i></span>

                                    <div class="info-box-content">
                                       <h4> <span class="info-box-text">Tổng danh thu = (Tổng tiền bán hàng - (Tổng tiền nhập kho + Tổng tiền lương) )</span> </h4>
                                       <h5> <span class="description-text">         {{number_format($tongtien,0,",",".")}}   -   ( {{number_format($tongtienkho,0,",",".")}} + {{number_format($tong,0,",",".")}} ) =    {{number_format($a,0,",",".")}} VNĐ</span> </h5>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <!-- BAR CHART -->

                            

                            <br>

             <div class="card card-secondary    " style="width: 100%">
                <div class="card-header">
                  <h3 class="card-title">Biểu đồ thu chi (năm : 2020)</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="barChart" style="min-height: 700px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
           
                        </div>
                    </div>
                </section>
            </div>
        </div>
            <!-- Sửa -->

        </div>
    </div>
    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script>
        $(document).ready(()=>{
            var tongdoanhthu = <?php echo json_encode($tongdoanhthu); ?>;
            var tongtiennhaphang = <?php echo json_encode($tongtiennhaphang); ?>;
            var tongluongnv = <?php echo json_encode($tongluongnv); ?>;
            console.log(tongtiennhaphang);
            
            console.log(tongluongnv);
            
            $(function () {
            var data_chart_doanhthu = [];
            var data_chart_tongchi=[];
            for (let thang=1; thang<=12; thang++){
                data_chart_doanhthu.push(tongdoanhthu[thang-1].tongtien);
                data_chart_tongchi.push(tongtiennhaphang[thang-1].tongtien + tongluongnv[thang-1]);
            }
            console.log(data_chart_tongchi);
            
            
          /* ChartJS
           * -------
           * Here we will create a few charts using ChartJS
           */
      
          //--------------
          //- AREA CHART -
          //--------------
      
          // Get context with jQuery - using jQuery's .get() method.
        //   var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
      
          var areaChartData = {
            labels  : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [
              {
                label               : 'Doanh thu',
                backgroundColor     : '#0035c5',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : data_chart_doanhthu
              },
              {
                label               : 'Chi',
                backgroundColor     : '#e21010',
                borderColor         : 'rgba(210, 214, 222, 1)',
                pointRadius         : false,
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#e21010',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : data_chart_tongchi
              },
            ]
          }
      
          var areaChartOptions = {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
              display: false
            },
            scales: {
              xAxes: [{
                gridLines : {
                  display : false,
                }
              }],
              yAxes: [{
                gridLines : {
                  display : false,
                }
              }]
            }
          }
      
        //   // This will get the first returned node in the jQuery collection.
        //   var areaChart       = new Chart(areaChartCanvas, { 
        //     type: 'line',
        //     data: areaChartData, 
        //     options: areaChartOptions
        //   })
      
      
          //-------------
          //- BAR CHART -
          //-------------
          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChartData = jQuery.extend(true, {}, areaChartData)
          var temp0 = areaChartData.datasets[0]
          var temp1 = areaChartData.datasets[1]
          barChartData.datasets[0] = temp1
          barChartData.datasets[1] = temp0
      
          var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
          }
      
          var barChart = new Chart(barChartCanvas, {
            type: 'bar', 
            data: barChartData,
            options: barChartOptions
          })
      
          //---------------------
          //- STACKED BAR CHART -
          //---------------------
          var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
          var stackedBarChartData = jQuery.extend(true, {}, barChartData)
      
          var stackedBarChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            scales: {
              xAxes: [{
                stacked: true,
              }],
              yAxes: [{
                stacked: true
              }]
            }
          }
      
          var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar', 
            data: stackedBarChartData,
            options: stackedBarChartOptions
          })
        });
        });
        
      </script>
</div>





@endsection