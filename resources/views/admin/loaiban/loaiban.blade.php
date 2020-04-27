@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-dark font-weight-bold">Danh sách loại bàn</h4>
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
                        @if($quyen==1)
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#them">Thêm</button>
                        @endif
                        </div>
                        <div class="table-responsive">
                            <table id="datatables" class="table table-bordered table-striped table-hover"
                                data-page-list="[10, 50, 300]" data-sort-order="desc" data-search="true">
                                <thead class=" text-primary">
                                    <th>STT</th>
                                    <th>Tên loại bàn</th>
                                    <th>Tên tổ chức</th>
                                    @if($quyen==1)
                                    <th>Thao tác</th>
                                    @endif
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($loaiban as $lb)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$lb->tenloaiban}}</td>
                                        <td>{{$lb->tochuc->tentc}}</td>
                                        @if($quyen==1)
                                        <td class="left">
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#sua{{$lb->id}}"><i class="far fa-edit"
                                                    style="color:black"></i>
                                            </button>
                                            <a href="{{route('loaiban-xoa', $lb->id)}}"><button type="button"
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
            @include('admin.loaiban.sua')
            <!-- Đóng sửa -->
        </div>
        <!-- đóng card shadow mb-4 -->
        <!-- thêm -->
        @include('admin.loaiban.them')
    </div>
</div>

@endsection