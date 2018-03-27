<?php
session_start();
if(isset($_SESSION['student'])){
$name= $_SESSION['student'];
$name=$_GET['id'];	
$skill=$_GET['skill'];
} else{ echo "<script>window.location.href = '../index2.php' </script>"; }

$skill=$_GET['skill'];
$session=$_GET['session'];
include_once 'admin/inc/constant.php';
$query=mysql_query("select * from studentt where user_name ='$name'");
$row=mysql_fetch_array($query);
$name1=$row[1];
$grade=$row[3];


$query12=mysql_query("select * from `session` where `session_name`='$session' and `skill_name`='$skill' and `grade_id`='$grade'");
$row12=mysql_fetch_array($query12);

$query14=mysql_query("select * from `session` where `skill_name`='$skill' and `grade_id`='$grade'");
$ses_no=1;
while($row14=mysql_fetch_array($query14))
{
if($row12[3]==$row14[3]){
$sess_no=$ses_no;
}
$ses_no++;
}
$q12=mysql_query("select * from ".$name." where session_name='$session' and skill_name='$skill'");
if($q12){
$r12=mysql_num_rows($q12);
if($r12==0){
$q13=mysql_query("Insert into ".$name." (skill_name,session_name) values('$skill','$session')");
$q13=mysql_query("update ".$name." set progress=progress+1");
}
}else{
$q13=mysql_query("Insert into ".$name." (skill_name,session_name) values('$skill','$session')");
$q13=mysql_query("update ".$name." set progress=progress+1");
}
$path= "../video/$grade/$skill/$sess_no";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="dashboard/images/logo-icon.png" type="image/gif" sizes="16x16">
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
<?php include'inc/left-panel1.php'?>
</div>

<!-- top navigation -->
<div class="top_nav">
<?php include'inc/top-nav1.php'?>
</div>
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
<!-- top tiles -->
<div class="row tile_count">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="counthead"><?php echo $row12[3]?> </div>
</div>
</div>
<!-- /top tiles -->

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph clearfix">
<div class="col-md-12">
<h3 class="sub-head">Session <?php echo $sess_no;?> : <span><?php echo $row12[3]?></span>
<!--<a href="#" class="pull-right next-line">Next Session  <i class="fa fa-angle-right"></i></a>--></h3>
</div>
<br>
<div class="col-md-12">
<h4 class="bor-bot"><span>Learning Objectives :</span></h4>
<p class="normal-text"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> <?php echo $row12[4]?></span></p>
<p class="normal-text form-group"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> <?php echo $row12[5]?></span></p>
<?php if($row12[6]) { ?>
<p class="normal-text form-group"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> <?php echo $row12[6]?></span></p>
<?php } ?>
</div>
<br>
</div>
</div>

</div>
<div class="row">
<div class="col-md-12">
<div class="counthead">Learning Resources</div>
<div class="x_panel">

<div class="x_content">

<div class="row">
<div class="col-md-4">
<div class="thumbnail">
<a href="#skilling-session" id='skill-session' data-toggle="modal" title="Skilling Session">
<div class="image view view-first">
<img  src="images/skilling-session.jpg" class="img-responsive" alt="Skilling Session">
<div class="mask">
<p>Skilling Session</p>
<div class="tools tools-bottom">
<span><i class="fa fa-play viplay"></i></span>
</div>
</div>
</div>
</a>
<!--<div class="caption">
<ul class="list-share">
<li><a href="#"><i class="fa fa-facebook"></i> Share</a></li>
<li><a href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
<li><a href="#"><i class="fa fa-envelope"></i> Email</a></li>
</ul>
</div> -->
</div>
</div>
<div class="col-md-4">
<div class="thumbnail">
<a href="#case-story" data-toggle="modal" title="Case Story">
<div class="image view view-first">
<img  src="images/case-story.jpg" class="img-responsive" alt="Case Story">
<div class="mask">
<p>Case Story</p>
<div class="tools tools-bottom">
<span><i class="fa fa-play viplay"></i></span>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-md-4">
<div class="thumbnail">
<a href="#concept-video" data-toggle="modal" title="Concept Video">
<div class="image view view-first">
<img  src="images/concepts.jpg" class="img-responsive" alt="Concept Video">
<div class="mask">
<p>Concept Video</p>
<div class="tools tools-bottom">
<span><i class="fa fa-play viplay"></i></span>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-md-4">
<div class="thumbnail">
<a href="#activity" data-toggle="modal" id='menu_activity' title="Skill Game">
<div class="image view view-first">
<img  src="images/activity.jpg" class="img-responsive" alt="Skill Game">
<div class="mask">
<p>Skill Game</p>
<div class="tools tools-bottom">
<span><i class="fa fa-gamepad viplay"></i></span>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-md-4">
<div class="thumbnail">
<a href="#situstional" data-toggle="modal" id='sit_goto_assign' title="Situational skill simulation">
<div class="image view view-first">
<img  src="images/smulation.jpg" class="img-responsive" alt="Situational skill simulation">
<div class="mask">
<p>Situational skill simulation </p>
<div class="tools tools-bottom">
<span><i class="fa fa-mars viplay"></i></span>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-md-4">
<div class="thumbnail">
<a href="real-world.php?id=<?php echo $name?>&skill=<?php echo $skill;?>&session=<?php echo $session?>" title="Real world skill practice">
<div class="image view view-first">
<img  src="images/realworld.jpg" class="img-responsive" alt="Real world skill practice">
<div class="mask">
<p>Real world skill practice </p>
<div class="tools tools-bottom">
<span><i class="fa fa-mars viplay"></i></span>
</div>
</div>
</div>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- /page content -->

<!-- Skilling Session popup start here -->
<div id="skilling-session" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4><?php echo $skill?> - Skilling Session - <?php echo $session?></h4>
</div>
<div class="modal-body">
<video id='myvideo' preload ='auto' controls><source src='<?php echo"$path/$row12[7]"?>' type="video/mp4"> </video>
<audio controls id='myaudio' class='hidden'>  <source src="click.mp3" type="audio/mpeg"></audio>
</div>
</div>
</div>
</div>
<?php if($row12[7]){ ?>
<script>
var vid = document.getElementById('myvideo');
var aud = document.getElementById('myaudio');

$(document).ready(tim());
function tim(){
var popup1_f =<?php echo $row12['popup1_time']?> ;
var popup1_t = popup1_f + 1 ;
var popup2_f =<?php echo $row12['popup2_time']?> ;
var popup2_t = popup2_f + 1 ;
var activity_f =<?php echo $row12['activity_time']?> ;
var activity_t = activity_f + 1;
setInterval(function(){
var x = vid.currentTime;
var t = vid.duration;
if(x >= popup1_f && x<= popup1_t){
//aud.play();
vid.pause();
$('.overlay').show();
$('#modal_d2').show();
$('#modal_d2').animate({top:'10%'},500);
//aud.muted=true;
// Initialize Variables
$('.contt').click(function(){
$('.galat-btn').hide();
$('.sahi').hide();
$('#popup1cont').show();
vid.currentTime=x+1;
$('#modal_d2').hide(500);
$('.overlay').hide();
vid.play();
var session='<?php echo $row12[3];?>';
var name='<?php echo $name;?>';
var per = 'popup1';
$.post("ajax/assignment.php", {per: per,session:session,name:name});
});
}
/* --------------------POPUP-2---------------------------- */
if(x >= popup2_f && x<= popup2_t){

vid.pause();
$('.overlay').show();
$('#modal_d1').show();
$('#modal_d1').animate({top:'10%'},500);
// Initialize Variables
$('.cont').click(function(){
$('.galat-btn').hide();
$('.sahi').hide();
$('#popup2cont').show();
vid.currentTime=x+1;
$('.overlay').hide();
$('#modal_d1').hide(500);
vid.play();
// Initialize Variables
var session='<?php echo $row12[3];?>';
var name='<?php echo $name;?>';
var per = 'popup2';
$.post("ajax/assignment.php", {per: per,session:session,name:name});
});
}
else if(x >= t){
// Initialize Variables
$("#skilling-session").removeClass('in').hide();
$("#skilling-session").removeClass('modal').hide();
$("#skilling-session").removeClass('fade').hide();
$("#situstional").addClass('in').show();
$("#situstional").addClass('fade').show();
$("#situstional").addClass('modal').show();
$("#situstional").css('display','block');
$("#situstional").css('opacity','1');
}
/*--------------------Activity---------------------*/
else
if(activity_f != 0) {
if ((x >= activity_f) && (x <= activity_t)){
vid.pause();
$("#activity1").addClass('modal').show();
$("#activity1").addClass('fade').show();
$("#activity1").addClass('in').show();
$('#modal_d31').show();
$('#modal_d31').animate({top:'5%'},500);
// Initialize Variables
$('.cont12').click(function(){
vid.currentTime=x+1;
$('.overlay1').hide();
$('#modal_d3').hide(500);
vid.play();
var session='<?php echo $row12[3];?>';
var name='<?php echo $name;?>';
var per = 'activity';
$.post("ajax/assignment.php", {per: per,session:session,name:name});
});
}
}
/*--------------------END-Activity---------------------*/
/*--------------------Situation-Based-Question---------------------*/
} ,1000);
}
</script>
<?php } ?>
<!-- Skilling Session popup end here -->
<!-- Case story popup start here -->
<div id="case-story" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4><?php echo $skill?>- Case Story - <?php echo $session?></h4>
</div>
<div class="modal-body">
<video id='myvideo1' controls height=80%><source src="<?php echo "$path/$row12[9]"?>" type="video/mp4"> </video>
</div>
</div>
</div>
</div>
<!-- Skilling Session popup end here -->
<!-- Concept video popup start here -->
<div id="concept-video" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4><?php echo $skill?>- Concept Video - <?php echo $session?></h4>
</div>
<div class="modal-body">
<video id='myvideo2' controls><source src="<?php echo "$path/$row12[8]"?>" type="video/mp4"> </video>
</div>
</div>
</div>
</div>
<!-- Concept video popup end here -->
<!-- Skill Game popup start here-->
<div id="activity" class="modal fade">
<div class="modal-dialog modal-lg" id='modal_d3'>
<div class="modal-content clearfix">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4><?php echo $skill." - ".$session?> - Skill Activity</h4>
</div>
<div class="modal-body">
<?php if($row12[10]){ ?>
<iframe style="width:100%;height:500px;" src='<?php echo "$path/"?>activity/'></iframe>
<?php }else { ?>
<iframe style="width:100%;height:500px;" src='<?php echo "$path/"?>activity/inx.html'></iframe>
<?php } ?>
</div>
</div>
</div>
</div>
<!--Skill Game popup end here -->

