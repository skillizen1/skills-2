<?php
session_start();
//if(!$_SESSION['skill']){ echo "<script>window.location.href='index.php'</script>"; }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Register User</title>
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
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->

<!-- Placed js at the end of the document so the pages load faster -->

</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    <?php include_once'inc/header.php'?>
    <!-- main content start-->
		<div class="main-content main-content2 main-content2copy">
			<div id="page-wrapper">
            <div class="main-box">
                <div class="col-lg-8"> <h3>Register user</h3></div>
                <div class="col-lg-4"> <div class="form-group">
                <div class="input-group input-group-sm">
                    <div class="icon-addon addon-sm">
                    <form method="post">
                        <input type="text" name="user_detail_search"  placeholder="Search user by name,email or phone number" class="form-control">
                    </div>
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="user_search" type="submit"><span for="email" class="glyphicon glyphicon-search" rel="tooltip" title="email"></span></button>
                        </form>
                        
                    </span>
                </div>
            </div></div>
            <div class="clearfix"></div>
            <hr>
            <div class="form-group text-center">
            <form method='post'><input type='submit' value='Delete Selected' name='selectdelete' class="btn-danger btn"/>
									
								</div>
						<div class="table-responsive">
						  <table class="table table-bordered">
							<thead>
							  <tr>
								<th>Select</th>
                                <th>Id</th>
                                <th>Student Name</th>
                                <th>Student Grade</th>
                                <th>Parents</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Country</th>                                
							   <th>Payment</th>
							   <th>Plan</th>
							   <th>Registration date</th>
							   <th>Start date</th>
                               <th>End Date</th>
							   <th>View</th>
                               <th>Delete</th>
							  </tr>
							</thead>
							<tbody>
							  
<?php
include_once 'inc/constant.php';
	$keyword = "";
	 if(isset($_POST["user_search"]))
 {
	 $keyword = $_POST["user_detail_search"];
 }
if(isset($_GET['user_id']))
 {
	 $p = "delete from studentt where user_id =".$_GET['user_id'];
	if(!mysql_query($p))
	echo mysql_error();
 }
if(isset($_POST['selectdelete']))
 {	 if($_POST["id"]!="")
	 {
	 $id = implode(",",$_POST["id"]);
	 $p = "delete from studentt where user_id in(".$id.")";
	 if(!mysql_query($p))
	echo mysql_error();
 }	}

$reso1 = mysql_query("select * from studentt WHERE student_name LIKE '".$keyword."%' or parent_name LIKE '".$keyword."%' or parent_email LIKE '".$keyword."%' or parent_phone LIKE '".$keyword."%' order by user_id DESC limit 400");
while($row1 = mysql_fetch_row($reso1)){
							  echo "<tr>
								<th><label><input type='checkbox' name='id[]' value='".$row1[0]."'></label></th>
								<td>$row1[0]</td>
								<td>$row1[1]</td>
								<td>$row1[3]</td>
								<td>$row1[4]</td>
								<td>$row1[5]</td>
                                <td>$row1[6]</td>
								<td>$row1[12]</td>
                                ";
								if($row1[17]==1){
									echo "<td>PAID</td>";
								}else{
									echo "<td>UNPAID</td>";
								}
					$q1=mysql_query("select * from orders where customerid='$row1[7]'");
					$r3=mysql_fetch_array($q1);
						 $amount=$r3['amount'];
						if($amount <= 1500 && $amount >=1000 ){
								echo "<td>Monthly</td>";
						}elseif($amount>=8000){
						echo "<td>Yearly</td>";
					}else{
						echo "<td>Not selected</td>";
					}
							echo"<td>".$row1[20]."</td>
								<td>".$r3['payment_date']."</td>
								<td>".$row1[21]."</td>
							<td><a href='user_details.php?viewid=".$row1[0]."' class='delete'>View</a></td>
                            <td><a href='register-user.php?user_id=".$row1[0]."' class='delete'>Delete</a></td>
															  

</tr>";
}
?>
                              
							  </tbody>
						  </table>
						</div><!-- /.table-responsive -->
                        
						<!--<div class="text-center">
    <ul class="pagination">
        <li class="disabled"><a href="#">&laquo;</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">&raquo;</a></li>
    </ul>
</div>-->
</body>
</html>                                		
                        </div>
		</div>
		<!--footer section start-->
          <?php include_once'inc/footer.php'?>
        <!--footer section end-->
	</section>

</body>
</html>