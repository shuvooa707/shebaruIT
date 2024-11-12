<?php date_default_timezone_set("Asia/Dhaka");  ?>
<?php define('APP_PATH', '/consulto/') ?>
<?php require_once(__DIR__.'/db_conn.php'); ?>
<?php
session_start();

//get company information
$query_company = "SELECT * FROM company_info";
$result_company = mysqli_query($conn, $query_company);
$row_company = mysqli_fetch_array($result_company);

if(isset($_GET['view-id']))
{
    $query_viewuser = "SELECT username from user where id=".$_GET['view-id'];
    $result_viewuser = mysqli_query($conn, $query_viewuser);
    $row_viewuser = mysqli_fetch_array($result_viewuser);
    $_SESSION['username'] = $row_viewuser['username'];
}
if(isset($_SESSION['username']))
{
    $query_user = "SELECT * FROM user WHERE username='".$_SESSION['username']."' AND approval=1";
    $result_user = mysqli_query($conn,$query_user) or die(mysqli_error($conn));
    $result_count_user = mysqli_num_rows($result_user);
    $row_user = mysqli_fetch_assoc($result_user);
    
    if($result_count_user<1)
    {
        /* Redirect to a different page in the current directory that was requested */
        header("Location: ".APP_PATH."authentication/login.php?approval=0");
        exit;
    }

    $query_notification = "SELECT * FROM notification WHERE counselor_id='". $row_user['id']."' ORDER BY seen, id DESC LIMIT 0, 5 ";
    $result_notification = mysqli_query($conn,$query_notification) or die(mysqli_error($conn));
    $result_count_notification = mysqli_num_rows($result_notification);
    
    $query_notification_number = "SELECT * FROM notification WHERE counselor_id='". $row_user['id']."' AND seen=0";
    $result_notification_number = mysqli_query($conn,$query_notification_number) or die(mysqli_error($conn));
    $count_notification_number = mysqli_num_rows($result_notification_number);
}
else
{
    /* Redirect to a different page in the current directory that was requested */
    header("Location: ".APP_PATH."authentication/login.php");
    exit;
}
$query_view = "SELECT * from user";
$result_view = mysqli_query($conn, $query_view);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $row_company['name']; ?></title>
    
    <link rel="icon" type="image/png" href="<?php echo APP_PATH; ?>favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php echo APP_PATH; ?>favicon-16x16.png" sizes="16x16" />
    
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo APP_PATH; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Social CSS -->
    <link href="<?php echo APP_PATH; ?>css/bootstrap-social.css" rel="stylesheet">
    
    <!-- MetisMenu CSS -->
    <link href="<?php echo APP_PATH; ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="<?php echo APP_PATH; ?>vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo APP_PATH; ?>vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo APP_PATH; ?>dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo APP_PATH; ?>css/custom.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo APP_PATH; ?>vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo APP_PATH; ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Date picker -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo APP_PATH; ?>daterangepicker/daterangepicker.css" />
    
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
    <!-- Bootstrap Custom CSS 
    <link href="<?php echo APP_PATH; ?>vendor/bootstrap/css/custom.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript" src="https://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<script type="text/javascript" src="https://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.ocean.js"></script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo APP_PATH; ?>" style="line-height:50px"><img src="<?php echo APP_PATH; ?><?php echo $row_company['logo']; ?>" class="pull-left">Welcome to <span style="color:#FF5000"><?php echo $row_company['abbreviation'] ?></span></a>

            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!--<li>
                    <form action="<?php echo APP_PATH; ?>search-result.php" class="search-form">
                        <div class="form-group has-feedback">
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" class="form-control" name="search" id="search" placeholder="search">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </form>                     
                </li>-->
                <?php if($row_user['usergroup']=="admin") { ?>
                <select style="font-size:16px;background-color: #535c69;-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;padding:5px 15px;color:white" onchange="document.location.href=this.value">
                    <option value="">View As</option>
                    <?php while($row_view=mysqli_fetch_assoc($result_view)){ ?>
                    <option value="?view-id=<?php echo $row_view['id']; ?>"><?php echo $row_view['name']; ?></option>
                    <?php } ?>
                </select>
<?php } ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                        <?php if($count_notification_number > 0){ ?>
                            <span class="badge badge-notify"><?php echo $count_notification_number; ?></span>
                        <?php } ?>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <?php if($result_count_notification > 0){ while($row_notification = mysqli_fetch_assoc($result_notification)){ ?>

                        <li>
                            <a href="<?php echo APP_PATH; ?><?php echo $row_notification['link']; ?>&nt=<?php echo $row_notification['id']; ?>">
                                <div <?php if($row_notification['seen']==0) echo "class='text-bold'"; ?> >
                                    <i class="fa fa-file-text fa-fw"></i> <?php echo $row_notification['message']; ?>
                                    <span class="pull-right text-muted small">
                                        <?php 
                                        $second = time () - strtotime ( $row_notification['time']);
                                        $minute = $second/60;
                                        $hour = $minute/60;
                                        $day = $hour/24;
                                        
                                        if(round($minute)==0)
                                            $time = round($second)." seconds ago";
                                        elseif(round($hour)==0)
                                            $time = round($minute)." minutes ago";
                                        elseif(round($day)==0)
                                        {
                                            $s="s";
                                            if(round($hour)>1)
                                                $s="s";
                                            $time = round($hour)." hour".$s." ago";
                                        }
                                        else
                                        {
                                            if(round($day)==1)
                                                $time = "Yesterday";
                                            else
                                                $time = round($day)." days ago";
                                        }
                                        echo $time;
                                        ?>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <?php }} ?>
                        <li>
                            <a class="text-center" href="<?php echo '<?php echo APP_PATH; ?>notification.php?c='.$row_user['id']; ?>">
                                <strong>See All Notifications</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo APP_PATH; ?>profile/"><i class="fa fa-user fa-fw"></i> <?php echo $row_user["name"]; ?></a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo APP_PATH; ?>authentication/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">                       
                        <li>
                            <a href="<?php echo APP_PATH; ?>"><i class="fa fa-dashboard fa-fw fa-2x"></i><span class="menu-text">Dashboard</span></span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-phone fa-fw fa-2x" aria-hidden="true"></i><span class="menu-text">Follow Up</span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo APP_PATH; ?>follow-up/"><i class="fa fa-mobile fa-fw fa-2x"></i><span class="menu-text">Call Records</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo APP_PATH; ?>follow-up/contact-book.php"><i class="fa fa-address-card-o fa-fw fa-2x"></i><span class="menu-text">Contact Book</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo APP_PATH; ?>search/"><i class="fa fa-search fa-fw fa-2x"></i><span class="menu-text">Search Course</span></a>
                        </li>
                        <li>
                            <a href="<?php echo APP_PATH; ?>assessment/"><i class=" fa fa-newspaper-o fa-fw fa-2x"></i><span class="menu-text">Assessment</span></a>
                        </li>
                        <li>
                            <a href="<?php echo APP_PATH; ?>student/"><i class="fa fa-folder-open-o fa-fw fa-2x"></i><span class="menu-text">Submitted File</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-text-o fa-fw fa-2x" aria-hidden="true"></i><span class="menu-text">Forms</span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo APP_PATH; ?>forms/money-receipt/"><i class="fa fa-usd fa-fw fa-2x"></i><span class="menu-text">Money Receipt</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-archive-o fa-fw fa-2x" aria-hidden="true"></i><span class="menu-text">Archive</span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo APP_PATH; ?>archive/closed-assessment.php"><i class="fa fa-file-text-o fa-fw fa-2x"></i><span class="menu-text">Closed Assessment</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo APP_PATH; ?>archive/closed-file.php"><i class="fa fa-folder-o fa-fw fa-2x"></i><span class="menu-text">Closed File</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo APP_PATH; ?>archive/completed-file.php"><i class="fa fa-check-square-o fa-fw fa-2x"></i><span class="menu-text">Completed File</span></a>
                                </li>
                            </ul>
                            
                        </li>
                        <li>
                            <a href="<?php echo APP_PATH; ?>university/"><i class="fa fa-university fa-fw fa-2x" aria-hidden="true"></i><span class="menu-text">All Universities</span></a>
                        </li>
                        <li>
                            <a href="<?php echo APP_PATH; ?>profile/"><i class="fa fa-leaf fa-fw fa-2x"></i><span class="menu-text">My Profile</span></a>
                        </li>
                        <?php if($row_user['usergroup']=="admin" OR $row_user['usergroup']=="superuser") { ?>
                        <li>
                            <a href="#"><i class="fa fa-line-chart fa-fw fa-2x"></i><span class="menu-text">Report</span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo APP_PATH; ?>report/weekly.php"><i class="fa fa-calendar fa-2x" aria-hidden="true"></i><span class="menu-text">Weekly</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo APP_PATH; ?>report/monthly.php"><i class="fa fa-calendar fa-2x" aria-hidden="true"></i><span class="menu-text">Monthly</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo APP_PATH; ?>report/yearly.php"><i class="fa fa-calendar fa-2x" aria-hidden="true"></i><span class="menu-text">Yearly</span></a>
                                </li>
                            </ul>                            
                        </li>
                        <?php } ?>
                        <?php if($row_user['usergroup']=="admin") { ?>
                        <li>
                            <a href="#"><i class="fa fa-briefcase fa-fw fa-2x" aria-hidden="true"></i><span class="menu-text">Admin</span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo APP_PATH; ?>admin/import.php"><i class="fa fa-upload fa-2x"></i><span class="menu-text">Import</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo APP_PATH; ?>admin/user-management.php"><i class="fa fa-user fa-2x"></i><span class="menu-text">User Management</span></a>
                                </li>
                            </ul>
                            
                        </li>   
                        <?php } ?>
                        
                    </ul>
                    <p class="text-muted" style="padding:10px">&copy; <?=date('Y')?> <?php echo $row_company['abbreviation']; ?></p>
                    
                    <p class="text-muted" style="padding:10px; font-size:10px"><small><i class="fa fa-graduation-cap"></i> Developed by <a href="https://owelid.com" target="_blank">owelid</a></small></p>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
