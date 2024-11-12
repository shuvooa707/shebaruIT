<?php
session_start();
date_default_timezone_set("Asia/Dhaka");
require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../../../db_conn.php');
if(isset($_REQUEST['submit'])){

    $office = "Dhaka";
    $type = "General";
    $name = strtoupper(mysqli_real_escape_string($conn,$_REQUEST['name']));
    $program = mysqli_real_escape_string($conn,$_REQUEST['program']);
    $subject = mysqli_real_escape_string($conn,$_REQUEST['subject']);
    $certificate = mysqli_real_escape_string($conn,$_REQUEST['certificate']);
    $result = mysqli_real_escape_string($conn,$_REQUEST['result']);
    $passport = mysqli_real_escape_string($conn,$_REQUEST['passport']);
    $ielts = mysqli_real_escape_string($conn,$_REQUEST['ielts']);
    $mobile = mysqli_real_escape_string($conn,$_REQUEST['mobile']);
    $email = mysqli_real_escape_string($conn,$_REQUEST['email']);

    $counselor = 'General';
    if (isset($_GET['c'])) {
        $counselor = mysqli_real_escape_string($conn,ucfirst($_GET['c']));
    }

    if($program == "Others"){
        $program = mysqli_real_escape_string($conn,$_REQUEST['others']);
    }



    //session value
    $_SESSION['office'] = $office;
    $_SESSION['type'] = $type;
    $_SESSION['name'] = $name;
    $_SESSION['program'] = $program;
    $_SESSION['subject'] = $subject;
    $_SESSION['certificate'] = $certificate;
    $_SESSION['result'] = $result;
    $_SESSION['passport'] = $passport;
    $_SESSION['ielts'] = $ielts;
    $_SESSION['mobile'] = $mobile;
    $_SESSION['email'] = $email;

    $query = "INSERT INTO online_registration (office, type, name, program, subject, certificate, result, passport, ielts, mobile, email, counselor, created_at) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', %u, %g, '%s', '%s', '%s', '%s');";
    $sql = sprintf($query,$office,$type,$name,$program,$subject,$certificate,$result,$passport,$ielts,$mobile,$email,$counselor,date("Y-m-d H:i:s"));

    if (mysqli_query($conn, $sql)) {
        //send email
        if($email != ''){ 
            $mail_subject = "Registration Confirmed for Bangladesh Malaysia Study Centre Ltd.";
            $message = "
            <html>
            <head>
            <title>Registration Confirmed</title>
            </head>
            <body>
            <h2>Registration Confirmed</h2>
            <p>Thank you Mr. <strong>".$name."</strong> for spending your valuable time registering with us.</p>
            <p>Welcome to <a href='https://www.bmscl.com' target='_blank'>Bangladesh Malaysia Study Centre Ltd.</a></p>
            <h4>Some words we want to say to you.</h4>
            <p>Malaysia is the best education destination for Bangladeshi students who really wants to pursue their higher education with affordable and reasonable cost. We are working with Malaysia for more than a decade. We represent almost all Malaysian Public, Private, Semi-Govt and State Government Universities and Colleges in Malaysia while having the branch office in Malaysia.</p>
            <p>We are very excited to know more about you. For urgent queries you can contact us any time at <a href='mailto:info@bmscl.com'>info@bmscl.com</a> or visit our office at below address.</p><br>
            <address>
                ROOM 511 (5th Floor), RH HOME CENTER<br>
                74/B/1 Green Road<br>
                (Near University of Asia Pacific / Green Super Market)<br>
                +8801777444422
            </address>
            </body>
            </html>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <info@bmscl.com>' . "\r\n";
            $headers .= 'Cc: rahim@bmscl.com' . "\r\n";

        
            mail($email,$mail_subject,$message,$headers);
        }

        //send sms

        /*if($mobile != ''){
            $sms = urlencode("Your type no is ".$type."\nMalaysia Education Fair 2019\nHost: BMSCL\nDate: Dhaka-6,7,8 Sep & Chittagong-10,11 Sep\nHotline: 01778003333");
            $url = "https://bplboxservice.banglaphone.net.bd/httpapi/sendsms?userId=bmscl&password=muKUL@3030&smsText=".$sms."&commaSeperatedReceiverNumbers=".$mobile."&maskText=BMSCL";

            //create a new cURL resource
            $ch = curl_init($url);
    
            //set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    
            //return response instead of outputting
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    
            //execute the POST request
            //$ch_result = curl_exec($ch);
    
            //close cURL resource
            curl_close($ch);
        }*/
        
        //redirect to the same page after successful registration so that data does not re-insert after refresh.
        header("location:add.php?success");

    } else {
        die("Error: " . mysqli_error($conn)."<br>Please try again.");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Higher education in Malaysia with scholarship in top ranking Universities." />
    <meta name="Author" content="Bangladesh Malaysia Study Centre Ltd." />
    <meta property="og:url"          content="https://www.bmscl.com.bd/admin/forms/general/dhaka/add.php" />
    <meta property="og:type"         content="website" />
    <meta property="og:title"        content="Study in Malaysia, Online Registration Form" />
    <meta property="og:description"  content="Higher education in Malaysia with scholarship in top ranking Universities." />
    <meta property="og:image"        content="https://www.bmscl.com.bd/admin/forms/general/img/general-form.jpeg" />
    <!-- Site Properties -->
    <title>Study in Malaysia Registration & Scholarship Form Dhaka - Bangladesh Malaysia Study Centre Ltd.</title>
    <link rel="stylesheet" type="text/css" href="../../../node_modules/bulma/css/bulma.css">
    <link rel="stylesheet" type="text/css" href="../../../node_modules/bulma-checkradio/dist/css/bulma-checkradio.min.css">
</head>

<body>

    <nav class="navbar has-background-primary" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <!-- navbar items, navbar burger... -->
                <a class="navbar-item" href="http://www.bmscl.com" target="_blank">
                    <img src="../../../img/BMSCL-LOGO-WEB.png" alt="BMSCL Logo" style="min-height: 60px">
                </a>
            </div>
        </div>
    </nav>
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-two-thirds">
                        <h1 class="title is-size-4-mobile">
                            Study in Malaysia<br>Registration & Scholarship Form
                        </h1>
                        <h2 class="subtitle">
                            Bangladesh Malaysia Study Centre Ltd.
                        </h2>
                    </div>
                    <div class="column">
                        <img src="../img/general-form.jpeg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-half">

                    <?php
                    if(isset($_REQUEST['success']))
                    {
                        ?>
                        <div class="notification is-success">
                            <p><strong>Registration Successful</strong></p>
                            <p>Thank you for your time and effort. Our counselor will contact you soon regarding your admission or any other queries.</p>
                        </div>
                        <p style="margin-bottom: 20px">Hi Mr. <?php echo $_SESSION['name'] ?></p>
                        <p class="is-size-5">Welcome to <a href="https://www.bmscl.com" target="_blank">Bangladesh Malaysia Study Centre Ltd.</a></p>
                        <br>

                        <?php
                        /*if(isset($_SESSION['mobile']) && $_SESSION['mobile'] != ""){
                            echo "<p>This type no is also sent to your mobile no '".$_SESSION['mobile']."'</p>";
                        }*/
                        if(isset($_SESSION['email']) && $_SESSION['email'] != ""){
                            echo "<p>A confirmation email is sent to your email address '".$_SESSION['email']."'.</p>";
                        }
                        ?>
                        <br>
                        <h4 class="is-size-4">Some words we want to say to you.</h4>
                        <p>Malaysia is the best education destination for Bangladeshi students who really wants to pursue their higher education with affordable and reasonable cost. We are working with Malaysia for more than a decade. We represent almost all Malaysian Public, Private, Semi-Govt and State Government Universities and Colleges in Malaysia while having the branch office in Malaysia. We place our students depending on:</p>
                        <div class="content">
                            <ul>
                                <li>Academic Result and Background</li>
                                <li>Financial Status</li>
                                <li>English Language Proficiency Level</li>
                                <li>Purpose & Future Career Plan</li>
                            </ul>
                        </div>
                        
                        <p>We are very excited to know more about you. For urgent queries you can contact us any time at <a href="mailto:info@bmscl.com">info@bmscl.com</a> or visit our office at below address.</p><br>
                        <address>
                            ROOM 511 (5th Floor), RH HOME CENTER<br>
                            74/B/1 Green Road<br>
                            (Near University of Asia Pacific / Green Super Market)<br>
                            +8801777444422
                        </address>
                        <br>

                        <div class="card" style="margin-bottom:50px">
                            <header class="card-header" style="cursor:pointer">
                                <p class="card-header-title">
                                    View your inserted information
                                </p>
                                <a class="card-header-icon" aria-label="more options">
                                    <span class="icon">
                                        <i class="fas fa-angle-down" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    <?php
                                    echo "Name: ".$_SESSION['name']."<br>";
                                    echo "Program: ".$_SESSION['program']."<br>";
                                    echo "Subject: ".$_SESSION['subject']."<br>";
                                    echo "Highest Qualification: ".$_SESSION['certificate']."<br>";
                                    echo "Result: ".$_SESSION['result']."<br>";
                                    echo "Passport: ".($_SESSION['passport'] == 1 ? 'Yes' : "No")."<br>";
                                    echo "IELTS Score: ".$_SESSION['ielts']."<br>";
                                    echo "Mobile No: ".$_SESSION['mobile']."<br>";
                                    echo "Email Address: ".$_SESSION['email']."<br>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    
                    
                    <form class="form" method="POST">
                        <div class="field">
                            <label class="label"><span class="has-text-danger">*</span> Your Name</label>
                            <div class="control">
                                <input class="input is-medium is-uppercase" name="name" type="text" placeholder="Full Name" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Program of Study</label>
                            <div class="columns is-desktop is-gapless">
                                <div class="column">
                                    <div class="control">                                
                                        <input class="is-checkradio" id="exampleRadioInline1" type="radio" name="program" value="School-Level">
                                        <label for="exampleRadioInline1">School-Level</label>
                                    </div>
                                    <div class="control">
                                        <input class="is-checkradio" id="exampleRadioInline2" type="radio" name="program" value="A-Level">
                                        <label for="exampleRadioInline2">A-Level</label>
                                    </div>
                                    <div class="control">
                                        <input class="is-checkradio" id="exampleRadioInline4" type="radio" name="program" value="Foundation">
                                        <label for="exampleRadioInline4">Foundation</label>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="control">
                                        <input class="is-checkradio" id="exampleRadioInline5" type="radio" name="program" value="Diploma">
                                        <label for="exampleRadioInline5">Diploma</label>
                                    </div>
                                    <div class="control">    
                                        <input class="is-checkradio" id="exampleRadioInline6" type="radio" name="program" value="Bachelor">
                                        <label for="exampleRadioInline6">Bachelor</label>
                                    </div>
				    <div class="control">
                                        <input class="is-checkradio" id="exampleRadioInline7" type="radio" name="program" value="Masters">
                                        <label for="exampleRadioInline7">Masters</label>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="control">
                                        <input class="is-checkradio" id="exampleRadioInline8" type="radio" name="program" value="Ph.D">
                                        <label for="exampleRadioInline8">Ph.D/Doctorate</label>
                                    </div> 
                                    <div class="control">
                                        <input class="is-checkradio" id="exampleRadioInline9" type="radio" name="program" id="others" value="Others">
                                        <label for="exampleRadioInline9">Others</label> 
                                        <div class="control">                                
                                            <input class="input othersinput" name="others" type="text" placeholder="Type program name">
                                        </div>
                                    </div>                                 
                                </div>
                            </div>
                            
                        </div>

                        <div class="field">
                            <label class="label">Subject</label>
                            <div class="control">
                                <input class="input is-medium" name="subject" type="text"
                                    placeholder="Subject of Study">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Highest Qualification</label>
                            <div class="control">
                                <input class="input is-medium" name="certificate" type="text" placeholder="Your latest certificate">
                            </div>
                            <p class="help">The highest academic qualification/certificate name (SSC/HSC/Hons/Masters etc.)</p>
                        </div>

                        <div class="field">
                            <label class="label">Latest Result</label>
                            <div class="control">
                                <input class="input is-medium" name="result" type="text" placeholder="Result of your latest certificate">
                            </div>
                            <p class="help">The result of the above mentioned certificate (GPA/CGPA/Division/Grade)</p>
                        </div>

                        <div class="columns">
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Do you have passport?</label>
                                    <div class="control">
                                        <input class="is-checkradio" id="passport1" type="radio" name="passport" value="1">
                                        <label for="passport1">Yes</label>
                                        <input class="is-checkradio" id="passport2" type="radio" name="passport" value="0">
                                        <label for="passport2">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">IELTS Score</label>
                                    <div class="control">
                                        <input class="input" name="ielts" type="number" step="0.50" min="1" max="9" placeholder="Leave it empty if you don't have">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label"><span class="has-text-danger">*</span> Mobile No.</label>
                            <div class="control">
                                <input class="input is-medium" required name="mobile" type="text" placeholder="Type mobile No.">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input is-medium" name="email" type="email" placeholder="Type email address">
                            </div>
                        </div>
                        <button class="button is-large is-primary" type="submit" name="submit"><i class="fas fa-paper-plane fa-fw"></i> Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <section class="section">
            <div class="container">
                <p>
                    &copy; All rights reserved <a href="http://www.bmscl.com">BMSCL</a>
                </p>
            </div>
        </section>
    </footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="semantic/semantic.min.js"></script>
<script>
    $(document).ready(function () {
        $(".othersinput").hide();
        $("input[name='program']").on("click", function () {
            if ($("input[name='program']:checked").val() == 'Others') {
                $(".othersinput").show();
            } else {
                $(".othersinput").hide();
            }
        });
    });
</script>
<script>
$(document).ready(function(){
    $(".card-content").hide();
  $(".card-header").click(function(){
    $(".card-content").toggle();
  });
});
</script>

</html>