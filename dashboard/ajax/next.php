<?php
include'../admin/inc/constant.php';
$grade= $_POST['grade'];
$id=$_POST['name'];
$query=mysql_query("select * from `situation bq` where grade_id='$grade'");
$row=mysql_num_rows($query);
$row2=mysql_fetch_array($query);
//$query3=mysql_query("update `situation_no` set sit_id=sit_id + 1 where stu_id='$id'");
$query1=mysql_query("select * from `situation_no` where stu_id='$id'");
$row1=mysql_fetch_array($query1);
if($row==$row1[1]){
	echo '<h1>Congrats</h1>';
}
else {
	$fr=$row1[1];
	$to=$row1[1]+1;
$quer=mysql_query("select * from `situation bq` where grade_id='$grade' limit $fr,$to");	
$rowsbq=mysql_fetch_array($quer);

echo " <div class='panel-body clearfix'>
                   <h4 class='ques-head'>".$rowsbq[4]."</h4>
                      
                      <table class='table'>
                      <tbody>
                      <tr>
                      <td colspan=''><input type='radio' value='".$rowsbq[5]."' name='question' id='monthlay'  class=' ques' checked='checked' /></td><td>
                      <label for='monthlay' class='css-label'>".$rowsbq[5]."</label></td>
                      <td><i class='fa fa-times wrong-ans text-danger' id='wr1' aria-hidden='true'></i>
                      <i class='fa fa-check right-ans text-success' id='rt1' aria-hidden='true'></i></td>
                      <tr>
                      <td colspan=''><input type='radio' value='".$rowsbq[6]."' name='question' id='annual' class=' ques'  /></td><td>
                      <label for='annual' class='css-label'>".$rowsbq[6]."</label></td>
                      <td><i class='fa fa-times wrong-ans text-danger' id='wr2' aria-hidden='true'></i>
                      <i class='fa fa-check right-ans text-success' id='rt2' aria-hidden='true'></i></td>
                      </tr>
                      <tr>
                      <td colspan=''><input type='radio' value='".$rowsbq[7]."' name='question' id='annual1' class=' ques'  /></td><td>
                      <label for='annual1' class='css-label'>".$rowsbq[7]."</label></td>
                       <td><i class='fa fa-times wrong-ans text-danger' id='wr3' aria-hidden='true'></i>
                       <i class='fa fa-check right-ans text-success' id='rt3' aria-hidden='true'></i></td>
                       </tr>
                       <tr>
                       <td colspan=''><input type='radio' value='".$rowsbq[8]."' name='question' id='annual2' class=' ques'/></td><td>
                       <label for='annual2' class='css-label'>".$rowsbq[8]."</label></td>
                       <td><i class='fa fa-times wrong-ans text-danger' id='wr4' aria-hidden='true'></i>
                       <i class='fa fa-check right-ans text-success' id='rt4' aria-hidden='true'></i></td>
                      </tr>
                      </tbody>
                      </table>
               </div>
                <div class='text-center'>
                <button type='submit' value='".$rowsbq[0]."' name='check' class='btn popup-btn check'>Check</button>
                <button id='next' class='btn popup-btn wrong-btn next'>NEXT SITUATION</button>
                </div>"; 
}
?>