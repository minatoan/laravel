@foreach( $nhacungcap as $nc )
<div class="modal fade" id="sua{{$nc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm nhà cung cấp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('ncc-sua',$nc->id)}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Tên nhà cung cấp</label>
                        <input type="text" name="tenncc" id="ten_ncc" value="{{$nc->tenncc}}" class="form-control">
                    </div>
                    <div class="form-group " >                        
                        <label class="col-form-label">Địa chỉ</label>
                        <input type="text" name="diachi"  id="dia_chi" value="{{$nc->diachi}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Số điện thoại</label>
                        <input type="text" name="sdt" value="{{$nc->sdt}}" class="form-control">                        
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Tổ chức</label>
                        <select class="form-control" name="matc" id="ma_tc" readonly>
                            @foreach($tochuc as $tc)
                            <option @if($tc->id == $nc->matc)
                                {{"selected"}}
                                @endif
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
@endforeach