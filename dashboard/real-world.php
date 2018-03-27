<?php
session_start();
if(isset($_SESSION['student'])){
$name= $_SESSION['student'];
$name=$_GET['id'];	
$skill=$_GET['skill'];
} else{ echo "<script>window.location.href = '../index.php' </script>"; }


$skill=$_GET['skill'];
$session=$_GET['session'];
include_once 'admin/inc/constant.php';
$query=mysql_query("select * from studentt where user_name ='$name'");
$row=mysql_fetch_array($query);
$name1=$row[1];
$grade=$row[3];

$path= "../video/$grade/$skill/$session";
$query12=mysql_query("select * from `session` where `skill_name`='$skill' and `grade_id`='$grade'");
$row12=mysql_fetch_array($query12);
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
<title>Skillizen Real world  </title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- Custom Theme Style -->
<link href="css/custom.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
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
<div class="inner">
<div class="row">
<div class="col-md-12">
<h4 class="bor-bot"><span>Real World Assignment : <?php echo $session?></span></h4>
<p class="normal-text"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> <?php echo $row12[13]?> </span></p>
<p class="normal-text form-group"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> <?php echo $row12[14]?></span></p>
</div>
</div>
<hr>
<div class="row">
<div class="col-lg-12">
<div class="box1">
<header class="dark">
<div class="icons"><i class="fa fa-cloud-upload"></i></div>
<h5>Upload Assignment Here</h5>
</header>
</div>
<div class="body">
<form class="form-horizontal" method='post' enctype='multipart/form-data' action="">
<div class="form-group">
<label class="control-label col-lg-4"></label>
<div class="col-lg-8">
<div class="fileupload fileupload-new" data-provides="fileupload">

<!--<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; height: auto; line-height: 20px;"></div>
-->                  <div>
<span class="btn btn-file btn-primary">
<input type="file" name='assignmen'>
</span>
<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
</div>
</div>
</div>
</div>
<div class="col-md-12 text-center">
<button type='submit' name='assign_submit' class="btn btn-danger">Upload</button>
</div>
<!--<div class="alert alert-warning"><strong>Notice!</strong> Image preview only works in IE10+, FF3.6+, Chrome6.0+ and Opera11.1+. In older browsers and Safari, the filename is shown instead.</div> -->
</form>
</div>
<?php
if(isset($_POST['assign_submit'])){
$filenam=$_FILES['assignmen']['name'];
$filetyp=$_FILES['assignmen']['type'];
$filetmp=$_FILES['assignmen']['tmp_name'];
$filepath="assignment/$name/";
//			if($filetyp=='application/pdf' || $filetyp=='application'){
if(!file_exists($filepath)){
mkdir($filepath,777,true);
}
$filepath=$filepath.basename($filenam);
move_uploaded_file($filetmp,"$filepath/");
$query=mysql_query("update ".$name." set assignment='".$filenam."' where session_name='$session'");
//}
?>
<script>
var session='<?php echo $session;?>';
var name='<?php echo $name;?>';
var per = 'assignment';
$.post("ajax/assignment.php", {per: per,session:session,name:name},function(data){
	if(data==100){
		$("#assignmentt").addClass('in').show();
		//$("#assignmentt").addClass('fade').show();
		$("#assignmentt").addClass('modal').show();
		$("#assignmentt").css('display','block');
		$("#assignmentt").css('opacity','1');
	}
});
</script>
<?php if(!$query){
echo 'sorry';
}
}?>
</div>
</div>
</div>
</div>
<!-- /top tiles -->
</div>

<div id="assignmentt" class="modal fade">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4>Congrats</h4>
</div>
<div class="modal-body text-center">
<h2>Congratulations ! You have already started applying your newfound life skills.
Your Assignment has been successfully submitted.Keep Skilling.......</h2>
<a href='index.php?id=<?php echo $name;?>&skill=<?php echo $skill?>' class='btn btn-success text-center'>Home</a>
</div>
</div>
</div>
</div>
<!-- /page content -->
<?php include'inc/footer.php'?>
</body>
</html>