<!-- Skill Game popup in video start here-->
<div id="activity1" class="overlay1">
<div class="modal-dialog modal-lg" id='modal_d31'>
<div class="modal-content clearfix">
<div class="modal-body">
<?php if($row12[10]){ ?>
<iframe style="width:100%;height:500px;" src='<?php echo "$path/"?>activity/'></iframe>
<?php }else { ?>
<iframe style="width:100%;height:500px;" src='<?php echo "$path/"?>activity/inx.html'></iframe>
<?php } ?>
<button class='btn btn-primary cont12' style='float:right;background:blue;'>CONTINUE</button>
</div>
</div>
</div>
</div>
<!--Skill Game popup in video end here -->

<!-- Situational skill simulation popup start here-->
<?php
$query=mysql_query("select * from `situation bq` where grade_id='$grade' limit 1");
$rowsbq=mysql_fetch_array($query);
?>
<div id="situstional" class="modal fade">
<div class="modal-dialog" id='modal_d'>
<div class="modal-content clearfix">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4>Situation Based Questions : <?php echo $session?></h4>
</div>
<div id="nextsituation" class="carousel slide" data-ride='carousel'>
<div class='carousel-inner'>
<div class='item active'>
<div class="panel-body clearfix">
<h4 class="ques-head"><?php echo $rowsbq[4];?></h4>

