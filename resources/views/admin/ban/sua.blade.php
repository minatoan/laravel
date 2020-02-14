<div class="form-group">  
            
          <label  class="col-form-label">Tên bàn</label>
           <input type="text" name="tenban" id="ten_ban" value="{{$b->tenban}}" class="form-control"  >
        </div>
        <div class="form-group">
          <label  class="col-form-label">Loại bàn</label>
          <select class="form-control" name="maloaiban" id="loai_ban" >
             @foreach($loaiban as $lb)
              <option 
              	@if($b->maloaiban == $lb->id)
                     {{"selected"}}
               	@endif
             	 value="{{$lb->id}}">{{$lb->tenloaiban}}</option>
           	 @endforeach
          </select>
        </div> 