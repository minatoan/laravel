@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Chi tiết bill</h4>
                    </div>                    
                    <div class="card-body">                        
                        <div class="table-responsive">
                            <table id="datatables" class="table table-bordered table-striped table-hover"
                                >
                                <thead class=" text-primary">
                                    <th>STT</th>
                                    <th>Tên nhân viên</th>
                                    <th>Ngày tạo</th>
                                    <th>Bàn</th>
                                    <th>Tổ chức</th>
                                    <th>Thao tác</th>
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($bill as $bbl)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$bbl->nhanvien->tennv}}</td>
                                        <td>{{$bbl->ngaytao}}</td>
                                        <td>{{$bbl->ban->tenban}}</td>
                                        <td>{{$bbl->ban->tochuc->tentc}}</td>
                                        
                                        <td class="left">
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#sua"><i class="fas fa-copy"
                                                    style="color:black"> Xem chi tiết</i>
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
            
            <!-- Đóng sửa -->
        </div>
        <!-- đóng card shadow mb-4 -->
        <!-- thêm -->
        
    </div>
</div>

@endsection