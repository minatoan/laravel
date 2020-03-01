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
            <form action="{{route('nhanvien-sua',$nv->id)}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Tài khoản</label>
                            <input type="text" name="username"  value="{{$nv->username}}" class="form-control">
                        </div>
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Tên Nhân Viên</label>
                            <input type="text" name="tennv" id="ten_nhan_vien" value="{{$nv->tennv}}" class="form-control">
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
                            <select class="form-control" name="gioitinh"  value="{{$nv->gioitinh}}" > 
                            @foreach($nhanvien as $nv)
                            <option  
                                >{{$nv->gioitinh}}</option>
                            @endforeach          
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Số điện thoại</label>
                            <input type="text" name="sdt" value="{{$nv->sdt}}" class="form-control">
                        </div>
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Lương</label>
                            <input type="text" name="luongcb" value="{{$nv->luongcb}}" class="form-control">
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
                                    <option value="1">Admin</option>
                                    <option value="0">Nhân viên</option>
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