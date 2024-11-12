<?php
/*
#Forms > Money Receipt
*/
?>
<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../../db_conn.php'); ?>
<?php
session_start();
$query_counselor = "SELECT * FROM user WHERE approval=1 ORDER BY e_id";
$result_counselor = mysqli_query($conn, $query_counselor);

$query_user = "SELECT * FROM user WHERE username='".$_SESSION['username']."' AND approval=1";
$result_user = mysqli_query($conn,$query_user) or die(mysqli_error($conn));
$row_user = mysqli_fetch_assoc($result_user);

if(isset($_POST['submit-receipt']))
{	
	$query_insert="INSERT INTO money_receipt (receipt_no, amount, amount_word, paid_for, paid_by, rcv_by, purpose, terms, reference_type, reference_no, created_at, created_by) VALUES('".$_POST['receipt_no']."', '".$_POST['number']."', '".$_POST['word']."', '".$_POST['paid_for']."', '".$_POST['paid_by']."', '".$_POST['rcv_by']."', '".$_POST['purpose']."', '".$_POST['terms']."', '".$_POST['doc_type']."', '".$_POST['doc_no']."', '".date('Y-m-d H:i:s')."', '".$row_user['id']."')";
	
	if(mysqli_query($conn, $query_insert))
	{
		header("Location:preview.php?rn=".$_POST['receipt_no']);
	}
	else 
		die(mysqli_error($conn));
}
require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../../header.php');

if(isset($_POST['update-receipt']))
{	
	$query_update="UPDATE money_receipt SET amount='".$_POST['number']."', amount_word='".$_POST['word']."', paid_for='".$_POST['paid_for']."', paid_by='".$_POST['paid_by']."', rcv_by='".$_POST['rcv_by']."', purpose='".$_POST['purpose']."', terms='".$_POST['terms']."', reference_type='".$_POST['doc_type']."', reference_no='".$_POST['doc_no']."', updated_at='".date('Y-m-d H:i:s')."', updated_by='".$row_user['id']."' WHERE id=".$_POST['id'];
	
	if(mysqli_query($conn, $query_update))
	{
		$update_success="<div class='alert alert-success'>Successfully Updated.</div>";
	}
	else 
		$update_error="<div class='alert alert-danger'><strong>Update Failed!</strong><br>".(mysqli_error($conn))."</div>";
}

