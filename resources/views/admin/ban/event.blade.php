<div class="form-group">  
@if(count($errors)>0)
                          <div class="alert alert-danger">
                              @foreach($errors->all() as $err)
                                  {{$err}}<br>
                              @endforeach
                          </div>
                    @endif      
  <label  class="col-form-label">Tên bàn</label>
  <input type="text" name="tenban" id="ten_ban" class="form-control"  >
</div>
<div class="form-group">
  <label  class="col-form-label">Loại bàn</label>
  <select class="form-control" name="maloaiban" id="loai_ban" >
      @foreach($loaiban as $lb)
        <option value="{{$lb->maloaiban}}">{{$lb->tenloaiban}}</option>
      @endforeach
  </select>
</div> 