<table class="table">
<tbody>
<tr>
<td><input type="radio" value="<?php echo trim($rowsbq[5]);?>" name="question1" id="monthlay"  class=" ques" /></td><td>
<label for="monthlay" class="css-label"><?php echo $rowsbq[5];?></label></td>
<td><i class="fa fa-times wrong-ans text-danger" id='wr11' aria-hidden="true"></i>
<i class="fa fa-check right-ans text-success" id='rt1' aria-hidden="true"></i></td>
<tr >
<td><input type="radio" value="<?php echo trim($rowsbq[6]);?>" name="question1" id="annual" class=" ques"></td><td>
<label for="annual" class="css-label"><?php echo $rowsbq[6];?></label></td>
<td><i class="fa fa-times wrong-ans text-danger" id='wr2' aria-hidden="true"></i>
<i class="fa fa-check right-ans text-success" id='rt2' aria-hidden="true"></i></td>
</tr>
<?php if($rowsbq[7]){?>
<tr>
<td><input type="radio" value="<?php echo trim($rowsbq[7]);?>" name="question1" id="annual1" class=" ques"></td><td>
<label for="annual1" class="css-label"><?php echo $rowsbq[7];?></label></td>
<td><i class="fa fa-times wrong-ans text-danger" id='wr3' aria-hidden="true"></i>
<i class="fa fa-check right-ans text-success" id='rt3' aria-hidden="true"></i></td>
</tr>
<?php } if($rowsbq[8]){?>
<tr>
<td><input type="radio" value="<?php echo trim($rowsbq[8]);?>" name="question1" id="annual2" class=" ques"></td><td>
<label for="annual2" class="css-label"><?php echo $rowsbq[8];?></label></td>
<td><i class="fa fa-times wrong-ans text-danger" id='wr4' aria-hidden="true"></i>
<i class="fa fa-check right-ans text-success" id='rt4' aria-hidden="true"></i></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="text-center">
<button type='submit' value='<?php echo $rowsbq[0]?>' name='check' id='check' class="btn popup-btn check">Check</button>
</div>
<div class="col-lg-12">
<!--right answer messages box here -->
<div class="right-mesg alert-success fade">
<!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
<strong>Explanation :</strong> <span id='rghtdes'></span>
</div>
</div> </div>
<script>
$(document).ready(function(){
$('#check').click(function(){
var selected = $("input:radio[name='question1']:checked").val();
var id=$('#check').val();
var id=$.trim(id);
var name="<?php echo $name?>";
var session="<?php echo $session?>";
$.post('ajax/situation.php',{id:id,session:session,name:name,selected:selected},function(data){
if(data=="<?php echo trim($rowsbq[10]) ?>"){
if(selected=="<?php echo trim($rowsbq[5]) ?>") {
$('.fa-times').hide();
$('.fa-check').hide();
$('#rt1').show();
} else if(selected=="<?php echo trim($rowsbq[6]) ?>"){
$('.fa-times').hide();
$('.fa-check').hide();
$('#rt2').show();
} else if(selected=="<?php echo trim($rowsbq[7]) ?>"){
$('.fa-times').hide();
$('.fa-check').hide();
$('#rt3').show();
} else if(selected=="<?php echo trim($rowsbq[8]) ?>"){
$('.fa-times').hide();
$('.fa-check').hide();
$('#rt4').show();
}
$("#check").hide();
$('#next').show();
$(".right-mesg").removeClass("in").show();
$(".right-mesg").delay(200).addClass("in")//.fadeOut(2000);
$(".alert").removeClass("in").hide();
$('.right-mesg').css('background','#02b22c');
$('#rghtdes').html(data);
}else{
if(selected=="<?php echo trim($rowsbq[5]) ?>"){
$('.fa-times').hide();
$('.fa-check').hide();
$('#wr11').show();
} else if(selected=="<?php echo trim($rowsbq[6]) ?>"){
$('.fa-times').hide();
$('.fa-check').hide();
$('#wr2').show();
} else if(selected=="<?php echo trim($rowsbq[7]) ?>"){
$('.fa-times').hide();
$('.fa-check').hide();
$('#wr3').show();
} else if(selected=="<?php echo trim($rowsbq[8]) ?>"){
$('.fa-times').hide();
$('.fa-check').hide();
$('#wr4').show();
}
$('#rghtdes').html(data);
$(".right-mesg").removeClass("in").show();
$(".right-mesg").delay(200).addClass("in");//.fadeOut(2000);
$('.right-mesg').css('background','#E74C3C');
$(".alert").removeClass("in").hide();
}
});
});
});
</script>
<?php
$fr=1;
$to=10;
$query=mysql_query("select * from `situation bq` where grade_id='$grade' limit $fr,$to");

$q=mysql_query("select * from `situation_no` where `stu_id`='$name' and session='$session'");
$rr= mysql_num_rows($q);
if($rr == 0){
$q=mysql_query("insert into situation_no (`stu_id`,session) values('$name','$session')");
}else{
$q=mysql_query("update situation_no set attempt=0 where stu_id='$name' and session='$session' ");	
}
while($rowsbq=mysql_fetch_array($query)){
?>
<div class='item'>
<div class="panel-body clearfix">
<h4 class="ques-head"><?php echo $rowsbq[4];?></h4>

<table class="table">
<tbody>
<tr>
<td><input type="radio" value="<?php echo trim($rowsbq[5]);?>" name="question<?php echo $rowsbq[0]?>" class=" ques"/></td><td>
<label for="monthlay" class="css-label"><?php echo $rowsbq[5];?></label></td>
<td><i class="fa fa-times wrong-ans text-danger" id='wr11<?php echo $rowsbq[0];?>' aria-hidden="true"></i>
<i class="fa fa-check right-ans text-success" id='rt1<?php echo $rowsbq[0];?>' aria-hidden="true"></i></td>
<tr >
<td><input type="radio" value="<?php echo trim($rowsbq[6]);?>" name="question<?php echo $rowsbq[0]?>" class=" ques"></td><td>
<label for="annual" class="css-label"><?php echo $rowsbq[6];?></label></td>
<td><i class="fa fa-times wrong-ans text-danger" id='wr2<?php echo $rowsbq[0];?>' aria-hidden="true"></i>
<i class="fa fa-check right-ans text-success" id='rt2<?php echo $rowsbq[0];?>' aria-hidden="true"></i></td>
</tr>
<?php if($rowsbq[7]){?>
<tr>
<td><input type="radio" value="<?php echo trim($rowsbq[7]);?>" name="question<?php echo $rowsbq[0]?>" class=" ques"></td><td>
<label for="annual1" class="css-label"><?php echo $rowsbq[7];?></label></td>
<td><i class="fa fa-times wrong-ans text-danger" id='wr3<?php echo $rowsbq[0];?>' aria-hidden="true"></i>
<i class="fa fa-check right-ans text-success" id='rt3<?php echo $rowsbq[0];?>' aria-hidden="true"></i></td>
</tr>
<?php } if($rowsbq[8]){?>
<tr>
<td><input type="radio" value="<?php echo trim($rowsbq[8]);?>" name="question<?php echo $rowsbq[0]?>" class=" ques"></td><td>
<label for="annual2" class="css-label"><?php echo $rowsbq[8];?></label></td>
<td><i class="fa fa-times wrong-ans text-danger" id='wr4<?php echo $rowsbq[0];?>' aria-hidden="true"></i>
<i class="fa fa-check right-ans text-success" id='rt4<?php echo $rowsbq[0];?>' aria-hidden="true"></i></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="text-center">
<button type='submit' value='<?php echo $rowsbq[0]?>' name='check' id='check<?php echo $rowsbq[0]?>' class="btn popup-btn check">Check</button>

</div>

<div class="col-lg-12">
<!--right answer messages box here -->
<div class="right-mesg alert-success fade">
<strong>Explanation :</strong> <span id='rghtdes<?php echo $rowsbq[0];?>'></span>
</div>
</div>
</div>
<script>
$(document).ready(function(){
$("#check<?php echo $rowsbq[0]?>").click(function(){
var selected = $("input:radio[name=\"question<?php echo $rowsbq[0]?>\"]:checked").val();
var id=$("#check<?php echo $rowsbq[0]?>").val(); 
var id=$.trim(id);
var name='<?php echo $name?>';
var session='<?php echo $session ?>';
$.post('ajax/situation.php',{id:id,session:session,name:name,selected:selected},function(data){
if(data=="<?php echo trim($rowsbq[10]) ?>"){
if(selected=="<?php echo trim($rowsbq[5]) ?>") {
$('.fa-times').hide();
$('.fa-check').hide();
$('#rt1<?php echo $rowsbq[0];?>').show();
} else if(selected=="<?php echo trim($rowsbq[6]) ?>"){
$('.fa-times').hide();
$('.fa-check').hide();
$('#rt2<?php echo $rowsbq[0];?>').show();
} else if(selected=="<?php echo trim($rowsbq[7]) ?>"){
$('.fa-times').hide();
$('.fa-check').hide();
$('#rt3<?php echo $rowsbq[0];?>').show();
} else if(selected=="<?php echo trim($rowsbq[8]) ?>"){
$('.fa-times').hide();
$('.fa-check').hide();
$('#rt4<?php echo $rowsbq[0];?>').show();
}
$(".check").hide();
$('#next').show();
$(".right-mesg").removeClass("in").show();
$(".right-mesg").delay(200).addClass("in")//.fadeOut(2000);
$(".alert").removeClass("in").hide();
$('.right-mesg').css('background','#02b22c');
$('#rghtdes<?php echo $rowsbq[0];?>').html(data);
}else{
if(selected=="<?php echo trim($rowsbq[5]) ?>"){
$('.fa-times').hide();
$('.fa-check').hide();
$('#wr11<?php echo $rowsbq[0];?>').show();
} else if(selected=="<?php echo trim($rowsbq[6]) ?>"){
$('.fa-times').hide();
$('.fa-check').hide();
$('#wr2<?php echo $rowsbq[0];?>').show();
} else if(selected=="<?php echo trim($rowsbq[7]) ?>"){
$('.fa-times').hide();
$('.fa-check').hide();
$('#wr3<?php echo $rowsbq[0];?>').show();
} else if(selected=="<?php echo trim($rowsbq[8]) ?>"){
$('.fa-times').hide();
$('.fa-check').hide();
$('#wr4<?php echo $rowsbq[0];?>').show();
}
$('#rghtdes<?php echo $rowsbq[0];?>').html(data);
$(".right-mesg").removeClass("in").show();
$(".right-mesg").delay(200).addClass("in");//.fadeOut(2000);
$('.right-mesg').css('background','#E74C3C');
$(".alert").removeClass("in").hide();
}
});
});
});
</script>
<?php } ?>
<!---->
<div class='item' id='gto_assign'>
<div class="panel-body clearfix" style='text-align:center;'>
<h4 class="ques-head">Score</h4>
<p class='text-center' id='updatescore'></p>
<button id='sub-assignment' class='btn btn-primary'>Go To Real World Assignments</button>
<script>
$('#sub-assignment').click(function(){
var session='<?php echo $row12[3];?>';
var name='<?php echo $name;?>';
var per = 'sbq';
$.post("ajax/assignment.php", {per: per,session:session,name:name});
window.location.href="real-world.php?id=<?php echo $name?>&skill=<?php echo $skill;?>&session=<?php echo $session?>";
});
</script>
</div>
</div>
<!---->
</div>
<a id='next' role="button" href="#nextsituation" class="btn popup-btn month-right" data-slide="next">NEXT SITUATION</a>
<!--<a class="" href="#nextsituation" data-slide="next" role="button"><i class="fa fa-chevron-right"></i></a>
<a class="" href="#nextsituation" data-slide="prev" role="button"><i class="fa fa-chevron-left"></i></a>-->
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
	$('#next').click(function(){
		var name='<?php echo $name?>';
		var session='<?php echo $session ?>';
		var grade='<?php echo $grade?>';
		$.post("ajax/updatescore.php",{grade:grade,name:name,session:session},function(data){
			$('#updatescore').html(data);
		});
	});
});
</script>
<!--Skill Game popup end here -->
<!--on video play show popup here -->
<div class='overlay'></div>
<div class="modal-dialog" id="modal_d2">
<div class="modal-content">
<div class="modal-header">
<!--<button type="button" class="close color" data-dismiss="modal" aria-hidden="true">&times;</button> -->
<h4 class="ques-head"><?php echo $row12['popup1_q'];?></h4>
</div>
<div class="panel-body clearfix">
<div class="col-lg-12">

