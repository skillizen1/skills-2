<?php
session_start();
//if(!$_SESSION['skill']){ echo "<script>window.location.href='index.php'</script>"; }
include_once 'inc/constant.php';
$grade=trim($_GET['grade']);
$skill=trim($_GET['skill']);
$session=trim($_GET['session']);
$q32=mysql_query("Select * from session where grade_id='$grade' and skill_name='$skill'");
$x=0;
while($r32=mysql_fetch_array($q32)){
	$x++;
	if(trim($r32['session_name'])==$session){
		$session_no=$x;
	}
}
$q31=mysql_query("Select * from session where grade_id='$grade' and session_name='$session' and skill_name='$skill'");
$r31=mysql_fetch_array($q31);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add Contant</title>
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
<div class="col-lg-12"> <h3>Add Contant</h3></div>
<div class="clearfix"></div>
<hr>

<div class="col-lg-3">
<select class="form-control" id='grade' name='grade'>
<option>---Select Grade---</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='7'>7</option>
<option value='8'>8</option>
<option value='9'>9</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
</select>
</div>
<script>
$(document).ready(function(){
$('#grade').change(function(){
var grade= $('#grade').val();
$.post('ajax/grades.php',{grade:grade},function(data){
$('#selectskills').html(data);

});
});
});
</script>
<div class="col-lg-3">
<select class="form-control" id='selectskills' name='selectskills'>
<option>---Select Skills---</option>
</select>
</div>
<script>
$(document).ready(function(){
$('#selectskills').change(function(){
var grade= $('#grade').val();
var skill=$('#selectskills').val();
$.post('ajax/skills.php',{skill:skill,grade:grade},function(data1){
$('#selectsession').html(data1);
});
});
});
</script>
<div class="col-lg-3 form-group">
<select class="form-control" id='selectsession' name="selectsession">
<option>---Select Session---</option>
</select>
</div>
<script>
$(document).ready(function(){
$('#addsession').click(function(){
var grade= $('#grade').val();
var skill=$('#selectskills').val();
var session=$('#selectsession').val();
window.location.href = "add-contant.php?grade=" + grade + "&skill=" + skill + "&session=" + session ;
});
});
</script>

