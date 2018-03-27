<?php session_start();
//include('include/constant.php');
include('Curriculum/admin/connect.php');
if(empty($_SESSION['username'])){ header('Location: index.php');}
 ?>
<?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$username=$_SESSION['username'];
//$salt="eCwWELxi"; //testing
$salt="TwBJboXe";


If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
		 
       if ($hash != $posted_hash) {
	      echo "Invalid Transaction. Please try again Later";
		   }
	   else {
	   
	   $upatestaus1=mysql_query("UPDATE studentt SET status='1' WHERE user_name='$username'");
	   
	   	$upatestaus=mysql_query("UPDATE orders SET status='1',`txn_id`='".$_POST[txnid]."',`payment_status`='".$_POST[status]."',`payment_date`=NOW(),`payer_email`='".$_POST[email]."' 
WHERE  customerid='$username'");
	
  
	   
           	   
          echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
		  
		  $to = "akhilesh.yadav010@gmail.com";
  $subject = "Welcome to Life Skills Curriculum!";
  $message = "Hi,<br>Welcome To Curriculum- We are very pleased to have you onboard!<br>Your registration has been successful with payment.<br> <br><b> Username:</b> $username<br><br>You have just joined a mission to lead billions of children to learn management skills required for the 21st century. What are more? We are the World's 1st to create a multidisciplinary platform for young children to participate.";
  $header = "MIME-Version: 1.0" . "\r\n";
  $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";  
  $header .= "From:info@skillizen.com \r\n";
  $retval = mail ($to,$subject,$message,$header);
  
		
	   }
?>	</div>
 <meta http-equiv="refresh" content="4;url=http://skillizen.com/" />
 <br class="clear"/>
 </div>
 <?php unset($_SESSION['username']); ?>
 <?php include('footer.php');?>