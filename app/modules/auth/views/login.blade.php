<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LARAPANEL | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{ URL::to('engine/bootstrap/css/bootstrap.min.css') }}" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="http://cdn.aidicms.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ URL::to('engine/adminLTE/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ URL::to('engine/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.aidicms.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.aidicms.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{ URL::to('/') }}"><b>LARAPANEL</b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <p class="login-box-msg">Sign in to start your session</p>
        {{ Form::open(array('route' => array('authController_doLogin', ''), 'method' => 'POST')) }}
        <div class="form-group has-feedback">
            {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        {{ Form::checkbox('remember', 'value', false); }}  Remember Me
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                {{ Form::submit('Sign In', array('class' => 'btn btn-primary btn-block btn-flat')) }}
            </div><!-- /.col -->
        </div>
        {{ Form::close() }}

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
        <a href="{{ URL::to('/') }}" class="text-center">RS PARU</a>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="{{ URL::to('engine/adminLTE/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ URL::to('engine/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ URL::to('engine/adminLTE/dist/js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::to('engine/iCheck/icheck.min.js') }}" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>