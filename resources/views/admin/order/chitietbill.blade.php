@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">COFFE GOOD</h4>
                    </div>
                    <div class="form-group">
                            <BR>
                            <h4 align="center">CHI TIẾT BILL</h4>
                            <?php 
                                $ctb  = DB::table('chitietbill')->where('mabill', $bill->id)->get();
                                $sl = 0;
                            ?>
                                @foreach($ctb as $value)
                                    <?php                                                 
                                        $sl +=  $value->soluong ;?>                                    
                                @endforeach   
                            <h5 align="center">Tổng số lượng: {{($sl)}}</h5>
                            <h5 align="center">Tổng tiền: {{number_format($bill->tongtien,0,",",".")}} VNĐ</h5>                            
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tables" class="table table-bordered table-striped table-hover">
                                <thead class=" text-primary">
                                    <th>STT</th>
                                    <th>Tên món</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                        <?php 
                                            $ctb  = DB::table('chitietbill')->where('mabill', $bill->id)->get();
                                            $sl = 0;
                                        ?>

                                    @foreach($ctb as $value)
                                    <?php
                                                $food = DB::table('menu')->where('id', $value->mamon)->first();
                                                $sum = ($value->dongia*$value->soluong);                                            
                                                $sl +=  $value->soluong ;
                                            
                                            ?>
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$food->tenmon}}</td>
                                        <td>{{$value->soluong}}</td>
                                        <td>{{number_format($value->dongia,0,",",".")}} VNĐ</td>
                                        <td>{{number_format($sum,0,",",".")}} VNĐ</td>
                                    </tr>
                                    @endforeach                                   

                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Sửa -->

            <!-- Đóng sửa -->
        </div>
        <!-- đóng card shadow mb-4 -->
        <!-- thêm -->

    </div>
</div>

@endsection