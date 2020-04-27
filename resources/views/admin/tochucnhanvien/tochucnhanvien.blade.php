@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-dark font-weight-bold">Tổ chức</h4>
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
                            @if ($quyen==2)
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#them">Thêm</button>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table id="datatables" class="table table-bordered table-striped table-hover"
                                data-page-list="[10, 50, 300]" data-sort-order="desc" data-search="true">
                                <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Tên tổ chức</th>
                                    <th>Người quản lý</th>
                                    <th>Địa chỉ</th>   
                                    @if ($quyen==2)                                 
                                    <th>Thao tác</th>
                                    @endif
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($tochuc as $tc)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$tc->tentc}}</td>
                                        <td>{{$tc->nguoiql}}</td>
                                        <td>{{$tc->diachi}}</td> 
                                        @if ($quyen==2)                                       
                                        <td class="left">
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#sua{{$tc->id}}"><i class="far fa-edit"
                                                style="color:black"></i>
                                            </button>
                                            <a href="{{route('tochuc-xoa',$tc->id)}}">
                                                <button type="button"
                                                    class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                                </button>
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sửa -->
            <!-- Đóng sửa -->
        </div>        
        <!-- thêm -->
    </div>
</div>

@endsection