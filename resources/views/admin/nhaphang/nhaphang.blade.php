@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title text-dark font-weight-bold">Nhập hàng</h4>
                    </div>
                    @if(count($errors)>0)
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $err)
                        {{$err}}<br>
                        @endforeach
                    </div>
                    @endif
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
                                    <select name="donvitinh"  class="form-control">
                                    <option value="" disabled selected>Chọn đơn vị tính</option>
                                        <option value="Két">Két</option>
                                        <option value="Chai">Chai</option>
                                        <option value="Lon">Lon</option>
                                        <option value="Thùng">Thùng</option>
                                        <option value="Bịch">Bịch</option>
                                        <option value="Hộp">Hộp</option>
                                        <option value="Kilogram">Kilogram</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 ">
                                    <label>Đơn giá</label>
                                    <input type="text" class="form-control" name="dongia">
                                </div>
                                <div class="col-sd-1.5 ">
                                    <label style="color: #ffffff">. </label>
                                    <button class="btn btn-outline-primary form-control"><i
                                            class="fas fa-arrow-down"></i></button>
                                </div>
                            </div>
                        </form>
                        <form action="{{route('add-nhaphang-theo-tochuc-to-cart', [$customer->matc, $customer->id])}}"
                            method="post">
                            {{csrf_field()}}
                            <?php $data = Request::session()->get('data');
                                        $summ=0;  ?>
                            @if($data)
                            @foreach($data as $value)
                            <?php                                        
                                        $total = ($value['quantity'] * $value['price']);
                                        $summ+= $total;
                                        ?>
                            @endforeach
                            @endif

                            <div class="table-responsive">
                                <table id="tabl" class="table table-bordered table-striped table-hover">
                                    <thead class=" text-primary">
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn vị tính</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                        <th>Thao tác</th>

                                        </th>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i=0;
                                        $sum = 0;
                                        $data = Request::session()->get('data');
                                        $index=-1;
                                        @endphp
                                        @if($data)

                                        @foreach($data as $value)
                                        @php
                                        
                                        $sp = DB::table('hanghoa')->where('id', $value['name'])->first();
                                        // var_dump($sp);
                                        $total = ($value['quantity'] * $value['price']);
                                        $sum+= $total;
                                        $index++;
                                        @endphp
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$sp->tenhang}}</td>
                                            <td>{{$value['quantity']}}</td>
                                            <td>{{$value['attributes']['donvitinh']}}</td>
                                            <td>{{number_format($value['price'],0,",",".")}}</td>
                                            <td>{{number_format($value['price']*$value['quantity'],0,",",".")}}</td>
                                            <td class="left">
                                                <a href="{{route('xoa-cart', [$value['id']])}}"
                                                    class="btn"><i class="fas fa-times"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach


                                        @endif

                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-sm-2 ">
                                        <?php $nv = DB::table('nhanvien')->where('id', $id_nv)->first(); ?>

                                        <label>Nhân viên</label>
                                        <input type="text" value="{{$nv->tennv}}"  readonly class="form-control">
                                        <input type="hidden" value="{{$nv->id}}" class="form-control" name="id_nv">
                                    </div>
                                    <div class="col-md-2 ">
                                        <label>Ngày nhập</label>
                                        <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                            <input class="form-control"  type="text" name="ngaynhap">
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
                                        <input type="text" readonly name="tongtien" class="form-control"
                                            value="{{number_format($summ,0,",",".")}}">
                                    </div>
                                    <div class="col-sm-4 ">
                                        <label>Ghi chú</label>
                                        <input type="text" class="form-control" name="ghichu">
                                    </div>
                                </div>
                            </div>
                            <div align="center">
                                <button class="btn btn-success">
                                    Nhập hàng</button>
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