@foreach($ctluong as $tl)
<div class="modal fade" id="sua{{$tl->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhật</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('luong-sua',$tl->id)}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-body">
                    <div class="form-group row">
                        <?php
                            $ten = DB::table('nhanvien')->where('id', $tl->manv)->first(); ?>
                        <input type="hidden" type="text" name="ngay" value="{{$tl->ngay}}" class="form-control">

                        <div class="col-sm-6 ">
                            <label class="col-form-label">Tên nhân viên</label>
                            <input type="hidden" type="text" value="{{$ten->id}}" name="manv" readonly
                                class="form-control">

                            <input type="text" readonly value="{{$ten->tennv}}" class="form-control">

                        </div>
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Lương cơ bản</label>
                            <input type="text" name="luongcb" value="{{$tl->luongcb}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Giờ vào ca</label>
                            <input type="time" name="giobd" value="{{$tl->giobd}}" class="form-control">


                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label">Giờ kết thúc ca</label>
                            <input type="time" name="giokt" value="{{$tl->giokt}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Ca làm </label>
                            <select class="form-control" name="calam">
                                <option>{{$tl->calam}}</option>
                                <option>Sáng</option>
                                <option>Chiều</option>
                                <option>Tối</option>
                                <option>Khuya</option>
                                <option>Không</option>
                            </select>
                        </div>
                        <div class="col-sm-6 ">
                            <label class="col-form-label" style="color: red">Số ngày làm (điểm danh)</label>
                            <input type="number" name="songaylam" MIN=0 MAX=31 value="{{$tl->songaylam}}"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Tiền thưởng</label>
                            <input type="text" name="tienthuong" value="{{number_format($tl->tienthuong,0,",",".")}}"
                                class="form-control">
                        </div>
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Tiền phạt</label>
                            <input type="text" name="tienphat" value="{{number_format($tl->tienphat,0,",",".")}}"
                                class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Ghi chú</label>
                        <input type="text" name="ghichu" value="{{$tl->ghichu}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="hidden" type="text" name="matc" value="{{$ten->matc}}" class="form-control">
                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach