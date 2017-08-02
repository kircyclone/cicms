<html>
<head>
<?php //echo $supportingfiles; ?>
</head>
<body>
<a href="<?php echo base_url("documentation"); ?>">Documentation</a> | <a href="<?php echo base_url("aboutus"); ?>">About Us</a> | <a href="<?php echo base_url("services"); ?>">Services</a> | <a href="<?php echo base_url("contactus"); ?>">Contact Us</a>
<!--inner-page-about-->
<div class="abouts">
	<div class="container" style="text:justify;">
<?php
echo $pagecontent;
?>
	</div>
</div>
Note : The form is not validated. If you know Codeigniter, you know what to do.<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;If you want to add more input types check models/Forms_model.php function formdisplayhtml1.
</body>
</html>