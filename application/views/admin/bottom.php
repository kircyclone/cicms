
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/modules/AdminLTE/'); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/modules/'); ?>bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<!--<script src="<?php //echo base_url('assets/modules/AdminLTE/'); ?>plugins/fastclick/fastclick.js"></script>-->
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/modules/AdminLTE/'); ?>dist/js/app.min.js"></script>
<!-- Sparkline -->
<!--<script src="<?php //echo base_url('assets/modules/AdminLTE/'); ?>plugins/sparkline/jquery.sparkline.min.js"></script>-->
<!-- jvectormap -->
<!--<script src="<?php //echo base_url('assets/modules/AdminLTE/'); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>-->
<!--<script src="<?php //echo base_url('assets/modules/AdminLTE/'); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!-- SlimScroll 1.3.0 -->
<!--<script src="<?php //echo base_url('assets/modules/AdminLTE/'); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>-->
<!-- ChartJS 1.0.1 -->
<!--<script src="<?php //echo base_url('assets/modules/AdminLTE/'); ?>plugins/chartjs/Chart.min.js"></script>-->


<?php
	if($function == "dashboard"){
?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/modules/AdminLTE/'); ?>dist/js/pages/dashboard2.js"></script>
<?php } ?>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/modules/AdminLTE/'); ?>dist/js/demo.js"></script>

<?php
$allowedfunctionckeditorarr = array(
	"newpage","editpage","addblogentry"
);
//if($function == ""){
if(in_array($function,$allowedfunctionckeditorarr)){
?>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/modules/AdminLTE/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<?php } ?>
<?php
$datatablefnsarr = array('pageslist','blogslist','blogentrylist','albumlist','invoiceslist','quotationslist','formslist','formentrieslist');
if(in_array($function,$datatablefnsarr)){
?>
<script src="<?php echo base_url('assets/modules/AdminLTE/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/modules/AdminLTE/'); ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    //$("#example1").DataTable();
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
<?php } ?>
<?php
	switch($controller){
		case "adminblog":
				switch($function){
					case "newblog":
						echo '<script type="text/javascript" src="'.base_url('assets/js/admin/').'newblog.js"></script>';
						break;
					case "addblogentry":
						echo '<script type="text/javascript" src="'.base_url('assets/js/admin/').'newblogentry.js"></script>';
						break;
				}
			break;
		case "adminimages":
				switch($function){
					case "albumlist":
						echo '<script type="text/javascript" src="'.base_url('assets/js/admin/').'albumlist.js"></script>';
						break;
					case "albumimageslist":
						echo '<script type="text/javascript" src="'.base_url('assets/js/admin/').'albumimageslist.js"></script>';
						break;
					case "addblogentry":
						echo '<script type="text/javascript" src="'.base_url('assets/js/admin/').'newblogentry.js"></script>';
						break;
				}
			break;
		case "user":
				switch($function){
					case "userlist":
						echo '<script type="text/javascript" src="'.base_url('assets/js/admin/').'userlist.js"></script>';
						if($addusermessage != ""){
							echo '
								<script type="text/javascript">
									setTimeout(function(){
										$("#addusermessage").fadeOut();
									},3000);
								</script>
							';
						}
						break;
				}
			break;
		case "quotation":
				switch($function){
					case "addnewquotation":
						echo '<script type="text/javascript" src="'.base_url('assets/js/admin/').'quotationadd.js"></script>';
						break;
					case "quotationslist":
						echo '<script type="text/javascript" src="'.base_url('assets/js/admin/').'quotationlist.js"></script>';
					break;
				}
			break;
		case "invoice":
				switch($function){
					case "addnewinvoice":
						echo '<script type="text/javascript" src="'.base_url('assets/js/admin/').'invoiceadd.js"></script>';
						break;
				}
			break;
		case "forms":
				switch($function){
					case "addnewform":
						echo '<script type="text/javascript" src="'.base_url('assets/js/admin/').'formadd.js"></script>';
						break;
					case "formentrieslist":
						echo '<script type="text/javascript" src="'.base_url('assets/js/admin/').'formentrieslist.js"></script>';
						break;
				}
			break;
		default:
			
			break;
	}
?>
<!--<script src="<?php //echo base_url("assets/modules/AdminLTE/plugins/datepicker/bootstrap-datepicker.js"); ?>"></script>-->
</body>
</html>
