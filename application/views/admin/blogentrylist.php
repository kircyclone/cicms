<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pages List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('adminblog/blogslist'); ?>">Blogs</a></li>
		<li class="active">List</li>
      </ol>
    </section>
	<?php
	// echo "<pre>";
	// print_r($bloglistarr);
	// echo "</pre>";
	?>
	<div class="box">
		<!-- /.box-header -->
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
			  <th>Sl.No.</th>
			  <th>Page Heading</th>
			  <th>Added Time</th>
			  <th>Actions</th>
			</tr>
			</thead>
			<tbody>
			<?php
				foreach($bloglistarr as $pagelistarrkey => $pagelistarrval){
			?>
				<tr>
				  <td><?php echo ++$slno; ?></td>
				  <td><?php echo $pagelistarrval -> entryheading; ?></td>
				  <td><?php echo date("d-M-Y H:i:s",$pagelistarrval -> entrytime); ?></td>
				  <td><a href="<?php echo base_url("adminblog/addblogentry/".$pagelistarrval -> blogentryid."/".$this -> uri -> segment(3)); ?>">Edit</a></td>
				</tr>
			<?php } ?>
			</tbody>
			<tfoot>
			<tr>
			  <th>Sl.No.</th>
			  <th>Page Heading</th>
			  <th>Added Time</th>
			  <th>Actions</th>
			</tr>
			</tfoot>
		  </table>
		</div>
		<!-- /.box-body -->
	  </div>
</div>
<!-- /.content-wrapper -->