@foreach( $tochuc as $tc )
<div class="modal fade" id="sua{{$tc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa Tổ chức</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('tochuc-sua',$tc->id)}}" method="POST">
            {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Tên tổ chức</label>
                        <input type="text" name="tentc" value="{{$tc->tentc}}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Người quản lý</label>
                        <input type="text" name="nguoiql" value="{{$tc->nguoiql}}" class="form-control">
                    </div>
                    <div class="form-group">
                                
                                <label class="col-form-label">Địa chỉ</label>
                                <input type="text" name="diachi" value="{{$tc->diachi}}" class="form-control">
                                
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