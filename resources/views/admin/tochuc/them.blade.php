<div class="modal fade" id="them" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm tổ chức</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('tochuc-them')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Tên tổ chức</label>
                        <input type="text" name="tentc"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Người quản lý</label>
                        <input type="text" name="nguoiql"  class="form-control">
                    </div>
                    <div class="form-group">
                                <div class="page-info-item  no-padding">
                                <label class="col-form-label">Địa chỉ</label>
                                    <textarea class="text" name="diachi" bind="note" style=" width: 100%"></textarea>
                                </div>
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