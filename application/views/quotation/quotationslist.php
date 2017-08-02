<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quotations List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li><a href="<?php //echo base_url('user/quotationlist'); ?>">Images Album</a></li>-->
		<li class="active"><a href="<?php echo base_url('quotation/quotationslist/'); ?>">Quotations List</a></li>
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
			<input type="hidden" id="statuschangeurl" value="<?php echo base_url("user/userstatuschange"); ?>" />
			<button type="button" class="btn btn-default pull-right" style="margin:10px;" onClick="window.location.href='<?php echo base_url('quotation/addnewquotation'); ?>'"><i class="fa fa-credit-card"></i>Add New Quotation</button>
			<br /><br />
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>Sl. No.</th>
					<th>Quotation Id</th>
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
			 //echo "<pre>";print_r($quotationslist);echo "</pre>";
			 $counter = 0;
			 if(is_array($quotationslist) && count($quotationslist) > 0)
			 foreach($quotationslist as $quotationlistarrkey => $quotationlistarrval){
			 ?>
				<tr>
					<td style="text-align:center;"><?php echo ++$counter; ?></td>
					<td><?php echo $quotationlistarrval -> quotationid; ?></td>
					<td><?php
						echo $quotationlistarrval -> toname;
					?></td>
					<td><?php
						echo $quotationlistarrval -> tophone;
					?></td>
					<td><?php
						echo $quotationlistarrval -> toemail;
					?></td>
					<td><?php
						echo $quotationlistarrval -> gtotal;
					?></td>
					<td><?php echo date("d-M-Y H:i A",$quotationlistarrval -> quotationdatetime); ?></td>
					<td>
					<a style="CURSOR:pointer;" href="<?php echo base_url("quotation/quotationprint/".$quotationlistarrval -> quotationid); ?>">View / Print</a>
					<br />
					<a style="CURSOR:pointer;" href="" onClick="return convertqtoi('<?php echo $quotationlistarrval -> quotationid; ?>')">Convert to Invoice</a>
					</td>
				</tr>
			  <?php
			 }
			  ?>
			  </tbody>
				<tfoot>
				<tr>
					<th>Sl. No.</th>
					<th>Quotation Id</th>
					<th>To Name</th>
					<th>To Phone</th>
					<th>To Email</th>
					<th>Total Amount</th>
					<th>Added Time</th>
					<th>Actions</th>
				</tr>
				</tfoot>
				</table>
				<input type="hidden" id="converttoinvoiceurl" value="<?php echo base_url("invoice/convertinvoice"); ?>" />
			</div>
			<!-- /.box-body -->
		  </div>
	  </section>
</div>
<!-- /.content-wrapper -->