<html>

<head>
    <title> Đăng nhập </title>

    <link rel="stylesheet" type="text/css" href="csslogin/style.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

</head>

<body>

    <div class="login-box">
        <img src="csslogin/avatar.png" class="avatar">
        <h1>Login Here</h1>

            <?php //Hiển thị thông báo thành công?>
            @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" >
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            @endif
            <?php //Hiển thị thông báo lỗi?>
            @if ( Session::has('error') )
            <div class="alert alert-danger alert-dismissible" style="text-align: center;padding-bottom:10px; color:red" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" style="text-align: center; padding-bottom:10px; color:red" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                
            </div>
            @endif
            <form role="form" action="{{ url('/login') }}" method="POST">
                {!! csrf_field() !!}
                <p>Tài khoản</p>
                <input type="text" style="border: none" name="username" class="form-control"
                    placeholder="Nhập tài khoản" value="{{ old('user') }}" autofocus>
                <p>Mật khẩu</p>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                <input type="submit" class="btn btn-primary btn-block" value="Đăng nhập"></input>

            </form>


        </div>
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>