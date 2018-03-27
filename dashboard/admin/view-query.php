<?php
session_start();
if(!$_SESSION['skill']){ echo "<script>window.location.href='index.php'</script>"; }
include_once 'inc/constant.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>View Contant</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts--->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body class="sticky-header left-side-collapsed"  onload="initMap()">
<section>

<?php include_once'inc/header.php'?>
<!-- main content start-->
<div class="main-content main-content2 main-content2copy">

<div id="page-wrapper">
<div class="main-box clearfix">
<div class="col-lg-12"> <h3>View Query</h3></div>
<div class="clearfix"></div>
<hr>
    <table class='table stripped'>
        <thead>
            <tr>
            <td>S.No.</td>
            <td>Name</td>
            <td>Contact Number</td>
            <td>Email</td>
            <td>Query</td>
            <td>Date</td>
            </tr>
        </thead>
        <tbody>
<?php 
    $q2=mysqli_query($con,"SELECT * FROM contactus order by contact_id desc");
    $x=1;
    while($r2=mysqli_fetch_array($q2)){
        echo "<tr>
            <td>".$x++."</td>
            <td>".$r2['name']."</td>
            <td>".$r2['phone']."</td>
            <td>".$r2['email']."</td>
            <td>".$r2['comment']."</td>
            <td>".$r2['date']."</td>
            </tr>";
    }
?>
            
        </tbody>
    </table>
    </div>
    </div>
    </div>
    
    
    </section>
    
    </body>
</html>