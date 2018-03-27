<?php
include'../admin/inc/constant.php';
$selected= $_POST['selected'];
$id=$_POST['id'];
$name=$_POST['name'];
$session=$_POST['session'];

$query1=mysql_query("select * from `situation_no` where stu_id='$name' and session='$session'");
$row1=mysql_fetch_array($query1);
$attempt=$row1['attempt']+1;
$quer=mysql_query("update `situation_no` set `attempt`='$attempt' where `stu_id`='$name' and session='$session'");

$query=mysql_query("select * from `situation bq` where question_id='$id'");
$row=mysql_fetch_array($query);

if($selected==$row[9]){
  $des=trim($row[10]);
}elseif($selected==$row[5]){
  $des=trim($row[11]);
}elseif($selected==$row[6]){
$des=trim($row[12]);
}elseif($selected==$row[7]){
$des=trim($row[13]);
}elseif($selected==$row[8]){
$des=trim($row[14]);
}
echo trim($des);
?>