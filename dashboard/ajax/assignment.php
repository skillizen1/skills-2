<?php
session_start();
include_once '../admin/inc/constant.php'; 
$per = $_POST['per'];
$session = $_POST['session'];
$name = $_POST['name'];
if($per == 'popup1'){
$query=mysql_query("UPDATE `".$name."` SET `popup1_progress`=100  where `session_name`='$session'");
}
else if($per == 'popup2'){
$query=mysql_query("UPDATE `".$name."` SET `popup2_progress`=100  where `session_name`='$session'");
}
else if($per == 'activity'){
$query=mysql_query("UPDATE `".$name."` SET `activity_progress`=100  where `session_name`='$session'");
}
else if($per == 'sbq'){
$query=mysql_query("UPDATE `".$name."` SET `sbq_progress`=100  where `session_name`='$session'");
}
else if($per == 'assignment'){
$query=mysql_query("UPDATE `".$name."` SET `assignment_progress`=100  where `session_name`='$session'");
}

$qu=mysql_query("select * from ".$name." where `session_name`='$session'");
$r=mysql_fetch_array($qu);
$sbq=$r['sbq_progress'];
$activity=$r['activity_progress'];
$popup1=$r['popup1_progress'];
$popup2=$r['popup2_progress'];
$assignment=$r['assignment_progress'];

if(($popup1 == 100) || ($popup2 == 100) || ($activity == 100) || ($sbq == 100 )){
	
	$query=mysql_query("UPDATE `".$name."` SET `progress`=20  where `session_name`='$session'");
	
} 
if(($popup1 == 100 && $popup2 == 100) || ($activity == 100 && $sbq == 100) || ($popup2 == 100 && $activity == 100) || ($popup1 == 100 && $activity == 100) || ($popup1 == 100 && $sbq == 100) || ($popup2 == 100 && $sbq == 100)) {
	
	$query=mysql_query("UPDATE `".$name."` SET `progress`=40  where `session_name`='$session'");
	
}
if(($popup1 == 100 && $popup2 == 100 && $activity == 100) || ($popup1 == 100 && $popup2 == 100 && $sbq == 100) || ($popup1 == 100 && $sbq == 100 && $activity == 100) || ($sbq == 100 && $popup2 == 100 && $activity == 100)){
	
	$query=mysql_query("UPDATE `".$name."` SET `progress`=60  where `session_name`='$session'");
}
if($popup1 == 100 && $popup2 == 100 && $activity == 100 && $sbq == 100 ){
	
	$query=mysql_query("UPDATE `".$name."` SET `progress`=80  where `session_name`='$session'");
	
}

if($popup1 == 100 && $popup2 == 100 && $activity == 100 && $sbq == 100 && $assignment == 100){
	
	$query=mysql_query("UPDATE `".$name."` SET `progress`=100  where `session_name`='$session'");
	
}
?>