<div class="col-lg-3"><button type="submit" class="btn btn-primary" id="addsession">Submit</button></div>
<div class="clearfix"></div>
<?php
if(isset($_GET['grade'])){
?>
<script>
$('#grade').val('<?php echo $grade ?>');
$('#selectskills').html("<option value='<?php echo $skill?>'><?php echo $skill?></option>");
$('#selectsession').html("<option value='<?php echo $session_no?>'><?php echo $session_no?></option>");
</script>
<hr>
<div class="form-group clearfix"><form action="" method="post" enctype="multipart/form-data">
<div class="col-lg-2"><label>Change Session Name</label></div>
<div class="col-lg-4"><input type="text"  name="newsession" value='<?php if(isset($_GET['session'])){echo $_GET['session']; }?>'/></div>
<div class="col-lg-6"><button type="submit" name='savesession' class="btn btn-primary">Submit</button></div>
</form></div>
<?php
if(isset($_POST['savesession'])){
if(isset($_GET['grade'])){
$quer=mysql_query("update session set `session_name`= '".$_POST['newsession']."' where grade_id='".$grade."' and session_name='".$session."' and skill_name='".$skill."'");
echo "<script>window.location.href='add-contant.php?grade=".$grade."&skill=".$skill."&session=".$_POST['newsession']."'</script>";
if($quer){
echo "<script>alert('Successfully uploaded')</script>";
}else{
echo "<script>alert('try again')</script>";
}
}else{
echo "Please select session first";
}
}
?>
<div class="form-group clearfix"><form action="" method="post">
<div class="col-lg-2"><label>Add Objectives</label></div>
<div class="col-lg-2"><textarea class="form-control" name='obj1' placeholder="Type 1 objectives name" required><?php if(isset($r31['session_des1'])){echo $r31['session_des1']; }?></textarea></div>
<div class="col-lg-2"><textarea class="form-control" name='obj2' placeholder="Type 2 objectives name" required><?php if(isset($r31['session_des2'])){echo $r31['session_des2']; }?></textarea></div>
<div class="col-lg-2"><textarea class="form-control" name='obj3' placeholder="Type 3 objectives name"><?php if(isset($r31['session_des3'])){echo $r31['session_des3']; }?></textarea></div>
<div class="col-lg-4"><button name="addobj" type="submit" class="btn btn-primary">Submit</button></div>
</form></div>
<?php

if(isset($_POST['addobj'])){
if(isset($_GET['grade'])){
$quer=mysql_query("update session set `session_des1`= '".$_POST['obj1']."',`session_des2`= '".$_POST['obj2']."',`session_des3`= '".$_POST['obj3']."' where grade_id='$grade' and session_name='$session' and skill_name='$skill'");
if($quer){
echo "<script>alert('Successfully uploaded');
window.location.href=''</script>";
}else{
echo "<script>alert('try again')</script>";
}
}else{
echo "<script>alert('Please select Grade , Skill and Session')</script>";
}
}
?>
<div class="form-group clearfix"><form action="" method="POST" enctype="multipart/form-data">
<div class="col-lg-2"><label>Case Story</label></div>
<div class="col-lg-4"><input type="file"  name='casestory'>
<?php if(isset($r31['case_story'])){ echo "<font color='#0f0'>".$r31['case_story']."</font>"; } ?>
</div>
<div class="col-lg-6"><button type="submit" name='addcase' class="btn btn-primary">Upload</button></div>
</form></div>
<?php
if(isset($_POST['addcase'])){
if(isset($_GET['grade'])){
$case=$_FILES['casestory']['name'];
$case_tmp=$_FILES['casestory']['tmp_name'];
$target_file = "../../video/$grade/$skill/$session_no/";
if(!file_exists($target_file)){
mkdir($target_file,0777,true);
}
if(move_uploaded_file($_FILES["casestory"]["tmp_name"], "$target_file/$case")){
$quer=mysql_query("update session set `case_story`= '".$case."' where grade_id='$grade' and session_name='$session' and skill_name='$skill'");
if($quer){
echo "<script>alert('Successfully uploaded')</script>";
}else{
echo "<script>alert('try again')</script>";
}
}
else{
echo "<script>alert('file not uploaded')</script>";
}
}
else{
echo "<script>alert('Please select Grade , Skill and Session')</script>";
}
}

?>
<div class="form-group clearfix"><form action="" method="post" enctype="multipart/form-data">
<div class="col-lg-2"><label>Concept Video</label></div>
<div class="col-lg-4"><input type="file"  name="conceptvideo"/>
<?php if(isset($r31['concept_video'])){ echo "<font color='#0f0'>".$r31['concept_video']."</font>"; } ?>
</div>
<div class="col-lg-6"><button type="submit" name='addconcept' class="btn btn-primary">Upload</button></div>
</form></div>
<?php if(isset($_POST['addconcept'])){
if(isset($_GET['grade'])){
$case=$_FILES['conceptvideo']['name'];
$case_tmp=$_FILES['conceptvideo']['tmp_name'];
$target_file = "../../video/$grade/$skill/$session_no/";
if(!file_exists($target_file)){
mkdir($target_file,0777,true);
}
if(move_uploaded_file($_FILES["conceptvideo"]["tmp_name"], "$target_file/$case")){
$quer=mysql_query("update session set `concept_video`= '".$case."' where grade_id='$grade' and session_name='$session' and skill_name='$skill'");
if($quer){
echo "<script>alert('Successfully uploaded')</script>";
}else{
echo "<script>alert('try again')</script>";
}
}
else{
echo "<script>alert('file not uploaded')</script>";
}
}
else{
echo "<script>alert('Please select Grade , Skill and Session')</script>";
}
}
?>
<div class="form-group clearfix"><form action="" method="post" enctype='multipart/form-data'>
<div class="col-lg-2"><label>Skill Session</label></div>
<div class="col-lg-4"><input type="file" name='onlinesession' />
<?php if(isset($r31['online_session'])){ echo "<font color='#0f0'>".$r31['online_session']."</font>"; } ?>
</div>
<div class="col-lg-6"><button type="submit" name='addonlinesession' class="btn btn-primary">Upload</button></div>
</form>
</div>
<?php if(isset($_POST['addonlinesession'])){
if(isset($_GET['grade'])){
$case=$_FILES['onlinesession']['name'];
$case_tmp=$_FILES['onlinesession']['tmp_name'];
$target_file = "../../video/$grade/$skill/$session_no/";
echo "uploading...";
if(!file_exists($target_file)){
mkdir($target_file,0777,true);
}
if(move_uploaded_file($_FILES["onlinesession"]["tmp_name"], "$target_file/$case")){
$quer=mysql_query("update session set `online_session`= '".$case."' where grade_id='$grade' and session_name='$session' and skill_name='$skill'");
if($quer){
echo "<script>alert('Successfully uploaded')</script>";
}else{
echo "<script>alert('try again')</script>";
}
}
else{
echo "<script>alert('file not uploaded')</script>";
}
}
else{
echo "<script>alert('Please select Grade , Skill and Session')</script>";
}
}
?>
<div class="form-group clearfix"><form action="" method="post" enctype='multipart/form-data'>
<div class="col-lg-2"><label>Activity</label></div>
<div class="col-lg-2"><input type="file"  name='activity'/>
<?php if(isset($r31['activity'])){ echo "<font color='#0f0'>".$r31['activity']."</font>"; } ?>
</div>
<div class="col-lg-2"></div>
<div class="col-lg-2"><input type="text"  name='activity_time' value='<?php if(isset($r31['activity_time'])){echo gmdate("i:s", $r31['activity_time']); }?>' placeholder='Activity time in minutes like mm:ss' required/></div>
<div class="col-lg-4"><button type="submit" name='addactivity' class="btn btn-primary">Upload</button></div>
</form></div>
<?php if(isset($_POST['addactivity'])){
if(isset($_GET['grade'])){
$case=$_FILES['activity']['name'];
$case_tmp=$_FILES['activity']['tmp_name'];
$activity_time=$_POST['activity_time'];
sscanf($activity_time, "%d:%d:%d", $hours, $minutes, $seconds);
$activity_tim = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;

$target_file = "../../video/$grade/$skill/$session_no/activity";
$activity_name='index.html';
if(!file_exists($target_file)){
mkdir($target_file,0777,true);
}
if(move_uploaded_file($_FILES["activity"]["tmp_name"], "$target_file/$case")){
$quer=mysql_query("update session set activity_time='".$activity_tim."', `activity`= '".$activity_name."' where grade_id='$grade' and session_name='$session' and skill_name='$skill'");

$zip = new ZipArchive;
$res = $zip->open("$target_file/activity.zip");
if ($res === TRUE) {
  $zip->extractTo("$target_file");
  $zip->close();
  echo 'woot!';
} else {
  echo 'doh!';
}

if($quer){
echo "<script>alert('Successfully uploaded');
window.location.href='';
</script>";
}else{
echo "<script>alert('try again')</script>";
}
}
else{
echo "<script>alert('Activity not uploaded')</script>";
}
}
else{
echo "<script>alert('Please select Grade , Skill and Session')</script>";
}
}
?>
<div class="form-group clearfix"><form action="" method="post" enctype='multipart/form-data'>
<div class="col-lg-2"> <label>Assignment 1</label></div>
<div class="col-lg-4"><textarea class="form-control" name='assignment' placeholder="Assignment 1" required>
<?php if(isset($r31['assignment1'])){echo $r31['assignment1']; }?>
</textarea></div>
<div class="col-lg-6"><button type="submit" name='addassignment' class="btn btn-primary">Submit</button></div>
</form></div>
<?php	if(isset($_POST['addassignment'])){
if(isset($_GET['grade'])){
$assignment=$_POST['assignment'];
$query=mysql_query("update session set `assignment1`='$assignment' where grade_id ='$grade' and skill_name='$skill' and session_name='$session'");
if($query){
echo "<script>alert('Successfully uploaded');
window.location.href='';
</script>";
}else{
echo "<script>alert('try again')</script>";
}
}else{
echo "<script>alert('Please select Grade , Skill and Session')</script>";
}
}		?>

<div class="form-group clearfix"><form action="" method="post" enctype='multipart/form-data'>
<div class="col-lg-2"> <label>Assignment 2</label></div>
<div class="col-lg-4"><textarea class="form-control" name='assignment3' placeholder="Assignment 2" required>
<?php if(isset($r31['assignment2'])){echo $r31['assignment2']; }?>
</textarea></div>
<div class="col-lg-6"><button type="submit" name='addassignment2' class="btn btn-primary">Submit</button></div>
</form></div>
<?php	if(isset($_POST['addassignment2'])){
if(isset($_GET['grade'])){
$assignment=$_POST['assignment3'];
$query=mysql_query("update session set `assignment2`='$assignment' where grade_id ='$grade' and skill_name='$skill' and session_name='$session'");
if($query){
echo "<script>alert('Successfully uploaded');
window.location.href='';
</script>";
}else{
echo "<script>alert('try again')</script>";
}
}else{
echo "<script>alert('Please select Grade , Skill and Session')</script>";
}
}		?>
<div class="form-group clearfix">
<div class="col-lg-2"><label>Situational Quiz</label></div>
<div class="col-lg-10"> <a href="#" data-toggle="modal" data-target="#situational-quiz"><strong>Quiz ??</strong></a></div>
</div>
<div class="form-group clearfix">
<div class="col-lg-2"><label>Popup Quiz 1</label></div>
<div class="col-lg-10"> <a href="#" data-toggle="modal" data-target="#popup-quiz"><strong>Quiz ??</strong></a></div>
</div>
<div class="form-group clearfix">
<div class="col-lg-2"><label>Popup Quiz 2</label></div>
<div class="col-lg-10"> <a href="#" data-toggle="modal" data-target="#popup-quiz2	"><strong>Quiz ??</strong></a></div>
</div>
<?php } ?>
<!--Situational Quiz  Modal start here -->
<div class="modal fade" id="situational-quiz" role="dialog">
<div class="modal-dialog  modal-lg">
<!-- Modal content-->
<div class="modal-content clearfix">
<form action="" method="post">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="form-inline form-group">
<div class="form-group">
<label>Question &nbsp; &nbsp;</label><input type="text" name='question' class="form-control" placeholder="Write your Question "/>
</div>
</div>

</div>
<br>
<div class="col-lg-6">
<div class="form-inline form-group">
<div class="form-group">
<label>Option 1 &nbsp; &nbsp;</label><textarea name='op1' class="form-control"></textarea>
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>Option 2 &nbsp; &nbsp;</label><textarea name='op2' class="form-control"></textarea>
</div>
</div>

<div class="form-inline form-group">
<div class="form-group">
<label>Option 3  &nbsp; &nbsp;</label><textarea name='op3' class="form-control"></textarea>
</div>
</div>

<div class="form-inline form-group">
<div class="form-group">
<label>Option 4  &nbsp; &nbsp;</label><textarea name='op4' class="form-control"></textarea>
</div>
</div>

</div>
<div class="col-lg-6">
<div class="form-inline form-group">
<div class="form-group">
<label title='reason 1'>R1 &nbsp; &nbsp;</label><textarea name='rrr1' class="form-control"></textarea>&nbsp; 
<input type='radio' name='sbqsel1' value='1' />
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label title='reason 2'>R2 &nbsp; &nbsp;</label><textarea name='rrr2' class="form-control"></textarea>&nbsp; 
<input type='radio' name='sbqsel1' value='2' />
</div>
</div>

<div class="form-inline form-group">
<div class="form-group">
<label title='reason 3'>R3 &nbsp; &nbsp;</label><textarea name='rrr3' class="form-control"></textarea>&nbsp; 
<input type='radio' name='sbqsel1' value='3' />
</div>
</div>

