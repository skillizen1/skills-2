<?php
session_start();
if(isset($_SESSION['student'])){
$name= $_SESSION['student'];
$name=$_GET['id'];	
$skill=$_GET['skill'];
} else{ echo "<script>window.location.href = '../index.php' </script>"; }


include_once 'admin/inc/constant.php';
$skill=$_GET['skill'];
$query=mysql_query("select * from studentt where user_name ='$name'");
$row=mysql_fetch_array($query);
$name1=trim($row[1]);
$grade=$row[3];
$qry=mysql_query("select * from ".$name."");
$rr=mysql_fetch_array($qry);
$profile_pic=$rr['profile_pic'];
$cover_pic=$rr['cover_pic'];
$path= "../video/$grade/$skill/$session";
$pathp="assignment/$name";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="dashboard/images/logo-icon.png" type="image/gif" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Skillizen User profile  </title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- Custom Theme Style -->
<link href="css/profile.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid nav_menu">
<div class="container">
<!-- top navigation -->
<div class="row">
<div class="col-md-3 col-sm-6 col-lg-3 col-xs-12">
<div class="logo">
<a href="index.php?id=<?php echo $name?>&skill=<?php echo $skill?>"><img src="images/logo1.png" class="img-responsive" alt="Logo" /></a>
</div>
</div>
<div class="col-md-9 col-sm-6 col-lg-9 col-xs-12">
<nav class="user-nav">
<ul class="nav navbar-nav navbar-right">
<li class="">
<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<?php if(!$profile_pic){ ?>
<img src="images/img.jpg" alt=""><?php echo $name1?>
<?php } else { ?>
<img src="<?php echo "$pathp/$profile_pic" ;?>"><?php echo $name1?>
<?php } ?>
<span class=" fa fa-angle-down"></span>
</a>
<ul class="dropdown-menu dropdown-usermenu pull-right">
<li><a href="user-profile.php"> Profile</a></li>
<!-- <li><a href="javascript:;">Help</a></li> -->
<li><a href="../index.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
</ul>
</li>
</ul>
</nav>
</div>
</div>
</div>
</div>
<script src="js/jquery.min.js"></script>
<div class="user-cover-box">
<div class="container">
<div class="col-md-12">
<form action='' method='post' enctype='multipart/form-data'>
<div class="edit-cover">
<div class="FilesUpload btn btn-white hidden">
<span><i class="fa fa-camera"></i> Edit Cover</span>
<input name="gphoto" class="upload upload_gphoto" type="file" />
</div>
<input type='submit' class='hidden' name='gphotoosub' value='upload' />
</div>
</form>

</div>
<?php 
if($name1!='Free Session'){
if(isset($_POST['gphotoosub'])){
	$pic=$_FILES['gphoto']['name'];
	$pictyp=$_FILES['gphoto']['type'];
	$pictmp=$_FILES['gphoto']['tmp_name'];
	$quer=mysql_query("update ".$name." set cover_pic='$pic'");
	
	if(!file_exists($pathp)){
		mkdir("$pathp",0755,true);
	}
	move_uploaded_file($pictmp,"$pathp/$pic");
}}?>
<div class="clearfix"></div>
<div class="main-profilebox clearfix">
<div class="col-md-3 col-xs-12 col-md-3 col-sm-3">
<a href="index.php?id=<?php echo $name?>&skill=<?php echo $skill?>" data-toggle="tooltip" title="Back to home" class="back-arro"> Back</a>
<form method='post' action='' enctype='multipart/form-data'>
<div class="user-photo">
<div class="profile-photoedit">
<?php if(!$profile_pic){ ?>
<img src="img/user.jpg" height='20px' class="img-circle img-responsive">
<?php } else { ?>
<img src="<?php echo "$pathp/$profile_pic" ;?>" style='height:200px;' class="img-circle img-responsive">
<?php } ?>
<div class="FilesUpload photo-change">
<span><i class="fa fa-camera"></i> Edit Photo</span>
<input name="gphotoo" class="upload upload_gphoto" type="file">
</div>

</div>

