<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Images Album "<?php echo($albumdetailsarr[0] -> albumname); ?>" Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('adminimages/albumlist'); ?>">Images Album</a></li>
		<li class="active"><a href="<?php echo base_url('adminimages/albumimageslist/').$albumdetailsarr[0] -> albumid; ?>">List</a></li>
      </ol>
    </section>
	<div style="padding-left:20px;">
	<?php
		$successnum = $this -> uri -> segment(4);
		$failurenum = $this -> uri -> segment(5);
		if($successnum != "" || $successnum > 0){
	?>
	<?php echo $successnum; ?> Uploads Success !!!
	<?php }if($failurenum != "" || $failurenum > 0){ ?>
	<br /><?php echo $failurenum; ?> Uploads Failure !!!<br />
	<?php } ?>
	</div>
	<section class="content">
		<!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Images to Album</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--<form role="form">-->
              <div class="box-body">
                <div class="form-group">
                  <!--<label for="exampleInputEmail1">dfdfd</label>-->
                  <!--<input type="text" class="form-control" id="albumname" placeholder="Album Name">-->
				  
				  <!--<input type="hidden" id="addalbumurl" value="<?php //echo base_url('adminimages/addalbum'); ?>" />-->
				<!--
				<div id="ctrl-exmpl" ng-controller="SettingsController2">
					<label>Select Image File (png,jpg,gif) : </label>
					<ul style="list-style-type: none;">
					<li style="text-align:right;"><button ng-click="addContact()">add</button></li>
					<li ng-repeat="contact in contacts">
					  <input type="text" ng-model="contact.value" aria-labelledby="select_{{$index}}" />
					  <button ng-click="clearContact(contact)">clear</button>
					  <button ng-click="removeContact(contact)">X</button>
					</li>
					
					</ul>
				</div>
				-->
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('adminimages/addalbumimages'); ?>">
					<input type="hidden" name="albumid" value="<?php echo $albumid; ?>" />
					<table>
					<tr><td><input type="file" name="file1" /></td><td><input type="text" name="caption1" placeholder="Image Caption" /></td></tr>
					<tr><td><input type="file" name="file2" /></td><td><input type="text" name="caption2" placeholder="Image Caption" /></td></tr>
					<tr><td><input type="file" name="file3" /></td><td><input type="text" name="caption3" placeholder="Image Caption" /></td></tr>
					<tr><td><input type="file" name="file4" /></td><td><input type="text" name="caption4" placeholder="Image Caption" /></td></tr>
					<tr><td><input type="file" name="file5" /></td><td><input type="text" name="caption5" placeholder="Image Caption" /></td></tr>
					</table>
					<br />
					<button type="submit" class="btn btn-primary">Upload</button>
				<form>
				</div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <!--<button type="submit" class="btn btn-primary" id="addalbum">Submit</button>-->
				<?php
				// echo "<pre>";
				// print_r($albumimageslistarr);
				// echo "</pre>";
				?>
              </div>
            <!--</form>-->
          </div>
          <!-- /.box -->
		<div class="box">
			<!--
			<div class="box-header">
			  <h3 class="box-title">Data Table With Full Features</h3>
			</div>
			-->
			<!-- /.box-header -->
			<input type="hidden" id="deleteurl" value="<?php echo base_url("adminimages/deleteimage"); ?>" />
			<input type="hidden" id="showhideimageurl" value="<?php echo base_url("adminimages/showhideimage"); ?>" />
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>Image Caption</th>
					<th>Image Preview</th>
					<th>Added Time</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
			 <?php
			 if(is_array($albumimageslistarr) && count($albumimageslistarr) > 0)
			 foreach($albumimageslistarr as $albumimageslistarrkey => $albumimageslistarrval){
			 ?>
				<tr>
					<td><?php echo $albumimageslistarrval -> imagecaption; ?></td>
					<td><img src='<?php echo base_url($destfolder).date("/Y/m/d/",$albumimageslistarrval -> addedtime).$albumimageslistarrval -> imagename; ?>' style="height:50px;width:50px;CURSOR:pointer;" onClick="imageview(this.src)" /></td>
					<td><?php echo date("d-M-Y H:i A",$albumimageslistarrval -> addedtime); ?></td>
					<td>
						(
						<?php
						/*
						echo ($albumimageslistarrval -> status == "0")?'Show/<a style="CURSOR:pointer;" onclick="showhidealbumimage(\''.$albumimageslistarrval -> id.'\','1');">Hide</a>/'?'<a style="CURSOR:pointer;" onclick="showhidealbumimage(\''.$albumimageslistarrval -> id.'\','1');">hide</a>';
						*/
						if($albumimageslistarrval -> status == "0"){
							echo "Show/<a style='CURSOR:pointer;' onclick='showhidealbumimage(\"".$albumimageslistarrval -> id."\",\"1\");'>Hide</a>";
						}
						if($albumimageslistarrval -> status == "1"){
							echo "Hide/<a style='CURSOR:pointer;' onclick='showhidealbumimage(\"".$albumimageslistarrval -> id."\",\"0\");'>Show</a>";
						}
						
						?>
						)
						&nbsp; 
						<a style="CURSOR:pointer;" onclick="deletealbumimage('<?php echo $albumimageslistarrval -> id; ?>');">Delete</a>
					</td>
				</tr>
			  <?php
			 }
			  ?>
			  </tbody>
				<tfoot>
				<tr>
					<th>Image Caption</th>
					<th>Image Preview</th>
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