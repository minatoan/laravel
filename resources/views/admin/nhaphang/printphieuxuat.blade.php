<div class="modal fade bd-example-modal-lg" id="phieuxuat" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" style="width:100%">

    <div class="modal-dialog modal-lg" role="document" style="width:auto">
        <div class="modal-content" style="width:auto">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">In thống kê nhập xuất</h5>
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
                            <th>Ngày xuất</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th> 
                            <th>Đơn vị tính</th>                            
                           
                        </thead>
                        <tbody>
                            @php
                            $i=0;
                            $sl = 0;
                            @endphp
                            @foreach($phieuxuat as $printpx)
                            <?php 
                                    $printctpx  = DB::table('ctphieuxuat')->where('maphieuxuat', $printpx->id)->get();
                                    
                                ?>
                            @foreach($printctpx as $pctpx)
                            <?php
                                        $phanghoa = DB::table('hanghoa')->where('id', $pctpx->mahang)->first();
                                        $sl +=  $pctpx->soluong ;  

                                ?>

                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$printpx->nhanvien->tennv}}</td>
                                <td>{{$printpx->ngayxuat}}</td>
                                <td>{{$phanghoa->tenhang}}</td>
                                <td>{{$pctpx->soluong}}</td>

                                
                                <td>{{$pctpx->dvt}}</td>


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