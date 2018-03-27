<?php 
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
	//$ip='122.162.27.100'; 
    return $ip;
}

//$xmm = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());
$xmm = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=122.162.27.100");
   $currency2=$xmm->geoplugin_currencyCode ; 
   $cureny=$xmm->geoplugin_currencySymbol;

  $country=$xmm->geoplugin_countryName;
 $countip=$xmm->geoplugin_request;
?>

<?php 
session_start();
//echo $_SESSION['amountt'];
$amount= $_SESSION['total'];
$t2=$_SESSION['t2'];
		
//include_once('include_once/constant.php'); 
include_once('include/constant.php');
if(empty($_SESSION['username'])){ header('Location: index.php');}
 $student_name=$_SESSION["student_name"];
  
error_reporting(0);
 /*$profile_sql=mysql_query("select student_name,email_id,contact_no from user1 where stu_id=".$_SESSION['stu_id']); 
		$profile_fetch_sql=mysql_fetch_assoc($profile_sql);*/
		
		 //$customerid=$_SESSION['uid'];
 $customerid=$_SESSION["username"];
	    $date=date('Y-m-d H:m:s');
		$sql2="insert into orders(date,customerid,student_name,countryip,curency,amount) values('$date','$customerid','$student_name','$countip','$currency2','$amount')";
		$result=mysql_query($sql2);
		$orderid=mysql_insert_id();
		$_SESSION['orderid']=$orderid;
	$paypal_url='https://www.paypal.com/cgi-bin/webscr';
		$paypal_id='sidharth@post.harvard.edu';
		
		if($_REQUEST[payment]=='paypal'){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pay Now</title>
<link type="text/css" rel="icon" href="../images/favicon.png"> 
<link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body onload="load();">

<div id="container">
<div class="paypal">
<img src="https://www.skillizen.com/img/Logo.gif">
<p> Please Wait...... we are redirecting to paypal !! Don't Refresh or press back button</p>
<img src="https://www.skillizen.com/img/Secure.png">
</div>
</div>
<form name='frmPayPal1' id="frmPayPal1"  method="post" action='<?php echo $paypal_url; ?>'  style="margin-left:300px; margin-top:200px;">    
        <input type='hidden' name='business' value='<?php echo $paypal_id;?>'>    <!-- found on top -->
        <input type='hidden' name='cmd' value="_xclick">
		<input type='hidden' name='image_url' value='https://www.skillizen.com/img/Logo_pay.png'> 
        <!-- logo of your website -->
		<input type="hidden" name="rm" value="2" />    <!--1-get 0-get 2-POST -->
        <input type='hidden' class="name" name='item_name' value='<?php echo "curriculum"; ?>'>
        <input type='hidden' name='item_number' value='<?php echo 1;?>'>
        <input type="hidden" name="amount" value="<?php  
  
  if("AUD" ==$currency2) { echo $amount;}  elseif("CAD" ==$currency2) { echo $amount;} 
  elseif("EUR" ==$currency2) { echo $amount;} elseif("GBP" ==$currency2) { echo $amount; }  
  elseif("JPY" ==$currency2) { echo $amount;} elseif("USD" ==$currency2) { echo $amount;}  
  elseif("NZD" ==$currency2) { echo $amount;} elseif("CHF" ==$currency2) {  echo $amount;}  
  elseif("HKD" ==$currency2) { echo $amount; }   elseif("SGD" ==$currency2) { echo $amount;}  
  elseif("SEK" ==$currency2) { echo $amount;} elseif("DKK" ==$currency2) {echo $amount;} 
  elseif("PLN" ==$currency2) { echo $amount; }  elseif("NOK" ==$currency2) { echo $amount; }  
  elseif("HUF" ==$currency2) { echo $amount;} elseif("CZK" ==$currency2) {echo $amount; }  
  elseif("ILS" ==$currency2) { echo $amount; } elseif("MXN" ==$currency2) {echo $amount;}
  elseif("BRL" ==$currency2) {  echo $amount; }elseif("MYR" ==$currency2) {echo $amount;}
  elseif("PHP" ==$currency2) { echo $amount;}elseif("TWD" ==$currency2) { echo $amount;}
  elseif("THB" ==$currency2) {  echo $amount;} elseif("TRY" ==$currency2) {  echo $amount;}
  elseif("RUB" ==$currency2) {   echo $amount; }else  {  echo $t2;}
	
  ?>">
		<input type='hidden' name='no_shipping' value='1'>
		<input type='hidden' name='no_note' value='1'>
		<input type='hidden' name='handling' value='0'>
         <input type="hidden" name="currency_code" value="<?php  
  
  if("AUD" ==$currency2) { echo $currency2;}  elseif("CAD" ==$currency2) { echo $currency2;} 
  elseif("EUR" ==$currency2) { echo $currency2;} elseif("GBP" ==$currency2) { echo $currency2; }  
  elseif("JPY" ==$currency2) { echo $currency2;} elseif("USD" ==$currency2) { echo $currency2;}  
  elseif("NZD" ==$currency2) { echo $currency2;} elseif("CHF" ==$currency2) {  echo $currency2;}  
  elseif("HKD" ==$currency2) { echo $currency2; }   elseif("SGD" ==$currency2) { echo $currency2;}  
  elseif("SEK" ==$currency2) { echo $currency2;} elseif("DKK" ==$currency2) {echo $currency2;} 
  elseif("PLN" ==$currency2) { echo $currency2; }  elseif("NOK" ==$currency2) { echo $currency2; }  
  elseif("HUF" ==$currency2) { echo $currency2;} elseif("CZK" ==$currency2) {echo $currency2; }  
  elseif("ILS" ==$currency2) { echo $currency2; } elseif("MXN" ==$currency2) {echo $currency2;}
  elseif("BRL" ==$currency2) {  echo $currency2; }elseif("MYR" ==$currency2) {echo $currency2;}
  elseif("PHP" ==$currency2) { echo $currency2;}elseif("TWD" ==$currency2) { echo $currency2;}
  elseif("THB" ==$currency2) {  echo $currency2;} elseif("TRY" ==$currency2) {  echo $currency2;}
  elseif("RUB" ==$currency2) {   echo $currency2; }else  {  echo $t1;}
	
  ?>">
		<input type="hidden" name="lc" value="IN">
		<input type="hidden" name="cbt" value="Return to Skillizen">
		<input type="hidden" name="bn" value="PP-BuyNowBF">
        <input type='hidden' name='cancel_return' value='https://www.skillizen.com/cancel.php?pageid=cancel'>
        <input type='hidden' name='return' value='https://www.skillizen.com/success.php?pageid=success&customerid=<?php echo $customerid; ?>&order_id=<?php echo $orderid; ?>'>
		<input type="hidden" name="notify_url" value="https://www.skillizen.com/" /> 


<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
<!--<input type="hidden" name="custom" value='akhilesh.yadav010@gmail.com'> -->       <!-- custom field -->
</form>  
<script language="javascript">
function load(){

  document.frmPayPal1.submit();
}
</script>       
 <!--<input type="button" value=" Back " onClick="return goback3();" style="margin-left:600px; margin-top:115px;" />-->               
 </body>
</html>     


<?php } 
	
	elseif($_REQUEST[payment]=='payu'){  
	  $profile_sql=mysql_query("select user_name,student_name,parent_email,parent_phone from studentt where user_name='$customerid'"); 
	  $profile_fetch_sql=mysql_fetch_assoc($profile_sql);	
		  
	  
	    // $amount;
		//$amount=2.00;
		$amount=$_SESSION["total"];
		//echo $_SESSION["total"];
		$currency='Rs';
		$pay_type='Payu';
		
		
        //$MERCHANT_KEY = "gtKFFx";  // testing
            $MERCHANT_KEY = "fDnG8d";
		
           // Merchant Salt as provided by Payu
           //$SALT = "eCwWELxi";  // testing
		  
		  $SALT = "TwBJboXe";

          // End point - change to https://secure.payu.in for LIVE mode
		  
        //$PAYU_BASE_URL = "https://test.payu.in";
		   
		   $PAYU_BASE_URL = "https://secure.payu.in";


		   $action = '';

$posted = array();
$posted['key']=$MERCHANT_KEY;

$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
$posted['txnid']=$txnid;

if($profile_fetch_sql['student_name']){ $name=$profile_fetch_sql['student_name'];}else{ $name='guest';}
$posted['amount']=$amount;
 $posted['firstname']=$name;
$posted['email']=$profile_fetch_sql['parent_email'];
$posted['username']=$profile_fetch_sql['user_name'];
 $posted['phone']=$profile_fetch_sql['parent_phone'];
 $posted['productinfo']='test';
$posted['surl']='https://skillizen.com/success_payu.php';
$posted['furl']='https://skillizen.com/failure.php';
$posted['service_provider']='payu_paisa';






$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
     $action = $PAYU_BASE_URL . '/_payment';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pay Now</title>
<link type="text/css" rel="icon" href="../images/favicon.png"> 
<link href="style.css" type="text/css" rel="stylesheet"/>
</head>
 <body onload="submitPayuForm()">
 <div id="container">
 <div class="paypal">
<img src="https://www.skillizen.com/img/Logo.gif">
<p>Please Wait....... we are redirecting to PAYU !! Don't Refresh or press back button</p>
<img src="https://www.skillizen.com/img/Secure.png">
</div>
</div>
 <div style="text-align:center"><!--<img src="img/Secure.png">--></div>
   <div style="display:none;">
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="text" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="text" name="hash" value="<?php echo $hash ?>"/>
      <input type="text" name="txnid" value="<?php echo $txnid ?>" />
      <input type="text" name="amount" value="<?php echo $amount ?>" />
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
          <td>First Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? 'dummy' : $posted['firstname']; ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? '9899000000' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea></td>
        </tr>
        <tr>
          <td>Success URI: </td>
          <td colspan="3"><input name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URI: </td>
          <td colspan="3"><input name="furl"  value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" /></td>
        </tr>
  <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
	</div>
	 <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
     payuForm.submit();
    }
  </script>
  </body>
</html>
<?php } ?>