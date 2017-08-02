<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Form Page
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li><a href="<?php //echo base_url('user/formlist'); ?>">Images Album</a></li>-->
		<li><a href="<?php echo base_url('forms/formslist/'); ?>">Form</a></li>
		<li class="active"><a href="<?php echo base_url('forms/addnewform/'); ?>">Add New Form</a></li>
      </ol>
    </section>
	
	<!-- Main content -->
	<section class="invoice" style="background-color:#ECF0F5;">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <?php //echo $companyname; ?>
            <!--<small class="pull-right">Date: <?php //echo date("d/m/Y"); ?></small>-->
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <input type="text" class="form-control" id="formname" style="border:solid 1px #000000;" name="formname" placeholder="Form Name" value="<?php //echo $formname; ?>" />
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
	  <input type="hidden" class="form-control" id="formentrycount" name="formentrycount" value="0" />
	  <input type="hidden" class="form-control" id="formsaveurl" name="formsaveurl" value="<?php echo base_url("forms/formaddsave"); ?>" />
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <!--
			<tr>
              <th>Qty</th>
              <th>Product</th>
              <th>Serial #</th>
              <th>Description</th>
              <th>Subtotal</th>
            </tr>
			-->
			<tr>
              <th style="">Input Type</th>
			  <th style="text-align:center;">Input Name</th>
              <th style="text-align:center;">Class Name</th>
              <th style="text-align:center;">CSS Style</th>
              <th style="text-align:center;">Remove</th>
            </tr>
            </thead>
            <tbody id="formtablebody">
			<!--
            <tr>
              <td>1</td>
              <td>Call of Duty</td>
              <td>455-981-221</td>
              <td>El snort testosterone trophy driving gloves handsome</td>
              <td>$64.50</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Need for Speed IV</td>
              <td>247-925-726</td>
              <td>Wes Anderson umami biodiesel</td>
              <td>$50.00</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Monsters DVD</td>
              <td>735-845-642</td>
              <td>Terry Richardson helvetica tousled street art master</td>
              <td>$10.70</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Grown Ups Blue Ray</td>
              <td>422-568-642</td>
              <td>Tousled lomo letterpress</td>
              <td>$25.99</td>
            </tr>
			-->
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<br /><br />

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <!--<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>-->
		  
		  <button type="button" class="btn btn-default" onClick="showform();"><i class="fa fa-credit-card"></i>Add Form Item</button>
		  
		  <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;" onClick="return saveform();"><i class="fa fa-credit-card"></i>Save Form</button>
		  <!--
          <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
		  -->
        </div>
		<div class="col-xs-12" id="messssage"></div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>
<!-- /.content-wrapper -->
<div class="row" id="formitemaddform" style="position:fixed;bottom:20px;margin-left:17%;min-width:70%;background-color:#605CA8;border:solid 1px #CCCCCC;">
	<div class="col-md-12" style="font-weight:bold;color:#FFFFFF;">
		  Use this form to add Form Inputs <button type="button" class="btn btn-info pull-right" style="font-weight:bold;" onClick="hideform();">X</button>
	</div>
	<div class="box-body col-md-2">
		<div class="form-group">
		  <!--<label for="pageheading">Product</label>-->
		  <!--<input type="text" class="form-control" id="inputtype" name="inputtype" placeholder="Inp" />-->
		  <select id="inputtype" class="form-control">
			<option value="text">Text Box</option>
			<option value="textarea">Text Area</option>
		  </select>
		</div>
	</div>
	<div class="box-body col-md-2">
		<div class="form-group">
		  <!--<label for="pageheading">Quantity</label>-->
		  <input type="text" class="form-control" id="labelname" name="labelname" placeholder="Label Name" />
		</div>
	</div>
	<div class="box-body col-md-3">
		<div class="form-group">
		  <!--<label for="pageheading">Unit Price</label>-->
			<input type="text" class="form-control" id="classnames" name="classnames" placeholder="Class Names (Space seperated)" />
		</div>
	</div>
	<div class="box-body col-md-3">
		<div class="form-group">
		  <!--<label for="pageheading">Unit Price</label>-->
			<input type="text" class="form-control" id="cssstyles" name="cssstyles" placeholder="Css Styles" />
		</div>
	</div>
	<div class="box-body col-md-2">
		<div class="form-group" style="margin-left:10px;">
			<button type="button" class="btn btn-info pull-left" style="font-weight:bold;" onClick="return addformitem();">Add form Item</button>
		</div>
	</div>
	<div class="col-md-4" style="font-weight:bold;color:#FFFFFF;height:20px;max-width:80%;" id="formaddmessage">&nbsp;</div>
</div>