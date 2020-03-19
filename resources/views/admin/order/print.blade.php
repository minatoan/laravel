@extends('layout.admin')

@section('content')

<!-- code hoa don -->

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <span>
                <br>
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
            <div class="table-responsive">
                <table class="table table-bordered  table-hover" id="table">
                    <thead class=" text-dark">
                        <th>Tên</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                    </thead>
                    <tbody>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @foreach($cart as $value)
                        @if($value['attributes']['id_ban'] == $id_ban->id)
                        <tr>
                            <td>{{$value['name']}}</td>
                            <td>{{$value['quantity']}}</td>
                            <td>{{number_format($value['price'],0,",",".")}}</td>
                            <td>{{number_format($value['price'] * $value['quantity'],0,",",".")}}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
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
                    <h5 style="text-align: right;">Tổng tiền: {{number_format($sum,0,",",".")}} VNĐ</h5>
                </span>
                <hr>
                <h6 style="text-align: center;">Xin cảm ơn Quý khách! (^_^)</h6>
            </div>
        </div>

    </div>
</div>




<!-- /.content -->

@endsection