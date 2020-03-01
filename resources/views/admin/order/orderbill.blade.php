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
                                <h3 align="center">COFFE GOOD</h3>
                                <h6 align="center">ĐC: 43/90 Đường 3/2, Phường Xuân Khánh <br> Quận Ninh Kiều, TP Cần
                                    Thơ
                                    <br>ĐT: 0900 000 000 <br>--------------------------------</h6>
                                <h4 align="center">PHIẾU TẠM TÍNH</h4>
                                <h5 align="center">{{$id_ban->tenban}}</h5>

                            </span>

                            <label class="col-form-label">Thu ngân:</label>


                            <div class="table-responsive">
                                <table class="table   table-hover">
                                    <thead class=" text-dark">
                                        <th>Tên</th>
                                        <th>SL</th>
                                        <th>Giá</th>
                                        <th>Thành tiền</th>
                                    </thead>
                                    <tbody>
                                        @foreach($cart as $value)
                                        @if($value['attributes']['id_ban'] == $id_ban->id)
                                        <tr>
                                            <td>{{$value['name']}}</td>
                                            <td>{{$value['quantity']}}</td>
                                            <td>{{$value['price']}}</td>                                            
                                            
                                        </tr>
                                        @endif
                                        @endforeach
                                        <!--  <?php 
                                            $bill = DB::table('bill')->where('maban', $id_ban['id'])->where('tinhtrang', 0)->first();  
                                        ?>
                                        
                                        @if($bill)
                                            <?php 
                                                $ctb  = DB::table('chitietbill')->where('mabill', $bill->id)->get();
                                            ?>
                                            @foreach($ctb as $value)
                                            <?php
                                                $food = DB::table('menu')->where('id', $value->mamon)->first();
                                                $sum = $value->dongia*$value->soluong;
                                            
                                            ?>
                                            <tr>
                                                <td>{{$food->tenmon}}</td>
                                                <td><input type="number" style="width:40px" value="{{$value->soluong}}"></td>
                                                <td>{{number_format($value->dongia,0,",",".")}}</td>
                                                <td>{{number_format($sum,0,",",".")}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>                                            
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td >Tổng: {{number_format($bill->tongtien,0,",",".")}} </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>không có bill</td>
                                            </tr>
                                        @endif -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info">Thanh toán</button>
                            </div>
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
                            <div class="table-responsive">

                                <table id="tables" class="table" data-page-list="[5, 20, 300]">
                                    <thead class=" text-dark">
                                        <th>Tên</th>
                                        <th>Giá</th>
                                        <th>#</th>
                                    </thead>
                                    <tbody>

                                        @foreach($menu as $mu)
                                        <tr>
                                            <td>{{$mu['tenmon']}}</td>

                                            <td>{{number_format($mu['dongia'],0,",",".")}}</td>
                                            <form action="{{route('add', [$id_ban->id, $mu->id])}}" method="get">
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
                            <!-- /btn-group -->

                            <!-- /input-group -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>

        </div>
        <!-- @foreach( $menu as $mu )
                <div class="modal fade" id="them{{$mu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm vào bill</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form   method="POST">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <div class="col-sm-6 ">
                                            <label class="col-form-label">Tên món</label>
                                            <input type="text" name="tenmon" value="{{$mu['tenmon']}}" class="form-control">
                                        </div>
                                        <div class="col-sm-6 ">
                                             <label class="col-form-label">Giá</label>
                                             <input type="text" name="dongia" value="{{number_format($mu['dongia'],0,",",".")}}" class="form-control">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Số lượng</label>
                                        <input type="number" name="soluong" value="1" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit"  class="btn btn-primary">Thêm</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>


<!-- /.content -->

@endsection