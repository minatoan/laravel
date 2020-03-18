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
                        <div class="panel-body">
                            <form action="{{route('likebill')}}" method="get">
                                <div class="form-group row">
                                    <div style="padding-right:7px">
                                        <input type="date" name="dateform"  class="form-control">
                                    </div>
                                    <div style="padding-right:7px">
                                        <input type="date" name="dateto" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tìm</button>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table id="datatables" class="table table-bordered table-striped table-hover">

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
                                            <a href="{{route('ct-bill',$bbl->id)}}">
                                                <button type="button" class="btn " style="background-color:#605ca8;"><i
                                                        class="fas fa-copy" style="color:#ffffff"> Xem chi tiết</i>
                                                </button> </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </form>
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