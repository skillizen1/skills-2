<?php 
$qry=mysql_query("select * from ".$name."");
$rr=mysql_fetch_array($qry);
$profile_pic=$rr['profile_pic'];
$cover_pic=$rr['cover_pic'];
$pathp="assignment/$name"; 

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<div class="left_col scroll-view">
<div class="navbar nav_title" style="border: 0;">
<a href="index.php?id=<?php echo $name?>&skill=<?php echo $skill?>" class="site_title"><img src="images/logo-icon.png" alt='skillizen'/> <span><img src="images/logo.png" class="img-responsive" alt='skillizen'/></span></a>
</div>
<div class="clearfix"></div>
<!-- menu profile quick info -->
<div class="profile">
<div class="profile_pic">
<?php if(!$profile_pic){ ?>
<img src="images/img.jpg" alt="..." class="img-circle profile_img">
<?php } else { ?>
<img src="<?php echo "$pathp/$profile_pic" ;?>" alt="..." class="img-circle profile_img">
<?php } ?>
</div>
<h2><?php echo $name1 ?></h2>
<h2>Grade: <?php echo $grade ?></h2>
</div>
<!-- /menu profile quick info -->
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
<div class="menu_section">
<ul class="nav side-menu">
<?php 
if (!ini_get('display_errors')) 
	{
	ini_set('display_errors', '1');
	}
	ini_set('display_errors', 1);
	ini_get('display_errors');
	include_once 'admin/inc/constant.php';
	$q1=mysql_query("select distinct skill_name from ".$name." ");
		if($q1)
		{
		$qr1=mysql_query("select distinct skill_name from ".$name." where progress >= 0 and progress < 100");
		$rr1=mysql_fetch_array($qr1);
			if($rr1==0)
			{
				$to=mysql_num_rows($q1);
				$rn1=$to+1;
			}
			else
			{
				$rn1=mysql_num_rows($qr1);
				$to=$rn1-1;
			}
		}else{
				$rn1=1;
				$to=$rn1-1;
			}
		$q2=mysql_query("select * from skill where grade_id='$grade' limit $to,$rn1");
		$r2=mysql_fetch_array($q2);
		$active_skill=$r2['skill_name'];
?>
<!--Active Menu-->
<li><a class="main-active" href="index.php?id=<?php echo $name?>&skill=<?php echo $active_skill;?>"><?php echo $active_skill ?></a><a style="float:right;"><span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu side-menu" style='display:block;'>
<?php
$q4=mysql_query("select * from session where grade_id='$grade' and skill_name='$active_skill'");
$x=1;
while($r4=mysql_fetch_array($q4)){
$sessio_id=$r4['session_id'];
$online_session=$r4['online_session'];
$session_name=$r4['session_name'];
$freesession=$r4['freesession'];
$q12=mysql_query("select * from ".$name." where session_name='$session_name' and skill_name='$active_skill'");
if($q12){
$r12=mysql_fetch_array($q12);
$progress=$r12['progress'];
}else{
$progress=0;
}
if($progress < 100 && $progress >=1){
?><li id='ses<?php echo $sessio_id ?>'class="sub-active"><a href="dashboard.php?id=<?php echo $name?>&skill=<?php echo $active_skill;?>&session=<?php echo $r4[3]?>">Session <?php echo $x++ ?>
</a></li>
<?php
}elseif($progress==100){ ?>
<li id='ses<?php echo $sessio_id ?>' class="cump-active"><a href="dashboard.php?id=<?php echo $name?>&skill=<?php echo $active_skill;?>&session=<?php echo $r4[3]?>">Session <?php echo $x++ ?>
<?php
if($progress==100){echo "  <small class=''>completed</small>";} ?> </a></li>
<?php }else{ ?>
<li id='ses<?php echo $sessio_id ?>' ><a href="dashboard.php?id=<?php echo $name?>&skill=<?php echo $active_skill;?>&session=<?php echo $r4[3]?>">Session <?php echo $x++ ?>
</a></li>
<?php }
if($freesession!=1){ ?>
<script>
$('#ses<?php echo $sessio_id ?>').css('pointer-events','none');
$('#ses<?php echo $sessio_id ?>').css('cursor','auto');
</script>
<?php } } ?>
</ul>
</li>
<!--End Active menu-->
<!--lower menu-->
<?php
$q5=mysql_query("select *from skill where grade_id='$grade'");
while($r5=mysql_fetch_array($q5)){
$skill_n=$r5['skill_name'];
$skill_d=$r5['skill_id'];
if($active_skill!=$skill_n){ ?>
<li><a href="index.php?id=<?php echo $name?>&skill=<?php echo $skill_n;?>" id='skn<?php echo $skill_d?>'><?php echo $skill_n ?></a><a style="float:right;"><span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu" id="sk<?php echo $skill_d?>">
<?php
$q6=mysql_query("select * from session where grade_id='$grade' and skill_name='$skill_n'");
$x=1;
$prog=null;
$rn6=mysql_num_rows($q6);
while($r6=mysql_fetch_array($q6)){
$session_id=$r6['session_id'];
$session_name=$r6['session_name'];
$online_session=$r6['online_session'];
$q22=mysql_query("select * from ".$name." where session_name='$session_name' and skill_name='$skill_n'");
if($q22){$r22=mysql_fetch_array($q22);
$prog=$r22['progress'];
}

if($prog==100){
?><li class="cump-active" id='ses<?php echo $session_id?>'><a href="dashboard.php?id=<?php echo $name?>&skill=<?php echo $skill_n;?>&session=<?php echo $session_name?>">Session <?php echo $x++ ?>
<?php
if($prog==100){echo "<small class='cump-active'>completed</small>";} ?> </a></li>
<?php
}else{ ?>
<li id='ses<?php echo $session_id?>'><a href="dashboard.php?id=<?php echo $name?>&skill=<?php echo $skill_n;?>&session=<?php echo $session_name?>">Session <?php echo $x++ ?>
</a></li>
<?php }

if($freesession!=1){ ?>
<script>
$('#ses<?php echo $session_id ?>').css('pointer-events','none');
$('#sk<?php echo $skill_d?>').css('cursor','context-menu');
$('#skn<?php echo $skill_d?>').css('pointer-events','none');
</script>
<?php } } ?>
</ul>
</li>
<?php }} ?>
</ul>
</div>
</div>
<!-- /sidebar menu -->
<!-- /menu footer buttons -->
<!-- /menu footer buttons -->
</div>