<div class="modal fade" id="them" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm nguyên liệu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('hanghoa-them')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Tên nguyên liệu</label>
                        <input type="text" name="tenhang" id="ten_hang" class="form-control">
                    </div>
                    <div class="form-group " hidden="">
                        <label class="col-form-label">Số lượng</label>
                        <input type="number" name="soluong" id="so_luong" value="0" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Đơn vị tính</label>
                        <select name="dvt" class="form-control">
                            <option value="" disabled selected>Chọn đơn vị tính</option>
                            <option value="Két">Két</option>
                            <option value="Chai">Chai</option>
                            <option value="Lon">Lon</option>
                            <option value="Thùng">Thùng</option>
                            <option value="Bịch">Bịch</option>
                            <option value="Hộp">Hộp</option>
                            <option value="Kilogram">Kilogram</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Tổ chức</label>
                        <select class="form-control" readonly name="matc" id="ma_tc">
                            @foreach($tochuc as $tc)
                            <option value="{{$tc->id}}">{{$tc->tentc}}</option>
                            @endforeach
                        </select>
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