@extends('layout.admin')
@extends('layout.menu')
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
                <div class="sticky-top mb-3">
                    <div class="card card-primary card-outline">
                        <!-- THE CALENDAR -->
                        <div class="card-body">
                            <!-- code ..... -->
                            <span>
                                @foreach($loaiban as $lb)
                                <h5 style="float:left; padding-right:75%; margin-bottom: 10px">Bàn {{$lb->tenloaiban}}
                                    <br></h5>
                                <?php 
                                        $tenban = DB::table('ban')->where('maloaiban', $lb->id)->get();   
                                        foreach (Cart::getContent() as $key => $value){
                                        
                                        }
                                    ?>
                                <!-- <style>
                                        button[id="61"] {
                                            color:red;
                                        }
                                    </style>  -->
                                @foreach($tenban as $od)
                                <div style="float:left; width: 30px; margin-right:70px; margin-bottom: 10px">
                                    <a href="{{route('hien-thi',[$customer->matc, $od->id])}}" ><button
                                            type="button" class="btn btn-info b" id="{{$od->id}}">{{ $od->tenban }}</button>
                                    </a>
                                </div>  
                                @foreach($cart as $value)
                                    @if(($value['attributes']['id_ban'] == $od->id))
                                    <style>
                                        button[id|="{{$id_ban->id}}"] {
                                            background-color:red;
                                        }
                                    </style>                                    
                                    @endif
                                    @endforeach                              
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
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Bill </h3>
                        </div>
                        <div class="card-body">
                            <span>
                                <h3 align="center">{{$tochuc->tentc}}</h3>
                                <h6 align="center">ĐC: {{$tochuc->diachi}}
                                    <br>--------------------------------</h6>
                                <h4 align="center">PHIẾU TẠM TÍNH</h4>
                                <h5 align="center">{{$id_ban->tenban}}</h5>
                                <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                    <input style="text-align: center;border: none" class="form-control" type="text">
                                    <span class="input-group-addon"></span>
                                </div>
                            </span>

                            <label class="col-form-label">
                                <?php $nv = DB::table('nhanvien')->where('id', $id_nv)->first(); ?>
                                Thu ngân: {{$nv->tennv}}
                            </label>
                            <form action="{{route('save-cart', [$id_tc, $id_nv, $id_ban->id])}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="table-responsive">
                                    <table class="table   table-hover" id="table">
                                        <thead class=" text-dark">
                                            <th>Tên</th>
                                            <th>SL</th>
                                            <th>Giá</th>
                                            <th>T.Tiền</th>
                                            <td></td>
                                        </thead>
                                        <tbody>
                                            <form action="" method="GET">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                @foreach($cart as $value)
                                                @if($value['attributes']['id_ban'] == $id_ban->id)
                                                <tr>
                                                    <td>{{$value['name']}}</td>
                                                    <td>
                                                        <div>
                                                            <input id="{{$value['id']}}" type="number"
                                                                style="width:45px;" value="{{$value->quantity}}" MIN="1"
                                                                class="update">
                                                        </div>
                                                    </td>
                                                    <td>{{number_format($value['price'],0,",",".")}}</td>
                                                    <td>{{number_format($value['price'] * $value['quantity'],0,",",".")}}
                                                    </td>
                                                    <td class="left">
                                                        <a href="{{route('delete-cart', [$value['attributes']['id_ban'], $value['id']])}}"
                                                            class="btn"><i class="fas fa-times"></i></a>
                                                    </td>
                                                </tr>

                                                @endif
                                                @endforeach
                                            </form>
                                        </tbody>
                                    </table>
                                </div>
                                <span>
                                    <?php $sum = 0;  ?>
                                    @foreach($cart as $value)
                                    @if($value['attributes']['id_ban'] == $id_ban->id)
                                    <?php 
                                        $total = ($value['quantity'] * $value['price']);
                                        $sum+= $total;
                                        ?>
                                    @endif
                                    @endforeach

                                    <input type="hidden" name="tongtien" value="">
                                    <h5 style="padding-left: 200px;">Tổng tiền: {{number_format($sum,0,",",".")}}
                                        VNĐ
                                    </h5>
                                </span>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-toggle="modal"
                                        data-target="#chuyenban"><i class="fas fa-exchange-alt"></i>
                                        Chuyển bàn</button>
                                    <a href="{{route('print-cart',[$customer->matc, $id_ban->id])}}"
                                        class="btnPrint"><button type="button" class="btn btn-default"
                                            data-toggle="modal" data-target="#showhd">
                                            <i class="fas fa-print"></i> Xuất bill</button></a>
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-donate"></i> Thanh toán</button>
                                    <!-- <a href="{{route('clear-cart')}}" class="btn btn-info">Xóa hết</a> -->
                                </div>
                                <!-- code ... -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- code chuyen ban -->
            @foreach($cart as $value)
            <div class="modal fade" id="chuyenban">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Chuyển bàn</h4>
                        </div>
                        <form action="{{route('chuyen-ban', $id_ban->id)}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col-sm-6 ">
                                        <label class="col-form-label">Bàn hiện tại</label>
                                        <input type="text" readonly name="id_ban_hientai" style="width: 160px;"
                                            class="form-control" value="{{$id_ban->tenban}}">
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label class="col-form-label">Bàn chuyển đến</label>
                                        <select class="form-control" name="id_ban_den" style="width: 160px;">
                                            <?php 
                                                $bann = DB::table('ban')->where('matc', $id_tc)->where('id', '<>', $id_ban->id)->get();                                               
                                            ?>
                                            @foreach($bann as $bannn)
                                            <option value="{{$bannn->id}}">{{$bannn->tenban}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Chuyển</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /.colllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll -->
            <div class="col-md-3">
                <div class="sticky-top mb-3">
                    <div class="card card-outline card-success">
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
                                                        class="btn btn-success">{{ $lm->tenloaimon }}</button>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">

                                                    <div class="table-responsive">
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
                                                                    <form
                                                                        action="{{route('add', [$id_ban->id, $lmn->id])}}"
                                                                        method="get">
                                                                        {{csrf_field()}}
                                                                        <td class="right">
                                                                            <button type="submit" class="btn"><i
                                                                                    class="fa fa-plus"></i></button>
                                                                        </td>
                                                                    </form>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

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