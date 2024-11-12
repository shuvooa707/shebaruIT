</div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?php echo APP_PATH; ?>vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo APP_PATH; ?>vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo APP_PATH; ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo APP_PATH; ?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo APP_PATH; ?>vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo APP_PATH; ?>vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo APP_PATH; ?>vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo APP_PATH; ?>vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo APP_PATH; ?>data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo APP_PATH; ?>dist/js/sb-admin-2.js"></script>


	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {

		$("#history").hide();
		$("#showHistory").click(function(){
			$("#history").toggle(300);
		});

		$("#amountBDT").on("keyup",function(){
			var amountRM = $("#amountBDT").val()/$("#ex_rate").val();
			$("#amountRM").text("RM " + amountRM.toFixed(2));
		});

		$("#ex_rate").on("keyup",function(){
			var amountRM = $("#amountBDT").val()/$("#ex_rate").val();
			$("#amountRM").text("RM " + amountRM.toFixed(2));
		});

		$("#approval_id").on("click",function(){
			var approval_id = $(this).attr('approval-user-id'); // get approval user id

			$.ajax({
				url: "approval.php",
				type:"post",
				data:{
					approval_id:approval_id
				},
				success: function() {
					$("#approval_id").removeClass("btn btn-primary btn-xs");
					$("#approval_id").addClass("text-success");
					$("#approval_id").text("Approved");
				}
			});
		});

    });
    </script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<script>
	  $.validate({
		lang: 'en',
		modules : 'security'
	  });
	</script>

</body>

</html>

<?php mysqli_close($conn); ?>