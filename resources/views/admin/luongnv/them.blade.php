<div class="modal fade" id="them" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thiết lập lương</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('luong-them')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group row">

                        <?php                        
                            $ten = DB::table('nhanvien')->where('id', $nhanvien->id)->get(); 
                        ?>
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Tên nhân viên</label>
                            @foreach($ten as $nv)
                            <input type="hidden" type="text" name="manv" value="{{$nv->id}}" readonly
                                class="form-control">
                            <input type="text" readonly value="{{$nv->tennv}}" class="form-control">
                            @endforeach
                        </div>
                        <div class="col-sm-6 ">
                            <label>Ngày nhập</label>
                            <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
                                <input class="form-control" readonly type="text" name="ngay">
                                <span class="input-group-addon"></span>
                            </div>
                        </div>



                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Lương cơ bản</label>
                            <input type="text" name="luongcb" class="form-control">
                        </div>
                        <div class="col-sm-6 ">
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
                            <label class="col-form-label">Giờ vào ca</label>
                            <input type="time" name="giobd" class="form-control">

                            <!-- <select name="giobd" class="form-control">
                                <option value="" disabled selected>Chọn giờ vào ca</option>
                                <option value="1">1h</option>
                                <option value="2">2h</option>
                                <option value="3">3h</option>
                                <option value="4">4h</option>
                                <option value="5">5h</option>
                                <option value="6">6h</option>
                                <option value="7">7h</option>
                                <option value="8">8h</option>
                                <option value="9">9h</option>
                                <option value="10">10h</option>
                                <option value="11">11h</option>
                                <option value="12">12h</option>
                                <option value="13">13h</option>
                                <option value="14">14h</option>
                                <option value="15">15h</option>
                                <option value="16">16h</option>
                                <option value="17">17h</option>
                                <option value="18">18h</option>
                                <option value="19">19h</option>
                                <option value="20">20h</option>
                                <option value="21">21h</option>
                                <option value="22">22h</option>
                                <option value="23">23h</option>
                                <option value="24">24h</option>
                            </select> -->
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label">Giờ kết thúc ca</label>
                            <input type="time" name="giokt" class="form-control">

                            <!-- <select name="giokt" class="form-control">
                                <option value="" disabled selected>Chọn giờ kết thúc ca</option>
                                <option value="1">1h</option>
                                <option value="2">2h</option>
                                <option value="3">3h</option>
                                <option value="4">4h</option>
                                <option value="5">5h</option>
                                <option value="6">6h</option>
                                <option value="7">7h</option>
                                <option value="8">8h</option>
                                <option value="9">9h</option>
                                <option value="10">10h</option>
                                <option value="11">11h</option>
                                <option value="12">12h</option>
                                <option value="13">13h</option>
                                <option value="14">14h</option>
                                <option value="15">15h</option>
                                <option value="16">16h</option>
                                <option value="17">17h</option>
                                <option value="18">18h</option>
                                <option value="19">19h</option>
                                <option value="20">20h</option>
                                <option value="21">21h</option>
                                <option value="22">22h</option>
                                <option value="23">23h</option>
                                <option value="24">24h</option>
                            </select> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <!-- <label class="col-form-label">Tiền thưởng</label> -->
                            <input type="hidden" type="text" name="tienthuong" value="0" class="form-control">
                        </div>
                        <div class="col-sm-6 ">
                            <!-- <label class="col-form-label">Tiền phạt</label> -->
                            <input type="hidden" type="text" name="tienphat" value="0" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <label class="col-form-label">Số ngày làm</label> -->
                        <input type="hidden" type="number" name="songaylam" MIN=0 MAX=31 value="0" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Ghi chú</label>
                        <input type="text" name="ghichu" class="form-control">
                    </div>

                    @foreach($ten as $nv)
                    <input type="hidden" type="text" value="{{$nv->matc}}" name="matc" class="form-control">
                    @endforeach


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Thiết lập</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>

    </div>
</div>