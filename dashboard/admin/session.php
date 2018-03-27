<?php
session_start();
//if(!$_SESSION['skill']){ echo "<script>window.location.href='index.php'</script>"; }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Create Session</title>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body class="sticky-header left-side-collapsed"  onload="initMap()">
<section>
<?php include_once'inc/header.php'?>


<!-- main content start-->
<div class="main-content main-content2 main-content2copy">

<div id="page-wrapper">
<div class="main-box">
<div class="col-lg-12"> <h3>Add New Skill/Session</h3></div>
<div class="clearfix"></div>
<hr>
<div class='row'>
<form method='post'>
<div class="col-lg-4"></div>
<div class="col-lg-2">
<select class="form-control" id="grade" name="grade" required>
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
<div class='col-lg-6'><button type="submit" class="btn btn-primary" name="addgrade">Select Grade</button>
</div>
</form>
</div>
<br><br>
<script>/*
$(document).ready(function(){
$('#grade').change(function(){
var grade= $('#grade').val();
$.post('ajax/grade.php',{grade:grade},function(data){
$('tbody').html(data);
});

});
});*/
</script>
<?php
include_once 'inc/constant.php';
if(isset($_POST['addgrade'])){
echo $grade=$_POST['grade'];
echo "<script>window.location.href = 'session.php?grade=".$grade."'</script>";
}
if(isset($_POST['addnew'])){
if(isset($_GET['grade'])){
$grade=$_GET['grade'];
$session=$_POST['newsession'];
$skill=$_POST['newskill'];
$query=mysql_query("Select * from skill where skill_name='$skill' and grade_id='$grade'");
if(mysql_num_rows($query) > 0){
$query2=mysql_query("Select * from session where session_name='$session' and skill_name='$skill' and grade_id='$grade'");
if(mysql_num_rows($query2) > 0){
echo "<script>alert('Session Name already exists')</script>";
}else{
$query1=mysql_query("Insert into session (session_name,grade_id,skill_name) values('$session','$grade','$skill') ");
}
}else{
$query1=mysql_query("Insert into skill (`skill_name`,`grade_id`) values('$skill','$grade')");
$query1=mysql_query("Insert into session (session_name,skill_name,grade_id) values('$session','$skill','$grade') ");
}
}else{
echo "<script>alert('please Select Grade')</script>";
}
}
?>
<!--       <div class="col-lg-3 form-group">
<div class="input-group number-spinner">
<span class="input-group-btn data-dwn">
<button class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
</span>
<input type="text" class="form-control text-center" value="1" min="0" max="10">
<span class="input-group-btn data-up">
<button class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
</span>
</div>
<small>Remove Session /Add Session </small>
</div>

-->

<div class="clearfix"></div>

<div class="table-responsive">
<table class="table table-bordered">
<tbody>

