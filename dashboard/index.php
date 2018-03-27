<?php
session_start();
if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
} 
if(isset($_SESSION['student'])){
$name= $_SESSION['student'];
$name=$_GET['id'];	
$skill=$_GET['skill'];
} else{ echo "<script>window.location.href = '../index.php' </script>"; }


include_once 'admin/inc/constant.php';
$query=mysql_query("select * from studentt where user_name ='$name'");
$row=mysql_fetch_array($query);
$name1=$row[1];
$grade=$row[3];
$query1=mysql_query("select * from skill where skill_name='$skill' and grade_id='$grade'");
$rowin=mysql_fetch_array($query1);

$q10=mysql_query("CREATE TABLE ".$name." (id int(5),
name varchar(100),
progress int(5) not null,
assignment varchar(100),
session_name varchar(255),
skill_name varchar(255),
popup1_progress int(10) not null,
popup2_progress int(10) not null,
activity_progress int(10) not null,
sbq_progress int(10) not null,
assignment_progress int(10) not null,
sbq_marks int(10) not null,
profile_pic varchar(50),
cover_pic varchar(50) )") ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="images/logo-icon.png" type="image/gif" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Skillizen Dashboard  </title>
</head>
<body class="nav-md">
<div class="container body">
<div class="main_container">
<div class="col-md-3 left_col">
<?php include'inc/left-panel.php'?>
</div>
<!-- top navigation -->
<div class="top_nav">
<?php include'inc/top-nav.php'?>
</div>
<!-- /top navigation -->
<!-- page content -->
<div class="right_col" role="main">
<!-- top tiles -->
<div class="row tile_count">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="counthead"><?php echo $skill ?> </div>
</div>
</div>
<!-- /top tiles -->
<div class="container">
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<h3 class="sub-text"><?php echo $rowin[3]?></h3>
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
<img src="img/<?php echo $rowin[4]?>" class="img-responsive"/>
</div>
<div class="clearfix"></div>
<hr />
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="text-center">
<?php $query=mysql_query("select * from session where skill_name='$skill' and grade_id='$grade'");
$row4=mysql_fetch_array($query);
?>
<span style="display:inline-block"><a href="dashboard.php?id=<?php echo $name?>&skill=<?php echo $skill;?>&session=<?php echo $row4[3]?>" class="btn start-btn">Click here to start session   </a></span>
</div>
</div>
</div>
</div>
</div>
<!-- /page content -->
<?php include'inc/footer.php'?>
</body>
</html>