<?php
session_start();
$passcode = "uniuniten";
if(isset($_POST['login'])){

  if($_POST['passcode'] === $passcode){
    $_SESSION["pass"] = $_POST['passcode'];
  }
}
if(isset($_GET['logout'])){
  session_destroy();
  header("Location:index.php");
}
date_default_timezone_set("Asia/Dhaka");
require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../../../db_conn.php');
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Uniten Registration Form - Bangladesh Malaysia Study Centre Ltd.</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../../../node_modules/bulma/css/bulma.css">
  <link rel="stylesheet" type="text/css" href="../../../node_modules/bulma-checkradio/dist/css/bulma-checkradio.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
    crossorigin="anonymous">
</head>

<body>
<?php if(isset($_SESSION["pass"]) && $_SESSION['pass'] == $passcode){ ?>
    <nav class="navbar has-background-grey-light" role="navigation" aria-label="main navigation">
    <div class="container level">
      <div class="level-left">
        <div class="navbar-brand level-item">
          <!-- navbar items, navbar burger... -->
          <a class="navbar-item " href="index.php">
            <img src="../../../img/BMSCL-LOGO-WEB.png" alt="BMSCL LOGO" style="min-height: 60px">
          </a>
        </div>
      </div>
      <div class="level-right">
        <a href="index.php?logout" class="button level-item is-danger">Logout</a>
      </div>
    </div>
  </nav>
  <section class="hero is-light">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
            Uniten Registration Form
        </h1>
        <h2 class="subtitle">
            Bangladesh Malaysia Study Centre Ltd.
        </h2>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      
    <div class="table-container">
      <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th style="min-width:200px">Name</th>
                <th>Program</th>
                <th>Subject</th>
                <th>Certificate</th>
                <th>Result</th>
                <th>Passport</th>
                <th>IELTS</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
            $sql = "SELECT * FROM online_registration WHERE office='Dhaka' AND type='University' AND location='Uniten'";
              if($result = mysqli_query($conn, $sql)){
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) { 
                      $count++;           
            ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['program'];?></td>
                <td><?php echo $row['subject'];?></td>
                <td><?php echo $row['certificate'];?></td>
                <td><?php echo $row['result'];?></td>
                <td><?php if($row['passport']==1){echo 'Yes';}else{echo "No";} ?></td>
                <td><?php if($row['ielts']!=0){echo $row['ielts'];}else{echo "No";} ?></td>
                <td><?php echo $row['mobile'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['created_at'];?></td>
            </tr>
            <?php
                }
              }
            }
            ?>            
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Program</th>
                <th>Subject</th>
                <th>Certificate</th>
                <th>Result</th>
                <th>Passport</th>
                <th>IELTS</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Date</th>
            </tr>
        </tfoot>
      </table>
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
  <?php } else {?>
      <section class="hero is-dark is-fullheight">
        <div class="hero-body">
          <div class="container" style="max-width: 400px">
            <article class="notification is-info passcode">
              <div class="content">
                <p class="title">Login</p>
                <div class="content my-2">
                  <form method="post">
                    <div class="field has-addons">
                      <div class="control has-icons-left">
                        <input name="passcode" class="input" type="password" placeholder="Type the access code." size="30">
                        <span class="icon is-small is-left">
                          <i class="fas fa-key"></i>
                        </span>
                      </div>
                      <div class="control">
                        <button type="submit" name="login" class="button is-primary">Login</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </article>
          </div>
        </div>
      </section>
      <?php } ?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>
</html>