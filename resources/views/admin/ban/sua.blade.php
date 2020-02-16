@foreach( $ban as $b )
<div class="modal fade" id="sua{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa bàn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('ban-sua',$b->id)}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Tên bàn</label>
                        <input type="text" name="tenban" id="ten_ban" value="{{$b->tenban}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Loại bàn</label>
                        <select class="form-control" name="maloaiban" id="loai_ban">
                            @foreach($loaiban as $lb)
                            <option @if($b->maloaiban == $lb->id)
                                {{"selected"}}
                                @endif
                                value="{{$lb->id}}">{{$lb->tenloaiban}}</option>
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