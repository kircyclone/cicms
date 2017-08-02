<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $pagetitle; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('adminblog/blogslist'); ?>">Blogs</a></li>
		<li class="active"><?php echo $pagetitle; ?></li>
      </ol>
    </section>
	
	<?php if($message != "") $this -> load -> view("admin/message"); ?>
	
	<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $pagetitle; ?></h3>
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
			<form role="form" action="<?php echo base_url('adminblog/addblogentry/'.$this -> uri -> segment(3)); ?><?php echo ($this -> uri -> segment(4) == "")?"":"/".$this -> uri -> segment(4); ?>" method="post">
				<div class="box-body">
					<div class="form-group">
					  <label for="blogname">Blog Heading</label>
					  <input type="hidden" id="addblogentryurl" name="addblogurl" value="<?php echo base_url('adminblog/newblogentryinsert'); ?>" />
					  <input type="hidden" id="blogid" name="blogid" value="<?php echo $this -> uri -> segment(3); ?>" />
					  <input type="hidden" id="blogentryidpost" name="blogentryidpost" value="<?php echo $this -> uri -> segment(4); ?>" />
					  
					  <input type="text" class="form-control" id="blogheading" name="blogheading" placeholder="Blog Heading" value="<?php if($this -> uri -> segment(4) != "")echo $blogentrycontent -> entryheading; ?>" />
					</div>
				</div>
				
				<div class="box-body">
					<div class="form-group">
					  <label for="editor1">Blog Contents</label>
						<textarea id="editor1" name="blogcontent" rows="10" cols="80"><?php if($this -> uri -> segment(4) != "")echo $blogentrycontent -> entrycontent; ?></textarea>
					</div>
				</div>
				
				<div class="box-footer">
					<button type="cancel" class="btn btn-default">Cancel</button>
					<button type="submit" id="addblogentrysubmit" name="addblogentrysubmit" class="btn btn-info pull-right"><?php echo $submitbuttoncaption; ?></button>
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