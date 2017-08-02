<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blogs List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('adminblog/blogslist'); ?>">Blogs</a></li>
		<li class="active">List</li>
      </ol>
    </section>
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
			  <th>Blog Name</th>
			  <th>Added Time</th>
			  <th>Actions</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$slnocount = 0;
				foreach($bloglistarr as $bloglistarrkey => $bloglistarrval){
			?>
				<tr>
				  <td><?php echo ++$slnocount; ?></td>
				  <td><?php echo $bloglistarrval -> blogname; ?></td>
				  <td><?php echo date("d-M-Y H:i:s",$bloglistarrval -> createdtime); ?></td>
				  <td><a href="<?php echo base_url("adminblog/editblog/".$bloglistarrval -> blogid); ?>">Edit</a> &nbsp; | &nbsp; 
				  <a href="<?php echo base_url("adminblog/addblogentry/".$bloglistarrval -> blogid); ?>">Add Blog Entry</a> &nbsp; | &nbsp; 
				  <a href="<?php echo base_url("adminblog/blogentrylist/".$bloglistarrval -> blogid); ?>">Blog Entry List</a>
				  </td>
				</tr>
			<?php } ?>
			</tbody>
			<tfoot>
			<tr>
			  <th>Sl.No.</th>
			  <th>Blog Name</th>
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