@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Nhân viên</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#them">Thêm</button>
                        </div>
                        <div class="table-responsive">
                            <table id="datatables" class="table table-bordered table-striped" data-sort-order="desc"
                                data-search="true">
                                <thead class=" text-primary">
                                <th>STT</th>
                                    <th>Tài khoản</th>
                                    <th>Tên nhân viên</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>SĐT</th>
                                    <th>Địa chỉ</th>
                                    <th>Ca làm</th>
                                    <th>Tổ chức</th>
                                    <th>Ghi chú</th>
                                    <th>Thao tác</th>
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($nhanvien as $nv)

                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$nv->username}}</td>
                                        <td>{{$nv->tennv}}</td>
                                        <td>{{$nv->ngaysinh}}</td>
                                        <td>{{$nv->gioitinh}}</td>
                                        <td>{{$nv->sdt}}</td>
                                        <td>{{$nv->diachi}}</td>
                                        <td>{{$nv->calam}}</td>
                                        <td>{{$nv->tochuc->tentc}}</td>
                                        <td>{{$nv->ghichu}}</td>
                                        <td class="left">
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#sua{{$nv->id}}"><i class="far fa-edit"
                                                    style="color:black"></i>
                                            </button>
                                            <a href="{{route('test-xoa',$nv->id)}}"><button type="button"
                                                    class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                                </button>                                              
                                        </td>
                                      
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
            @include('admin.test.sua')
            <!-- Đóng sửa -->
        </div>        
        <!-- thêm -->
        @include('admin.test.them')
        <!--đóng thêm -->
    </div>
</div>



@endsection