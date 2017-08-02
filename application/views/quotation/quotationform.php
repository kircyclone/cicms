<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Quotation Page
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li><a href="<?php //echo base_url('user/quotationlist'); ?>">Images Album</a></li>-->
		<li><a href="<?php echo base_url('quotation/quotationslist/'); ?>">Quotations</a></li>
		<li class="active"><a href="<?php echo base_url('quotation/quotationform/'); ?>">Add New Quotation</a></li>
      </ol>
    </section>
	
	<!-- Main content -->
	<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <!--<i class="fa fa-globe"></i>--><?php echo $companyname; ?>
            <small class="pull-right">Date: <?php echo date("d/m/Y"); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <textarea id="fromaddress" name="fromaddress" rows="3" style="width:100%" placeholder="From Address"><?php echo $companyaddress; ?></textarea>
		  <input type="text" class="form-control" id="fromphone" style="border:solid 1px #000000;" name="fromphone" placeholder="From Phone" value="<?php echo $companyphone; ?>" />
		  <input type="text" class="form-control" id="fromemail" style="border:solid 1px #000000;" name="fromemail" placeholder="From Email" value="<?php echo $companyemail; ?>" />
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <input type="text" class="form-control" id="toname" name="toname" placeholder="To Name" style="border:solid 1px #000000;" />
		  <textarea id="toaddress" name="toaddress" rows="5" style="width:100%;" placeholder="To Address"></textarea>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
		  <br />
		  <input type="text" class="form-control" id="tophone" name="tophone" placeholder="To Phone" style="border:solid 1px #000000;" />
		  <input type="text" class="form-control" id="toemail" name="toemail" placeholder="To Email" style="border:solid 1px #000000;" />
			
		  <!--
          <input type="text" class="form-control" id="invoicenumber" name="invoicenumber" placeholder="Invoice Number" />
		  <input type="text" class="form-control" id="orderid" name="orderid" placeholder="Order Id" />
		  <input type="text" class="form-control" id="paymentdue" name="paymentdue" placeholder="Payment Due (DD/MM/YY)" />
		  <input type="text" class="form-control" id="account" name="account" placeholder="Account No." value="<?php echo $companyaccountno; ?>" />
		  -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
	  <input type="hidden" class="form-control" id="quotationentrycount" name="quotationentrycount" value="0" />
	  <input type="hidden" class="form-control" id="quotationsaveurl" name="quotationsaveurl" value="<?php echo base_url("quotation/quotationformsave"); ?>" />
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
              <th style="min-width:40%;">Product</th>
			  <th style="text-align:center;">Quantity/Unit</th>
              <th style="text-align:center;">Unit Price</th>
              <th style="text-align:center;">Subtotal</th>
              <th style="text-align:center;">Remove</th>
            </tr>
            </thead>
            <tbody id="quotationtablebody">
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
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="<?php echo base_url("assets/modules/AdminLTE/dist/img/credit/visa.png"); ?>" alt="Visa">
          <img src="<?php echo base_url("assets/modules/AdminLTE/dist/img/credit/mastercard.png"); ?>" alt="Mastercard">
          <img src="<?php echo base_url("assets/modules/AdminLTE/dist/img/credit/american-express.png"); ?>" alt="American Express">
          <img src="<?php echo base_url("assets/modules/AdminLTE/dist/img/credit/paypal2.png"); ?>" alt="Paypal">
		  <!--
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
		  -->
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <!--<p class="lead">Amount Due 2/22/2014</p>-->

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>$<span id="subtotaldisplayvalue">0</span></td>
              </tr>
              <tr>
                <th>Tax (<span id="taxdisplayvalue"><?php echo $taxpercentage; ?></span>%)</th>
                <td>$<span id="taxamountdisplayvalue">0</span></td>
              </tr>
              <!--
			  <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr>
			  -->
              <tr>
                <th>Total:</th>
                <td>$<span id="grandtotaldisplayvalue">0</span></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <!--<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>-->
		  
		  <button type="button" class="btn btn-default" onClick="showform();"><i class="fa fa-credit-card"></i>Add Quantity Item</button>
		  
		  <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;" onClick="return savequotation();"><i class="fa fa-credit-card"></i>Save Quotation</button>
		  <!--
          <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
		  -->
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>
<!-- /.content-wrapper -->
<div class="row" id="quotationitemaddform" style="position:fixed;bottom:20px;margin-left:18%;min-width:70%;background-color:#605CA8;border:solid 1px #CCCCCC;">
	<div class="col-md-12" style="font-weight:bold;color:#FFFFFF;">
		  Use this form to add Quotation Item <button type="button" class="btn btn-info pull-right" style="font-weight:bold;" onClick="hideform();">X</button>
	</div>
	<div class="box-body col-md-4">
		<div class="form-group">
		  <!--<label for="pageheading">Product</label>-->
		  <input type="text" class="form-control" id="productname" name="productname" placeholder="Product Description" />
		</div>
	</div>
	<div class="box-body col-md-3">
		<div class="form-group">
		  <!--<label for="pageheading">Quantity</label>-->
		  <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" />
		</div>
	</div>
	<div class="box-body col-md-3">
		<div class="form-group">
		  <!--<label for="pageheading">Unit Price</label>-->
		  <input type="text" class="form-control" id="unitprice" name="unitprice" placeholder="Unit Price" />
		</div>
	</div>
	<div class="box-body col-md-2">
		<div class="form-group" style="margin-left:10px;">
			<button type="button" class="btn btn-info pull-right" style="font-weight:bold;" onClick="return addquotationitem();">Add Quotation Item</button>
		</div>
	</div>
	<div class="col-md-4" style="font-weight:bold;color:#FFFFFF;height:20px;max-width:80%;" id="quotationaddmessage">&nbsp;</div>
</div>