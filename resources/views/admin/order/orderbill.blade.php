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
                    <div class="card">
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
                                @foreach($tochuc as $tc)
                                <h3 align="center">{{$tc->tentc}}</h3>
                                <h6 align="center">ĐC: {{$tc->diachi}}
                                    <br>--------------------------------</h6>
                                     @endforeach
                                <h4 align="center">PHIẾU TẠM TÍNH</h4>
                                <h5 align="center">{{$id_ban->tenban}}</h5>
                            </span>
                            <label class="col-form-label">
                                <?php $nv = DB::table('nhanvien')->where('id', $id_nv)->first(); ?>
                            Thu ngân:  {{$nv->tennv}}
                            </label>

                            <form action="{{route('save-cart', [$id_nv, $id_ban->id])}}" method="POST">
                                {{csrf_field()}}
                                <div class="table-responsive">
                                    <table class="table   table-hover">
                                        <thead class=" text-dark">
                                            <th>Tên</th>
                                            <th>SL</th>
                                            <th>Giá</th>                                            
                                            <th>Thành tiền</th>
                                            <td></td>
                                        </thead>
                                        <tbody>
                                            @foreach($cart as $value)
                                            @if($value['attributes']['id_ban'] == $id_ban->id)
                                            
                                            <tr>
                                                <td>{{$value['name']}}</td>
                                                <td>{{$value['quantity']}}</td>           
                                                <td>{{number_format($value['price'],0,",",".")}}</td>
                                                <td>{{number_format($value['price'] * $value['quantity'],0,",",".")}}
                                                </td>   
                                                <td class="left">
                                                     <a href="{{route('delete-cart', [$value['attributes']['id_ban'], $value['id']])}}" class="btn"><i class="fas fa-times"></i></a>
                                                </td> 
                                            </tr>
                                            @endif
                                            @endforeach                                            
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
                                <h5 style="padding-left: 195px;">Tổng: {{number_format($sum,0,",",".")}} VNĐ</h5>
                                </span>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Xuất bill</button>
                                    <button type="submit" class="btn btn-info">Thanh toán</button>
                                    <!-- <a href="{{route('clear-cart')}}" class="btn btn-info">Xóa hết</a> -->
                                </div>
                                <!-- code ... -->
                            </form>
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