<div class="form-inline form-group">
<div class="form-group">
<label title='reason 4'>R4 &nbsp; &nbsp;</label><textarea name='rrr4' class="form-control"></textarea>&nbsp; 
<input type='radio' name='sbqsel1' value='4' />
</div>
</div>

</div>
<div class="clearfix"></div>
<hr>
<div class="col-lg-12 form-group text-center">
<button type="submit" name='addsbq' class="btn btn-primary">Submit</button>
</div></form>
</div>
</div>

</div>
<?php
if(isset($_POST['addsbq'])){
if(isset($_GET['grade'])){
$sel=trim($_POST['sbqsel1']);	
$question=trim($_POST['question']);
$op1=trim($_POST['op1']);
$op2=trim($_POST['op2']);
$op3=trim($_POST['op3']);
$op4=trim($_POST['op4']);
//$ans=$_POST['ans'];
$r1=trim($_POST['rrr1']);
$r2=trim($_POST['rrr2']);
$r3=trim($_POST['rrr3']);
$r4=trim($_POST['rrr4']);
//$ansr=$_POST['ansr'];
if($sel==1){
	$ans=$op1;
	$ansr=$r1;
}elseif($sel==2){
	$ans=$op2;
	$ansr=$r2;
}elseif($sel==3){
	$ans=$op3;
	$ansr=$r3;
}elseif($sel==4){
	$ans=$op4;
	$ansr=$r4;
}

$q4=mysql_query("select * from skill where grade_id='$grade' and skill_name='$skill'");
$qr4=mysql_fetch_array($q4);
$skill_id=$qr4['skill_id'];

$q5=mysql_query("select * from session where grade_id='$grade' and skill_name='$skill' and session_name='$session'");
$qr5=mysql_fetch_array($q5);
$session_id=$qr5['session_id'];
$query=mysql_query("Insert into `situation bq` (`question`,`op1`,`op2`,`op3`,`op4`,`ans`,`description`,`exp1`,`exp2`,`exp3`,`exp4`,`grade_id`,`skill_id`,`session_id`) values('$question','$op1','$op2','$op3','$op4','$ans','$ansr','$r1','$r2','$r3','$r4','$grade','$skill_id','$session_id')");
if($query){
echo "<script>alert('Successfully uploaded')</script>";
}else{
echo "<script>alert('try again')</script>";
}
}else{
echo "<script>alert('Please select Grade , Skill and Session')</script>";
}
}		?>
<!--Situational Quiz  Modal end here -->

