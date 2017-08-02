<body onload="<?php echo $windowonload; ?>">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> <?php echo $this -> config -> item("companyname"); ?>
          <small class="pull-right">Date: <?php echo date("d/m/Y"); ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong><?php echo $this -> config -> item("companyname"); ?></strong><br>
          <?php echo $this -> config -> item("companyaddress"); ?><br>
          Phone: <?php echo $this -> config -> item("companyphone"); ?><br>
          Email: <?php echo $this -> config -> item("companysalesemail"); ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong><?php echo $toname; ?></strong><br>
          <?php echo $toaddress; ?><br>
          Phone: <?php echo $tophone; ?><br>
          Email: <?php echo $toemail; ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Quotation #<?php echo $this -> uri -> segment(3); ?></b><br>
        <br>
		<!--
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
		-->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Qty/Unit</th>
            <th>Product</th>
            <th>Unit Price</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
		  <?php
			if(is_array($items) && count($items) > 0){
				foreach($items as $itemskey => $itemsval){
					echo '
						<tr>
							<td>'.$itemsval['quantity'].'</td>
							<td>'.$itemsval['itemname'].'</td>
							<td>'.$itemsval['price'].'</td>
							<td>'.$itemsval['subtotal'].'</td>
						  </tr>
					';
				}
			}
		  ?>
          
		  
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <!--
		<p class="lead">Payment Methods:</p>
        <img src="../../dist/img/credit/visa.png" alt="Visa">
        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="../../dist/img/credit/american-express.png" alt="American Express">
        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
          jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
		-->
		<p class="lead">Note:</p>
		<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
			<?php echo $this -> config -> item("quotationnote"); ?>
		</p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <!--<p class="lead">Amount Due 2/22/2014</p>-->

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td><?php echo $this -> config -> item("currencysymbol").$total; ?></td>
            </tr>
            <tr>
              <th>Tax (<?php echo $this -> config -> item("taxpercentage"); ?>%)</th>
              <td><?php echo $this -> config -> item("currencysymbol").$tax; ?></td>
            </tr>
            <!--
			<tr>
              <th>Shipping:</th>
              <td>$5.80</td>
            </tr>
			-->
            <tr>
              <th>Total:</th>
              <td><?php echo $this -> config -> item("currencysymbol").$gtotal; ?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