</div>
<div class="col-lg-9">
<table class="table">
<tbody>
<tr>
<td><input type="radio" name="questionn" id="ques1" value="<?php echo trim($row12['popup1_op1']);?>" class="radio-bt" />
</td><td><label for="ques1" class="css-label"><?php echo $row12['popup1_op1'];?></label></td>
<td><i class="fa fa-check right-ans text-success rt5" aria-hidden="true"></i>
<i class="fa fa-times wrong-ans text-danger wr5" aria-hidden="true"></i></td>
</tr>
<tr>
<td><input type="radio" name="questionn" id="ques2" value="<?php echo trim($row12['popup1_op2']);?>" class="radio-bt"  />
</td><td><label for="ques2" class="css-label"><?php echo $row12['popup1_op2'];?></label></td>
<td><i class="fa fa-check right-ans text-success rt6" aria-hidden="true"></i>
<i class="fa fa-times wrong-ans text-danger wr6" aria-hidden="true"></i></td>
</tr>
<?php if($row12['popup1_op3']){?>
<tr>
<td><input type="radio" name="questionn" id="ques3" value="<?php echo trim($row12['popup1_op3']);?>" class="radio-bt"/>
</td><td><label for="ques3" class="css-label"><?php echo $row12['popup1_op3'];?></label></td>
<td><i class="fa fa-check right-ans text-success rt9" aria-hidden="true"></i>
<i class="fa fa-times wrong-ans text-danger wr9" aria-hidden="true"></i></td>
</tr>
<?php } if($row12['popup1_op4']){?>
<tr>
<td><input type="radio" name="questionn" id="ques4" value="<?php echo trim($row12['popup1_op4']);?>" class="radio-bt"/>
</td><td><label for="ques4" class="css-label"><?php echo $row12['popup1_op4'];?></label></td>
<td><i class="fa fa-check right-ans text-success rt10" aria-hidden="true"></i>
<i class="fa fa-times wrong-ans text-danger wr10" aria-hidden="true"></i></td>
</tr>
<?php } ?>
</tbody>
</table><br>