<!--popup Quiz 1 Modal  start here -->
<div class="modal fade" id="popup-quiz" role="dialog">
<div class="modal-dialog  modal-lg">
<form action="" method="post" enctype='multipart/form-data'>
<!-- Modal content-->
<div class="modal-content clearfix">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="form-inline form-group">
<div class="form-group">
<label>Question 1 &nbsp; &nbsp;</label>
<input type="text" name='q1' value='<?php if(isset($r31['popup1_q'])){ echo $r31['popup1_q']; }?>' class="form-control" placeholder="Write your Question "/>
</div>
</div>

</div>
<br>
<div class="col-lg-6">
<div class="form-inline form-group">
<div class="form-group">
<label>Option 1 &nbsp; &nbsp;</label><textarea name='pop1' class="form-control">
<?php if(isset($r31['popup1_op1'])){ echo $r31['popup1_op1']; }?>
</textarea>
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>Option 2 &nbsp; &nbsp;</label><textarea name='pop2' class="form-control">
<?php if(isset($r31['popup1_op2'])){ echo $r31['popup1_op2']; }?>
</textarea>
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>Option 3 &nbsp; &nbsp;</label><textarea name='pop3' class="form-control">
<?php if(isset($r31['popup1_op3'])){ echo $r31['popup1_op3']; }?>
</textarea>
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>Option 4 &nbsp; &nbsp;</label><textarea name='pop4' class="form-control">
<?php if(isset($r31['popup1_op4'])){ echo $r31['popup1_op4']; }?>
</textarea>
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>Popup Time &nbsp;</label><textarea name='pt1' placeholder='Popup Time in seconds' class="form-control">
<?php if(isset($r31['popup1_time'])){ echo gmdate('i:s',$r31['popup1_time']); }?>
</textarea>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="form-inline form-group">
<div class="form-group">
<label>R1 &nbsp; &nbsp;</label><textarea name='pr1' class="form-control">
<?php if(isset($r31['popup1_exp1'])){ echo $r31['popup1_exp1']; }?>
</textarea>&nbsp; <input type="radio" name='popup1sel' value='1' <?php if($r31['popup1_ans']==$r31['popup1_exp1']){ echo"checked"; } ?>/>
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>R2 &nbsp; &nbsp;</label><textarea name='pr2' class="form-control">
<?php if(isset($r31['popup1_exp2'])){ echo $r31['popup1_exp2']; }?>
</textarea>&nbsp; <input type="radio" name='popup1sel' value='2' <?php if($r31['popup1_ans']==$r31['popup1_exp2']){ echo"checked"; } ?>/>
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>R3 &nbsp; &nbsp;</label><textarea name='pr3' class="form-control">
<?php if(isset($r31['popup1_exp3'])){ echo $r31['popup1_exp3']; }?>
</textarea>&nbsp; <input type="radio" name='popup1sel' value='3'<?php if($r31['popup1_ans']==$r31['popup1_exp3']){ echo"checked"; } ?>/>
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>R4 &nbsp; &nbsp;</label><textarea name='pr4' class="form-control">
<?php if(isset($r31['popup1_exp4'])){ echo $r31['popup1_exp4']; }?>
</textarea>&nbsp; <input type="radio" name='popup1sel' value='4'<?php if($r31['popup1_ans']==$r31['popup1_exp4']){ echo"checked"; } ?>/>
</div>
</div>

