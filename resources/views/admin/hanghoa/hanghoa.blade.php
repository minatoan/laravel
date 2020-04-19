@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-dark font-weight-bold">Danh sách nguyên liệu</h4>
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#them">Thêm
                                mới</button>
                            <a href="{{route('get-nhaphang-theo-tochuc', [$customer->matc, $customer->id])}}"><button type="button" class="btn btn-success">Nhập hàng</button></a>
                            <a href="{{route('get-xuathang-theo-tochuc', [$customer->matc, $customer->id])}}"><button type="button" class="btn btn-danger">Xuất hàng</button></a>

                        </div>
                        <div class="table-responsive">
                            <table id="datatables" class="table table-bordered table-striped table-hover"
                                data-page-list="[10, 50, 300]" data-sort-order="desc" data-search="true">
                                <thead class=" text-primary">
                                    <th>STT</th>
                                    <th>Tên nguyên liệu</th>
                                    <th>Số lượng</th>
                                    <th>Đơn vị tính</th>
                                    <th>Tên tổ chức</th>
                                    <th>Thao tác</th>
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($hanghoa as $hh)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$hh->tenhang}}</td>
                                        <td>{{$hh->soluong}}</td>
                                        <td>{{$hh->dvt}}</td>
                                        <td>{{$hh->tochuc->tentc}}</td>
                                        <td class="left">
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#sua{{$hh->id}}"><i class="far fa-edit"
                                                    style="color:black"></i>
                                            </button> 
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
            @include('admin.hanghoa.sua')
            <!-- Đóng sửa -->
        </div>
        <!-- đóng card shadow mb-4 -->
        <!-- thêm -->
        @include('admin.hanghoa.them')
    </div>
</div>

@endsection