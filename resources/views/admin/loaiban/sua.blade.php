@foreach( $loaiban as $lb )
<div class="modal fade" id="sua{{$lb->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa loại bàn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('loaiban-sua',$lb->id)}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Tên loại bàn</label>
                        <input type="text" name="tenloaiban" id="ten_loai_ban" value="{{$lb->tenloaiban}}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Tên tổ chức</label>
                        <select class="form-control" name="matc" id="ma_tc">
                            @foreach($tochuc as $tc)
                            <option @if($tc->id == $lb->matc)
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