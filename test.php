<!doctype html>
<html>
<head>
<title>Testing</title>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
/* include_once 'inc/configuration2.php';

$to= "himanshugupta9467@gmail.com";
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From:info@skillizen.com \r\n";
$subject = "newzworm today";
$udate = date("d")-1;
$udate = 13;
$umonth = date("m");
$uyear = date("Y");
$q2=mysqli_query($con,"Select * from news_update where udate='".$udate."' and umonth='".$umonth."' and uyear='".$uyear."'");
$message =
"<div style='background:#ed1c24;border-radius:20px;padding:10px 10px;width:800px;'>
<div style='padding:10px 10px;margin-bottom:5px;text-align:center;border-radius:10px;background:#fff;'>
<img src='https://www.newzworm.com/img/logodemo.png' width='500px'/>
</div>
<div style='padding:20px 10px;padding-top:0px;margin-bottom:5px;border-radius:10px;text-align:center;background:#fff; background-image:url(https://www.newzworm.com/img/crowd2.jpg); background-repeat:no-repeat;background-size:cover;'>
<span style='width:500px;background:#134aa3;font-size:18px;color:#fff;'>Newsworm is  the world's 1st news app specifically curated and created for 8-18 years young.  Currently read by young global citizens from 115 countries and 1000+ cities across the world</span><br><br>
<div><a href=''><img src='https://www.newzworm.com/img/googleplay.png' style='width:100px'/></a>
<a href=''><img src='https://www.newzworm.com/img/applestore.png' style='width:100px;'/></a>
</div></div>";
while($r2=mysqli_fetch_array($q2)){
$varo=str_replace(" ","-",$r2[1]);
$pos1=strip_tags($r2[2]);
$message .=
"<div style='padding:10px 10px;border-radius:10px;background:#fff;height:120px'>
<span style='clear:both;float:left;width:30%;'><img src='https://www.newzworm.com/m/$r2[5]' style='width:200px'></span>
<div style='float:right;text-align:justify;width:70%;height:100%;'>
<h3 style='margin-top:0px;'>".$r2[1]."</h3>
".substr($pos1,0,100)."...<a href='https://www.newzworm.com/$r2[6]/$varo'>readmore >>></a></div>
</div>
<hr style='border:2px solid #ff006e;margin:0px;opacity:0;background:#ed1c24;'>
";
}
$message .=
"<span><small style='color:#fff;font-size:10px;font-weight:bolder;'>delivered by Skillizen Learning Global Pte. Ltd. 16 Raffles Quay, #41-01 Hong Leong Building, Singapore, Central Region 048581,Singapore</small> <a href='https://www.newzworm.com/unsubscribe.php'> unsubscribe</a></span>
</div>";
 */
error_reporting(E_ALL);
ini_set('display_errors','1');
//(mail($to,$subject,$message,$headers);
if(mail("himanshugupta9467@gmail.com","himanshu","Hello")){
echo"success";
}else{
echo "fail";
print_r(error_get_last());
}
?>
</body></html>