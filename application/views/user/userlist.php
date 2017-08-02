<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li><a href="<?php //echo base_url('user/userlist'); ?>">Images Album</a></li>-->
		<li class="active"><a href="<?php echo base_url('user/userlist/'); ?>">Users List</a></li>
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
		<?php
		if($addusermessage != ""){
		?>
		<div class="box box-primary" id="addusermessage">
            <div class="box-header with-border">
              <h3 class="box-title">Add User Message</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <?php
				  switch($addusermessage){
					  case "1":
						echo "New User Added Successfully !!!";
					  break;
					  case "2":
						echo "User Name already Exists !!!";
					  break;
					  case "0":
						echo "Error Adding New User !!!";
					  break;
					  default:
					  
					  break;
				  }
				  ?>
				</div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <!--<button type="submit" class="btn btn-primary" id="addalbum">Submit</button>-->
              </div>
         </div>
		<!-- Add User Message -->
		<?php } ?>
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
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('user/adduser'); ?>">
					<input type="hidden" name="albumid" value="<?php //echo $albumid; ?>" />
					<table>
					<tr>
					<td><input type="text" id="username" name="username" placeholder="User Name" class="form-control" /></td>
					<td><input type="text" id="fullname" name="fullname" placeholder="Full Name" class="form-control" /></td>
					<td><input type="password" id="password" name="password" placeholder="Password" class="form-control" /></td><td><input type="password" id="password1" name="password1" placeholder="Confirm Password" class="form-control" /></td>
					<td><input type="file" id="employeeimage" name="employeeimage" class="form-control" placeholder="Employee Photo" /></td>
					</tr>
					<!--
					<tr><td><input type="file" name="file3" /></td><td><input type="text" name="caption3" placeholder="Image Caption" /></td></tr>
					<tr><td><input type="file" name="file4" /></td><td><input type="text" name="caption4" placeholder="Image Caption" /></td></tr>
					<tr><td><input type="file" name="file5" /></td><td><input type="text" name="caption5" placeholder="Image Caption" /></td></tr>
					-->
					</table>
					<br />
					<button type="submit" class="btn btn-primary" onclick="return createuser();">Create User</button>
				</form>
				</div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <!--<button type="submit" class="btn btn-primary" id="addalbum">Submit</button>-->
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
			<input type="hidden" id="statuschangeurl" value="<?php echo base_url("user/userstatuschange"); ?>" />
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>Full Name</th>
					<th>User Name</th>
					<th>Status</th>
					<th>User Image</th>
					<th>Added Time</th>
					<th>Status</th>
				</tr>
				</thead>
				<tbody>
			 <?php
			 if(is_array($userlist) && count($userlist) > 0)
			 foreach($userlist as $userlistarrkey => $userlistarrval){
			 ?>
				<tr>
					<td><?php echo $userlistarrval -> email; ?></td>
					<td>&nbsp;<?php
						echo ($userlistarrval -> fullname != "")?$userlistarrval -> fullname:"";
					?></td>
					<td>
					<span style="text-transform:capitalize;" id="status<?php echo $userlistarrval -> id; ?>"><?php echo $userlistarrval -> status; ?></span>
					</td>
					<td>&nbsp;<?php
						echo ($userlistarrval -> emppoto != "")?"<a href='".base_url($userlistarrval -> emppoto)."' target='_blank'><img src='".base_url($userlistarrval -> emppoto)."' style='height:50px;width:50px;' /></a>":"";
					?></td>
					<td><?php echo date("d-M-Y H:i A",$userlistarrval -> regtime); ?></td>
					<td>
						<select id="statuschange<?php echo $userlistarrval -> id; ?>" onchange="statuschange('<?php echo $userlistarrval -> id; ?>',this);">
							<?php
							if(is_array($userstatus) && count($userstatus) > 0) 
								foreach($userstatus as $userstatuskey => $userstatusval){
									$selected = "";
									$selected = ($userstatusval == $userlistarrval -> status)?"selected":"";
									echo "<option value='".$userstatusval."' ".$selected.">".$userstatusval."</option>";
									
								}
							?>
						</select>
					</td>
					<!--<td><a style="CURSOR:pointer;" onclick="deleteuser('<?php echo $userlistarrval -> id; ?>');">Delete</a></td>-->
				</tr>
			  <?php
			 }
			  ?>
			  </tbody>
				<tfoot>
				<tr>
					<th>Full Name</th>
					<th>User Name</th>
					<th>Status</th>
					<th>User Image</th>
					<th>Added Time</th>
					<th>Status</th>
				</tr>
				</tfoot>
				</table>
			</div>
			<!-- /.box-body -->
		  </div>
	  </section>
</div>
<!-- /.content-wrapper -->