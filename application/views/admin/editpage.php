<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Page Form
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('adminpage/pageslist'); ?>">Pages</a></li>
		<li class="active">Edit Page Form</li>
      </ol>
    </section>
	
	
	<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Page Form</h3>
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
			 <form role="form" action="<?php echo base_url('adminpage/editpage'); ?>" method="post">
				<div class="box-body">
					<div class="form-group">
					  <label for="pageheading">Page Heading</label>
					  <input type="text" class="form-control" id="pageheading" name="pageheading" placeholder="Page Heading" value="<?php echo $pageheading; ?>" />
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
					  <label for="editor1">Page Contents</label>
						<input type="hidden" id="submitted" name="submitted" value="<?php echo $submitted; ?>" />
						<textarea id="editor1" name="pagedescription" rows="10" cols="80"><?php echo $pagedescription; ?></textarea>
					</div>
				</div>
				<div class="box-footer">
					<button type="cancel" class="btn btn-default">Cancel</button>
					<button type="submit" class="btn btn-info pull-right">Edit</button>
				</div>
			</form>
		</div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	
	
</div>
<!-- /.content-wrapper -->