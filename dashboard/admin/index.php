<?php
session_start();
error_reporting(E_ALL);
$adminame = "";
if(isset($_POST['adminlogin']))
{
include 'inc/constant.php'; 
$username = $_POST['username'];
$password = $_POST['password'];	
$result =  mysqli_query($con,'select * from admin_panel where admin_id="'.$username.'" and admin_password="'.$password.'"');
if(mysqli_num_rows($result)==1){
    if(isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response']){
        //var_dump($_POST);
        $secret = "6Lcy4jQUAAAAABNOIijHghfrF09EdumfSqiHyV1L";
        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $rsp  = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");
        //var_dump($rsp);
        $arr = json_decode($rsp,TRUE);
        if($arr['success']){
            $_SESSION["skill"] = "qwertyqwerty";
            echo "<script>window.location.href='home.php'</script>";
            setcookie('admin',$username,time() + (30*60*60*24) ,"/");
        }
 }else{
        echo 'Please Select recaptcha code';
    }
}else
{
$adminame = "Username and Password are incorrect";
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Skillizen</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->
<script src='https://www.google.com/recaptcha/api.js'></script>

</head> 
   
 <body class="sign-in-up"> 
    <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<p><span>Skillizen Admin Panel</span></p>
						</div>
						<div class="signin">
							<div class="signin-rit">								
								<div class="clearfix"> </div>
							</div>
        <center><font color="#FF0000" face="Arial, Helvetica, sans-serif" size="3px"><?php echo $adminame;?></font></center>
							<form method="post">
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" class="user" value="Username" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}"/>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" class="lock" value="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"/>
								</div>
								<div class="clearfix"> </div>
							</div>
                            <div class="g-recaptcha" data-sitekey="6Lcy4jQUAAAAALPpcIW4Raey_I8iog5LlH1cPSwI"></div>

							<input type="submit" name="adminlogin" value="Login">
						</form> 
						</div>
						</div>
				</div>
			</div>
		<!--footer section start-->
			<footer>
			   <p>&copy 2016 Skillizen Admin Panel. All Rights Reserved | Powered by <a href="www.skillizen.com" target="_blank">Skillizen Pvt Ltd.</a></p>
			</footer>
        <!--footer section end-->
	</section>

<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>