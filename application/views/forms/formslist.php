<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Forms List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li><a href="<?php //echo base_url('user/formslist'); ?>">Images Album</a></li>-->
		<li class="active"><a href="<?php echo base_url('forms/formslist/'); ?>">Forms List</a></li>
      </ol>
    </section>
	<div style="padding-left:20px;">
	<?php
		//echo "addusermessage - ".$addusermessage;
		// $successnum = $this -> uri -> segment(4);
		// $failurenum = $this -> uri -> segment(5);
		// if($successnum != "" || $successnum > 0){
	?>
	<?php //echo $successnum; ?><!-- Uploads Success !!!-->
	 <?php //}if($failurenum != "" || $failurenum > 0){ ?>
	<!--<br /><?php //echo $failurenum; ?> Uploads Failure !!!<br />-->
	<?php //} ?>
	</div>
	<!--<section class="content">-->
		<!-- /.box -->
		<div class="box">
			<!--
			<div class="box-header">
			  <h3 class="box-title">Data Table With Full Features</h3>
			</div>
			-->
			<!-- /.box-header -->
			<input type="hidden" id="statuschangeurl" value="<?php echo base_url("user/userstatuschange"); ?>" />
			<button type="button" class="btn btn-default pull-right" style="margin:10px;" onClick="window.location.href='<?php echo base_url('forms/addnewform'); ?>'"><i class="fa fa-credit-card"></i>Add New Form</button>
			<br /><br />
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>Sl. No.</th>
					<th>Form Id</th>
					<th>Form Name</th>
					<th>Added By</th>
					<th>Added Time</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
			 <?php
			 //echo "<pre>";print_r($formslist);echo "</pre>";
			 $counter = 0;
			 if(is_array($formslist) && count($formslist) > 0)
			 foreach($formslist as $formslistarrkey => $formslistarrval){
			 ?>
				<tr>
					<td style="text-align:center;"><?php echo ++$counter; ?></td>
					<td><?php echo $formslistarrval -> formid; ?></td>
					<td><?php
						echo $formslistarrval -> formname;
					?></td>
					<td><?php
						echo $formslistarrval -> addedby;
					?></td>
					<td><?php
						echo date("d/m/Y H:i:s",$formslistarrval -> addedtime);
					?></td>
					<td>
					<a href="<?php echo base_url("forms/formentrieslist/".$formslistarrval -> formid); ?>">Form Entries</a>
					<!--<a style="CURSOR:pointer;" href="<?php //echo base_url("forms/formsprint/".$formslistarrval -> formid); ?>">Edit</a>-->
					<!--<br />
					<a style="CURSOR:pointer;" href="" onClick="return convertqtoi('<?php //echo $formslistarrval -> formid; ?>')">Convert to Invoice</a>-->
					</td>
				</tr>
			  <?php
			 }
			  ?>
			  </tbody>
				<tfoot>
				<tr>
					<th>Sl. No.</th>
					<th>Form Id</th>
					<th>Form Name</th>
					<th>Added By</th>
					<th>Added Time</th>
					<th>Actions</th>
				</tr>
				</tfoot>
				</table>
				<input type="hidden" id="converttoinvoiceurl" value="<?php echo base_url("invoice/convertinvoice"); ?>" />
			</div>
			<!-- /.box-body -->
		  </div>
	  <!--</section>-->
</div>
<!-- /.content-wrapper -->