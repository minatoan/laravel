@extends('layout.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                
                    <a href="{{route('get-bill-theo-tochuc-print',[$customer->matc, $customer->id])}}"
                                class=""><button type="button" class="btn btn-default"
                                        >
                                            <i class="fas fa-print"></i> In trang</button></a>
                    <div class="table-responsive">
                        <table  class="table table-bordered table-striped table-hover">

                            <thead class=" text-primary">
                                <th>STT</th>
                                <th>Tên thu ngân</th>
                                <th>Ngày tạo</th>
                                <th>Bàn</th>
                                <th>Tên món</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                </th>
                            </thead>
                            <tbody>
                                @php
                                $i=0;
                                $sl = 0;
                                @endphp
                                @foreach($bill as $bbl)
                                <?php 
                                    $ctb  = DB::table('chitietbill')->where('mabill', $bbl->id)->get();
                                    
                                ?>
                                @foreach($ctb as $ct)
                                <?php
                                        $food = DB::table('menu')->where('id', $ct->mamon)->first();
                                        $sum = ($ct->dongia*$ct->soluong);                                            
                                        $sl +=  $ct->soluong ;  
                                ?>

                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$bbl->nhanvien->tennv}}</td>
                                    <td>{{$bbl->ngaytao}}</td>
                                    <td>{{$bbl->ban->tenban}}</td>
                                    <td>{{$food->tenmon}}</td>
                                    <td>{{$ct->soluong}}</td>
                                    <td>{{number_format($ct->dongia,0,",",".")}} VNĐ</td>
                                    <td>{{number_format($sum,0,",",".")}} VNĐ</td>
                                    
                                </tr>
                                @endforeach

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </form>
                    <br>

                </div>

            </div>
        </div>
        <!-- Sửa -->
        <!-- Modal -->

        <!-- Đóng sửa -->
    </div>
</div>
</div>
<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
@endsection