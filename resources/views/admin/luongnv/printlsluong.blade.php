<div class="modal fade bd-example-modal-lg" id="lsluong" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" style="width:100%">

    <div class="modal-dialog modal-lg" role="document" style="width:auto">
        <div class="modal-content" style="width:auto">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">In thống kê lương nhân viên</h5>
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
                            <th>Ngày bắt đầu</th>
                            <th>Lương cơ bản</th>
                            <th>Ca làm</th>
                            <th>Số ngày làm</th>
                            <th>Tiền thưởng</th>
                            <th>Tiền phạt</th>
                            <th>Tổng lương</th>
                            </th>
                        </thead>
                        <tbody>
                            @php
                            $i=0;
                            $sl = 0;
                            @endphp
                            @foreach($tinhluong as $tl)
                                <?php
                                                if($tl->giokt > $tl->giobd){
                                                    $tinhgio = abs(strtotime($tl->giokt) - strtotime($tl->giobd)) / 3600;
                                                }elseif($tl->giokt < $tl->giobd){
                                                    $tinhgio = 24 - abs(strtotime($tl->giokt) - strtotime($tl->giobd)) / 3600 ;
                                                }
                                                
                                                $tongluong = (($tl->luongcb * $tinhgio * $tl->songaylam) + $tl->tienthuong) - $tl->tienphat ;

                                    ?>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$tl->nhanvien->tennv}}</td>
                                    <td>{{$tl->ngay}}</td>
                                    <td>{{number_format($tl->luongcb,0,",",".")}}/h </td>
                                    <td>{{$tl->calam}} // {{$tl->giobd}}h - {{$tl->giokt}}h ({{$tinhgio}}h)</td>
                                    <td>{{$tl->songaylam}}</td>
                                    <td>{{number_format($tl->tienthuong,0,",",".")}} VNĐ</td>
                                    <td>{{number_format($tl->tienphat,0,",",".")}} VNĐ</td>
                                    <td>{{number_format($tongluong,0,",",".")}} VNĐ</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>