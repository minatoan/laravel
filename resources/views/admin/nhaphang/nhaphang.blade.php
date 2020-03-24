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
                        <form action="{{route('get-nhaphang-theo-tochuc-to-cart', [$customer->matc, $customer->id])}}"
                            method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group row">
                                <div class="col-sm-4 ">
                                    <label>Sản phẩm</label>
                                    <select class="form-control " name="tensp">
                                        <option value="" disabled selected>Chọn sản phẩm</option>
                                        @foreach($hanghoa as $hh)
                                        <option value="{{$hh->id}}">{{$hh->tenhang}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2 ">
                                    <label>Số lượng</label>
                                    <input type="number" min="0.1" step=".01" placeholder="Số lượng phải lớn hơn 0"
                                        class="form-control" name="soluong">
                                </div>
                                <div class="col-sm-2">
                                    <label>Đơn vị tính</label>
                                    <select name="donvitinh" class="form-control">
                                        <option value="Két">Két</option>
                                        <option value="Lon">Lon</option>
                                        <option value="Thùng">Thùng</option>
                                        <option value="Bịch">Bịch</option>
                                        <option value="Hộp">Hộp</option>
                                        <option value="Chai">Kilogram</option>
                                        <option value="Kilogram">Kilogram</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 ">
                                    <label>Đơn giá</label>
                                    <input type="text" class="form-control" name="dongia">
                                </div>
                                <div class="col-sd-1.5 ">
                                    <label style="color: #ffffff">. </label>
                                    <button class="btn btn-primary form-control"><i
                                            class="fas fa-arrow-down"></i></button>
                                </div>
                            </div>
                        </form>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-2 ">
                                    <?php $nv = DB::table('nhanvien')->where('id', $id_nv)->first(); ?>

                                    <label>Nhân viên</label>
                                    <input type="text" value="{{$nv->tennv}}" class="form-control">
                                    <input type="hidden" value="{{$nv->id}}" class="form-control" name="id_nv">
                                </div>
                                <div class="col-md-2 ">
                                    <label>Ngày nhập</label>
                                    <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                        <input class="form-control" readonly type="text" name="ngaynhap">
                                        <span class="input-group-addon"></span>
                                    </div>
                                </div>
                                <div class="col-sm-2 ">
                                    <label>Nhà cung cấp</label>
                                    <select class="form-control " name="ncc">
                                        <option value="" disabled selected>Chọn nhà cung cấp</option>
                                        @foreach($ncc as $nc)
                                        <option value="{{$nc->id}}">{{$nc->tenncc}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-sm-2 ">
                                    <label>Tổng tiền</label>
                                    <input type="text" readonly class="form-control"
                                        value="{{number_format(Cart::getTotal())}}">
                                </div>
                                <div class="col-sm-4 ">
                                    <label>Ghi chú</label>
                                    <input type="text" class="form-control" name="ghichu">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="crud_table">                                
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th width="10%">ĐVT</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                    <th width="5%"></th>
                                </tr>
                                <tr>
                                    <td contenteditable="true" class="sp"></td>
                                    <td contenteditable="true" class="dvt"></td>
                                    <td contenteditable="true" class="sl"></td>
                                    <td contenteditable="true" class="dg"></td>
                                    <td contenteditable="true" class="tt"></td>
                                    <td></td>
                                </tr>
                            </table>
                            <div align="right">
                                <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
                            </div>
                            <div align="center">
                                <button type="button" name="save" id="save" class="btn btn-info">Save</button>
                            </div>
                            <br />
                            <div id="inserted_item_data"></div>
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