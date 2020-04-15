<div class="modal fade" id="them" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm đồ uống</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('menu-them')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Tên đồ uống</label>
                        <input type="text" name="tenmon" id="ten_ban" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Loại món</label>
                        <select class="form-control"  name="maloaimon" id="ma_loai_mon">
                        <option value="" disabled selected>Chọn loại món</option>

                            @foreach($loaimon as $lm)
                            <option                                
                                value="{{$lm->id}}">{{$lm->tenloaimon}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Giá</label>
                        <input type="text" name="dongia" id="don_gia" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Tổ chức</label>                        
                        <select class="form-control"  name="matc" readonly>
                            @foreach($tochuc as $tc)
                            <option                                
                                value="{{$tc->id}}">{{$tc->tentc}}</option>
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