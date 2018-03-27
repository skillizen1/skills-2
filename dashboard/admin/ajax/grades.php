<?php 
include_once '../inc/constant.php';
$grade=$_POST['grade'];
echo "<option>---Select Skills---</option>";
$query=mysql_query("Select * from session where grade_id = '$grade'");
while($row3=mysql_fetch_array($query)){
$skill = $row3['skill_name'];
if($skill!=$sk){ ?>
<option value='<?php echo $skill ?>' > <?php echo $skill ?></option>
<?php $sk=$skill;
}
}
?>