@extends('layout.admin')

@section('content')

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <span>
                <br>
                <h3 align="center">{{$tochuc->tentc}}</h3>
                <h6 align="center">ĐC: {{$tochuc->diachi}}
                    <br>--------------------------------</h6>
                <h4 align="center">PHIẾU TẠM TÍNH</h4>

                <h5 align="center">{{$bill->ban->tenban}}</h5>
                <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                    <input style="text-align: center;border: none" class="form-control" type="text">
                    <span class="input-group-addon"></span>
                </div>
            </span>
            <label class="col-form-label">
                Thu ngân: {{$bill->nhanvien->tennv}}
            </label>
            <div class="table-responsive">
                <table class="table table-bordered  table-hover" id="table">
                    <thead class=" text-dark">
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
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
                <h5 align="right">Tổng số lượng: {{($sl)}}</h5>
                <h5 align="right">Tổng tiền: {{number_format($bill->tongtien,0,",",".")}} VNĐ</h5>
            </div>
            <hr>
                <h6 style="text-align: center;">Xin cảm ơn Quý khách! (^_^)</h6>
        </div>
    </div>

</div>


@endsection