</div>
<div class="clearfix"></div>
<hr>
<div class="col-lg-12 form-group text-center">
<button type="submit" name='addpopup1'class="btn btn-primary">Submit</button>
</div>
</div>
</form>
</div>

</div>
<?php	if(isset($_POST['addpopup1'])){
if(isset($_GET['grade'])){
$sel=trim($_POST['popup1sel']);
$question=trim($_POST['q1']);
$op1=trim($_POST['pop1']);
$op2=trim($_POST['pop2']);
$op3=trim($_POST['pop3']);
$op4=trim($_POST['pop4']);
$r1=trim($_POST['pr1']);
$r2=trim($_POST['pr2']);
$r3=trim($_POST['pr3']);
$r4=trim($_POST['pr4']);
$pt=trim($_POST['pt1']);

sscanf($pt, "%d:%d:%d", $hours, $minutes, $seconds);
$pt = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;

if($sel==1){
	$ans=$r1;
}elseif($sel==2){
	$ans=$r2;
}elseif($sel==3){
	$ans=$r3;
}elseif($sel==4){
	$ans=$r4;
}
$query=mysql_query("update session set popup1_time='$pt', popup1_q='$question', popup1_op1='$op1',popup1_op2='$op2',popup1_op3='$op3', popup1_op4='$op4', popup1_ans='$ans', popup1_exp1='$r1', popup1_exp2='$r2',popup1_exp3='$r3',popup1_exp4='$r4' where `grade_id`='$grade' and `skill_name`='$skill' and `session_name`='$session'");
if($query){
echo "<script>alert('Successfully uploaded');
window.location.href='';
</script>";
}else{
echo "<script>alert('try again')</script>";
}
}else{
echo "<script>alert('Please select Grade , Skill and Session')</script>";
}
}		?>
<!--popup Quiz 1 Modal end here -->

<!--popup Quiz 2 Modal  start here -->
<div class="modal fade" id="popup-quiz2" role="dialog">
<div class="modal-dialog  modal-lg">
<form action="" method="post" enctype='multipart/form-data'>
<!-- Modal content-->
<div class="modal-content clearfix">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="form-inline form-group">
<div class="form-group">
<label>Question 2 &nbsp; &nbsp;</label>
<input type="text" name='q2' value='<?php if(isset($r31['popup2_q'])){ echo $r31['popup2_q']; }?>' class="form-control" placeholder="Write your Question "/>
</div>
</div>

