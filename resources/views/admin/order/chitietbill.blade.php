@foreach($bill as $bbl)
<div class="modal fade bd-example-modal-lg" id="showct{{$bbl->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"  style="width:auto">
        <div class="modal-content"  style="width:auto">
        
            <div class="modal-body">
                <br>
                <h4 align="center">CHI TIẾT BILL {{$bbl->ban->tenban}}</h4>
                
                <br>
                <h5 align="left">Ngày: {{($bbl->ngaytao)}}</h5>
                <h5 align="left">Thu ngân: {{$bbl->nhanvien->tennv}}</h5>

                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
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
                                            $ctb  = DB::table('chitietbill')->where('mabill', $bbl->id)->get();
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
                    <h5 align="right">Tổng tiền: {{number_format($bbl->tongtien,0,",",".")}} VNĐ</h5>
                </div>
            </div>
            <div class="modal-footer">
            <a href="{{route('print-lsbill',$bbl->id)}}" class="btnPrint">
            <button type="button" class="btn btn-default"  >
            <i class="fas fa-print"></i> Xuất bill</button></a>
            
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

@endforeach