<div class="text-center">
<button class="select-but ligin1-btn">Submit</button>

<button class="btn galat-btn contt" id='popup1cont'>Continue</button>
<!-- <button class="btn sahi-btn">TRY AGAIN</button>-->
</div>
<script>
$(document).ready(function(){
$('.ligin1-btn').click(function(){
var selected = $("input:radio[name='questionn']:checked").val();
if(selected=="<?php echo trim($row12['popup1_op1'])?>"){
if("<?php echo trim($row12['popup1_ans'])?>"=="<?php echo trim($row12['popup1_exp1'])?>"){
$('.popup-expr').html("<?php echo trim($row12['popup1_exp1'])?>")
$(".galat").addClass("in").hide();
$(".sahi").removeClass("in").show();
$(".sahi").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".rt5").show();
$('.ligin1-btn').hide();
$('.galat-btn').show();
}else{
$('.popup-expw').html("<?php echo trim($row12['popup1_exp1'])?>");
$(".sahi").addClass("in").hide();
$(".galat").removeClass("in").show();
$(".galat").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".wr5").show();
}
}else if(selected=="<?php echo trim($row12['popup1_op2'])?>"){
if("<?php echo trim($row12['popup1_ans'])?>"=="<?php echo trim($row12['popup1_exp2'])?>"){
$('.popup-expr').html("<?php echo trim($row12['popup1_exp2'])?>")
$(".galat").addClass("in").hide();
$(".sahi").removeClass("in").show();
$(".sahi").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".rt6").show();
$('.ligin1-btn').hide();
$('.galat-btn').show();
}else{
$('.popup-expw').html("<?php echo trim($row12['popup1_exp2'])?>")
$(".sahi").addClass("in").hide();
$(".galat").removeClass("in").show();
$(".galat").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".wr6").show();
}
}else if(selected=="<?php echo trim($row12['popup1_op3'])?>"){
if("<?php echo trim($row12['popup1_ans'])?>"=="<?php echo trim($row12['popup1_exp3'])?>"){
$('.popup-expr').html("<?php echo trim($row12['popup1_exp3'])?>")
$(".galat").addClass("in").hide();
$(".sahi").removeClass("in").show();
$(".sahi").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".rt9").show();
$('.ligin1-btn').hide();
$('.galat-btn').show();
}else{
$('.popup-expw').html("<?php echo trim($row12['popup1_exp3'])?>")
$(".sahi").addClass("in").hide();
$(".galat").removeClass("in").show();
$(".galat").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".wr9").show();
}
}else {
if("<?php echo trim($row12['popup1_ans'])?>"=="<?php echo trim($row12['popup1_exp4'])?>"){
$('.popup-expr').html("<?php echo trim($row12['popup1_exp4'])?>")
$(".galat").addClass("in").hide();
$(".sahi").removeClass("in").show();
$(".sahi").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".rt10").show();
$('.ligin1-btn').hide();
$('.galat-btn').show();
}else{
$('.popup-expw').html("<?php echo trim($row12['popup1_exp4'])?>")
$(".sahi").addClass("in").hide();
$(".galat").removeClass("in").show();
$(".galat").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".wr10").show();
}
}

});
});
</script>
</div>
<div class="col-lg-3"><img src="img/bulb.png" alt='right' class="img-responsive"/></div>
<div class="col-lg-12">
<!--wrong answer messages box here -->
<div class="galat galat-mesg alert-danger fade">
<!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
<strong>Explanation :</strong><span class='popup-expw'></span></div>
<!--right answer messages box here -->
<div class="sahi sahi-mesg alert-success fade">
<!--  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
--><strong>Explanation :</strong><span class='popup-expr'></span>
</div>
</div>
</div>
</div>
<!-- /.modal-content -->
</div>
<!--second popup question-->
<div class="modal-dialog" id="modal_d1">
<div class="modal-content">
<div class="modal-header">
<!--<button type="button" class="close color" data-dismiss="modal" aria-hidden="true">&times;</button> -->
<h4 class="ques-head"><?php echo $row12['popup2_q'];?></h4>
</div>
<div class="panel-body clearfix">
<div class="col-lg-12">

