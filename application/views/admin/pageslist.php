<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pages List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('adminpage/pageslist'); ?>">Pages</a></li>
		<li class="active">List</li>
      </ol>
    </section>
	<?php
	// echo "<pre>";
	// print_r($pagelistarr);
	// echo "</pre>";
	?>
	<div class="box">
		<!--
		<div class="box-header">
		  <h3 class="box-title">Data Table With Full Features</h3>
		</div>
		-->
		<!-- /.box-header -->
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
			  <th>Sl.No.</th>
			  <th>Page id</th>
			  <th>Page Heading</th>
			  <th>Added Time</th>
			  <th>Actions</th>
			  <!--<th>CSS grade</th>-->
			</tr>
			</thead>
			<tbody>
			<?php
				foreach($pagelistarr as $pagelistarrkey => $pagelistarrval){
			?>
				<tr>
				  <td><?php echo $pagelistarrval -> id; ?></td>
				  <td><?php echo $pagelistarrval -> pageid; ?></td>
				  <td><?php echo $pagelistarrval -> pageheading; ?></td>
				  <td><?php echo date("d-M-Y H:i:s",$pagelistarrval -> entrytime); ?></td>
				  <td><a href="<?php echo base_url("adminpage/editpage/".$pagelistarrval -> pageid); ?>">Edit</a></td>
				  <!--<td>X</td>-->
				</tr>
			<?php } ?>
			<!--
			<tr>
			  <td>Other browsers</td>
			  <td>All others</td>
			  <td>-</td>
			  <td>-</td>
			  <td>U</td>
			</tr>
			-->
			</tbody>
			<tfoot>
			<tr>
			  <th>Sl.No.</th>
			  <th>Page id</th>
			  <th>Page Heading</th>
			  <th>Added Time</th>
			  <th>Actions</th>
			  <!--<th>CSS grade</th>-->
			</tr>
			</tfoot>
		  </table>
		</div>
		<!-- /.box-body -->
	  </div>
</div>
<!-- /.content-wrapper -->