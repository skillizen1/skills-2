<?php 
include_once '../inc/constant.php';
//echo $grade=$_POST['grade'];
$skill=$_POST['skill'];
$grade=$_POST['grade'];
echo "<option>---Select Session---</option>";
$query2=mysql_query("Select * from session where grade_id='$grade' and skill_name='$skill'");
$x=1;
while($row=mysql_fetch_array($query2)){
	echo "<option value='".$row['session_name']."' > ".$x++." </option>";
}
?>