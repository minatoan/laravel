@extends('layout.admin')

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Menu</h4>
                    <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                <div class="form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#them">Thêm</button>
                </div>
                    <div class="table-responsive">
                    <table id="datatables" class="table table-bordered table-striped table-hover" data-page-list="[10, 50, 300]"  data-sort-order="desc" data-search="true">
                        <thead class=" text-primary">
                        <th>ID</th>
                        <th>Tên món</th>
                        <th>Loại món</th>
                        <th>Giá</th>
                        <th>Thao tác</th>
                        </th>                        
                        </thead>
                        <tbody>
                        @foreach($menu as $mn)                    
                    <tr>
                      <td>{{$mn->mamon}}</td>
                      <td>{{$mn->tenmon}}</td>
                      <td>{{$mn->loaimon->tenloaimon}}</td>
                      <td>{{$mn->dongia}}</td>

                      <td class="left" ><button type="button"class="btn btn-warning" data-toggle="modal"
                        data-target="#sua"><i class="far fa-edit" style="color:black"></i></button>
                      <button type="button"class="btn btn-danger" ><i class="far fa-trash-alt"></i></button></td>
                      </tr>
                    @endforeach
                
                  </tbody>
                    </table>
                  </div>
                </div>
                </tbody>
                </table>
              </div>
            </div>
<!-- Sửa -->
<div class="modal fade" id="sua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa món</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          <div class="form-group">
            <label  class="col-form-label">Tên món</label>
            <input type="text" class="form-control" >
          </div>
          <div class="form-group">
            <label  class="col-form-label">Loại món</label>
            <select class="browser-default custom-select"data-live-search="true"></select>
          </div>
          <div class="form-group">        
            <label  class="col-form-label">Giá</label>
            <input type="text" class="form-control"  >
          </div>
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Lưu</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
<!-- Đóng sửa -->
</div>
<!-- đóng card shadow mb-4 -->

<!-- thêm -->
<div class="modal fade" id="them" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm món</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
      <form>
          <div class="form-group" action="admin.ban.ban" method="POST">
          <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <label  class="col-form-label">Tên món</label>
            <input type="text" class="form-control"  >
          </div>
          <div class="form-group">
            <label  class="col-form-label">Loại món</label>
            <select class="browser-default custom-select"data-live-search="true"></select>
          </div>
          <div class="form-group">
         
            <label  class="col-form-label">Giá</label>
            <input type="text" class="form-control"  >
          </div>
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Thêm</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

@endsection