<?php
include_once '../inc/constant.php';
if(isset($_GET['grade'])){
$grade=$_GET['grade'];
?>
<script>
$('#grade').val('<?php echo $grade?>');
</script>
<?php
echo "<tr>
<th align='center' colspan='7'><h2>Grade ".$grade."</h2></th>
</tr>
<tr>
<th width='7%'>S No.</th>
<th width='7%'>Skill No. Sequence </th>
<th width='24%'>Skill Name</th>
<th width='4%'>Skill Delete</th>
<th width='4%'>Session No</th>
<th width='11%'>Session Name</th>
<th width='4%'>Session Delete</th>
</tr>";

$x=1;
$query=mysql_query("Select * from skill where grade_id = '$grade'");
while($row3=mysql_fetch_array($query)){
$skill = $row3['skill_name'];
$skill_no=$row3['skill_id'];
if($skill!=$sk){
$query2=mysql_query("Select * from session where grade_id = '$grade' and skill_name='$skill'");
$session_no=mysql_fetch_array($query2);
$y=1;
echo "<tr>
<th width='7%'>".$x++."</th>
<th width='7%'>" ;?><form action='' method='post'><input type='text' maxlength="4" size="4" name='nwseq' value="<?php echo $row3['skill_no'] ?>">

<button type='submit' name='subseq' value='<?php echo $skill ?>' class='btn btn-info btn-sm'>Submit</button></form><?php echo"</th>
<th width='24%'>".$skill."</th>
<th width='4%'><form action='' method='post'>
<button onClick=\"javascript: var key = prompt('Enter key'); if(key==123){return true;}else{ return false;}\" class='btn btn-danger' type='submit' name='deletesk' value='".$skill_no."'>Delete</button></form></th>
<th width='4%'>".$y++."</th>
<th width='11%'>".$session_no['session_name']."</th>
<th width='4%'><form action='' method='post'><button onClick=\"javascript: var key = prompt('Enter key'); if(key==123){return true;}else{ return false;}\" class='btn btn-danger' type='submit' name='delete' value='".$session_no['session_id']."'>Delete</button></form></th>
</tr>
";
while($session_no=mysql_fetch_array($query2)){
echo"
<tr>
<th width='4%'></th>
<th width='4%'></th>
<th width='4%'></th>
<th width='4%'></th>
<th width='4%'>".$y++."</th>
<th width='11%'>".$session_no['session_name']."</th>
<th width='4%'><form action='' method='post'><button onClick=\"javascript: var key = prompt('Enter key'); if(key==123){return true;}else{ return false;}\" class='btn btn-danger' type='submit' name='delete' value='".$session_no['session_id']."'>Delete</button></form></th>
</tr>"; } echo "</tr>";
$sk=$skill;
}
}

if(isset($_POST['subseq'])){
$ski=trim($_POST['subseq']);
$seq=trim($_POST['nwseq']);
$q3 = mysql_query("update skill set skill_no='$seq' where skill_name='$ski' and grade_id='$grade'");
if(mysql_affected_rows()>=1){
echo "<script>alert('done')</script>";
echo "<script>window.location.href=''</script>";
}else{
echo "<script>alert('sorry')</script>";
}

}
?>
</tbody>
</table>
<form method="post">
<div class="col-lg-2">Enter Skill Name</div>
<div class="col-lg-2"><input type="text" name='newskill' required></div>
<div class="col-lg-2">Enter Session Name</div>
<div class="col-lg-3"><input type="text" name='newsession' required>
<button type="submit" class="btn btn-primary" name="addnew">Submit</button></div>

</form>
<?php }
?>

</div><!-- /.table-responsive -->
<?php
if(isset($_POST['delete'])){
$id=$_POST['delete'];
$q=mysql_query("delete from session where session_id='$id'");
//$q=mysql_query("delete from skill where skill_name='$id'");
echo "<script>window.location.href= ''</script>";
if($q){
	echo "Deleted";
}
}

if(isset($_POST['deletesk'])){
$id=$_POST['deletesk'];
$q=mysql_query("delete from skill where skill_id='$id'");
echo "<script>window.location.href= ''</script>";
if($q){
	echo "Deleted";
}
}
?>
</div>
</div>
<!--footer section start-->
<?php include_once'inc/footer.php'?>

<!--footer section end-->
</section>

<script>
$(function() {
var action;
$(".number-spinner button").mousedown(function () {
btn = $(this);
input = btn.closest('.number-spinner').find('input');
btn.closest('.number-spinner').find('button').prop("disabled", false);

if (btn.attr('data-dir') == 'up') {
action = setInterval(function(){
if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
input.val(parseInt(input.val())+1);
}else{
btn.prop("disabled", true);
clearInterval(action);
}
}, 50);
} else {
action = setInterval(function(){
if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
input.val(parseInt(input.val())-1);
}else{
btn.prop("disabled", true);
clearInterval(action);
}
}, 50);
}
}).mouseup(function(){
clearInterval(action);
});
});
</script>
</body>
</html>