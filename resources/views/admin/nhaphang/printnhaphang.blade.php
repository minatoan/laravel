<div class="modal fade bd-example-modal-lg" id="nhaphang" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" style="width:100%">

    <div class="modal-dialog modal-lg" role="document" style="width:auto">
        <div class="modal-content" style="width:auto">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">In thống kê nhập hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead class=" text-primary">
                            <th>STT</th>
                            <th>Tên nhân viên</th>
                            <th>Ngày nhập</th>
                            <th>nhà cung cấp</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>ĐVT</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            </th>
                        </thead>
                        <tbody>
                            @php
                            $i=0;
                            $sl = 0;
                            @endphp
                            @foreach($phieunhap as $printpn)
                            <?php 
                                    $printctpn  = DB::table('ctphieunhap')->where('maphieunhap', $printpn->id)->get();
                                    
                                ?>
                            @foreach($printctpn as $pctpn)
                            <?php
                                        $phanghoa = DB::table('hanghoa')->where('id', $pctpn->mahang)->first();
                                        $sum = ($pctpn->dongia*$pctpn->soluong);                                            
                                        $sl +=  $pctpn->soluong ;  
                                ?>

                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$printpn->nhanvien->tennv}}</td>
                                <td>{{$printpn->ngaynhap}}</td>
                                <td>{{$printpn->nhacungcap->tenncc}}</td>
                                <td>{{$phanghoa->tenhang}}</td>
                                <td>{{$pctpn->soluong}}</td>
                                <td>{{$pctpn->dvt}}</td>

                                <td>{{number_format($pctpn->dongia,0,",",".")}} VNĐ</td>
                                <td>{{number_format($sum,0,",",".")}} VNĐ</td>

                            </tr>
                            @endforeach

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            
        </div>
    </div>
</div>