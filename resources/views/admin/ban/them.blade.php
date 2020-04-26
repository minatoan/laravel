<div class="modal fade" id="them" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm bàn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('ban-them')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Tên bàn</label>
                        <input type="text" name="tenban" id="ten_ban" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Loại bàn</label>
                        <select class="form-control" name="maloaiban" id="loai_ban">
                        <option value="" disabled selected>Chọn loại bàn</option>
                            @foreach($loaiban as $lb)
                            <option value="{{$lb->id}}">{{$lb->tenloaiban}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Tổ chức</label>
                        <select class="form-control" readonly name="matc" id="ma_tc">
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