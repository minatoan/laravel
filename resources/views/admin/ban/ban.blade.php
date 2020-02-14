@extends('layout.admin')

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Danh sách bàn</h4>
                    <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>    
                 
                           @if(count($errors)>0)
                          <div class="alert alert-danger">
                              @foreach($errors->all() as $err)
                                  {{$err}}<br>
                              @endforeach
                          </div>
                    @endif    
                <div class="card-body">
                <div class="form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#them">Thêm</button>
                </div>
                    <div class="table-responsive">                  

                    <table id="datatables" class="table table-bordered table-striped table-hover"  data-sort-order="desc" data-search="true">
                        <thead class=" text-primary">
                        
                        <th>STT</th>
                        <th>Tên bàn</th>
                        <th>Tên loại bàn</th>
                        <th>Thao tác</th>
                        </th>                        
                        </thead>
                        <tbody>
                          @php
                           $i=0;   
                          @endphp
                          
                        @foreach($ban as $b)   

                      <tr>
                        <td >{{++$i}}</td>
                        <td>{{$b->tenban}}</td>
                        <td>{{$b->loaiban->tenloaiban}}</td>
                        <td class="left" >
                          <button type="button"class="btn btn-warning" data-toggle="modal"
                        data-target="#sua{{$b->id}}"><i class="far fa-edit" style="color:black"></i>
                          </button>
                          <a href="{{route('ban-xoa', $b->id)}}"><button type="button"class="btn btn-danger" ><i class="far fa-trash-alt"></i>
                          </button>
                          </a>
                          
                        </td>
                      </tr>
                        @endforeach                
                        </tbody>
                  </table>
                </div>
              </div>
            
            </div>
          </div>
<!-- Sửa -->
@foreach(
  $ban as $b  
)
        <div class="modal fade" id="sua{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
       @include('admin.ban.sua')
    </div>
    
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Lưu</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
    </div>
    </form>
  </div>
</div>
</div>
@endforeach
<!-- Đóng sửa -->
</div>
<!-- đóng card shadow mb-4 -->

<!-- thêm -->
<div class="modal fade" id="them" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Thêm bàn</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
   
    <form action="{{route('ban-them')}}" method="POST">
    {{csrf_field()}}
    
    <div class="modal-body"> 
        @include('admin.ban.them')
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Thêm</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
    </div>
    </form>
  </div>
</div>
</div>
            </div>
          </div>

@endsection
