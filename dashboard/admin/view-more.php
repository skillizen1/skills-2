<?php
session_start();
//if(!$_SESSION['skill']){ echo "<script>window.location.href='index.php'</script>"; }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>View more</title>
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
                <div class="col-lg-8"> <h3></h3></div>
                <div class="col-lg-4"> <div class="form-group">
                <div class="input-group input-group-sm">
                    <div class="icon-addon addon-sm">
                        <input type="text" placeholder="Search..." class="form-control">
                    </div>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                        <span for="email" class="glyphicon glyphicon-search" rel="tooltip" title="email"></span></button>
                    </span>
                </div>
            </div></div>
            <div class="clearfix"></div>
            
						<div class="table-responsive">
						  <table class="table table-bordered">
							<tbody>
							  <tr>
								<th class="text-center" colspan="3"><strong>Grade 1</strong></th>
							  </tr>
							  <tr>
								<th>Skill 1</th>
								<td>Delete</td>
								<td>Edit</td>
							  </tr>
							  <tr>
								<th>Skill 2</th>
								<td>Delete</td>
								<td>Edit</td>
							  </tr>
                              <tr>
								<th>Skill 3</th>
								<td>Delete</td>
								<td>Edit</td>
							  </tr>
                              <tr>
								<th>Skill 4</th>
								<td>Delete</td>
								<td>Edit</td>
							  </tr>
                              <tr>
								<th>Skill 4</th>
								<td>Delete</td>
								<td>Edit</td>
							  </tr>
                              <tr>
								<th>Skill 5</th>
								<td>Delete</td>
								<td>Edit</td>
							  </tr>
                              <tr>
								<th>Skill 6</th>
								<td>Delete</td>
								<td>Edit</td>
							  </tr>
							</tbody>
						  </table>
						</div><!-- /.table-responsive -->
                        
						
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