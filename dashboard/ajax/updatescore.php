<?php 
session_start();
include_once '../admin/inc/constant.php';
$name = $_POST['name'];
$session= $_POST['session'];
$grade=$_POST['grade'];
$query2=mysql_query("SELECT grade_id from situation_no where stu_id='$name' and session='$session'");
$row2=mysql_fetch_array($query);
$row2['grade_id'];
$query=mysql_query("SELECT attempt from situation_no where stu_id='$name' and session='$session'");
$row=mysql_fetch_array($query);
$attempt=$row['attempt'];

$query1=mysql_query("SELECT grade_id from `situation bq` where grade_id='$grade'");
$row1=mysql_num_rows($query1);
$per=($row1/$attempt)*100 ."%";
echo $per=round($per)."%";
?>