</div>
<div class="col-lg-9">
<table class="table">
<tbody>
<tr>
<td><input type="radio" name="question4" id="ques5" value="<?php echo trim($row12['popup2_op1']);?>" class="radio-bt" />
</td><td><label for="ques5" class="css-label"><?php echo $row12['popup2_op1'];?></label></td>
<td><i class="fa fa-check right-ans text-success rt7" aria-hidden="true"></i>
<i class="fa fa-times wrong-ans text-danger wr7" aria-hidden="true"></i></td>
</tr>
<tr>
<td><input type="radio" name="question4" id="ques6" value="<?php echo trim($row12['popup2_op2']);?>" class="radio-bt"  />
</td><td><label for="ques5" class="css-label"><?php echo $row12['popup2_op2'];?></label></td>
<td><i class="fa fa-check right-ans text-success rt8" aria-hidden="true"></i>
<i class="fa fa-times wrong-ans text-danger wr8" aria-hidden="true"></i></td>
</tr>
<?php if($row12['popup2_op3']){?>
<tr>
<td><input type="radio" name="question4" id="ques7" value="<?php echo trim($row12['popup2_op3']);?>" class="radio-bt"  />
</td><td><label for="ques5" class="css-label"><?php echo $row12['popup2_op3'];?></label></td>
<td><i class="fa fa-check right-ans text-success rt11" aria-hidden="true"></i>
<i class="fa fa-times wrong-ans text-danger wr11" aria-hidden="true"></i></td>
</tr>
<?php } if($row12['popup2_op4']){?>
<tr>
<td><input type="radio" name="question4" id="ques8" value="<?php echo trim($row12['popup2_op4']);?>" class="radio-bt"  />
</td><td><label for="ques5" class="css-label"><?php echo $row12['popup2_op4'];?></label></td>
<td><i class="fa fa-check right-ans text-success rt12" aria-hidden="true"></i>
<i class="fa fa-times wrong-ans text-danger wr12" aria-hidden="true"></i></td>
</tr>
<?php } ?>
</tbody>
</table><br>

<div class="text-center">
<button class="select-but ligin2-btn">Submit</button>

