@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-dark font-weight-bold">Danh sách Menu</h4>
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
                            <table id="datatables" class="table table-bordered table-striped table-hover"
                                data-page-list="[10, 50, 300]" data-sort-order="desc" data-search="true">
                                <thead class=" text-primary">
                                    <th>STT</th>
                                    <th>Tên đồ uống</th>
                                    <th>Loại món</th>
                                    <th>Giá</th>
                                    <th>Tổ chức</th>
                                    <th>Thao tác</th>
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($menu as $mn)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$mn->tenmon}}</td>
                                        <td>{{$mn->loaimon->tenloaimon}}</td>
                                        <td>{!! number_format($mn["dongia"],0,",",".")!!} VNĐ</td>
                                        <td>{{$mn->tochuc->tentc}}</td>
                                        <td class="left">
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#sua{{$mn->id}}"><i class="far fa-edit"
                                                    style="color:black"></i>
                                            </button>
                                            <a href="{{route('menu-xoa', $mn->id)}}"><button type="button"
                                                    class="btn btn-danger"><i class="far fa-trash-alt"></i>
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
            @include('admin.menu.sua')
            <!-- Đóng sửa -->
        </div>
        <!-- đóng card shadow mb-4 -->
        <!-- thêm -->
        @include('admin.menu.them')
    </div>
</div>

@endsection