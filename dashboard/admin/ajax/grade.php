<?php
include_once '../inc/constant.php';
echo $grade=$_POST['grade'];
echo "<tr>                            
                            <th align='center' colspan='4'><h2>Grade ".$grade."</h2></th>                  
                            </tr>
							  <tr>
                              <th width='7%'>S No.</th>
								<th width='34%'>Skills</th>
								<th width='4%'>Session</th>
								
								<th width='11%'>Delete</th>
							  </tr>";


$x=1;
$query=mysql_query("Select * from session where grade_id = '$grade'");
while($row3=mysql_fetch_array($query)){
$skill = $row3['skill_name'];
if($skill!=$sk){
$query2=mysql_query("Select * from session where grade_id = '$grade' and skill_name='$skill'");
$session_no=mysql_num_rows($query2);
echo "<tr>
                              <th width='7%'>".$x++."</th>
								<th width='34%'>".$skill."</th>
								<th width='4%'>".$session_no."</th>							
								<th width='11%'><a>Delete</a></th>
							  </tr>
                              
                              ";
							  $sk=$skill;
}
}
?>