<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/AdminLTE/'); ?>bootstrap/css/bootstrap.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />
  <!--<link rel="stylesheet" href="<?php echo base_url('assets/modules/font-awesome/4.5.0/css/'); ?>font-awesome.min.css">-->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
  <!--<link rel="stylesheet" href="<?php //echo base_url('assets/modules/ionicons/2.0.1/css/'); ?>ionicons.min.css">-->
  <!-- jvectormap -->
  <!--<link rel="stylesheet" href="<?php //echo base_url('assets/modules/AdminLTE/'); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">-->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/AdminLTE/'); ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/AdminLTE/'); ?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="<?php //echo base_url('assets/modules/'); ?>html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="<?php //echo base_url('assets/modules/'); ?>respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/AdminLTE/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <?php
	$datatablecssarr = array('pageslist','blogslist','blogentrylist','albumlist','invoiceslist','quotationslist','formslist','formentrieslist');
	//if($function == "pageslist"){
	if(in_array($function,$datatablecssarr)){
	?>
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/AdminLTE/'); ?>plugins/datatables/dataTables.bootstrap.css">
  <?php } ?>
  <!--<link rel="stylesheet" href="<?php //echo base_url("assets/modules/AdminLTE/plugins/datepicker/datepicker3.css"); ?>" />-->
  <?php
	switch($controller){
		case "adminimages":
			switch($function){
				case "albumimageslist":
					//echo '<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>';
					//echo '<script src="'.base_url('assets/js/admin/ngs/app.js').'"></script>';
					//$ngs = "s";
				break;
			}
		break;
		default:
		
		break;
	}
  ?>
  
  
  
</head>