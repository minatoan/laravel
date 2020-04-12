<div class="modal fade bd-example-modal-lg" id="banhang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="width:100%">

    <div class="modal-dialog modal-lg" role="document" style="width:auto">
        <div class="modal-content" style="width:auto">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">In thống kê theo bill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead class=" text-primary">
                            <th>STT</th>
                            <th>Tên thu ngân</th>
                            <th>Ngày tạo</th>
                            <th>Bàn</th>
                            <th>Tên món</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            </th>
                        </thead>
                        <tbody>
                            @php
                            $i=0;
                            $sl = 0;
                            @endphp
                            @foreach($bill as $bbl)
                            <?php 
                                    $ctb  = DB::table('chitietbill')->where('mabill', $bbl->id)->get();
                                    
                                ?>
                            @foreach($ctb as $ct)
                            <?php
                                        $food = DB::table('menu')->where('id', $ct->mamon)->first();
                                        $sum = ($ct->dongia*$ct->soluong);                                            
                                        $sl +=  $ct->soluong ;  
                                ?>

                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$bbl->nhanvien->tennv}}</td>
                                <td>{{$bbl->ngaytao}}</td>
                                <td>{{$bbl->ban->tenban}}</td>
                                <td>{{$food->tenmon}}</td>
                                <td>{{$ct->soluong}}</td>
                                <td>{{number_format($ct->dongia,0,",",".")}} VNĐ</td>
                                <td>{{number_format($sum,0,",",".")}} VNĐ</td>

                            </tr>
                            @endforeach

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>