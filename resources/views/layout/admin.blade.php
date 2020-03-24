<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Coffee</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <base href="{{asset('')}}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <!-- <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> -->
    <link rel="stylesheet" href="{{asset('plugins/tr/toastr.min.css')}}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layout.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout.menu')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer> -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <!-- <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script> -->
    <!-- <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="{{asset('build/js/Toasts.js')}}"></script>
    <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="{{asset('dist/js/pages/dashboard.js')}}"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('build/scss/mixins/_cards.scss')}}"></script>

    <script src="{{asset('dist/js/demo.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script> -->
    <script src="{{asset('dist/js/jquery.printPage.js')}}"></script>

    <script>
    $(document).ready(function() {
        $(".btnPrint").printPage();
    });
    </script>

    <script src="{{asset('plugins/tr/toastr.min.js')}}"></script>

    <!-- <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>-->
    {!! Toastr::message() !!}
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <!-- <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css"> -->
    <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> -->
    <script src="{{asset('dist/css/datepicker.css')}}"></script>

    <script src="{{asset('dist/js/bootstrap-datepicker.js')}}"></script>


    <script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker({
            autoclose: true,
            todayHighlight: true
        }).datepicker('update', new Date());
    });
    </script>
    <script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
    </script>

    <!-- table bootstraps cac trang -->
    <script>
    $(document).ready(function() {
        $('#datatables').DataTable();
    });
    </script>
    <!-- table bootstraps cac trang -->


    <!-- thong bao dang toast -->
    <!-- <script>
$(document).ready(function(){
    $("#myToast").toast('show');
});
</script> -->
    <!-- thong bao dang toast -->


    <!-- tìm kiếm trong trang order -->
    <script>
    $(document).ready(function() {
        $('#tables').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
        });
    });
    </script>
    <!-- tìm kiếm trong trang order -->
    <!-- update cart -->
    <script>
    $(document).ready(function() {
        $(".update").change(function() {
            var id = $(this).attr('id');
            var qty = $(this).parent().parent().find(".update").val();
            var token = $("input[name='_token']").val();
            // console.log(id+"-"+qty+"-"+token);
            // console.log(id_product);
            // console.log(qty);
            $.ajax({
                url: 'admin/update-cart/' + id + '/' + qty,
                type: 'GET',
                cache: false,
                data: {
                    "_token": token,
                    "id": id,
                    "qty": qty
                },
                success: function(data) {

                    location.reload();
                }
            });
        });
    });
    </script>
    <!-- update cart -->
    

<!-- nhap hang ne -->
    <script>
    $(document).ready(function() {
        var count = 1;
        $('#add').click(function() {
            count = count + 1;
            var html_code = "<tr id='row" + count + "'>";
            html_code += "<td contenteditable='true' class='sp'></td>";
            html_code += "<td contenteditable='true' class='dvt'></td>";
            html_code += "<td contenteditable='true' class='sl' ></td>";
            html_code += "<td contenteditable='true' class='dg' ></td>";
            html_code += "<td contenteditable='true' class='tt' ></td>";

            html_code += "<td><button type='button' name='remove' data-row='row" + count +
                "' class='btn btn-danger btn-xs remove'>-</button></td>";
            html_code += "</tr>";
            $('#crud_table').append(html_code);
        });
        $(document).on('click', '.remove', function() {
            var delete_row = $(this).data("row");
            $('#' + delete_row).remove();
        });
        // $('#save').click(function() {
        //     var sp = [];
        //     var dvt = [];
        //     var sl = [];
        //     var dg = [];
        //     var tt = [];

        //     $('.sp').each(function() {
        //         sp.push($(this).text());
        //     });
        //     $('.dvt').each(function() {
        //         dvt.push($(this).text());
        //     });
        //     $('.sl').each(function() {
        //         sl.push($(this).text());
        //     });
        //     $('.dg').each(function() {
        //         dg.push($(this).text());
        //     });
        //     $('.tt').each(function() {
        //         tt.push($(this).text());
        //     });

        //     $.ajax({
        //         url: "insert.php",
        //         method: "POST",
        //         data: {
        //             sp: sp,
        //             dvt: dvt,
        //             sl: sl,
        //             dg: dg,
        //             tt: tt,

        //         },
        //         success: function(data) {
        //             alert(data);
        //             $("td[contentEditable='true']").text("");
        //             for (var i = 2; i <= count; i++) {
        //                 $('tr#' + i + '').remove();
        //             }
        //             fetch_item_data();
        //         }
        //     });
        // });

        // function fetch_item_data() {
        //     $.ajax({
        //         url: "fetch.php",
        //         method: "POST",
        //         success: function(data) {
        //             $('#inserted_item_data').html(data);
        //         }
        //     })
        // }
        fetch_item_data();

    });
    </script>
<!-- nhap hang ne -->
</body>

</html>