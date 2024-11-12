<?php
/* 	if($row_user['usergroup'] == "counselor")
	{
		$assessment_cond = " WHERE counselor_id = ".$row_user['id']." OR appointed_to = ".$row_user['id'];
		$assessment_comments_cond = " WHERE counselor_id = ".$row_user['id'];
	}
	else
	{
		$assessment_cond = "";
		$assessment_comments_cond = "";
	}
	
	$query_assessment = "SELECT * FROM assessment".$assessment_cond;
	$result_assessment = mysqli_query($conn,$query_assessment) or die(mysqli_error($conn));
	$result_count_assessment = mysqli_num_rows($result_assessment);
    $row_assessment = mysqli_fetch_assoc($result_assessment);
	
	$query_distinct  = "SELECT DISTINCT(assessment_id) FROM assessment_comments".$assessment_comments_cond;
	$result_distinct = mysqli_query($conn,$query_distinct) or die(mysqli_error($conn));
	$result_count_distinct = mysqli_num_rows($result_distinct); */
	
	if($row_user['usergroup'] == "counselor")
	{
		$counselor_cond = " WHERE counselor_id = ".$row_user['id'];
		$couns_cond = "(counselor_id = ".$row_user['id']." OR appointed_to = ".$row_user['id'].") AND";
	}
	else
	{
		$counselor_cond = "";
		$couns_cond = "";
	}

	$query_assessment  = "SELECT * FROM assessment WHERE ".$couns_cond." id NOT IN (SELECT DISTINCT(assessment_id) FROM assessment_comments) ORDER BY form_no DESC";
	$result_assessment = mysqli_query($conn,$query_assessment) or die(mysqli_error($conn));
	$result_count_assessment = mysqli_num_rows($result_assessment);
	
	$query_unappointed  = "SELECT * FROM assessment WHERE counselor_id = 0 AND appointed_to = 0";
	$result_unappointed = mysqli_query($conn,$query_unappointed) or die(mysqli_error($conn));
	$result_count_unappointed = mysqli_num_rows($result_unappointed);
	
	$query_newfile  = "SELECT * FROM student WHERE application = 0";
	$result_newfile = mysqli_query($conn,$query_newfile) or die(mysqli_error($conn));
	$count_newfile = mysqli_num_rows($result_newfile);

	//reminder for student file
	$query_gd_alert  = "SELECT s.id, s.name FROM student s
						INNER JOIN assessment ON assessment.id=s.assessment_id
						WHERE (assessment.counselor_id=".$row_user['id']. " OR assessment.appointed_to=".$row_user['id'].") AND s.active=1 AND s.gd_no IS NULL AND DATEDIFF(CURDATE(),s.date)>7";
	$result_gd_alert = mysqli_query($conn,$query_gd_alert);
	$count_gd_alert = mysqli_num_rows($result_gd_alert);
	
	$query_passport_alert  = "SELECT s.id, s.name FROM student s
						INNER JOIN assessment ON assessment.id=s.assessment_id
						WHERE (assessment.counselor_id=".$row_user['id']. " OR assessment.appointed_to=".$row_user['id'].") AND s.active=1 AND s.passport='' AND DATEDIFF(CURDATE(),s.date)>7";
	$result_passport_alert = mysqli_query($conn,$query_passport_alert);
	$count_passport_alert = mysqli_num_rows($result_passport_alert);
	
	$query_app_alert = "SELECT s.id, s.name FROM student s
						INNER JOIN assessment ON assessment.id=s.assessment_id
						WHERE (assessment.counselor_id=".$row_user['id']. " OR assessment.appointed_to=".$row_user['id'].") AND s.active=1 AND s.application=0 AND DATEDIFF(CURDATE(),s.date)>7";
	$result_app_alert = mysqli_query($conn, $query_app_alert);
	$count_app_alert = mysqli_num_rows($result_app_alert);
	
	$query_offer_alert = "SELECT s.id, s.name FROM student s
						INNER JOIN assessment ON assessment.id=s.assessment_id
						WHERE (assessment.counselor_id=".$row_user['id']. " OR assessment.appointed_to=".$row_user['id'].") AND s.active=1 AND s.offer_letter=0 AND DATEDIFF(CURDATE(),s.application)>7";
	$result_offer_alert = mysqli_query($conn, $query_offer_alert);
	$count_offer_alert = mysqli_num_rows($result_offer_alert);
	
	$query_medical_alert = "SELECT s.id, s.name FROM student s
						INNER JOIN assessment ON assessment.id=s.assessment_id
						WHERE (assessment.counselor_id=".$row_user['id']. " OR assessment.appointed_to=".$row_user['id'].") AND s.active=1 AND s.medical=0 AND DATEDIFF(CURDATE(),s.offer_letter)>7";
	$result_medical_alert = mysqli_query($conn, $query_medical_alert);
	$count_medical_alert = mysqli_num_rows($result_medical_alert);
	
	$query_payment1_alert = "SELECT s.id, s.name FROM student s
						INNER JOIN assessment ON assessment.id=s.assessment_id
						WHERE (assessment.counselor_id=".$row_user['id']. " OR assessment.appointed_to=".$row_user['id'].") AND s.active=1 AND s.payment1=0 AND DATEDIFF(CURDATE(),s.medical)>7";
	$result_payment1_alert = mysqli_query($conn, $query_payment1_alert);
	$count_payment1_alert = mysqli_num_rows($result_payment1_alert);
	
	$query_complete_alert = "SELECT s.id, s.name FROM student s
						INNER JOIN assessment ON assessment.id=s.assessment_id
						WHERE (assessment.counselor_id=".$row_user['id']. " OR assessment.appointed_to=".$row_user['id'].") AND s.active=1 AND s.complete_app=0 AND DATEDIFF(CURDATE(),s.payment1)>7";
	$result_complete_alert = mysqli_query($conn, $query_complete_alert);
	$count_complete_alert = mysqli_num_rows($result_complete_alert);
	
	$query_VAL_alert = "SELECT s.id, s.name FROM student s
						INNER JOIN assessment ON assessment.id=s.assessment_id
						WHERE (assessment.counselor_id=".$row_user['id']. " OR assessment.appointed_to=".$row_user['id'].") AND s.active=1 AND s.VAL=0 AND DATEDIFF(CURDATE(),s.complete_app)>7";
	$result_VAL_alert = mysqli_query($conn, $query_VAL_alert);
	$count_VAL_alert = mysqli_num_rows($result_VAL_alert);
	
	$query_payment2_alert = "SELECT s.id, s.name FROM student s
						INNER JOIN assessment ON assessment.id=s.assessment_id
						WHERE (assessment.counselor_id=".$row_user['id']. " OR assessment.appointed_to=".$row_user['id'].") AND s.active=1 AND s.payment2=0 AND DATEDIFF(CURDATE(),s.VAL)>7";
	$result_payment2_alert = mysqli_query($conn, $query_payment2_alert);
	$count_payment2_alert = mysqli_num_rows($result_payment2_alert);
	
	$query_payment2_alert = "SELECT s.id, s.name FROM student s
						INNER JOIN assessment ON assessment.id=s.assessment_id
						WHERE (assessment.counselor_id=".$row_user['id']. " OR assessment.appointed_to=".$row_user['id'].") AND s.active=1 AND s.payment2=0 AND DATEDIFF(CURDATE(),s.VAL)>7";
	$result_payment2_alert = mysqli_query($conn, $query_payment2_alert);
	$count_payment2_alert = mysqli_num_rows($result_payment2_alert);
	
	$query_send_sticker_alert = "SELECT s.id, s.name FROM student s
						INNER JOIN assessment ON assessment.id=s.assessment_id
						WHERE (assessment.counselor_id=".$row_user['id']. " OR assessment.appointed_to=".$row_user['id'].") AND s.active=1 AND s.send_sticker=0 AND DATEDIFF(CURDATE(),s.payment2)>7";
	$result_send_sticker_alert = mysqli_query($conn, $query_send_sticker_alert);
	$count_send_sticker_alert = mysqli_num_rows($result_send_sticker_alert);
	
	$query_rcv_sticker_alert = "SELECT s.id, s.name FROM student s
						INNER JOIN assessment ON assessment.id=s.assessment_id
						WHERE (assessment.counselor_id=".$row_user['id']. " OR assessment.appointed_to=".$row_user['id'].") AND s.active=1 AND s.rcv_sticker=0 AND DATEDIFF(CURDATE(),s.send_sticker)>7";
	$result_rcv_sticker_alert = mysqli_query($conn, $query_rcv_sticker_alert);
	$count_rcv_sticker_alert = mysqli_num_rows($result_rcv_sticker_alert);
	
	$query_fly_alert = "SELECT s.id, s.name FROM student s
						INNER JOIN assessment ON assessment.id=s.assessment_id
						WHERE (assessment.counselor_id=".$row_user['id']. " OR assessment.appointed_to=".$row_user['id'].") AND s.active=1 AND s.fly=0 AND DATEDIFF(CURDATE(),s.rcv_sticker)>7";
	$result_fly_alert = mysqli_query($conn, $query_fly_alert);
	$count_fly_alert = mysqli_num_rows($result_fly_alert);
	
	//reminder for assessment
	

?>