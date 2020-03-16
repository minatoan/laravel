@foreach( $hanghoa as $hh )
<div class="modal fade" id="sua{{$hh->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa nguyên liệu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('hanghoa-sua',$hh->id)}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Tên nguyên liệu</label>
                        <input type="text" name="tenhang" id="ten_hang" value="{{$hh->tenhang}}" class="form-control">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Số lượng</label>
                            <input type="number" name="soluong" min="0.1" step=".01" id="so_luong" value="{{$hh->soluong}}"
                                class="form-control">
                        </div>
                        <div class="col-sm-6 ">
                            <label class="col-form-label">Đơn vị tính</label>
                            <input type="text" name="dvt" id="dvt" value="{{$hh->dvt}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Tên tổ chức</label>
                        <select class="form-control" name="matc" id="ma_tc" readonly>
                            @foreach($tochuc as $tc)
                            <option @if($tc->id == $hh->matc)
                                {{"selected"}}
                                @endif
                                value="{{$tc->id}}">{{$tc->tentc}}</option>
                            @endforeach
                        </select>
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