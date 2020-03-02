@extends('layout.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ul class="fc-color-picker" id="color-chooser">
                    <li><a class="text-muted"><i class="fas fa-square"></i></a> Trống</li>
                    <li><a class="text-danger"><i class="fas fa-square"></i></a> Đặt trước</li>
                </ul>
            </div><!-- /.col -->
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-body p-0">
                        <!-- THE CALENDAR -->
                        <div class="card-body">
                            <!-- code ..... -->
                            @foreach($tenban as $od)
                            <div style="float:left; width: 30px; margin-right:50px; margin-bottom: 10px">
                                <a href="{{route('hien-thi',$od->id)}}"><button type="button"
                                        class="btn btn-primary">{{ $od->tenban }}</button>
                                    </a>
                            </div>
                            @endforeach
                        </div>
                        <!-- code ..... -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <!-- /.billllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll -->
            <div class="col-md-4">
                <div class="sticky-top mb-3">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bill</h3>
                        </div>
                        <div class="card-body">
                            <span>
                                <h3 align="center">COFFE GOOD</h3>
                                <h6 align="center">ĐC: 43/90 Đường 3/2, Phường Xuân Khánh <br> Quận Ninh Kiều, TP Cần Thơ
                                    <br>ĐT: 0900 000 000 <br>--------------------------------</h6>
                                <h4 align="center">PHIẾU TẠM TÍNH</h4>
                                <h5 align="center" ></h5>
                            </span>

                            <label class="col-form-label">Thu ngân: </label>

                            <div class="table-responsive">
                                <table  class="table table-bordered table-striped table-hover">
                                    <thead class=" text-dark">
                                        <th>Tên</th>
                                        <th>SL</th>
                                        <th>Giá</th>
                                        <th>Thành tiền</th>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <h5 align="right"> Tổng tiền: </h5>
                            <h6 align="center">Xin cảm ơn Quý Khách! (^^)</h6>
                            <!-- code ... -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.colllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll -->
            <div class="col-md-3">
                <div class="sticky-top mb-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Đồ uống</h4>

                        </div>
                        <div class="card-body">
                            <!-- the events -->
                            <div class="input-group">
                                @foreach($loaimon as $lm)
                                <?php 
                                                    $loaidouong = DB::table('menu')->where('maloaimon', $lm->id)->get();
                                                    // echo "<pre>";
                                                    // print_r($loaidouong->toArray());
                                                    // echo "</pre>";
                                                    ?>
                                <nav class="mt-2">
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                        data-accordion="false">
                                        <li class="nav-item has-treeview">
                                            <a class="nav-link">
                                                <p>
                                                    <button type="button"
                                                        class="btn " style="background-color:#6610f2; color:#fff">{{ $lm->tenloaimon }}</button>

                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                   
                                                        <p>
                                                            <table id="tables" class="table  table-striped">
                                                                <thead class=" text-dark">
                                                                    <th>Tên</th>
                                                                    <th>Giá</th>
                                                                    <th>#</th>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($loaidouong as $lmn)
                                                                    <tr>
                                                                        <td>{{$lmn->tenmon}}</td>

                                                                        <td>{{number_format($lmn->dongia,0,",",".")}}
                                                                        </td>

                                                                        
                                                                            <td class="right">
                                                                                <button type="submit" class="btn"><i
                                                                                        class="fa fa-plus"></i></button>
                                                                            </td>
                                                                        
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </p>
                                                    
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                                @endforeach

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>


<!-- /.content -->

@endsection