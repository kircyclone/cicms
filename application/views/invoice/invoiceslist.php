<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoices List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li><a href="<?php //echo base_url('user/invoicelist'); ?>">Images Album</a></li>-->
		<li class="active"><a href="<?php echo base_url('invoice/invoiceslist/'); ?>">Invoice List</a></li>
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
	<section class="content">
		<!-- /.box -->
		<div class="box">
			<!--
			<div class="box-header">
			  <h3 class="box-title">Data Table With Full Features</h3>
			</div>
			-->
			<!-- /.box-header -->
			<!--<input type="hidden" id="statuschangeurl" value="<?php //echo base_url("user/userstatuschange"); ?>" />-->
			<button type="button" class="btn btn-default pull-right" style="margin:10px;" onClick="window.location.href='<?php echo base_url('invoice/addnewinvoice'); ?>'"><i class="fa fa-credit-card"></i>Add New Invoice</button>
			<br /><br />
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>Sl. No.</th>
					<th>Invoice Id</th>
					<th>To Name</th>
					<th>To Phone</th>
					<th>To Email</th>
					<th>Total Amount</th>
					<th>Added Time</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
			 <?php
			 //echo "<pre>";print_r($invoiceslist);echo "</pre>";
			 $counter = 0;
			 if(is_array($invoiceslist) && count($invoiceslist) > 0)
			 foreach($invoiceslist as $invoicelistarrkey => $invoicelistarrval){
			 ?>
				<tr>
					<td style="text-align:center;"><?php echo ++$counter; ?></td>
					<td><?php echo $invoicelistarrval -> invoiceid; ?></td>
					<td><?php
						echo $invoicelistarrval -> toname;
					?></td>
					<td><?php
						echo $invoicelistarrval -> tophone;
					?></td>
					<td><?php
						echo $invoicelistarrval -> toemail;
					?></td>
					<td style="text-align:right;"><?php
						echo $invoicelistarrval -> gtotal;
					?></td>
					<td><?php echo date("d-M-Y H:i A",$invoicelistarrval -> invoicedatetime); ?></td>
					<td><a style="CURSOR:pointer;" href="<?php echo base_url("invoice/invoiceprint/".$invoicelistarrval -> invoiceid); ?>">View / Print</a></td>
				</tr>
			  <?php
			 }
			  ?>
			  </tbody>
				<tfoot>
				<tr>
					<th>Sl. No.</th>
					<th>Invoice Id</th>
					<th>To Name</th>
					<th>To Phone</th>
					<th>To Email</th>
					<th>Total Amount</th>
					<th>Added Time</th>
					<th>Actions</th>
				</tr>
				</tfoot>
				</table>
			</div>
			<!-- /.box-body -->
		  </div>
	  </section>
</div>
<!-- /.content-wrapper -->