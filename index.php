<?php
session_start();
/* if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
} */ 

include_once('dashboard/admin/inc/constant.php');
$ipaddress = '';
if (getenv('HTTP_CLIENT_IP'))
$ipaddress = getenv('HTTP_CLIENT_IP');
else if(getenv('HTTP_X_FORWARDED_FOR'))
$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
else if(getenv('HTTP_X_FORWARDED'))
$ipaddress = getenv('HTTP_X_FORWARDED');
else if(getenv('HTTP_FORWARDED_FOR'))
$ipaddress = getenv('HTTP_FORWARDED_FOR');
else if(getenv('HTTP_FORWARDED'))
$ipaddress = getenv('HTTP_FORWARDED');
else if(getenv('REMOTE_ADDR'))
$ipaddress = getenv('REMOTE_ADDR');
else
$ipaddress = 'UNKNOWN';
$ipaddress = trim($ipaddress);
date_default_timezone_set("Asia/Kolkata");
$date=date('d:m:Y');//." ".date('H:i A');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ipaddress"));
$country = $geo["geoplugin_countryName"];
$city = $geo["geoplugin_city"];
$query=mysqli_query($con,"select * from track_report where `ip`='".$ipaddress."'");
if($query){
if(mysqli_num_rows($query)==0){
$query1=mysqli_query($con,"INSERT INTO track_report (ip,date,city,country) VALUES('".$ipaddress."','$date','$city','$country')");
}
}else{
$query1=mysqli_query($con,"INSERT INTO track_report (ip,date,city,country) VALUES('".$ipaddress."','$date','$city','$country')");	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<!--script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58261054-1', 'auto');
  ga('send', 'pageview');

</script-->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114693392-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114693392-1');
</script>


<title>Skillizen: Life Skills Curriculum, Life Skill Education, Education and Training </title>
<meta name="description" content="Is your child ready to lead in 21st century? Atleast not with the prevalent school curriculums that are primarily fact-based curriculums."/>
<meta name="keywords" content="skillizen life skills, life skill education, critical life skills curriculum, life skills games, courses for young people, skills olympiad test, life skills test, skillizen lifeskills training, education and life skills, skills olympiad 2015, life skills activities for kids, international skills olympiad"/>
<link rel="icon" href="dashboard/images/logo-icon.png" type="image/gif" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="index,follow" />
<meta name="distribution" content="Global" />
<meta name="author" content="(c) Copyright skillizen.com 2013-2015"/>
<link href="https://plus.google.com/+SkillizenOrg" rel="publisher">
<meta name="google-site-verification" content="K74241QajWHuH-VYgJ-bwP2EQPik1RUlDT4ZvkOlwtQ" />
<meta name="msvalidate.01" content="F53598008EE771B28DBD198BBBDA0BB6" />
<meta name="alexaVerifyID" content="UHLlkSnAXgg3aNrXOhXd25errdg"/>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pay-poup.css" rel="stylesheet" type="text/css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<!--<link href="css/typed.css" rel="stylesheet">-->
<link href="css/login-css.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52c676dc7784c1ca"></script>
<link rel="stylesheet" href="css/css.css" type='text/css' />
</head>
<body>
<?php include'inc/header.php'?>
<div id='confirmmail'>
<span><i class="fa fa-check" style=''aria-hidden="true"></i></span>
<span>Username &amp; Password has been sent to Your registered email id.</span>
</div>

<!--Banner start here -->
<section class="background-image-holder section-box clearfix">
<div class="container vertical-align">
                        	<div class="row">
								<div class="col-sm-12 text-center">
                                <h1 class="big-white">Where your child meets the real world beyond School</h1>
                                <h3 class="small-white">Open the door for your child towards as exciting version of the real world,<br>
                                where we equip them with different LIFE SKILLS and train them to become
                                 </h3>
                                </div>
                                </div>
							<div class="row">
								<div class="col-sm-12 text-center">
									<h4 class="type-white white-space:pre;"><span id="typed">We just get it.</span></h4>
								</div>
							</div>
						</div>
<div class="container">
    <div class="row">
      <div class="col-md-4 col-xs-12 col-lg-4 col-sm-4">
       <a class="page-scroll" href="#what-box"> <div class="curcle">What</div>
        <div class="text-center home-cont">
        <h3>What are Life Skills ?</h3>
        </div></a>
      </div>
      
      <div class="col-md-4 col-xs-12 col-lg-4 col-sm-4">
        <a class="page-scroll" href="#why-box"><div class="curcle">Why</div>
        <div class="text-center home-cont">
        <h3>Why are Life Skills important ?</h3>
          
        </div></a>
      </div>
      
      <div class="col-md-4 col-xs-12 col-lg-4 col-sm-4">
        <a class="page-scroll" href="#how-box">
        <div class="curcle">How</div>
        <div class="text-center home-cont">
        <h3>How will Life Skills be taught ?</h3>
          
        </div></a>
      </div>
      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
      <div class="text-center form-group">
      <ul class="main-nav">
              <!-- <li><a class="cd-signin" href="#0">Enroll now >></a></li> -->
				<li class="btn enrollnow shadow-none"><a class="cd-signup" href="#0">Enroll now >></a></li>
              </ul>
      </div>
    </div>
    </div>
  </div>	
</section>                                            
<!--Banner end here -->  

<!--Contact social media icon and contact form include start here -->
<?php include'inc/media.php'?>
<!--Contact social media icon and contact form include end here -->

<!--What section -->
<section class="clearfix section-box  child-benfit" id="what-box">
<div class="container">
  <div class="row">
  <div class="col-md-12 col-lg-12 form-group">
      <div class="text-center">
        <h1 class="heading">What are Life Skills ?</h1>
      </div>
     
    </div>
        <div class="col-md-12 col-lg-12">
        <div class="col-md-7 col-lg-7 col-xs-12 col-sm-7">
      <p class="text-line">To be the winner of the race where millions participate, your child needs Life Skills that enables them to achieve the most in the smartest possible way. A child with skills like decision making and problem solving can smoothen his path towards success. 
</p>
       <p class="text-line">The skill of leadership helps your child to take responsibilities and lead others. Negotiation skills help him improve his communication with the outer world. Economic common sense and Entrepreneurship helps him understand the business world. Ethics and values help him understand his surroundings and the human race better.
</p>
    </div>
    <div class="col-md-5 col-lg-5 col-xs-12 col-sm-5">
		<div class="text-center image-box panel panel-default">
			<video controls><source src="video/promo.mp4" type="video/mp4"> </video>
		</div>
    </div>
</div>
  </div>

</div>

</section>
<!--Why section -->
<section class="clearfix section-box what-box" id="why-box">
<div class="container">
<div class="row">
<div class="col-md-12 col-lg-12 form-group">
      <div class="text-center">
        <h1 class="heading1">Why are Life Skills important ?</h1>
      </div>
     
    </div>
<div class="col-md-12 col-lg-12">
  <div class="col-md-5 col-lg-5 col-xs-12 col-sm-5">
  <div class="text-center image-box"> <img src="image/why-img1.png" class="img-circle img-responsive" alt="Why are Life Skills important ?" /> </div>
</div>
<div class="col-md-7 col-lg-7 col-xs-12 col-sm-7">
    <p class="text-line">The ever increasing pace and ever changing nature of modern life brings numerous challenges to us. To cope with these challenges children would need new life skills that would allow them to adapt to these situations and would help them to make the most out of life. </p>
    <h3 class="why-sub"><strong>Life Skills would help your child to-</strong></h3>
    <ul class="why-submenu">
    <li>Find new ways of thinking and problem solving</li>
    <li>Have the potential to lead by influence</li>
    <li>Manage self and understand the business environment</li>
    <li>Manage Time and People</li>
    <li>Form agility and adaptability to different roles and flexible working environments</li>
    <li>Recognize cultural awareness and citizenship which would make international cooperation easier</li>
    <li>Develop negotiation skills, the ability to network and empathize </li>
    </ul>
    <p class="text-line text-right">and many more….</p>
</div>
</div>
</div>

</div>
</section>
<!-- sectionchild will be  start here -->
<section class="clearfix section-box " id="how-box">
<div class="container">
  <div class="row">
  <div class="col-md-12 col-lg-12 form-group">
      <div class="text-center">
        <h1 class="heading">How will Life Skills be taught ?</h1>
      </div>
     
    </div>
  <div class="col-md-12 col-lg-12">
  <div class="col-md-7 col-lg-7 col-xs-12 col-sm-7">

    <p class="text-line">Study to relax- Fun learning is what we prefer. We teach your kids the most complex topics in the most fun way. Easy Concept videos, interesting Case Stories, Quiz and Games will not only educate them but entertain there inquisitive mind. </p>
    <p class="text-line">Learning was never so easy - All you need is a computer and an internet connection. It removes
the traditional boundaries of location and time to offer you the flexibility of learning anywhere, anytime. No physical classroom needed. 
</p>
    <p class="text-line">Make your own schedule and learn at your own convenience. 
Take courses, play games, take quizzes and Olympiad.
</p>
</div>
  <div class="col-md-5 col-lg-5 col-xs-12 col-sm-5">
  <div class="text-center image-box"> <img src="image/how-img1.png" class="img-circle img-responsive" alt="How will Life Skills be taught ?" /> </div>
</div>

</div>
</div>
    
  </div>
</section>
<!--Curriculum section start here -->
<section class="curriculum clearfix section-box how-box"  id="demo">
  <div class="container">
    <div class="row">
	<div class="col-md-12 col-lg-12">
	  <div class="text-center">
          <h1 class="heading1"><span>Select your child&apos;s grade to view curriculum</span></h1>
        </div>
		</div>
        <div class="col-md-12 col-lg-12">
        <div class="navbar-header"> <a  href="#" class="hidden-lg hidden-md hidden-sm navbar-brand" style="color:#a92926;">Select your child Grade</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#grade-number" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="text-center">
          <ul class="grade-number collapse navbar-collapse"  id="grade-number">
            <li class="grade1"><a href="#" data-toggle="modal" data-target="#grade1">1</a></li>
            <li class="grade2"><a href="#" data-toggle="modal" data-target="#grade2">2</a></li>
            <li class="grade3"><a href="#" data-toggle="modal" data-target="#grade3">3</a></li>
            <li class="grade4"><a href="#" data-toggle="modal" data-target="#grade4">4</a></li>
            <li class="grade5"><a href="#" data-toggle="modal" data-target="#grade5">5</a></li>
            <li class="grade6"><a href="#" data-toggle="modal" data-target="#grade6">6</a></li>
            <li class="grade7"><a href="#" data-toggle="modal" data-target="#grade7">7</a></li>
            <li class="grade8"><a href="#" data-toggle="modal" data-target="#grade8">8</a></li>
            <li class="grade9"><a href="#" data-toggle="modal" data-target="#grade9">9</a></li>
            <li class="grade10"><a href="#" data-toggle="modal" data-target="#grade10">10</a></li>
            <li class="grade11"><a href="#" data-toggle="modal" data-target="#grade11">11</a></li>
            <li class="grade12"><a href="#" data-toggle="modal" data-target="#grade12">12</a></li>
          </ul>
        </div>
      </div> 
  </div>
  </div>
</section>
<!--grade 1 -->
<div id="grade1" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Grade one</h4>
            </div>
            <div class="modal-body">
             <iframe class="pdf-box" src="pdf/Grade-1.pdf"></iframe>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--grade 2 -->
<div id="grade2" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Grade Two</h4>
            </div>
            <div class="modal-body">
                <iframe class="pdf-box" src="pdf/Grade-2.pdf"></iframe> 
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--grade 3 -->
<div id="grade3" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Grade Three</h4>
            </div>
            <div class="modal-body">
                <iframe class="pdf-box" src="pdf/Grade-3.pdf"></iframe> 
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--grade 4 -->
<div id="grade4" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Grade Four</h4>
            </div>
            <div class="modal-body">
               <iframe class="pdf-box" src="pdf/Grade-4.pdf"></iframe> 
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--grade 5 -->
<div id="grade5" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Grade Five</h4>
            </div>
            <div class="modal-body">
                <iframe class="pdf-box" src="pdf/Grade-5.pdf"></iframe> 
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--grade 6 -->
<div id="grade6" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Grade Six</h4>
            </div>
            <div class="modal-body">
                <iframe class="pdf-box" src="pdf/Grade-6.pdf"></iframe> 
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--grade 7 -->
<div id="grade7" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Grade Seven</h4>
            </div>
            <div class="modal-body">
                <iframe class="pdf-box" src="pdf/Grade-7.pdf"></iframe> 
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--grade 8 -->
<div id="grade8" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Grade Eight</h4>
            </div>
            <div class="modal-body">
         <iframe class="pdf-box" src="pdf/Grade-8.pdf"></iframe> 
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--grade 9 -->
<div id="grade9" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Grade Nine</h4>
            </div>
            <div class="modal-body">
               <iframe class="pdf-box" src="pdf/Grade-9.pdf"></iframe> 
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--grade 10 -->
<div id="grade10" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Grade Ten</h4>
            </div>
            <div class="modal-body">
                <iframe class="pdf-box" src="pdf/Grade-10.pdf"></iframe> 
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--grade 11 -->
<div id="grade11" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Grade Eleven</h4>
            </div>
            <div class="modal-body">
               <iframe class="pdf-box" src="pdf/Grade-11.pdf"></iframe> 
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--grade 12 -->
<div id="grade12" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Grade Twelve</h4>
            </div>
            <div class="modal-body">
                <iframe class="pdf-box" src="pdf/Grade-12.pdf"></iframe> 
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--video section start here -->
<section class="curriculum  clearfix  section-box">
<div class="container">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <div class="text-center">
        <h1 class="heading"><span>How we transfer skills?</span></h1>
      </div>
    </div>
    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-3">
      <h3 class="sub-heading"><span>LifeSkills</span></h3>
      <ul class="skill-menu">
        <li data-toggle="popover" title="Leading Others" data-content="Out of all the forces that will design the global society, in which all of us will live, work and absorb education, Leadership is one of them. But there is more to it."> Leading Others</li>
        
        <li data-toggle="popover" title="Values and Ethics" data-content="There is nothing more important that having right values and practice ethics. They are imperative skills to succeed in 21st century. Take a look and get Skilled here for free:">Values and Ethics</li>
        
        <li data-toggle="popover" title="Global Citizenship" data-content="Global citizenship is an outlook on life, a belief that we can make a difference. It's a perspective that we are all truly one. Increasingly the world is believing so.">Global Citizenship</li>
        
        <li data-toggle="popover" title="Economic Common Sense" data-content="Economics generates a powerful method for making important decisions. Without this learning can lead to un-thoughtful, bad choices, which generally cost more than they are worth.">Economic Common Sense</li>
        
        <li data-toggle="popover" title="Flexibility and Adaptability" data-content="Responding effectively to change is an important skill for every individual of all backgrounds. These two skills are critical, they overcome any challenges that may come our way.">Flexibility and Adaptability</li>
        
        <li data-toggle="popover" title="Creativity and Innovation" data-content="Creative and innovative is imperative in order to broaden the thinking umbrella purposefully to face the challenges like rising environmental problems.">Creativity and Innovation</li>
        
        <li data-toggle="popover" title="Personal Branding" data-content="It is within your control to project yourself appropriately in any environment. Not only that, it's imperative that we understand what forms our personalities." >Personal Branding</li>
        
        <li data-toggle="popover" title="Decision Making Skills" data-content="Improving our decision-making skills can help us approach decisions with much more clarity and confidence. We make decisions all the time and about everything.">Decision Making Skills</li>
        
        <li data-toggle="popover" title="Personal Finance Sense" data-content="We should recognise that family income may be limited and understand that matching household expenditure against income is important when considering personal finances.">Personal Finance Sense</li>
        
        <li data-toggle="popover" title="Planning and Organisation" data-content="As they say 'Fail to plan, plan to fail'. Nothing gets achieved without proper planning, organising our thoughts." >Planning and Organisation<li>
        <li data-toggle="popover" title="Smart Consumer Literacy" data-content="We are already exposed to consumer behaviour in more ways than one. We go out with our Dad to buy stuffs to super marts, see what happens there.">Smart Consumer Literacy</li>
        
        <li data-toggle="popover" title="Critical Thinking and Problem Solving" data-content="Critical thinking and problem solving is at the heart of most intellectual activity that helps us recognise or develop an argument.">Critical Thinking and Problem Solving</li>
        
        <li data-toggle="popover" title="Social Media Skills" data-content="Would you want to know more about how to use social media in your favour, or would you want to be caught in never ending pursuit of entertainment, resulting into a time waste?">Social Media Skills</li>
        
        <li data-toggle="popover" title="Presentation Skills" data-content="It's all about communication. We all need to communicate with an impact to put across of point of view and ideas. It's as relevant for kids as it is for adults.">Presentation Skills</li>
        
        <li data-toggle="popover" title="Team Work" data-content="The ability to work together with others as part of a team is not simply a skill needed in early stage, it is a vital skill used in all areas of our life.">Team Work</li>
        
        <li data-toggle="popover" title="Research and Analytical Thinking" data-content=" There is enough information surrounding us. We need the ability to make sense of all of that information by doing some research which is nothing but figuring things out.">Research and Analytical Thinking</li>
        
        <li data-toggle="popover" title="Networking Skills" data-content="Networking and collaboration skills are no more a 'good to have' skill, they are must haves for 21st century citizens. It's critical for meaningful and effective results.">Networking Skills</li>
        
        <li data-toggle="popover" title="Negotiation Skills" data-content="Negotiation helps to achieve the desired goal that's win/win for all the parties. It's a skills that's needed in all through lifetime">Negotiation Skills</li>
        
        <li data-toggle="popover" title="Goal Setting" data-content=" Learning to set and work towards goals is an important life skill. Setting goals helps in staying motivated and provides direction.">Goal Setting</li>
        
         <li data-toggle="popover" title="Environment and Sustainability" data-content="What makes an environmentally literate citizen? Given that we are more global than ever, isn't it important to be aware of our environmental health and ensure sustainability.">Environment and Sustainability</li>
         
        <li data-toggle="popover" title="Empathy and Compassion" data-content="Empathy is one of the fundamental moral emotions. It's an emotion and expression that pushes people to act compassionately while reasoning alone might not">Empathy and Compassion</li>
        
         <li data-toggle="popover" title="Influencing" data-content=" Engaging and Influencing are both necessary life skills. So much so that very little can be achieved in absence of these two skills." >Influencing</li>
         
         <li data-toggle="popover" title="Entrepreneurship" data-content="Being able to solve a problem creatively and with full zest. Having an entrepreneurial bent is a must have in 21st century.">Entrepreneurship</li>
         
         <li data-toggle="popover" title="Self Management" data-content="Self-Management is an essential skill for the one who aims to be highly efficient, effective and influential. It is important to recognize that as a citizen.">Self Management</li>
         
       <li data-toggle="popover" title="Virtual Productivity" data-content="We all access information from internet now. It's our source of information. Have we ever thought of using it to our advantage? A lot of the time we get into this maze of search and feel lost instead of productive" >Virtual Productivity</li>
            
      </ul>
    </div>
    <div class="col-md-9 col-lg-9 col-xs-12 col-sm-9">
      <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6">
        <h3 class="sub-heading"><span>Skilling Session</span></h3>
        <p class="video-text"> An online platform where your child receives a complete package of fun and learning compiled together. </p>
        <div class="panel panel-default panel-body">
        <a href="#skilling-session" data-toggle="modal" title="Skilling Session"><img alt="Skilling Session" title="Skilling Session" src="image/skilling-session.jpg" class="img-responsive"/></a>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6">
        <h3 class="sub-heading"><span>Case Story</span></h3>
        <p class="video-text">A short animated movie for your child to understand how Life Skills work in the real life. </p>
        <div class="panel panel-default panel-body"> 
         <a href="#case-story" data-toggle="modal" title="Case Story"><img alt="Case Story" title="Case Story" src="image/case-story.jpg" class="img-responsive"/></a>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6">
        <h3 class="sub-heading"><span>Concept Video</span></h3>
        <p class="video-text">An online digital class room where your kids learn complex concepts of Life Skills in the most interesting way. </p>
        <div class="panel panel-default panel-body">
        <a href="#concept-video" data-toggle="modal" title="Concept Video"><img alt="Concept Video" title="Concept Video" src="image/concepts.png" class="img-responsive"/></a>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6">
        <h3 class="sub-heading"><span>Skill Game</span></h3>
        <p class="video-text">Specially designed exciting games for children to sharpen their Life Skills. </p>
        <div class="panel panel-default panel-body">
         <a href="#activity" data-toggle="modal" title="Skill Game"><img alt="Skill Game" title="Skill Game" src="image/activity.png" class="img-responsive" /></a></div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6">
        <h3 class="sub-heading"><span>Situational skill simulation </span></h3>
        <p class="video-text">Carefully drafted questions to put your kids in ‘real life situation’ to test what they have learnt.</p>
        <div class="panel panel-default panel-body">
        <a href="#ques" data-toggle="modal" title="Situational skill simulation"><img alt="Situational skill simulation" title="Situational skill simulation" src="image/smulation.png" class="img-responsive"/></a>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6">
        <h3 class="sub-heading"><span>Real world skills practice</span></h3>
        <p class="video-text">Assignments for your kids to implement Life Skills in their own real life. </p>
        <div class="panel panel-default panel-body">
        <a href="#realworld" data-toggle="modal" title="Real world skills practice"><img title="Real world skills practice" alt="Real world skills practice" src="image/realworld.png" class="img-responsive"/></a>
         </div>
      </div>
      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="text-center form-group">
        <ul class="main-nav">
				<li class="btn enrollnow"><a class="cd-signup" href="#0">Enroll now >></a></li>
              </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!--Footer start here -->
<?php include'inc/footer.php'?>
<div id="demo-boxhere" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="payment-hader mar0">
                <button type="button" class="close color" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Come on board and see how we teach</h3>
            </div>
            <div class="modal-body">
                <p class="demo-cont">Below are some examples of various tools that we use such as Animated Stories, Videos to explain difficult concepts, Games, Question and Assignments.  </p>
            </div>
            
        </div>
    </div>
</div>

<script>

var isFirstShowCall = false;

$('#demo-boxhere').on('show.bs.modal', function (e) {
    isFirstShowCall = !isFirstShowCall; // Prevents an endless recursive call
    if (isFirstShowCall) {
        e.preventDefault(); // Prevent immediate opening
        window.setTimeout(function () {
            $('#demo-boxhere').modal('show');
        }, 1500)
    }
});
//page load popup script here
$('#free-popup').modal('hide');

setTimeout(function() {
    $('#free-popup').modal('show');
}, 7000);
 </script> 
<!-- Skilling Session popup start here -->
    <div id="skilling-session" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center">Skilling session- Goal Setting</h4>
                </div>
                <div class="modal-body">
                     <video controls><source src="video/online-session.mp4" type="video/mp4"> </video>
                    
                </div>
            </div>
        </div>
    </div>
<!-- Case story popup start here -->
    <div id="case-story" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center">Case Story- Economics- Concept of Trade</h4>
                </div>
                <div class="modal-body">
                    <video controls><source src="video/case-story.mp4" type="video/mp4"> </video>
                </div>
            </div>
        </div>
    </div>
<!-- Concept video popup start here -->
    <div id="concept-video" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="mmodal-title text-center">Concept Video- Economics- Concept of Opportunity Cost</h4>
                </div>
                <div class="modal-body">
                     <video controls><source src="video/concept-video.mp4" type="video/mp4"> </video>
                </div>
            </div>
        </div>
    </div>
<!-- Skill Game popup start here--> 
    <div id="activity" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content clearfix">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center">Skill Activity- Entrepreneurship</h4>
                </div>
                <div class="modal-body">
                 <iframe class="pdf-box" src="activity/index.html"></iframe> 
                </div>
            </div>
        </div>
    </div>
<!-- Situational skill simulation  popup start here -->
    <div id="ques" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content clearfix">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center"><strong>Situational Skill Simulation</strong> </h4>
                </div>
                <div class="modal-body clearfix">
                <div class="col-lg-12 ques-devi1">
                <h4>You see a toolbox and find lots of things. It has screws, screw driver, etc. <br>Ques:- What resources are these?</h4>
        <ul class="demo-ques">
        <li>Natural Resources</li>
        <li>Human Resources</li>
        <li>Capital Resources <img src="image/right-icon.png" alt="right" /></li>
        <li>None of the above </li>
        </ul>
        <p><b>Option C-</b>This is the right choice as tool-boxes are goods made to help in work</p>
                </div>
                 <div class="clearfix"></div>
                   <hr class="linedevi"/>
                <div class="col-lg-12 ques-devi1">
                <h4>Ques:-Someone posts an objectionable comment on your picture, what do you do?</h4>
        <ul class="demo-ques">
        <li>Agree with what they said and laugh it off</li>
        <li>Pick a fight with them</li>
        <li>Block them <img src="image/wrong.png" alt="wrong" /></li>
        <li>Reply to them making them realise how they offended you and how they should learn to use better words in the future </li>
        </ul>
        <p><b>Option C-</b>This is the wrong answer as the person will still post such offending comments on other people’s pictures</p>
                
                
                </div>
                <div class="clearfix"></div>
                   <hr class="linedevi"/>
                   <div class="col-lg-12 ques-devi1">
                <h4>You are a class 10th student and your life-time goal is to become an Engineer. What will be your immediate goal towards achieving your long-term goal?</h4>
        <ul class="demo-ques">
        <li>Choose Physics, Chemistry and Math as your core subjects in Class 11th. <img src="image/right-icon.png" alt="right icon" /></li>
        <li>Go to an engineering college</li>
        <li>Choose Commerce as your core subject</li>
        <li>Choose to drop out of the college to gain practical knowledge.</li>
        </ul>
        <p><b>Option A-</b>Correct answer as choosing your core subjects in Class 11 th is an immediate goal which could lead you to your life-time goal of becoming an engineer.</p>
                </div>
                 <div class="clearfix"></div>
                   <hr class="linedevi"/>
                <div class="col-lg-12 ques-devi1">
                <h4>You do not know how to act in a play. Your name has been given for participation and your role is very close to the way you are in real life.<br>
Q: What will make you do this role?</h4>
        <ul class="demo-ques">
        <li>The opportunity</li>
        <li>The character</li>
        <li>Self – Esteem <img src="image/right-icon.png" alt="right" /></li>
        <li>I am being forced </li>
        </ul>
        <p><b>Option C-</b>It is Self Esteem that helps us in converting our weakness into a strength.</p>
                
                
                </div> 
                </div>
            </div>
        </div>
    </div>
<!-- Real world skill practice  popup start here -->
    <div id="realworld" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content clearfix">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center"><strong>Real world skill practice</strong> </h4>
                </div>
                <div class="modal-body clearfix">
                <div class="col-lg-12 ques-devi1">
                <h4><strong>1.</strong>Observe the captain of your national games team and state any 3 incidents that makes you believe that he has a good self – esteem. (You may pick up any sport of your</h4>
        
                </div>
                 <div class="clearfix"></div>
                   <hr class="linedevi"/>
                <div class="col-lg-12 ques-devi1">
                <h4><strong>2.</strong>Think about what you want in life. Set one personal long-term goal. Try making it as specific as possible and suggest how much time it may take to achieve that goal.</h4>
                </div>        
                </div>
            </div>
        </div>
    </div>
</body>
</html>
