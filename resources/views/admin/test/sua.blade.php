@foreach( $nhanvien as $nv )
<div class="modal fade" id="sua{{$nv->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa nhân viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin-sua',$nv->id)}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group row">
                        @if ($quyen==1 or $quyen==2)
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Tài khoản</label>
                            <input type="text" name="username" value="{{$nv->username}}" class="form-control">
                        </div>
                        @endif
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Tên nhân viên</label>
                            <input type="text" name="tennv" id="ten_nhan_vien" value="{{$nv->tennv}}"
                                class="form-control">
                        </div>
                    </div>
                    <!-- <label class="col-form-label">Tên nhân viên</label>
                    <input type="text" name="tennv" id="ten_nhan_vien" value="{{$nv->tennv}}" class="form-control"> -->
                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Ngày sinh</label>
                            <input type="date" name="ngaysinh" value="{{$nv->ngaysinh}}" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label">Giới tính</label>
                            <select class="form-control" name="gioitinh">
                                <option>{{$nv->gioitinh}}</option>
                                <option>Nam</option>
                                <option>Nữ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Số điện thoại</label>
                            <input type="text" name="sdt" value="{{$nv->sdt}}" class="form-control">
                        </div>
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Ca làm</label>
                            <select class="form-control" name="calam">
                                <option>{{$nv->calam}}</option>
                                <option>Sáng</option>
                                <option>Chiều</option>
                                <option>Tối</option>
                                <option>Khuya</option>
                                <option>Không</option>
                            </select>
                        </div>
                    </div>


                    <label class="col-form-label">Địa chỉ</label>
                    <input type="text" name="diachi" value="{{$nv->diachi}}" class="form-control">

                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Tên tổ chức</label>
                            <select class="form-control" readonly name="matc" id="ma_tc">
                                @foreach($tochuc as $tc)
                                <option @if($tc->id == $nv->matc)
                                    {{"selected"}}
                                    @endif
                                    value="{{$tc->id}}">{{$tc->tentc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Quyền</label>
                            <select class="form-control" name="quyen">
                            @if($quyen==1 or $quyen==2)
                                <option value="{{$nv->quyen}}">{{$nv->ghichu}}</option>
                                <option value="1">Chủ quán</option>
                                <option value="0">Thu ngân</option>
                                <option value="0">Nhân viên</option>
                            @else($quyen==0)
                            <option value="{{$nv->quyen}}">{{$nv->ghichu}}</option>
                            <option value="0">Nhân viên</option>
                            @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Ghi chú</label>
                        <input type="text" name="ghichu" value="{{$nv->ghichu}}" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach