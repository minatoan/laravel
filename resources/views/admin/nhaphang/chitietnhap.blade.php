@foreach($phieunhap as $pnhap)
<div class="modal fade bd-example-modal-lg" id="showct{{$pnhap->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <br>
                <h4 align="center">CHI TIẾT PHIẾU NHẬP </h4>
                
                <br>
                <h5 align="left">Ngày: {{($pnhap->ngaynhap)}}</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class=" text-primary">
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn vị tính</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            </th>
                        </thead>
                        <tbody>
                            @php
                            $i=0;
                            @endphp
                            <?php 
                                $ctpn  = DB::table('ctphieunhap')->where('maphieunhap', $pnhap->id)->get();
                                // dd($ctpn);
                                $sl = 0;
                            ?>
                            @foreach($ctpn as $value)
                            <?php
                                $sanpham = DB::table('hanghoa')->where('id', $value->mahang)->first();
                                $sum = ($value->dongia*$value->soluong);
                                $sl +=  $value->soluong ;                                    
                                ?>
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$sanpham->tenhang}}</td>
                                <td>{{$value->soluong}}</td>
                                <td>{{$value->dvt}}</td>
                                <td>{{number_format($value->dongia,0,",",".")}} VNĐ</td>
                                <td>{{number_format($sum,0,",",".")}} VNĐ</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h5 align="right">Tổng số lượng: {{($sl)}}</h5>
                    <h5 align="right">Tổng tiền: {{number_format($pnhap->tongtien,0,",",".")}} VNĐ</h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endforeach