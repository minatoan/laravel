@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-dark font-weight-bold">Danh sách loại món</h4>
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
                                    <th>Tên loại món</th>
                                    <th>Tổ chức</th>
                                    @if($quyen==1)
                                    <th>Thao tác</th>
                                    @endif
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($loaimon as $lm)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$lm->tenloaimon}}</td>
                                        <td>{{$lm->tochuc->tentc}}</td>
                                        @if($quyen==1)
                                        <td class="left">
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#sua{{$lm->id}}"><i class="far fa-edit"
                                                    style="color:black"></i>
                                            </button>
                                            <a href="{{route('loaimon-xoa', $lm->id)}}"><button type="button"
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
            @include('admin.loaimon.sua')
            <!-- Đóng sửa -->
        </div>
        <!-- đóng card shadow mb-4 -->
        <!-- thêm -->
        @include('admin.loaimon.them')
    </div>
</div>

@endsection