if(isset($_GET['rn']))
{
$query_receipt = "SELECT * FROM money_receipt WHERE receipt_no=".$_GET['rn'];
$result_receipt = mysqli_query($conn, $query_receipt);
$row_receipt = mysqli_fetch_assoc($result_receipt);
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3>Money Receipt</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="../">Home</a></li>
				<li class="breadcrumb-item"><a href="../">Forms</a></li>
				<li class="breadcrumb-item"><a href="../money-receipt/">Money Receipt</a></li>
				<li class="breadcrumb-item active">Preview Receipt</li>
			</ol>
			<hr>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
	<?php if(isset($update_success)) echo $update_success; ?>
	<?php if(isset($update_error)) echo $update_error; ?>
	<br>
	<button type="button" class="btn btn-primary" onclick="javascript:printDiv('print_receipt')"><i class="fa fa-print fa-fw"></i> PRINT</button>
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add"><i class="fa fa-pencil fa-fw"></i> EDIT</button>
	<br> <br>
	<div class="receipt" id="print_receipt">
		<img src="../../img/money-receipt.png">
		<h4 class="text-right" style="position:relative; top:-50px; right:70px;"><?php echo date("d/m/Y"); ?></h4>
		<div class="receipt-content">
			<p class="text-right" style="top:-10px;position:relative;">RECEIPT No.: <span style="font-weight:bold;font-family: 'VT323', monospace;font-size:24px"><?php echo $_GET['rn']; ?></span></p>
			<table class="table">
				<tr>
					<td style="width:170px">Amount (BDT)</td>
					<td style="width:10px">:</td>
					<td><?php echo $row_receipt['amount']; ?>/-</td>
				</tr>
				<tr>
					<td>Amount (in word)</td>
					<td>:</td>
					<td><?php echo $row_receipt['amount_word']; ?></td>
				</tr>
				<tr>
					<td>For the Student Name</td>
					<td>:</td>
					<td><?php echo $row_receipt['paid_for']; ?></td>
				</tr>
				<tr>
					<td>Purpose</td>
					<td>:</td>
					<td><?php echo $row_receipt['purpose']; ?></td>
				</tr>
				<tr>
					<td>Terms & Conditions</td>
					<td>:</td>
					<td><?php echo $row_receipt['terms']; ?></td>
				</tr>
				<tr style="border-bottom:#DDD 1px solid">
					<td>Reference</td>
					<td>:</td>
					<td><?php echo $row_receipt['reference_type']; ?>: <?php echo $row_receipt['reference_no']; ?></td>
				</tr>
			</table>
			<div class="pull-left" style="min-width:200px;margin-top:50px;font-weight:bold;border-top:solid 1px #000">
				Paid by<p style="font-weight:normal"><?php echo $row_receipt['paid_by']; ?></p>
			</div>
			<div class="pull-right" style="min-width:200px;margin-top:50px;font-weight:bold;border-top:solid 1px #000">
				Received by<p style="font-weight:normal"><?php echo $row_receipt['rcv_by']; ?></p>
			</div>
			<div class="clearfix"></div>
		</div>
		<img src="../../img/money-receipt.png">
		<h4 class="text-right" style="position:relative; top:-50px; right:70px;"><?php echo date("d/m/Y"); ?></h4>
		<div class="receipt-content">
			<p class="text-right" style="top:-10px;position:relative;">RECEIPT No.: <span style="font-weight:bold;font-family: 'VT323', monospace;font-size:24px"><?php echo $_GET['rn']; ?></span></p>
			<table class="table">
				<tr>
					<td style="width:170px">Amount (BDT)</td>
					<td style="width:10px">:</td>
					<td><?php echo $row_receipt['amount']; ?>/-</td>
				</tr>
				<tr>
					<td>Amount (in word)</td>
					<td>:</td>
					<td><?php echo $row_receipt['amount_word']; ?></td>
				</tr>
				<tr>
					<td>For the Student Name</td>
					<td>:</td>
					<td><?php echo $row_receipt['paid_for']; ?></td>
				</tr>
				<tr>
					<td>Purpose</td>
					<td>:</td>
					<td><?php echo $row_receipt['purpose']; ?></td>
				</tr>
				<tr>
					<td>Terms & Conditions</td>
					<td>:</td>
					<td><?php echo $row_receipt['terms']; ?></td>
				</tr>
				<tr style="border-bottom:#DDD 1px solid">
					<td>Reference</td>
					<td>:</td>
					<td><?php echo $row_receipt['reference_type']; ?>: <?php echo $row_receipt['reference_no']; ?></td>
				</tr>
			</table>
			<div class="pull-left" style="min-width:200px;margin-top:50px;font-weight:bold;border-top:solid 1px #000">
				Paid by<p style="font-weight:normal"><?php echo $row_receipt['paid_by']; ?></p>
			</div>
			<div class="pull-right" style="min-width:200px;margin-top:50px;font-weight:bold;border-top:solid 1px #000">
				Received by<p style="font-weight:normal"><?php echo $row_receipt['rcv_by']; ?></p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- /#page-wrapper -->
<?php } ?>
<!-- Modal -->
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		<form method="POST">
		<input type="hidden" name="id" value="<?php echo $row_receipt['id']; ?>">
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
								<select name="doc_type" class="btn">
								  <option value="GD No" <?php if($row_receipt['reference_type']=="GD No") echo "selected"; ?>>GD No.</option>
								  <option value="Form No" <?php if($row_receipt['reference_type']=="Form No") echo "selected"; ?>>Form No.</option>
								</select>
							  </span>
							  <input type="text" name="doc_no" class="form-control" value="<?php echo $row_receipt['reference_no']; ?>">
							</div>
						</div>
					</div>							
					<div class="col-md-8">
						<div class="form-group">
							<label for="">Paid For</label>
							<input type="text" name="paid_for" class="form-control" placeholder="Student's Name" value="<?php echo $row_receipt['paid_for']; ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Amount</label>
							<div class="input-group">
								<span class="input-group-addon">BDT</span>
								<input class="form-control" type="text" name="number" value="<?php echo $row_receipt['amount']; ?>" onkeyup="document.getElementById('word').value=convertNumberToWords(this.value)" />
							</div>
						</div>
					</div>							
					<div class="col-md-8">
						<div class="form-group">
							<label for="">Amount (In Word)</label>
							<input type="text" id="word" name="word" class="form-control" placeholder="In Word" value="<?php echo $row_receipt['amount_word']; ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="">Purpose</label>
							<input type="text" name="purpose" class="form-control" placeholder="EMGS or Tuition Fees or Service Charge" value="<?php echo $row_receipt['purpose']; ?>">
						</div>	
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Terms & Conditions</label>
							<select class="form-control" name="terms">
								<option value="Non Refundable" <?php if($row_receipt['terms']=="Non Refundable") echo "selected"; ?>>Non Refundable</option>
								<option value="Refundable" <?php if($row_receipt['terms']=="Refundable") echo "selected"; ?>>Refundable</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Paid By</label>
							<input type="text" name="paid_by" class="form-control" placeholder="Who is paying?" value="<?php echo $row_receipt['paid_by']; ?>">
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Received By</label>
							<select name="rcv_by" class="form-control">
								<option value="">Select Counselor</option>
								<?php
								while($row_counselor=mysqli_fetch_assoc($result_counselor)){
								?>								
								<option value="<?php echo $row_counselor['name']; ?>" <?php if($row_receipt['rcv_by']==$row_counselor['name']) echo "selected"; ?>><?php echo $row_counselor['name']; ?></option>
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
				<button type="submit" name="update-receipt" class="btn btn-primary">Update & Preview</button>
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
        words_string = words_string.split("  ").join(" ")+"Taka Only.";
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
</script>
<script language="javascript" type="text/javascript">
	function printDiv(print_receipt) {
		//Get the HTML of div
		var divElements = document.getElementById(print_receipt).innerHTML;
		//Get the HTML of whole page
		var oldPage = document.body.innerHTML;

		//Reset the page's HTML with div's HTML only
		document.body.innerHTML = 
		  "<div class='receipt'>" + 
		  divElements + "</div>";

		//Print Page
		window.print();

		//Restore orignal HTML
		document.body.innerHTML = oldPage;	  
	}
</script>