<h4><i class="fa fa-circle"></i> Online</h4>
<!--<ul class="user-media">
<li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-instagram"></i></a></li>
<li><a href="#"><i class="fa fa-youtube"></i></a></li>
</ul> -->
<input type='submit' name='gphotosub' value='upload' class='btn save-btn'>
<hr/>
<h4> India</h4>
<p>Member since <?php echo substr($row['regis_time'],0,10)?></p>
</div>
</form>
<?php 
if($name1!='Free Session'){
if(isset($_POST['gphotosub'])){
	$pic=$_FILES['gphotoo']['name'];
	$pictyp=$_FILES['gphotoo']['type'];
	$pictmp=$_FILES['gphotoo']['tmp_name'];
	$quer=mysql_query("update ".$name." set profile_pic='$pic'");
	
	if(!file_exists($pathp)){
		mkdir("$pathp",0755,true);
	}
	move_uploaded_file($pictmp,"$pathp/$pic");
	echo "<script>window.location.href=''</script>";
}}?>
</div>
<div class="col-md-9 col-xs-12 col-md-9 col-sm-9 bor-right-left padtop">

<h2 class="user-name"><?php echo $name1?></h2>
<!--<p class="user-tagline">Add your tagline here</p>-->
<div class="border">Name: <?php echo $name1?><a href="#" data-toggle="collapse" data-target="#changename">
<i  data-toggle="tooltip" title="Create new name" class="fa fa-pencil pull-right"></i></a></div>
<div id="changename" class="collapse">
<form class="form-inline" method='post' action=''>
<div class="form-group">
<input type="text" class="form-control" name='newname' placeholder="Create new name" required />
</div>
<button type="submit" class="btn btn-default" name='savename'>Save</button>
</form>
<?php 
if($name1!='Free Session'){
if(isset($_POST['savename'])){
	$q1=mysql_query("update studentt set student_name='".$_POST['newname']."' where user_name='$name'");
	echo "<script>window.location.href=''</script>";
}	}
?>
</div>
<div class="border">Email: <?php echo $row[5]?> </div>
<div class="border">Grade: <?php echo $grade?> </div>
<div class="border">User name: <?php echo $name?> <a href="#" data-toggle="collapse" data-target="#username">
<i data-toggle="tooltip" title="Create new user name" class="fa fa-pencil pull-right"></i></a></div>
<div id="username" class="collapse">
<form class="form-inline">
<div class="form-group">
<input type="text" class="form-control" name='newuser' placeholder="Create new user name" required />
</div>
<button type="button" class="btn btn-default" name='saveuser'>Save</button>
</form>
<?php 
if($name1!='Free Session'){
if(isset($_POST['saveuser'])){
	$q2=mysql_query("select * from studentt where user_name='".$_POST['newuser']." '");
	$r2=mysql_fetch_array($q2);
	if($r2==0){
	$q1=mysql_query("update studentt set user_name='".$_POST['newuser']."' where user_name='$name'");
	echo "<script>window.location.href=''</script>";
	}else{
		echo"<script>cofirm('user name already exist')</script>";
	}
}}	
?>
</div>
<div class="border">Password: <?php echo $row[8]?> <a href="#" data-toggle="collapse" data-target="#password">
<i data-toggle="tooltip" title="Create new password" class="fa fa-pencil pull-right"></i></a></div>
<div id="password" class="collapse">
<form class="form-inline" method='post' action=''>
<div class="form-group">
<input type="password" class="form-control" name='newpass' placeholder="Create new password" required />
</div>
<button type="submit" class="btn btn-default" name='savepass'>Save</button>
</form>
</div>
<?php 
if($name1!='Free Session'){
if(isset($_POST['savepass'])){
	$q1=mysql_query("update studentt set user_pass='".$_POST['newpass']."' where user_name='$name'");
	echo "<script>window.location.href=''</script>";
}	}
?>
<form action="" method="post">
<!--<div class="border bor-bot">Gender: <?php //echo $row[2]?></div>-->
<input class="btn save-btn" type="submit" value='Save Changes' />
</form>
</div>

<!--<div class="col-md-3 save-box padtop">
<div class="text-center">
<button class="btn save-btn" type="button">Save Changes</button>
</div>
<div class="border">Language <a href="#"> <i class="fa fa-pencil pull-right"></i></a></div>
<div class="border">Skill <a href="#"> <i class="fa fa-pencil pull-right"></i></a></div>
</div> -->
</div>
</div>
</div>
<div class="container">
<footer>
<div class="text-center"> © 2012 Skillizen Learning Global Pte. Ltd. All rights reserved. <!--<a href="#">Colorlib</a> -->       </div>
<div class="clearfix"></div>
</footer>
</div>
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
});
</script>
<body>
</html>