@foreach( $loaimon as $lm )
<div class="modal fade" id="sua{{$lm->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa loại món</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('loaimon-sua',$lm->id)}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Tên loại món</label>
                        <input type="text" name="tenloaimon" id="ten_loai_mon" value="{{$lm->tenloaimon}}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Tên tổ chức</label>
                        <select class="form-control" readonly name="matc" id="ma_tc">
                            @foreach($tochuc as $tc)
                            <option @if($tc->id == $lm->matc)
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