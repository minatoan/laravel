@extends('layout.admin')

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Danh sách loại món</h4>
                    <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>               
                <div class="card-body">
                <div class="form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#them">Thêm</button>
                </div>
                    <div class="table-responsive">
                    <table id="datatables" class="table table-bordered table-striped table-hover"  data-sort-order="desc" data-search="true">
                        <thead class=" text-primary">
                        <th>ID</th>
                        <th>Tên loại món</th>
                      
                        <th>Thao tác</th>
                        </th>                        
                        </thead>
                        <tbody>
                        @foreach($loaimon as $lm)                    
                    <tr>
                      <td>{{$lm->maloaimon}}</td>
                      <td>{{$lm->tenloaimon}}</td>
                      <td class="left" ><button type="button"class="btn btn-warning" data-toggle="modal"
                        data-target="#sua"><i class="far fa-edit" style="color:black"></i></button>
                      <button type="button"class="btn btn-danger" ><i class="far fa-trash-alt"></i></button></td>
                      </tr>
                    @endforeach
                
                  </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

@endsection