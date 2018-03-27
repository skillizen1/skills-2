<?php
session_start();
//if(!$_SESSION['skill']){ echo "<script>window.location.href='index.php'</script>"; }
include_once 'inc/constant.php';
$grade=trim($_GET['grade']); 
$skill=trim($_GET['skill']); 
$que=mysql_query("select * from skill where grade_id='$grade' and skill_name='$skill'");
$r3=mysql_fetch_array($que);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Update Skill</title>
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
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
      <?php include_once'inc/header.php'?>
    
    <!-- main content start-->
		<div class="main-content main-content2 main-content2copy">
		
			<div id="page-wrapper">
            <div class="main-box clearfix">
                <div class="col-lg-12"> <h3>Update Skill</h3></div>
                <div class="clearfix"></div>
                <hr>
                 
 <div class="col-lg-3">
            <select class="form-control" id='grade' name='grade'>
            <option>---Select Grade---</option>
            <option value='1'>1</option>
            <option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
			<option value='5'>5</option>
			<option value='6'>6</option>
			<option value='7'>7</option>
			<option value='8'>8</option>
			<option value='9'>9</option>
			<option value='10'>10</option>
			<option value='11'>11</option>
			<option value='12'>12</option>
            </select>
 </div>
 <script>
 $(document).ready(function(){
	 $('#grade').change(function(){
		 var grade= $('#grade').val();
		 $.post('ajax/grades.php',{grade:grade},function(data){
			 $('#selectskills').html(data);
				
		 });		 
	 });
 });
 </script>
            <div class="col-lg-3">
            <select class="form-control" id='selectskills' name='selectskills'>
            <option>---Select Skills---</option>
            </select>
            </div>			
            <div class="col-lg-3"><button type="submit" class="btn btn-primary" id="addsession">Submit</button></div>
			<script>
			$(document).ready(function(){
				$('#addsession').click(function(){
				var grade= $('#grade').val();
				var skill=$('#selectskills').val();
					window.location.href = "skill.php?grade=" + grade + "&skill=" + skill ;
				});				
			});
			</script>
            <div class="clearfix"></div>
			<?php 
			if(isset($_GET['grade'])){
			?>
			<script>
			$('#grade').val('<?php echo $grade ?>');
			$('#selectskills').html("<option value='<?php echo $skill?>'><?php echo $skill?></option>");
			</script>
            <hr>
			 <div class="form-group clearfix"><form action="" method="post" enctype="multipart/form-data">
            <div class="col-lg-2"><label>Skill Description</label></div>
<div class="col-lg-4"><textarea cols='40' rows='10' name="newsession" required/><?php if($grade){echo $r3['skill_des'];}?>
</textarea></div>
            <div class="col-lg-6"><button type="submit" name='savesession' class="btn btn-primary">Submit</button></div>
            </form></div>
			<?php
			if(isset($_POST['savesession'])){
				if(isset($_GET['grade'])){
			$quer=mysql_query("update skill set `skill_des`= '".$_POST['newsession']."' where grade_id='".$grade."' and skill_name='".$skill."'");
			echo "<script>window.location.href='skill.php?grade=".$grade."&skill=".$skill."'</script>";
				}else{
				echo "Please select skill first";
				}
			}
			?>
			<div class="form-group clearfix"><form action="" method="post" enctype="multipart/form-data">
            <div class="col-lg-2"><label>Upload Image</label></div>
            <div class="col-lg-4">
			<?php if($r3[skill_image]){
			?>
			<img src='../img/<?php echo $r3['skill_image']?>' width='200px' height='100px'>
			<?php
			}?>
			<input type="file"  name="newimg" required/><?php if(isset($r3['skill_image'])){ echo $r3['skill_image']; } ?></div>
            <div class="col-lg-6"><button type="submit" name='saveimg' class="btn btn-primary">Submit</button></div>
            </form></div>
			<?php
			}
			if(isset($_POST['saveimg'])){
				if(isset($_GET['grade'])){
					$pic=$_FILES['newimg']['name'];
					$pic_typ=$_FILES['newimg']['type'];
					$pic_tmp=$_FILES['newimg']['tmp_name'];
					move_uploaded_file($pic_tmp,"../img/$pic");
			$quer=mysql_query("update skill set `skill_image`= '".$_FILES['newimg']['name']."' where grade_id='".$grade."' and skill_name='".$skill."'");
			echo "<script>window.location.href='skill.php?grade=".$grade."&skill=".$skill."'</script>";
			}else{
			echo "Please select skill first";
			}
			}
			?>
			</div>
		</div>
</div>		
		<!--footer section start-->
			  <?php include_once'inc/footer.php'?>
        <!--footer section end-->
	</section>
</body>
</html>