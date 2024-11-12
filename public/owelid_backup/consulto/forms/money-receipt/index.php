<?php
/*
#Forms > Money Receipt
*/
?>
<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../../header.php'); ?>
<?php
$query_counselor = "SELECT * FROM user WHERE approval=1 ORDER BY e_id";
$result_counselor = mysqli_query($conn, $query_counselor);

$query_money_receipt = "SELECT * FROM money_receipt";
$result_money_receipt = mysqli_query($conn, $query_money_receipt);
$count_money_receipt = mysqli_num_rows($result_money_receipt);

$query_receipt_no = "SELECT MAX(receipt_no) AS last_receipt_no FROM money_receipt";
$result_receipt_no = mysqli_query($conn, $query_receipt_no);
$row_receipt_no = mysqli_fetch_assoc($result_receipt_no);
$receipt_no=$row_receipt_no['last_receipt_no']+1;

if($row_user['usergroup']=="counselor")
{
	$query_money_receipt = "SELECT * FROM money_receipt WHERE created_by=".$row_user['id'];
	$result_money_receipt = mysqli_query($conn, $query_money_receipt);
	$count_money_receipt = mysqli_num_rows($result_money_receipt);
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3>Money Receipt</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="../../">Home</a></li>
				<li class="breadcrumb-item"><a href="../../forms/">Forms</a></li>
				<li class="breadcrumb-item active">Money Receipt</li>
			</ol>
			<hr>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-plus fa-fw"></i> Create New</button>
	<br><br>
	<div class="panel panel-primary">
		<div class="panel-heading">Money Receipt</div>
		<div class="panel-body">
			<div style='margin-bottom:20px; font-size:18px;'><div class='label label-primary'>Total Available: <?php echo $count_money_receipt; ?></div></div>
			<div class="row">	
				<?php
				// output data of each row
				while($row_money_receipt = mysqli_fetch_assoc($result_money_receipt)) {
				?>
					<a href="preview.php?rn=<?php echo $row_money_receipt['receipt_no']; ?>">
					<div class="col-md-3">
						<div class="well" style="height:100px">
							<p class="text-primary"><span class="label label-primary pull-right">#<?php echo $row_money_receipt['receipt_no']; ?></span> <?php echo $row_money_receipt['paid_for']; ?> <br><?php echo $row_money_receipt['reference_type']; ?> - <?php echo $row_money_receipt['reference_no']; ?><br>BDT <?php echo $row_money_receipt['amount']; ?> (<?php echo $row_money_receipt['purpose']; ?>)</p>
						</div>
					</div>
					</a>									
				<?php } ?>
			</div><!--/row-->
		</div>
	</div>
</div>
<!-- /#page-wrapper -->
<!-- Modal -->
	<div id="add" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content">
			<form method="POST" action="preview.php">
				<input type="hidden" name="receipt_no" value="<?php echo $receipt_no; ?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Create Money Receipt</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Reference</label>
								<div class="input-group">								  
								  <span class="input-group-btn">
									<select class="btn" name="doc_type" id="doc_type">
									  <option value="GD No">GD No.</option>
									  <option value="Form No">Form No.</option>
									</select>
								  </span>
								  <input type="text" name="doc_no" id="doc_no" class="form-control">
								</div>
							</div>
						</div>							
						<div class="col-md-8">
							<div class="form-group">
								<label for="">Paid For</label>
								<input type="text" name="paid_for" id="paid_for" class="form-control" placeholder="Student's Name">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Amount</label>
								<div class="input-group">
									<span class="input-group-addon">BDT</span>
									<input class="form-control" type="text" name="number" onkeyup="document.getElementById('word').value=convertNumberToWords(this.value)" />
								</div>
							</div>
						</div>							
						<div class="col-md-8">
							<div class="form-group">
								<label for="">Amount (In Word)</label>
								<input type="text" id="word" name="word" class="form-control" placeholder="In Word">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label for="">Purpose</label>
								<input type="text" name="purpose" class="form-control" placeholder="EMGS or Tuition Fees or Service Charge">
							</div>	
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Terms & Conditions</label>
								<select class="form-control" name="terms">
									<option value="Non Refundable">Non Refundable</option>
									<option value="Refundable">Refundable</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Paid By</label>
								<input type="text" name="paid_by" id="paid_by" class="form-control" placeholder="Name of Payee">
							</div>	
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Received By</label>
								<select name="rcv_by" class="form-control">
									<?php
									while($row_counselor=mysqli_fetch_assoc($result_counselor)){
									?>
									<option value="<?php echo $row_counselor['name']; ?>" <?php if($row_user['name']==$row_counselor['name']) echo "selected"; ?>><?php echo $row_counselor['name']; ?></option>
									<?php
									}
									?>
								</select>
							</div>	
						</div>
					</div>
				</div>
				<div class="modal-footer">			
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" name="submit-receipt" class="btn btn-primary">Preview Receipt</button>
				</div>
			</form>
		</div>

	  </div>
	</div>
<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../../footer.php'); ?>
<script>
	function convertNumberToWords(amount) {
    var words = new Array();
    words[0] = '';
    words[1] = 'One';
    words[2] = 'Two';
    words[3] = 'Three';
    words[4] = 'Four';
    words[5] = 'Five';
    words[6] = 'Six';
    words[7] = 'Seven';
    words[8] = 'Eight';
    words[9] = 'Nine';
    words[10] = 'Ten';
    words[11] = 'Eleven';
    words[12] = 'Twelve';
    words[13] = 'Thirteen';
    words[14] = 'Fourteen';
    words[15] = 'Fifteen';
    words[16] = 'Sixteen';
    words[17] = 'Seventeen';
    words[18] = 'Eighteen';
    words[19] = 'Nineteen';
    words[20] = 'Twenty';
    words[30] = 'Thirty';
    words[40] = 'Forty';
    words[50] = 'Fifty';
    words[60] = 'Sixty';
    words[70] = 'Seventy';
    words[80] = 'Eighty';
    words[90] = 'Ninety';
    amount = amount.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (n_array[i] == 1) {
                    n_array[j] = 10 + parseInt(n_array[j]);
                    n_array[i] = 0;
                }
            }
        }
        value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = n_array[i] * 10;
            } else {
                value = n_array[i];
            }
            if (value != 0) {
                words_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Crore ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Lac ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                words_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
                words_string += "Hundred ";
            }
        }
        words_string = words_string.split("  ").join(" ")+"Taka Only";
    }
    return words_string;
}
$(function(){
    //Listen for a click on any of the dropdown items
    $(".thenumbers li").click(function(){
        //Get the value
        var value = $(this).attr("value");
		$(".doc").val(value);
        //Put the retrieved value into the hidden input
        $("input[name='thenumbers']").val(value);
    });
});
$(document).ready(function(){
	$('#doc_no').on("keyup input", function(){
        /* Get input value on change */
        var doc_type = $("#doc_type").val();
		var doc_no = $("#doc_no").val();		
        if($(this).val()){
            $.post("get_student.php", {doc_type:doc_type,doc_no:doc_no}).done(function(data){
                // Display the returned data in browser
                $('#paid_for').val(data);
				$('#paid_by').val(data);
            });
        } else{
            $('#paid_for').empty();
        }
    });
});
</script>