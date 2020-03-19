@foreach( $menu as $mn )
<div class="modal fade" id="sua{{$mn->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa đồ uống</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('menu-sua',$mn->id)}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Tên đồ uống</label>
                        <input type="text" name="tenmon" id="ten_mon" value="{{$mn->tenmon}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Loại món</label>
                        <select class="form-control"  name="maloaimon" id="ma_loai_mon">
                            @foreach($loaimon as $lm)
                            <option @if($lm->id == $mn->maloaimon)
                                {{"selected"}}
                                @endif
                                value="{{$lm->id}}">{{$lm->tenloaimon}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Đơn giá</label>
                        <input type="text" name="dongia" id="don_gia" value="{{$mn->dongia}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Tên tổ chức</label>
                        <select class="form-control" re name="matc" readonly>
                            @foreach($tochuc as $tc)
                            <option                                
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