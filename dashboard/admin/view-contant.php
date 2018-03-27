<?php
session_start();
//if(!$_SESSION['skill']){ echo "<script>window.location.href='index.php'</script>"; }
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
<div class="col-lg-12"> <h3>View Contant</h3></div>
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
window.location.href = "view-contant.php?grade=" + grade + "&skill=" + skill + "&session=" + session ;
});

});
</script>
<div class="col-lg-3"><button type="submit" class="btn btn-primary" id='addsession'>Search</button></div>
<div class="clearfix form-group"></div>
<?php if(isset($_GET['grade'])) { ?>
<div class="table-responsive">
<table class="table table-bordered">
<tbody>
<tr>
<th>Grade</th>
<th>Skill</th>
<th>Session</th>
<th>Objectives</th>
<th>Concepts Videos</th>
<th>Case Story</th>
<th>Skill seccion</th>
<th>Activity</th>
<th>Assignment </th>
<th>Situational Quiz</th>
<th>Popup Quiz</th>
</tr>

<tr>
<?php
include_once 'inc/constant.php';
$grade=trim($_GET['grade']);
$skill=trim($_GET['skill']);
$session=trim($_GET['session']);

$q32=mysql_query("Select * from session where grade_id='".$grade."' and skill_name='".$skill."'");
$x=0;
while($r32=mysql_fetch_array($q32)){
	$x++;
	if(trim($r32['session_name'])==$session){
		$session_no=$x;
	}
}

?>
<script>
$('#grade').val('<?php echo $grade ?>');
$('#selectskills').html("<option value='<?php echo $skill?>'><?php echo $skill?></option>");
$('#selectsession').html("<option value='<?php echo $session_no?>'><?php echo $session_no?></option>");
</script>
<?php
if(isset($_GET['del'])){
if($_GET['del']=='cv'){
$q6=mysql_query("UPDATE session set concept_video='' where grade_id='$grade' and skill_name='$skill' and session_name='$session'");
echo "<script>window.location.href='view-contant.php?grade=$grade&skill=$skill&session=$session'</script>";
}elseif($_GET['del']=='cs'){
$q6=mysql_query("UPDATE session set case_story='' where grade_id='$grade' and skill_name='$skill' and session_name='$session'");
echo "<script>window.location.href='view-contant.php?grade=$grade&skill=$skill&session=$session'</script>";
}elseif($_GET['del']=='os'){
$q6=mysql_query("UPDATE session set online_session='' where grade_id='$grade' and skill_name='$skill' and session_name='$session'");
echo "<script>window.location.href='view-contant.php?grade=$grade&skill=$skill&session=$session'</script>";
}elseif($_GET['del']=='ac'){
$q6=mysql_query("UPDATE session set activity='' where grade_id='$grade' and skill_name='$skill' and session_name='$session'");
echo "<script>window.location.href='view-contant.php?grade=$grade&skill=$skill&session=$session'</script>";
}
}
$path= "../../video/$grade/$skill/$session_no";
$query=mysql_query("select * from session where grade_id='$grade' and skill_name='$skill' and session_name='$session'");
$row = mysql_fetch_array($query);
?>
<td><?php echo $grade ?></td>
<td><?php echo $skill ?></td>
<td><?php echo $session ?></td>
<td>1.<?php echo $row[4] ?><hr>
2.<?php echo $row[5] ?><hr>
<?php if($row[6]){ echo "3.".$row[6]; }?><br>
<a href="#"  data-toggle="modal" data-target="#objects">View more</a>
</td>

<td>
<video controls src='<?php echo "$path/$row[8]"; ?>' height="100px" width="100px"></video><br>
<a href="#concept-video" data-toggle="modal" data-target="#concept-video">View</a> &nbsp; &nbsp; 
<a onClick="javascript: return confirm('Please confirm deletion')" href="view-contant.php?grade=<?php echo $grade?>&skill=<?php echo $skill?>&session=<?php echo $session?>&del=cv">Delete</a>
</td>
<td>
<video controls src="<?php echo "$path/$row[9]"?>" height="100px" width="100px"></video><br>
<a href="#case-story" data-toggle="modal" data-target="#case-story">View</a> &nbsp; &nbsp; 
<a onClick="javascript: return confirm('Please confirm deletion')" href="view-contant.php?grade=<?php echo $grade?>&skill=<?php echo $skill?>&session=<?php echo $session?>&del=cs">Delete</a>
</td>
<td>
<video controls src="<?php echo "$path/$row[7]"?>" height="100px" width="100px"></video><br>
<a href="#skilling-session" data-toggle="modal" data-target="#skilling-session">View</a> &nbsp; &nbsp; 
<a onClick="javascript: return confirm('Please confirm deletion')" href="view-contant.php?grade=<?php echo $grade?>&skill=<?php echo $skill?>&session=<?php echo $session?>&del=os">Delete</a>
</td>
<td>
<?php if($row[10]){ ?>
<iframe src="<?php echo "$path/activity/"?>" height="100px" width="100px"></iframe><br>
<a href="#activity" data-toggle="modal" data-target="#activity">View</a> &nbsp; &nbsp; 
<a onClick="javascript: return confirm('Please confirm deletion')" href="view-contant.php?grade=<?php echo $grade?>&skill=<?php echo $skill?>&session=<?php echo $session?>&del=ac">Delete</a>
<?php } ?></td>
<td>1.<?php echo $row[13]?><hr>
2.<?php echo $row[14]?><br><br>
<a href="#"  data-toggle="modal" data-target="#assiment">View more</a>
</td>
<td>
<?php 
$q4=mysql_query("select * from skill where grade_id='$grade' and skill_name='$skill'");
$qr4=mysql_fetch_array($q4);
$skill_id=$qr4['skill_id'];

$q5=mysql_query("select * from session where grade_id='$grade' and skill_name='$skill' and session_name='$session'");
$qr5=mysql_fetch_array($q5);
$session_id=$qr5['session_id'];
$query3=mysql_query("select * from `situation bq` where grade_id='".$grade."' and skill_id='".$skill_id."' and session_id='".$session_id."'");
while($row1=mysql_fetch_array($query3)){
echo $row1["question"];
echo "<br/><a href='#' data-toggle='modal' data-target=\"#situational-quiz".$row1[0]."\">View more</a><hr>";

?>

<!--Situational start here -->
<div id="situational-quiz<?php echo $row1[0]?>" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content clearfix">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-center"><strong>Situational Quiz</strong> </h4>
</div>
<div class="modal-body clearfix">
<form action='' method='post'>
<input type="text" name='sbqq' class="form-control" value="<?php echo $row1["question"]; ?>" width='100%' placeholder="Option 1" disabled />
<div class="col-lg-6">
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped">

<thead>
<tr>
<th colspan="8">Option</th>
</tr>

</thead>
<tbody>
<tr>
<td colspan="8"><input type="text" class="form-control" name='op1' value="<?php echo $row1['op1'] ?>" disabled  /></td>
</tr>
<tr>
<td colspan="8"><input type="text" class="form-control" name='op2' value="<?php echo $row1['op2'] ?>" disabled  /></td>
</tr>
<tr>
<td colspan="8"><input type="text" class="form-control" name='op3' value="<?php echo $row1['op3'] ?>" disabled  /></td>
</tr>
<tr>
<td colspan="8"><input type="text" class="form-control" name='op4' value="<?php echo $row1['op4'] ?>" disabled  /></td>
</tr>
<tr>
<td colspan="8">Answer</td>
</tr>
<tr>
<td colspan="8"><input type="text" class="form-control" name='anss' value="<?php echo $row1['ans'] ?>" disabled  /></td>
</tr>
</tbody>
</table>

</div>

</div>
<div class="col-lg-6">
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped">

<thead>
<tr>
<th colspan="8">Response</th>
</tr>

</thead>
<tbody>
<tr>
<td colspan="8"><input type="text" class="form-control" name='r1' value="<?php echo $row1[11] ?>" disabled  /></td>
</tr>
<tr>
<td colspan="8"><input type="text" class="form-control" name='r2' value="<?php echo $row1[12] ?>" disabled  /></td>
</tr>
<tr>
<td colspan="8"><input type="text" class="form-control" name='r3' value="<?php echo $row1[13] ?>" disabled /></td>
</tr>
<tr>
<td colspan="8"><input type="text" class="form-control" name='r4' value="<?php echo $row1[14] ?>" disabled /></td>
<!--<td><p data-placement="top" data-toggle="tooltip" title="Delete">
<button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" >
<span class="glyphicon glyphicon-trash"></span></button></p></td>-->
</tr>
<tr>
<td colspan="8">Description</td>
</tr>

<tr>
<td colspan="8"><input type="text" class="form-control" name='anssdes' value="<?php echo $row1['description'] ?>" disabled  /></td>
</tr>

</tbody>
</table>
</div>
</div>
<div class="col-lg-2 text-center"></div>
<div class="col-lg-2 text-center">
<button data-placement="top" onClick="javascript: return confirm('Please Confirm Deletion')" data-toggle="tooltip" title="Delete" name='delet' value='<?php echo $row1[0]?>' type='submit' class="btn btn-danger">Delete &nbsp; <span class="glyphicon glyphicon-trash"></span></button>
</div>
<div class="col-lg-2 text-center">
<button data-placement="top" data-toggle="tooltip" title="Save" name='savesbq' value="<?php echo $row1[0]?>" type="submit" class="btn btn-success">Save &nbsp; <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
</div>
</form>
<div class='col-lg-2 text-center'>
<button data-placement="top" data-toggle="tooltip" title="Edit" id="edit<?php echo $row1[0]?>" class="btn btn-primary">Edit &nbsp; <span class="glyphicon glyphicon-pencil"></span></button>
</div>
<div class="col-lg-2 text-center"></div>
<script>
$('#edit<?php echo $row1[0]?>').click(function(){
	$('.form-control').attr('disabled',false);
});
</script>
<?php 
if(isset($_POST['savesbq'])){
$q2=mysql_query("update `situation bq` set 
question='".trim($_POST['sbqq'])."',
op1='".trim($_POST['op1'])."', 
op2='".trim($_POST['op2'])."', 
op3='".trim($_POST['op3'])."', 
op4='".trim($_POST['op4'])."',
exp1='".trim($_POST['r1'])."',
exp2='".trim($_POST['r2'])."',
exp3='".trim($_POST['r3'])."', 
exp4='".trim($_POST['r4'])."',
ans='".trim($_POST['anss'])."',
description='".$_POST['anssdes']."' where question_id='".$_POST['savesbq']."' ");
if($q2){echo "<script>
alert('Successfully Updated');
window.location.href=''</script>";
}
}

if(isset($_POST['delet'])){
	$deleteval=$_POST['delet'];
	$q1=mysql_query("delete from `situation bq` where question_id='$deleteval'");
	if($q1){echo "<script>
	alert('Successfully Deleted');
	window.location.href=''</script>";
}}
?>
</div>
</div>
</div>
</div>
<?php } ?>

</td>
<td>1.<?php echo $row['popup1_q']?><br>
<a href="#" data-toggle="modal" data-target="#popupquiz">View more</a><hr>
2.<?php echo $row['popup2_q']?><br>
<a href="#" data-toggle="modal" data-target="#popupquiz2">View more</a><hr>
</td>
</tr>
</tbody>
</table>
<?php } 
 ?>
</div>
</div>
<!-- Concept video popup start here -->
<div id="concept-video" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="mmodal-title text-center">Economics- Concept Video- Concept of Opportunity Cost for Lower grades</h4>
</div>
<div class="modal-body">
<video controls class="video"><source src="<?php echo "$path/$row[8]"?>" type="video/mp4"> </video>
</div>
</div>
</div>
</div>
<!-- Case story popup start here -->
<div id="case-story" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-center">Economics- Case Story- Concept of Trade for Lower grades</h4>
</div>
<div class="modal-body">
<video controls class="video"><source src="<?php echo "$path/$row[9]"?>" type="video/mp4"> </video>
</div>
</div>
</div>
</div>
<!-- Skilling Session popup start here -->
<div id="skilling-session" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-center">Goal Setting- Skilling Session for Upper grades</h4>
</div>
<div class="modal-body">
<!--<iframe id="cartoonVideo" width="560" height="315" src="//www.youtube.com/embed/YE7VzlLtp-4" frameborder="0" allowfullscreen></iframe> -->
<video controls class="video"><source src="<?php echo "$path/$row[7]"?>" type="video/mp4"> </video>

</div>
</div>
</div>
</div>
<!-- activity popup start here-->
<div id="activity" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content clearfix">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-center">Entrepreneurship Skill Activity</h4>
</div>
<div class="modal-body">
<iframe width="100%" height="500px" src="<?php echo "$path"?>/activity/"></iframe>
</div>
</div>
</div>
</div>
<!--activity  popup end here -->
<!-- objects popup start here -->
<div id="objects" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content clearfix">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-center"><strong>Objectives</strong> </h4>
</div>
<div class="modal-body clearfix">
<div class="col-lg-12">
<div class="table-responsive"><form action='' method='post'>
<table id="mytable" class="table table-bordred table-striped">
<thead>
<tr>
<th colspan="8"></th>
</tr>
</thead>
<tbody>
<tr>
<td colspan="8"><input type="text" class="form-control" value="<?php echo $row[4] ?>" disabled /></td>
<td><p data-placement="top" data-toggle="tooltip" title="Delete">
<button class="btn btn-danger btn-xs" onClick="javascript:return confirm('Please Confirm Deletion')" name='obj1' data-title="Delete" data-toggle="modal" data-target="#delete" >
<span class="glyphicon glyphicon-trash"></span></button></p></td>
</tr>
<tr>
<td colspan="8"><input type="text" class="form-control" value="<?php echo $row[5] ?>" disabled /></td>
<td><p data-placement="top" data-toggle="tooltip" title="Delete">
<button class="btn btn-danger btn-xs" onClick="javascript:return confirm('Please Confirm Deletion')" name='obj2' data-title="Delete" data-toggle="modal" data-target="#delete" >
<span class="glyphicon glyphicon-trash"></span></button></p></td>
</tr>
<?php if($row[6]){ ?>
<tr>
<td colspan="8"><input type="text" class="form-control" value="<?php echo $row[6] ?>"placeholder="" disabled /></td>
<td><p data-placement="top" data-toggle="tooltip" title="Delete">
<button class="btn btn-danger btn-xs" onClick="javascript:return confirm('Please Confirm Deletion')" name='obj3' data-title="Delete" data-toggle="modal" data-target="#delete" >
<span class="glyphicon glyphicon-trash"></span></button></p></td>
</tr>
<?php } ?>
</tbody>
</table>
</div></form>
</div>
<!--<div class="col-lg-12 text-center">
<button data-placement="top" data-toggle="tooltip" title="Edit" class="btn btn-primary">Edit &nbsp; <span class="glyphicon glyphicon-pencil"></span></button>
<button data-placement="top" data-toggle="tooltip" title="Save" type="submit" class="btn btn-primary">Save &nbsp; <i class="fa fa-floppy-o" aria-hidden="true"></i>
</button>
</div>-->
<?php
if(isset($_POST['obj1'])){
	$q3=mysql_query("update session set session_des1='' where grade_id='$grade' and session_name='$session' and skill_name='$skill'");
	echo "<script>window.location.href=''</script>";
}
if(isset($_POST['obj2'])){
	$q3=mysql_query("update session set session_des2='' where grade_id='$grade' and session_name='$session' and skill_name='$skill'");
	echo "<script>window.location.href=''</script>";
}
if(isset($_POST['obj3'])){
	$q3=mysql_query("update session set session_des3='' where grade_id='$grade' and session_name='$session' and skill_name='$skill'");
	echo "<script>window.location.href=''</script>";
}
?>
</div>
</div>
</div>
</div>
<!-- Assigment popup start here -->
<div id="assiment" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content clearfix">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-center"><strong>Assignment</strong> </h4>
</div>
<div class="modal-body clearfix">
<div class="col-lg-12">
<div class="table-responsive"><form action='' method='post'>
<table id="mytable" class="table table-bordred table-striped">
<tbody>
<tr>
<td colspan="8"><input type="text" class="form-control" value="<?php echo $row[13] ?>" disabled  /></td>
<td><p data-placement="top" data-toggle="tooltip" title="Delete">
<button class="btn btn-danger btn-xs" onClick="javascript:return confirm('Please Confirm Deletion')" data-title="Delete" data-toggle="modal" name='assign1' data-target="#delete" >
<span class="glyphicon glyphicon-trash"></span></button></p></td>
</tr>
<tr>
<td colspan="8"><input type="text" class="form-control" value="<?php echo $row[14] ?>" disabled  /></td>
<td><p data-placement="top" data-toggle="tooltip" title="Delete">
<button class="btn btn-danger btn-xs" onClick="javascript:return confirm('Please Confirm Deletion')" data-title="Delete" data-toggle="modal" name='assign2' data-target="#delete" >
<span class="glyphicon glyphicon-trash"></span></button></p></td>
</tr>
</tbody>
</table>
</form>
</div>
<?php 
if(isset($_POST['assign1'])){
	$q3=mysql_query("update session set assignment1='' where grade_id='$grade' and session_name='$session' and skill_name='$skill'");
	echo "<script>window.location.href=''</script>";
}
if(isset($_POST['assign2'])){
	$q3=mysql_query("update session set assignment2='' where grade_id='$grade' and session_name='$session' and skill_name='$skill'");
	echo "<script>window.location.href=''</script>";
}
?>
</div>
<!--<div class="col-lg-12 text-center">
<button  data-toggle="tooltip" title="Edit" id='editassign' class="btn btn-primary">Edit &nbsp; <span class="glyphicon glyphicon-pencil"></span></button>
<button data-placement="top" data-toggle="tooltip" title="Save" type="submit" class="btn btn-primary">Save &nbsp; <i class="fa fa-floppy-o" aria-hidden="true"></i>
</button>
</div>-->
<script>
//$('#editassign').click(function(){ $('.form-control').attr('disabled',false); });
</script>
</div>
</div>
</div>
</div>
<?php 
error_reporting(0);
$query3=mysql_query("select * from `situation bq` where grade_id='$grade' and skill_id='$skill_id' and session_id='$session_id'");
$x=1;
$row1=mysql_fetch_array($query3);
?>
<!--popupquiz start here -->
<div id="popupquiz" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content clearfix">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-center"><strong>Popup Quiz</strong> </h4>
</div>
<div class="modal-body clearfix"><form action='' method='post'>
<input type="text" name='pq' class="form-control" value='<?php echo $row['popup1_q'] ?>' width='100%' placeholder="Option 1" disabled />
<div class="col-lg-6">
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped">

<thead>
<tr>
<th colspan="8">Options
</th>
</tr>

</thead>
<tbody>
<tr>
<td colspan="8"><input type="text" name='pop1' class="form-control" value='<?php echo $row['popup1_op1'] ?>' placeholder="Option 1" disabled /></td>
</tr>
<tr>
<td colspan="8"><input type="text" name='pop2' class="form-control" value='<?php echo $row['popup1_op2'] ?>'placeholder="Option 2" disabled /></td>
</tr>
<?php if($row['popup1_op3']) { ?>
<tr>
<td colspan="8"><input type="text" name='pop3' class="form-control" value='<?php echo $row['popup1_op3'] ?>'placeholder="Option 3" disabled /></td>
</tr>
<?php } if($row['popup1_op4']) { ?>
<tr>
<td colspan="8"><input type="text" name='pop4' class="form-control" value='<?php echo $row['popup1_op4'] ?>'placeholder="Option 4" disabled /></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
<div class="col-lg-6">
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped">

<thead>
<tr>
<th colspan="8">Response</th>
</tr>

</thead>
<tbody>
<tr>
<td colspan="8"><input type="text" name='pr1' class="form-control" value='<?php echo $row['popup1_exp1'] ?>'placeholder="Response 1" disabled  /></td>
</tr>
<tr>
<td colspan="8"><input type="text" name='pr2' class="form-control" value='<?php echo $row['popup1_exp2'] ?>'placeholder="Response 2" disabled  /></td>
</tr>
<?php if($row['popup1_exp3']) { ?>
<tr>
<td colspan="8"><input type="text" name='pr3' class="form-control" value='<?php echo $row['popup1_exp3'] ?>'placeholder="Response 2" disabled  /></td>
</tr>
<?php } if($row['popup1_exp4']) { ?>
<tr>
<td colspan="8"><input type="text" name='pr4' class="form-control" value='<?php echo $row['popup1_exp4'] ?>'placeholder="Response 2" disabled  /></td>
</tr>
<?php } ?>
</tbody>
</table>

</div>

</div>
<div class="col-lg-6 text-center">
<button data-placement="top" data-toggle="tooltip" title="Save" type="submit" name='savepop1' class="btn btn-primary">Save &nbsp; <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
</div></form>
<div class="col-lg-6 text-center">
<button data-placement="top" data-toggle="tooltip" title="Edit" id='editpopup1' class="btn btn-primary">Edit &nbsp; <span class="glyphicon glyphicon-pencil"></span></button>
</div>
</div>
<script>
$('#editpopup1').click(function(){
	$('.form-control').attr('disabled',false);
});
</script>
<?php 
if(isset($_POST['savepop1'])){
$q8=mysql_query("update `session` set popup1_q='".$_POST['pq']."',
popup1_op1='".$_POST['pop1']."', 
popup1_op2='".$_POST['pop2']."', 
popup1_op3='".$_POST['pop3']."', 
popup1_op4='".$_POST['pop4']."',
popup1_exp1='".$_POST['pr1']."',
popup1_exp2='".$_POST['pr2']."',
popup1_exp3='".$_POST['pr3']."', 
popup1_exp4='".$_POST['pr4']."' where grade_id='".$grade."' and session_name='".$session."' and skill_name='".$skill."'");
if($q8){echo "<script>
alert('Successfully Updated');
window.location.href=''</script>";
}
}
?>

</div>
</div>
</div>

<!--popupquiz start here -->
<div id="popupquiz2" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content clearfix">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-center"><strong>Popup Quiz</strong> </h4>
</div>
<div class="modal-body clearfix"><form action='' method='post'>
<input type="text" name='p2q' class="form-control" value='<?php echo $row['popup2_q'] ?>' width='100%' placeholder="Option 1" disabled />
<div class="col-lg-6">
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped">

<thead>
<tr>
<th colspan="8">Option</th></tr>

</thead>
<tbody>
<tr>
<td colspan="8"><input type="text" name='p2op1' class="form-control" value='<?php echo $row['popup2_op1'] ?>' placeholder="Option 1" disabled /></td>
</tr>
<tr>
<td colspan="8"><input type="text" name='p2op2' class="form-control" value='<?php echo $row['popup2_op2'] ?>'placeholder="Option 2" disabled /></td>
</tr>
<?php if($row['popup2_op3']) { ?>
<tr>
<td colspan="8"><input type="text" name='p2op3' class="form-control" value='<?php echo $row['popup2_op3'] ?>'placeholder="Option 3" disabled /></td>
</tr>
<?php } if($row['popup2_op4']) { ?>
<tr>
<td colspan="8"><input type="text" name='p2op4' class="form-control" value='<?php echo $row['popup2_op4'] ?>'placeholder="Option 4" disabled /></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
<div class="col-lg-6">
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped">

<thead>
<tr>
<th colspan="8">Response</th>
</tr>

</thead>
<tbody>
<tr>
<td colspan="8"><input type="text" name='p2r1' class="form-control" value='<?php echo $row['popup2_exp1'] ?>'placeholder="Response 1" disabled  /></td>
</tr>
<tr>
<td colspan="8"><input type="text" name='p2r2' class="form-control" value='<?php echo $row['popup2_exp2'] ?>'placeholder="Response 2" disabled  /></td>
</tr>
<?php if($row['popup2_exp3']) { ?>
<tr>
<td colspan="8"><input type="text" name='p2r3' class="form-control" value='<?php echo $row['popup2_exp3'] ?>'placeholder="Response 2" disabled  /></td>
</tr>
<?php } if($row['popup2_exp4']) { ?>
<tr>
<td colspan="8"><input type="text" name='p2r4' class="form-control" value='<?php echo $row['popup2_exp4'] ?>'placeholder="Response 2" disabled  /></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
<div class='col-lg-6 text-center'>
<button data-placement="top" data-toggle="tooltip" title="Save" type="submit" name='savepop2' class="btn btn-primary">Save &nbsp; <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
</div>
</form>
<div class="col-lg-6 text-center">
<button id='editpopup2' data-placement="top" data-toggle="tooltip" title="Edit" class="btn btn-primary">Edit &nbsp; <span class="glyphicon glyphicon-pencil"></span></button>
</div>

</div>
</div>
<script>
$('#editpopup2').click(function(){
	$('.form-control').attr('disabled',false);
});
</script>
<?php 
if(isset($_POST['savepop2'])){
$q8=mysql_query("update `session` set popup2_q='".$_POST['p2q']."',
popup2_op1='".$_POST['p2op1']."', 
popup2_op2='".$_POST['p2op2']."', 
popup2_op3='".$_POST['p2op3']."', 
popup2_op4='".$_POST['p2op4']."',
popup2_exp1='".$_POST['p2r1']."',
popup2_exp2='".$_POST['p2r2']."',
popup2_exp3='".$_POST['p2r3']."', 
popup2_exp4='".$_POST['p2r4']."' where grade_id='".$grade."' and session_name='".$session."' and skill_name='".$skill."'");
if($q8){echo "<script>
alert('Successfully Updated');
window.location.href=''</script>";
}
}
?>
</div>
</div>

</div>
</div>
<!--footer section start-->
<?php include_once'inc/footer.php'?>
<!--footer section end-->
</section>

<script>
$(document).ready(function(){
$("[data-toggle=tooltip]").tooltip();
});

</script>
</body>
</html>