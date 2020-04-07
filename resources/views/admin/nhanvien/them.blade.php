<div class="modal fade" id="them" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm nhân viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('nhanvien-them')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group row">
                    @if ($quyen==1 or $quyen==2)
                                            <div class="col-sm-6 ">
                            <label class="col-form-label">Tài khoản</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Mật khẩu</label>
                            <input type="password" name="matkhau" class="form-control">
                        </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Tên nhân viên</label>
                            <input type="text" name="tennv" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label">Ca làm</label>
                            <select name="calam" class="form-control">
                                <option value="" disabled selected>Chọn ca làm</option>
                                <option value="Sáng">Sáng</option>
                                <option value="Chiều">Chiều</option>
                                <option value="Tối">Tối</option>
                                <option value="Khuya">Khuya</option>
                                <option value="Không">Không</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Ngày sinh</label>
                            <input type="text" name="ngaysinh" placeholder="YYYY-MM-DD" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label">Giới tính</label>
                            <select name="gioitinh" class="form-control">
                                <option value="" disabled selected>Chọn giới tính</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Số điện thoại</label>
                            <input type="text" name="sdt" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Địa chỉ</label>
                        <input type="text" name="diachi" class="form-control">
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Tổ chức</label>
                            @if($quyen==2)

                            <select class="form-control" name="matc" id="ma_tc">
                            <option value="" disabled selected>Chọn tổ chức</option>
                                @foreach($tochucc as $tcc)
                                <option value="{{$tcc->id}}">{{$tcc->tentc}}</option>
                                @endforeach
                            </select>
                            @else(quyen==0 or quyen==1)
                            <select class="form-control" name="matc" id="ma_tc">
                                @foreach($tochuc as $tc)
                                <option value="{{$tc->id}}">{{$tc->tentc}}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Quyền</label>
                            <select class="form-control" name="quyen">
                            @if($quyen==1 or $quyen==2)
                                <option value="1">Chủ quán</option>
                                <option value="0">Thu ngân</option>
                            @endif
                                <option value="0">Nhân viên</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Ghi chú</label>
                        <input type="text" name="ghichu" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>