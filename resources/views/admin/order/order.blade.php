@extends('layout.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <ul class="fc-color-picker" id="color-chooser">
                    <li><a class="text-primary"><i class="fas fa-square"></i></a> Trống</li>
                    <li><a class="text-danger"><i class="fas fa-square"></i></a> Có khách</li>
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
                <div class="card card-primary card-outline">
                    <div class="card-body p-0">
                        <!-- THE CALENDAR -->
                        <div class="card-body">
                            <!-- code ..... -->
                            <span>
                            @foreach($loaiban as $lb)
                                <button style="border: none; text-align: left; font-size: 20px;" class="form-control"  >Bàn {{$lb->tenloaiban}}</button>

                                    <?php 
                                    $tenban = DB::table('ban')->where('maloaiban', $lb->id)->get();   
                                    ?>
                            @foreach($tenban as $od)
                            <div style="float:left; width: 30px; margin-right:70px; margin-bottom: 10px; padding-left:12px">
                                <a href="{{route('hien-thi',[$customer->matc, $od->id])}}"><button type="button"
                                        class="btn btn-primary">{{ $od->tenban }}</button>
                                </a>
                            </div>
                            @endforeach
                            @endforeach
                            </span>
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
                    <div class="card card-outline card-success">

                        <div class="card-header">
                            <h3 class="card-title text-dark font-weight-bold">Bill</h3>
                        </div>
                        <div class="card-body">
                            <span>

                                <h3 align="center">{{$tochuc->tentc}}</h3>
                                <h6 align="center">ĐC: {{$tochuc->diachi}}
                                    <br>--------------------------------</h6>
                                <h4 align="center">PHIẾU TẠM TÍNH</h4>
                            </span>
                            <label class="col-form-label">Thu ngân: </label>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class=" text-dark">
                                        <th>Tên</th>
                                        <th>SL</th>
                                        <th>Giá</th>
                                        <th>T.Tiền</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <h5 align="right"> Tổng tiền: </h5>
                            <!-- code ... -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.colllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll -->
            <div class="col-md-3">
                <div class="sticky-top mb-3">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h4 class="card-title text-dark font-weight-bold">Đồ uống</h4>
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
                                                    <button type="button" class="btn btn-success">{{ $lm->tenloaimon }}</button>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <p>
                                                        <table id="table" class="table  table-striped">
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