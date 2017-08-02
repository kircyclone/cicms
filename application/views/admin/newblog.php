<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New blog Form
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('admin/blogslist'); ?>">Blogs</a></li>
		<li class="active">New Blog Form</li>
      </ol>
    </section>
	
	
	<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">New Blog Form</h3>
				<?php
					if($message != ""){
						echo '<div>'.$message.'</div>';
					}
				?>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
			 <!--<form role="form" action="<?php //echo base_url('admin/newblog'); ?>" method="post">-->
				<div class="box-body">
					<div class="form-group">
					  <label for="blogname">Blog Name</label>
					  <input type="hidden" id="addblogurl" name="addblogurl" value="<?php echo base_url('adminblog/newblog'); ?>" />
					  <input type="text" class="form-control" id="blogname" name="blogname" placeholder="Blog Name" />
					</div>
				</div>
				<!--
				<div class="box-body">
					<div class="form-group">
					  <label for="editor1">Page Contents</label>
						<textarea id="editor1" name="pagedescription" rows="10" cols="80"></textarea>
					</div>
				</div>
				-->
				<div class="box-footer">
					<button type="cancel" class="btn btn-default">Cancel</button>
					<button type="submit" id="addblog" class="btn btn-info pull-right">Add New Blog</button>
				</div>
			<!--</form>-->
		</div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	
	
</div>
<!-- /.content-wrapper -->