</div>
<br>
<div class="col-lg-6">
<div class="form-inline form-group">
<div class="form-group">
<label>Option 1 &nbsp; &nbsp;</label><textarea name='p2op1' class="form-control">
<?php if(isset($r31['popup2_op1'])){ echo $r31['popup2_op1']; }?>
</textarea>
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>Option 2 &nbsp; &nbsp;</label><textarea name='p2op2' class="form-control">
<?php if(isset($r31['popup2_op2'])){ echo $r31['popup2_op2']; }?>
</textarea>
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>Option 3 &nbsp; &nbsp;</label><textarea name='p2op3' class="form-control">
<?php if(isset($r31['popup2_op3'])){ echo $r31['popup2_op3']; }?>
</textarea>
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>Option 4 &nbsp; &nbsp;</label><textarea name='p2op4' class="form-control">
<?php if(isset($r31['popup2_op4'])){ echo $r31['popup2_op4']; }?>
</textarea>
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>Popup Time &nbsp;</label><textarea name='pt2' placeholder='Popup Time in seconds' class="form-control">
<?php if(isset($r31['popup2_time'])){ echo gmdate('i:s',$r31['popup2_time']); }?>
</textarea>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="form-inline form-group">
<div class="form-group">
<label>R1 &nbsp; &nbsp;</label><textarea name='p2r1' class="form-control">
<?php if(isset($r31['popup2_exp1'])){ echo $r31['popup2_exp1']; }?>
</textarea>&nbsp; <input type="radio" name='popup2sel' value='1' <?php if($r31['popup2_ans']==$r31['popup2_exp1']){ echo"checked"; } ?>/> 
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>R2 &nbsp; &nbsp;</label><textarea name='p2r2' class="form-control">
<?php if(isset($r31['popup2_exp2'])){ echo $r31['popup2_exp2']; }?>
</textarea>&nbsp; <input type="radio" name='popup2sel' value='2' <?php if($r31['popup2_ans']==$r31['popup2_exp2']){ echo"checked"; } ?>/>
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>R3 &nbsp; &nbsp;</label><textarea name='p2r3' class="form-control">
<?php if(isset($r31['popup2_exp3'])){ echo $r31['popup2_exp3']; }?>
</textarea>&nbsp; <input type="radio" name='popup2sel' value='3' <?php if($r31['popup2_ans']==$r31['popup2_exp3']){ echo"checked"; } ?>/>
</div>
</div>
<div class="form-inline form-group">
<div class="form-group">
<label>R4 &nbsp; &nbsp;</label><textarea name='p2r4' class="form-control">
<?php if(isset($r31['popup2_exp4'])){ echo $r31['popup2_exp4']; }?>
</textarea>&nbsp; <input type="radio" name='popup2sel' value='4' <?php if($r31['popup2_ans']==$r31['popup2_exp4']){ echo"checked"; } ?>/>
</div>
</div>

</div>
<div class="clearfix"></div>
<hr>
<div class="col-lg-12 form-group text-center">
<button type="submit" name='addpopup2' class="btn btn-primary">Submit</button>
</div>
</div>
</form>
</div>

</div>

<?php	if(isset($_POST['addpopup2'])){
if(isset($_GET['grade'])){
$sel=trim($_POST['popup2sel']);
$question=trim($_POST['q2']);
$op1=trim($_POST['p2op1']);
$op2=trim($_POST['p2op2']);
$op3=trim($_POST['p2op3']);
$op4=trim($_POST['p2op4']);
$r1=trim($_POST['p2r1']);
$r2=trim($_POST['p2r2']);
$r3=trim($_POST['p2r3']);
$r4=trim($_POST['p2r4']);
$pt=trim($_POST['pt2']);

sscanf($pt, "%d:%d:%d", $hours, $minutes, $seconds);
$pt = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;

//$ans=$_POST['p2ans'];
if($sel==1){
	$ans=$r1;
}elseif($sel==2){
	$ans=$r2;
}elseif($sel==3){
	$ans=$r3;
}elseif($sel==4){
	$ans=$r4;
}
$query=mysql_query("update session set popup2_time='$pt', popup2_q='$question', popup2_op1='$op1', popup2_op2='$op2',popup2_op3='$op3', popup2_op4='$op4', popup2_ans='$ans', popup2_exp1='$r1', popup2_exp2='$r2',popup2_exp3='$r3', popup2_exp4='$r4' where `grade_id`='$grade' and `skill_name`='$skill' and `session_name`='$session'");
if($query){
echo "<script>alert('Successfully uploaded');
window.location.href='';
</script>";
}else{
echo "<script>alert('try again')</script>";
}
}else{
echo "<script>alert('Please select Grade , Skill and Session')</script>";
}
}		?>
<!--popup Quiz 2 Modal end here -->
</div>
</div>
</div>
<!--footer section start-->
<?php include_once'inc/footer.php'?>
<!--footer section end-->
</section>


</body>
</html>