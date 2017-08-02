<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/AdminLTE/'); ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/font-awesome/4.5.0/css/'); ?>font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/ionicons/2.0.1/css/'); ?>ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/AdminLTE/'); ?>dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="<?php echo base_url('assets/modules/'); ?>html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="<?php echo base_url('assets/modules/'); ?>respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Log In</p>

    <form action="../../index2.html" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="User Name" id="username" />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password" />
		<input type="hidden" id="loginurl" value="<?php echo base_url('admin/login'); ?>" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" class="btn btn-primary btn-block btn-flat" id="adminlogin">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
	<!--
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
	-->
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <!--<a href="register.html" class="text-center">Register a new membership</a>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/modules/AdminLTE/'); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/modules/AdminLTE/'); ?>bootstrap/js/bootstrap.min.js"></script>

<?php
	switch($controller){
		case "admin":
				switch($function){
					case "loginform":
						echo '<script type="text/javascript" src="'.base_url('assets/js/admin/').'login.js"></script>';
						break;
				}
			break;
		default:
			
			break;
	}
?>
<!-- Bootstrap Modal -->
<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#alertModal">Open Modal</button>-->
<div id="alertModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title" id="modalheading">Modal Header</h4>
	  </div>
	  <div class="modal-body" id="modaldescription">
		<p>Some thing went wrong !!!</p>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  </div>
	</div>

  </div>
</div>
</body>
</html>