<button class="btn galat-btn cont" id='popup2cont'>Continue</button>
<!-- <button class="btn sahi-btn">TRY AGAIN</button>-->
</div>
<script>
$(document).ready(function(){
$('.ligin2-btn').click(function(){
var selected = $("input:radio[name='question4']:checked").val();
if(selected=="<?php echo trim($row12['popup2_op1'])?>"){
if("<?php echo trim($row12['popup2_ans'])?>"=="<?php echo trim($row12['popup2_exp1'])?>"){
$('.popup-expr1').html("<?php echo trim($row12['popup2_exp1'])?>")
$(".galat").addClass("in").hide();
$(".sahi").removeClass("in").show();
$(".sahi").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".rt7").show();
$('.ligin2-btn').hide();
$('.galat-btn').show();
}else{
$('.popup-expw1').html("<?php echo trim($row12['popup2_exp1'])?>");
$(".sahi").addClass("in").hide();
$(".galat").removeClass("in").show();
$(".galat").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".wr7").show();
}
}else if(selected=="<?php echo trim($row12['popup2_op2'])?>"){
if("<?php echo trim($row12['popup2_ans'])?>"=="<?php echo trim($row12['popup2_exp2'])?>"){
$('.popup-expr1').html("<?php echo trim($row12['popup2_exp2'])?>")
$(".galat").addClass("in").hide();
$(".sahi").removeClass("in").show();
$(".sahi").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".rt8").show();
$('.ligin2-btn').hide();
$('.galat-btn').show();
}else{
$('.popup-expw1').html("<?php echo trim($row12['popup2_exp2'])?>")
$(".sahi").addClass("in").hide();
$(".galat").removeClass("in").show();
$(".galat").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".wr8").show();
}
}else if(selected=="<?php echo trim($row12['popup2_op3'])?>"){
if("<?php echo trim($row12['popup2_ans'])?>"=="<?php echo trim($row12['popup2_exp3'])?>"){
$('.popup-expr1').html("<?php echo trim($row12['popup2_exp3'])?>")
$(".galat").addClass("in").hide();
$(".sahi").removeClass("in").show();
$(".sahi").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".rt11").show();
$('.ligin2-btn').hide();
$('.galat-btn').show();
}else{
$('.popup-expw1').html("<?php echo trim($row12['popup2_exp3'])?>")
$(".sahi").addClass("in").hide();
$(".galat").removeClass("in").show();
$(".galat").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".wr11").show();
}
}else{
if("<?php echo trim($row12['popup2_ans'])?>"=="<?php echo trim($row12['popup2_exp4'])?>"){
$('.popup-expr1').html("<?php echo trim($row12['popup2_exp4'])?>")
$(".galat").addClass("in").hide();
$(".sahi").removeClass("in").show();
$(".sahi").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".rt12").show();
$('.ligin2-btn').hide();
$('.galat-btn').show();
}else{
$('.popup-expw1').html("<?php echo trim($row12['popup2_exp4'])?>")
$(".sahi").addClass("in").hide();
$(".galat").removeClass("in").show();
$(".galat").delay(200).addClass("in");
$(".fa-check").hide();
$(".fa-times").hide();
$(".wr12").show();
}
}
});
});
</script>
</div>
<div class="col-lg-3"><img src="img/bulb.png" alt='right' class="img-responsive"/></div>
<div class="col-lg-12">
<!--wrong answer messages box here -->
<div class="galat galat-mesg alert-danger fade">
<!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
<strong>Explanation :</strong><span class='popup-expw1'></span></div>
<!--right answer messages box here -->
<div class="sahi sahi-mesg alert-success fade">
<!--  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
--><strong>Explanation :</strong><span class='popup-expr1'></span>
</div>
</div>
</div>
</div>
<!-- /.modal-content -->
</div>  <!-- /.modal-dialog --> 
</div>
</div> 
<?php include'inc/footer.php'?>
<script>
$(document).ready(function(){
$('#nextsituation').carousel({
pause:true,
autoplay:false,
interval:false,
});
$('#next').click(function(){
$('.check').show();
$('#check').hide();
$('#next').hide();
$('.right-mesg').hide();
});
$("#menu_activity").click(function(){
$('#modal_d3').show();
$('#activity').removeClass('overlay1');
$('#activity').addClass('modal');
$('#activity').addClass('fade');
$('#modal_d3').animate({top:'5%'},500);
});
$('#skill-session').click(function(){
$('#goto_assign').show();
$('#activity').removeClass('modal');
$('#activity').removeClass('fade');
$('#activity').removeClass('in');
$('#activity').addClass('overlay1');
});
$('#sit_goto_assign').click(function(){
$('#goto_assign').hide();
});
var vid = document.getElementById('myvideo');
var vid1 = document.getElementById('myvideo1');
var vid2 = document.getElementById('myvideo2');
$('.fade').click(function(){
$('.modal').attr('data-togle','modal');
vid.pause();
vid1.pause();
vid2.pause();
});
});
</script>

</body>
</html>
