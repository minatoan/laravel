@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Nhập hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-2 ">
                                <?php $nv = DB::table('nhanvien')->where('id', $id_nv)->first(); ?>

                                <label>Nhân viên</label>
                                <input type="text" value="{{$nv->tennv}}" class="form-control">
                            </div>
                            <div class="col-md-2 ">
                                <label>Ngày nhập</label>
                                <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" readonly type="text">
                                    <span class="input-group-addon"></span>
                                </div>
                            </div>
                            <div class="col-sm-2 ">
                                <label>Nhà cung cấp</label>
                                <select class="form-control ">
                                    <option value="" disabled selected>Chọn nhà cung cấp</option>
                                    @foreach($ncc as $nc)
                                    <option value="{{$nc->id}}">{{$nc->tenncc}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-sm-2 ">
                                <label>Tổng tiền</label>
                                <input type="text" readonly class="form-control">
                            </div>
                            <div class="col-sm-4 ">
                                <label>Ghi chú</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <form>
                            <div class="form-group row">
                                <div class="col-sm-2 ">
                                    <label>Sản phẩm</label>
                                    <select class="form-control ">
                                        <option value="" disabled selected>Chọn sản phẩm</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 ">
                                    <label>Số lượng</label>
                                    <input type="number" min="0.1" step=".01" class="form-control">
                                </div>
                                <div class="col-sd-1 ">
                                    <label style="color: #ffffff">. </label>
                                    <button type="button" class="btn btn-primary form-control"><i
                                            class="fas fa-arrow-down"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="tablee" class="table table-bordered table-striped table-hover">
                                <thead class=" text-primary">
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                    </th>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp





                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">                                    
                                    <button type="submit" class="btn btn-success">
                                        Lưu</button>
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