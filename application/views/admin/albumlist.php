<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Images Album List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('adminimages/albumlist'); ?>">Images Album</a></li>
		<li class="active">List</li>
      </ol>
    </section>
	<section class="content">
		<!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Images Album</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--<form role="form">-->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Album Name</label>
				  <?php
					$slnocount = 0;
					$imagesalbumlisttablebody = "";
					if(is_array($imagesalbumlistarr) && count($imagesalbumlistarr) > 0)
					foreach($imagesalbumlistarr as $imagesalbumlistkey => $imagesalbumlistval){
						$imagesalbumname[$imagesalbumlistval -> albumid] = $imagesalbumlistval -> albumname;
					++$slnocount;
					$showselected = "";
					if($imagesalbumlistval -> albumid == $this -> uri -> segment(3)) $showselected = "background-color:#CCCCCC;";
					$imagesalbumlisttablebody .= '
					<tr style="'.$showselected.'">
					  <td>'.$slnocount.'</td>
					  <td>'.$imagesalbumlistval -> albumname.'</td>
					  <td>'.date("d-M-Y H:i:s",$imagesalbumlistval -> addedtime).'</td>
					  <td>
						<a href="'.base_url("adminimages/albumlist/".$imagesalbumlistval -> albumid).'">Edit</a> &nbsp; | &nbsp; 
						<a href="'.base_url("adminimages/albumimageslist/".$imagesalbumlistval -> albumid).'">List / Add / Edit Album Images List</a>
					  </td>
					</tr>';
				 }
				 ?>
                  <input type="text" class="form-control" id="albumname" placeholder="Album Name" value="<?php echo ($albumid != "")?$imagesalbumname[$albumid]:""; ?>">
				  <input type="hidden" id="addalbumurl" value="<?php echo base_url('adminimages/addalbum'); ?>" />
				  
				  <?php
					if($albumid != ""){
						echo '<input type="hidden" id="albumid" value="'.$albumid.'" />';
					}
				  ?>
				  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="addalbum">Submit</button>
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
			<div class="box-body">
			  <table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
				  <th>Sl.No.</th>
				  <th>Album Name</th>
				  <th>Added Time</th>
				  <th>Actions</th>
				</tr>
				</thead>
				<tbody>
				<!-- table body here -->
				
				<?php echo $imagesalbumlisttablebody; ?>
				
				</tbody>
				<tfoot>
				<tr>
				  <th>Sl.No.</th>
				  <th>Album Name</th>
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