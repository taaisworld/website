<?php require_once('Connections/connected.php');?>
<?php require_once('Connections/functions.php');?>




<?php 
$website_host=domain();
$website_url=$website_host.$_SERVER['REQUEST_URI'];
setcookie("site",$website_url, strtotime( '+30 days' ), "/", "", "", TRUE);
$news_slide_query = mysqli_query($mydatabase2,"SELECT*FROM taaisnews ORDER BY updated DESC LIMIT 7");
$count_news = mysqli_num_rows($news_slide_query);


$news_slide_query_port = mysqli_query($mydatabase2,"SELECT*FROM taaisnews ORDER BY updated DESC LIMIT 7");
$count_news_port = mysqli_num_rows($news_slide_query_port);

$gallery_sql=mysqli_query($mydatabase2,"SELECT*FROM media WHERE(media_type='images' AND folder='shared') ORDER BY updated DESC LIMIT 20");
$gallery_count=mysqli_num_rows($gallery_sql);

$video_sql=mysqli_query($mydatabase2,"SELECT*FROM media WHERE(media_type='videos' AND folder='shared') ORDER BY updated DESC LIMIT 1");
$video_count=mysqli_num_rows($video_sql);
$video_row=mysqli_fetch_assoc($video_sql);
$featured_video=$website_host.''.$video_row['path'];


$featured_news_sql=mysqli_query($mydatabase2,"SELECT*FROM taaisnews WHERE(visible='1') ORDER BY updated DESC LIMIT 1");
$count_featured=mysqli_num_rows($featured_news_sql);
$featured_news_row=mysqli_fetch_assoc($featured_news_sql);
$news_thumbnail_square=$website_host.''.$featured_news_row['thumbnail'];

$news_link=$website_host.'/'.$featured_news_row['path'].'/'.$featured_news_row['friendly_url'];



$latest_news_sql=mysqli_query($mydatabase2,"SELECT*FROM taaisnews WHERE(visible='1') ORDER BY updated DESC LIMIT 10");
$count_latest_news=mysqli_num_rows($latest_news_sql);



$about_sql=mysqli_query($mydatabase2,"SELECT*FROM about WHERE(visible='1') ORDER BY updated DESC");
$count_about=mysqli_num_rows($about_sql);



$blog_sql=mysqli_query($mydatabase2,"SELECT*FROM taaisnews WHERE(visible='1' AND cat='Blog') ORDER BY updated DESC LIMIT 1");
$count_blog=mysqli_num_rows($blog_sql);
$blog_row=mysqli_fetch_assoc($blog_sql);
$blog_thumbnail_square=$website_host.''.$blog_row['thumbnail_square'];
$blog_thumbnail=$website_host.''.$blog_row['thumbnail'];

$blog_link=$website_host.'/'.$blog_row['path'].'/'.$blog_row['friendly_url'];


$article_sql=mysqli_query($mydatabase2,"SELECT*FROM taaisnews WHERE(visible='1' AND cat='Article') ORDER BY updated DESC LIMIT 1");
$count_article=mysqli_num_rows($article_sql);
$article_row=mysqli_fetch_assoc($article_sql);
$article_thumbnail_square=$website_host.''.$article_row['thumbnail_square'];
$article_thumbnail=$website_host.''.$article_row['thumbnail'];

$article_link=$website_host.'/'.$article_row['path'].'/'.$article_row['friendly_url'];


$tech_sql=mysqli_query($mydatabase2,"SELECT*FROM taaisnews WHERE(visible='1' AND cat='Technology') ORDER BY updated DESC LIMIT 1");
$count_tech=mysqli_num_rows($tech_sql);
$tech_row=mysqli_fetch_assoc($tech_sql);
$tech_thumbnail_square=$website_host.''.$tech_row['thumbnail_square'];
$tech_thumbnail=$website_host.''.$tech_row['thumbnail'];

$tech_link=$website_host.'/'.$tech_row['path'].'/'.$tech_row['friendly_url'];


$game_sql=mysqli_query($mydatabase2,"SELECT*FROM taaisnews WHERE(visible='1' AND cat='Gaming') ORDER BY updated DESC LIMIT 1");
$count_game=mysqli_num_rows($game_sql);
$game_row=mysqli_fetch_assoc($game_sql);
$game_thumbnail_square=$website_host.''.$game_row['thumbnail_square'];
$game_thumbnail=$website_host.''.$game_row['thumbnail'];

$game_link=$website_host.'/'.$game_row['path'].'/'.$game_row['friendly_url'];


$media_sql=mysqli_query($mydatabase2,"SELECT*FROM taaisnews WHERE(visible='1' AND cat='Media') ORDER BY updated DESC LIMIT 1");
$count_media=mysqli_num_rows($media_sql);
$media_row=mysqli_fetch_assoc($media_sql);
$media_thumbnail_square=$website_host.''.$media_row['thumbnail_square'];
$media_thumbnail=$website_host.''.$media_row['thumbnail'];

$media_link=$website_host.'/'.$media_row['path'].'/'.$media_row['friendly_url'];

//$news_slide_row = mysqli_fetch_array($news_slide_query);
//$avatar_not = $row_not_users['avatar'];
//$user_id=$row_not_users['user_id'];

//$slide_uni_id=$news_slide_row['uni_id'];

         if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
   $website_host = $protocol . "://" . $_SERVER['HTTP_HOST'];

?>


<!doctype html><html lang="en"><!-- InstanceBegin template="/Templates/taaisworld.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<?php require_once('Connections/login_session.php');?>
<?php require_once('Connections/functions.php');?>
<?php



   
setcookie("site",$website_url, strtotime( '+30 days' ), "/", "", "", TRUE);
//echo $_COOKIE['site'];
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Andrew Udoh"/>
<meta name="robots" content="index, follow"/>
<meta name="revisit-after" content=" 1 days"/>
<link rel="alternate" type="application/rss+xml" title="TAAISWORLD RSS" href="<?php echo rss_location($website_host) ?>" />
<meta property="fb:app_id"               content="151230722111536" />
<meta name="google-signin-client_id" content="949566134365-6calpsi0jlmpeobh99ksdkto0tf365bi.apps.googleusercontent.com">
<!--<meta name="theme-color" content="#60C">----><!-------PURPLE-------->
<meta property="og:site_name" content="TAAISWORLD" />
<meta property="og:type" content="website" />
<meta name="theme-color" content="#000"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<!-- InstanceBeginEditable name="doctitle" -->
<meta name="keywords" 				   content="TAAIS, WORLD, TAAISWORLD, Entertainment"/>
<meta property="og:description" content="TAAISWORLD; sharing news and entertainment about Technologies and projects" />
<meta property="og:image" 			   content="<?php echo $website_host?>/taaisworld_graphics/taaislogo_optimised.png"/>
<meta property="og:title"              content="TAAISWORLD. Technologies Absolute Artistic Ingenious System World" />
<meta property="og:url"                content="<?php echo $website_host?>" />
<meta property="og:type"               content="article" />



<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="TAAIS World">
<meta itemprop="description" content="TAAIS World Homepage">
<meta itemprop="image" content="<?php echo $website_host?>/taaisworld_graphics/taaislogo_optimised.png">


<title>TAAIS World</title>
<!--<link href="css/taaisworldcss/home/home_css769.css" rel="stylesheet" type="text/css">-->
<link href="css/taaisworldcss/home/home_css769_slimline.css" rel="stylesheet" type="text/css">
<link href="css/taaisworldcss/home/home_css481.css" rel="stylesheet" type="text/css">
<link href="css/taaisworldcss/home/home_css480.css" rel="stylesheet" type="text/css">
<!-- InstanceEndEditable -->

<link href="boilerplate.css" rel="stylesheet" type="text/css">
<?php if(($url_path_1=="news") ||($url_path_1=="about") || ($url_path_1=="")||($url_path_1=="error.php")||($url_path_1=="index.php")||($url_path_1=="index"))
{
	
?>
<link href="css/taaisworldcss/taaisworld769.css" rel="stylesheet" type="text/css">
<?php }  ?>

<?php 
if(($url_path_1=="gallery") ||($url_path_1=="project"))  
{
	
?>
<link href="css/taaisworldcss/taaisworld769_slimline.css" rel="stylesheet" type="text/css">

<?php } ?>
<link href="css/taaisworldcss/taaisworld481.css" rel="stylesheet" type="text/css">
<link href="css/taaisworldcss/taaisworld480.css" rel="stylesheet" type="text/css">
<style type="text/css">

html, body {
}
html { 
height: 100%;

}


body {
	background-color: #000000;
	color: #FFF;
	  -webkit-animation: fadein 1.5s;
	  <?php if($loading_page==1) { ?>
	 background:url(<?php echo $loading_image ?>) no-repeat center center fixed;
	 <?php } ?>
	 /*background: linear-gradient( rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75) ), url() no-repeat center center fixed; */
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
	overflow-x: hidden;
	font-size: 100%;
	overflow-y:hidden;
	overflow-x:hidden;
	
}


h1 {
    font-size: 2em;
}

h2 {
    font-size: 1.5em;
}

h3 {
    font-size: 0.87em;
}

h4 {
    font-size: 1em;
}

h5 {
    font-size: 1.5em;
}

p {
    font-size: 1em;
}


::-webkit-scrollbar {
    width: 10px;
	background-color: rgba(0,0,0,1);
	/*background-image:url(../tconnecx/graphics/scroll_bar.png); */
	background-repeat:repeat;
	
}


::-webkit-scrollbar-track {
 -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
 border-radius: 10px;
  background-repeat:repeat;
 /*background-image:url(../tconnecx/graphics/scroll_bar.png);*/
}
 
::-webkit-scrollbar-thumb {
 border-radius: 10px;
 -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
 
 background:url(tconnecx/graphics/scroll_track.png);

 background:#540099;
 /*background:#666;*/
 background-repeat:repeat;
/*background:#666;*/
}


::selection {
 /* background: #ffb7b7;  WebKit/Blink Browsers */
  background:#C0F;
}
::-moz-selection {
  /*background: #ffb7b7;  Gecko Browsers */
   background:#C0F;
}

<?php if(($url_path_1=="gallery") ||($url_path_1=="project"))  
{
	
?>
#not_nav {
background-image:url(taaisworld_graphics/top_navbar.png);
}
<?php 

}

?>


</style>



<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 
 
 <!--<script src="sandbox/slideshow/jquery-1.4.2.min.js"></script>-->
<!--<script src="../js/main.js"></script>-->

<script src="js/ajax.js"></script>
<script data-ad-client="ca-pub-7463877082758360" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script src="js/fb.js"></script>
<script src="js/google_login.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="respond.min.js"></script>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<script src="tconnecx/js/SpryAccordion.js" type="text/javascript"></script>
<script src="js/wysiwyg_comments.js" type="text/javascript"></script>
<script src="js/clock.js"></script>


	

<script>
window.onload = function() {
  startTime();
  <?php if($loading_page==1)
  { ?>
  myFunction();
  <?php } ?>
   nav_menu();
  window.onresize = screen_op;
  screen_op();
  gapi.load('auth2', function() {
        gapi.auth2.init();
      });
  
}; 

</script>






<?php if ($login==0)
{
?>
<!--<script>
function GEOprocess(position) {
	// update the page to show we have the lat and long and explain what we do next
  //document.getElementById('location_gen').value =position.coords.latitude;
   document.getElementById('lat').value=position.coords.latitude;
    document.getElementById('long').value =position.coords.longitude;
}



// this is used when the visitor bottles it and hits the "Don't Share" option
function GEOdeclined(error) {
  document.getElementById('location_gen').innerHTML = 'Error: ' + error.message;
}

if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(GEOprocess, GEOdeclined);
}else{
  document.getElementById('location_gen').innerHTML = 'Your browser sucks. Upgrade it.';
}
</script>
-->
<?php 

}

?>
<script type="text/javascript">



  function screen_op()
   {
	var screen_width = screen.width;
	var screen_height = screen.height;
	//alert(screen_width);
	var screen769 = window.matchMedia( "(min-width: 1366px)" );
	var screen481 =   window.matchMedia( "(min-width: 481px)" );
	var screen1365 =   window.matchMedia( "(max-width: 1365px)" );
	var screen480 = window.matchMedia( "(max-width: 480px)" );
	
	if (screen769.matches) {
	var nav = 90+'px';
	//alert("large");
	}
	
	if ((screen481.matches) && (screen1365.matches)) {
	var nav = 75+'px';
	//alert("medium");
	}
	
	if (screen480.matches) {
	//var nav = 75+'px';
	//alert("small");
	}
	document.getElementById("suggestion").style.maxHeight = screen_height-nav;
	if((screen_height>800) && (screen_width<1366))
	{
	document.getElementById("nav_content").style.zoom ="150%";	
	}
	
	if((screen_height<=800) && (screen_width<1366))
	{
	document.getElementById("nav_content").style.zoom ="125%";	
	}
	
	if(screen_width>=1366)
	{
	document.getElementById("nav_content").style.zoom ="150%";	
	}
	
	if(screen_width<=480)
	{
	document.getElementById("nav_content").style.zoom ="100%";	
	}
   }
function nav_menu() 
{
	
	 var site = "<?php echo $website_host; ?>";
	 var test_url = "<?php echo $_SERVER['SCRIPT_NAME']; ?>";

	
	var url=site+"/parse/main_menu.php";
	var xhr;

 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
/**********************************************************/

var data = "test_url="+test_url;


     xhr.open("POST", url, true); 
	
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 //xhr.send(filterb);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
     // alert(xhr.responseText);	   
	//alert('NO problem with the request.');dialogue_content
	  //document.getElementById("suggestion").innerHTML =xhr.responseText;
	
	
	 
	document.getElementById("nav_content").innerHTML =xhr.responseText;
	//document.getElementById("nav_content").style.zoom ="200%";
	 }
	 
	 
	
	
	  } else {
        //alert('There was a problem with the request.');
     
	  }
     }
	}





function showPage() {
  //document.getElementById("loader").style.display = "none";
  //document.getElementById("page").style.display = "block";
  
}

var mymenu_switch=0;
var mynav_switch=0;

var saved_login_panel;

function menu_switch()
{
if(mymenu_switch==0)
	{
	
	ts_openNav();
	
	
	
	
	mymenu_switch=1;
	return;	
	}	
	
	if(mymenu_switch==1)
	{
	
	//CollapsiblePanel_user.close();
	
	ts_closeNav();	
	mymenu_switch=0;
	return;
	}
	
	
}


function nav_switch()
{
if(mynav_switch==0)
	{
	
	CollapsiblePanel_user.open();
	mynav_switch=1;
	return;	
	}	
	
	if(mynav_switch==1)
	{
	
	CollapsiblePanel_user.close();
	mynav_switch=0;
	return;
	}
	
	
}
function nav_links(mylink)
{
var nav;

if(mylink=="home")
{
nav = "http://"+window.location.hostname;
}

if(mylink=="news")
{
nav = "<?php echo $website_host.'/news/'?>";
}

if(mylink=="gallery")
{
nav = "<?php echo $website_host.'/gallery/'?>";

}

if(mylink=="media")
{
nav = "<?php echo $website_host.'/media/'?>";
}

if(mylink=="project")
{
nav = "<?php echo $website_host.'/project/'?>";
}

if(mylink=="about")
{
nav = "<?php echo $website_host.'/about/'?>";
}

if(mylink=="rss")
{
//nav = "http://"+window.location.hostname+"/trss/allrss.xml";
nav = "<?php echo $website_host.'/rss/'?>";
}

<?php if ($user_group=="admin") { ?>
if(mylink=="admin")
{
//nav = "http://"+window.location.hostname+"/tadmin/";
nav = "<?php echo $website_host.'/tadmin/'?>";
}
<?php } ?>
if(mylink=="facebook")
{
nav = "https://www.facebook.com/TAAIS.entertainment";
}

if(mylink=="youtube")
{
nav = "https://www.youtube.com/channel/UCGd4ALO9Qr9clSSLb3NkKnw";
}

if(mylink=="twitch")
{
nav = "https://www.twitch.tv/taaisworld";
}

if(mylink=="google")
{
nav = "https://play.google.com/store/apps/dev?id=6769415490682960758";
}

if(mylink=="microsoft")
{
nav = "https://www.microsoft.com/store/productId/9NWJL5NJBC4H";
}


window.location.href = nav;	
}

function ts_openNav() {
	
	/*var screen769 = window.matchMedia( "(min-width: 1366px)" );
	var screen481 =   window.matchMedia( "(min-width: 481px)" );
	var screen480 = window.matchMedia( "(max-width: 480px)" );
	*/
	
	var screen_width = screen.width;
	var screen_height = screen.height;
	var screen769 = window.matchMedia( "(min-width: 1366px)" );
	var screen481 =   window.matchMedia( "(min-width: 481px)" );
	var screen1365 =   window.matchMedia( "(max-width: 1365px)" );
	var screen480 = window.matchMedia( "(max-width: 480px)" );
    
	//cms_menu();
	if (screen769.matches) {
		document.getElementById("ts_nav").style.width = "30%";
   
	}
	
	

	
	else if (screen481.matches) {
	
    
	if((screen_height>800) && (screen_width<1366))
	{
	document.getElementById("ts_nav").style.width = "80%";
	document.getElementById("profile_title_mini").style.width = "70%";
	document.getElementById("profile_title_mini").style.marginLeft = "2%";
	
	}
	
	if((screen_height<=800) && (screen_width<1366))
	{
	document.getElementById("ts_nav").style.width = "40%";
	document.getElementById("profile_title_mini").style.width = "30%";
	document.getElementById("profile_title_mini").style.marginLeft = "5%";
	}
	
	}
	
	
		else if (screen480.matches) {
	document.getElementById("ts_nav").style.width = "100%";
   
	}


}

function ts_closeNav() {
	
    document.getElementById("ts_nav").style.width = "0";
  
	
}

function login_go()
{
	 var site = "<?php echo $website_host; ?>";
	 var username= document.getElementById("username").value;
	 var password=document.getElementById("password").value;
	 var lat= document.getElementById("lat").value;
	 var long=document.getElementById("long").value;
	 var cookie = document.getElementById("cookie").checked;
	 

	
	
	if(username=="")
	{
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>Username cannot be blank</h2>";
	document.getElementById('result').scrollIntoView();
	exit();	
	}
	
	if(password=="")
	{
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>Password cannot be blank</h2>";
	document.getElementById('result').scrollIntoView();
	exit();	
	}

		function sizer()
	{
	 
            
			CollapsiblePanel_user.open()
			
		 
	document.getElementById ("input_box").style.height = "auto";
	
            
	}
	var url=site+"/parse/login.php";
	var xhr;
	
	 document.getElementById("result").innerHTML ="<h1 align='center'>LOGGING IN....</h1>";
	 document.getElementById("password").value="";
	document.getElementById('result').scrollIntoView();
	 
	

 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
/**********************************************************/

var data = "username="+username+"&password="+password+"&lat="+lat+"&long="+long+"&cookie="+cookie;


     xhr.open("POST", url, true); 
	
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 //xhr.send(filterb);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
     
	
		 if (xhr.responseText==1)
	 {
	 setInterval(out,3000);
	document.getElementById("result").innerHTML ="<h1 align='center'>Login Successful..</h1><h2 align='center' style='color:#ffff00;'>Please wait, you will be redirected</h2>";
	setTimeout(sizer());
	 }
	 
	 
	 	 if (xhr.responseText==0)
	 {
	document.getElementById("result").innerHTML ="<h1 align='center' style='color:#ffff00;'>Login Failed.</h1><h2 align='center'>Your Username or Password is incorrect</h2>";
	setTimeout(sizer());
	 }
	 
	 if((xhr.responseText!=0) && (xhr.responseText!=1))
	 {
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>"+xhr.responseText+"</h2>";
	//setTimeout(sizer());	 
	 }
	 document.getElementById('result').scrollIntoView();

	  } else {
        //alert('There was a problem with the request.');
     
	  }
     }
	}


}


function logout_go() 
{
	
	 var site = "<?php echo $website_host; ?>";
	 
	
	// var lat= document.getElementById("lat").value;
	// var long=document.getElementById("long").value;
	 var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      
    });
    
	var url=site+"/parse/logout.php";
	var xhr;
	
	 document.getElementById("result").innerHTML ="<h2 align='center'>Logging Out....</h2>";
	//document.getElementById("username").value="";
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
/**********************************************************/

var data = "username="+site+"&password="+site+"&lat="+site+"&long="+site;


     xhr.open("POST", url, true); 
	
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 //xhr.send(filterb);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
    
	
		 if (xhr.responseText==1)
	 {
	 setInterval(out2,3000);
	document.getElementById("result").innerHTML ="<h2 align='center'>Logout Successful</h2>";
	 }
	 
	 
	
	
	  } else {
        //alert('There was a problem with the request.');
     
	  }
     }
	}


}

	
	
	function out()
	{
	
	 	var site = "<?php echo $website_host; ?>";
	  
	   if (document.getElementById("site").checked)
    {
	 <?php if($website_url) { ?>
	 var  cookie = "<?php echo $website_url; ?>";
	 <?php } ?>
	 
	  <?php if(!$website_url) { ?>
	 var  cookie = "<?php echo $website_host; ?>";
	 <?php } ?>
	 
	 }
	 
	    
		
		if (!document.getElementById("site").checked)
    {
	 var  cookie = "<?php echo $website_host."/welcome" ?>";
	 }
	 
	 
	 
window.location.href = cookie;		
	
	}
	
	
	
	
	
		
	function out2()
	{
	
	 var  cookie2 = "<?php echo $website_url; ?>";
	 
	 window.location.href =cookie2;		
	}
	
	
	
	function login_panel()
	{
	document.getElementById("input_box").innerHTML =saved_login_panel;
	CollapsiblePanel_user.open();
	}
	
	function user_panel()
	{
	document.getElementById("my_input").innerHTML =saved_login_panel;
	CollapsiblePanel_user.open();
	}
	
	
	
	
	
		function recover_action()
{
	 var site = "<?php echo $website_host; ?>";
	 var email=document.getElementById("email").value;
	 
	

	 if(email=="")
	{
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>Email cannot be blank</h2>";
	goo =setTimeout(sizer());
	exit();	
	}
	
	var url=site+"/parse/forgot_login_parse.php";
	var xhr;
	
	 document.getElementById("result").innerHTML ="<h1 align='center'>Please Wait....</h1>";
	
	//document.getElementById("username").value="";
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
/**********************************************************/

var data = "email="+email;


     xhr.open("POST", url, true); 
	
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
    
	
	
		 if (xhr.responseText==1)
	 {
	 //setInterval(out,3000);
	document.getElementById("result").innerHTML ="<h2 align='center'>GREAT!! An Email has been sent to you containing your login details</h2>";
	
	setInterval(login_panel,3000);
	
	 }

	 if((xhr.responseText!=0) && (xhr.responseText!=1))
	 {
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>"+xhr.responseText+"</h2>";
	//setTimeout(sizer());	 
	 }
	document.getElementById('result').scrollIntoView();
	  } else {
        //alert('There was a problem with the request.');
     
	  }
     }
	}


}
	
	
	function signup_action()
{
	 var site = "<?php echo $website_host; ?>";
	 var name=document.getElementById("name").value;
	 var surname=document.getElementById("surname").value;
	 var username= document.getElementById("username").value;
	 var password=document.getElementById("password").value;
	 var password2=document.getElementById("password2").value;
	 var email=document.getElementById("email").value;
	 var day=document.getElementById("day").options[document.getElementById("day").selectedIndex].value;
	 var month=document.getElementById("month").options[document.getElementById("month").selectedIndex].value;
	 var year=document.getElementById("year").options[document.getElementById("year").selectedIndex].value;
	 var gender_m =document.getElementById("gender_0").checked;
	 var gender_f =document.getElementById("gender_1").checked;
	 var lat="";
	 var long="";
	 /*
	 var lat= document.getElementById("lat").value;
	 var long=document.getElementById("long").value;
	 */
	 if(gender_m=="1")
	 {
	 var gender = "Male";	 
	 }
	 
	  if(gender_f=="1")
	 {
	 var gender = "Female";	 
	 }
	 
	  if(name=="")
	{
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'> First name cannot be blank</h2>";
	document.getElementById('result').scrollIntoView();
	exit();	
	}
	
	
	
	 if(surname=="")
	{
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>Surname cannot be blank</h2>";
	document.getElementById('result').scrollIntoView();
	exit();	
	}
	
	
	 if(email=="")
	{
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>Email cannot be blank</h2>";
	document.getElementById('result').scrollIntoView();
	}
	
	 if(username=="")
	{
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>Username cannot be blank</h2>";
	document.getElementById('result').scrollIntoView();
	exit();	
	}
	
	if(document.getElementById("username").value.length < 4)
	{
		document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>Username needs to be longer</h2>";
	document.getElementById('result').scrollIntoView();
	exit();	
	}
	 if(password=="")
	{
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>Password cannot be blank</h2>";
	document.getElementById('result').scrollIntoView();
	exit();	
	}
	
	if(document.getElementById("password").value.length < 6)
	{
		document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>Password needs to atleast six(6) characters long</h2>";
	document.getElementById('result').scrollIntoView();
	exit();	
	}
	
	 if(password!=password2)
	{
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>Password and confirmed password don't match </h2>";
	document.getElementById('result').scrollIntoView();
	exit();	
	}
	
	
		 if((gender_m=="0") && (gender_f=="0"))
	{
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>Please select your gender</h2>";
	document.getElementById('result').scrollIntoView();
	exit();	
	}
	
	
	 if(day=="")
	{
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>Please select the Day of your Birthday</h2>";
	document.getElementById('result').scrollIntoView();
	exit();	
	}
	
	 if(month=="")
	{
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>Please select the Month of your Birthday</h2>";
	document.getElementById('result').scrollIntoView();
	exit();	
	}
	
	 if(year=="")
	{
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>Please select the Year of your Birthday</h2>";
	document.getElementById('result').scrollIntoView();
	exit();	
	}

	var url=site+"/parse/signup_parse.php";
	var xhr;
	
	 document.getElementById("result").innerHTML ="<h1 align='center'>SIGNING UP....</h1>";
	 document.getElementById('result').scrollIntoView();
	 document.getElementById("password").value="";
	 document.getElementById("password2").value="";

 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
/**********************************************************/

var data = "username="+username+"&password="+password+"&lat="+lat+"&long="+long+"&name="+name+"&surname="+surname+"&email="+email+"&gender="+gender+"&day="+day+"&month="+month+"&year="+year;


     xhr.open("POST", url, true); 
	
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 //xhr.send(filterb);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
	
	
		 if (xhr.responseText==1)
	 {
	 
	document.getElementById("result").innerHTML ="<h1 align='center'>Signup Successful..</h1><h2 align='center' style='color:#ffff00;'>Sign Up successful. An Email has been sent to you. Welcome to TAAISWORLD!</h2>";
	
	setTimeout(login_panel,3000);
	 }
	 
	 
	 	 if (xhr.responseText==0)
	 {
	document.getElementById("result").innerHTML ="<h1 align='center' style='color:#ffff00;'>Signup Failed.</h1><h2 align='center'>Your Username or Password is incorrect</h2>";
	 }
	 
	 if((xhr.responseText!=0) && (xhr.responseText!=1))
	 {
	document.getElementById("result").innerHTML ="<h2 align='center' style='color:#ffff00;'>"+xhr.responseText+"</h2>";
	//setTimeout(sizer());	 
	 }
	 document.getElementById('result').scrollIntoView();

	  } else {
        //alert('There was a problem with the request.');
     
	  }
     }
	}


}


	function signup_go()
	{
	
	 var site = "<?php echo $website_host; ?>";
	 saved_login_panel = document.getElementById ("input_box").innerHTML;
	var url=site+"/parse/signup_test.php";
	var xhr;
	
	 document.getElementById("input_box").innerHTML ="<h2 align='center'>Going to Sign up panel....</h2>";
	//document.getElementById("username").value="";
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
/**********************************************************/

var data = "username="+site+"&password="+site+"&lat="+site+"&long="+site;


     xhr.open("POST", url, true); 
	
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 //xhr.send(filterb);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
     
	document.getElementById("input_box").innerHTML = xhr.responseText;
	CollapsiblePanel_user.open();
	 
	
	
	  } else {
        //alert('There was a problem with the request.');
     
	  }
     }
	}



	
	}
	
	
	
	
	
		function forget_go()
	{
	
	 var site = "<?php echo $website_host; ?>";
	 saved_login_panel = document.getElementById ("input_box").innerHTML;
	var url=site+"/parse/forgot_login_form.php";
	var xhr;
	
	 document.getElementById("input_box").innerHTML ="<h2 align='center'>Going to Recovery Form....</h2>";
	//document.getElementById("username").value="";
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
/**********************************************************/

var data = "username="+site+"&password="+site+"&lat="+site+"&long="+site;


     xhr.open("POST", url, true); 
	
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 //xhr.send(filterb);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
     // alert(xhr.responseText);	   
	//alert('NO problem with the request.');dialogue_content
	  //document.getElementById("suggestion").innerHTML =xhr.responseText;
	
		
	document.getElementById("input_box").innerHTML = xhr.responseText;
	CollapsiblePanel_user.open();
	 
	
	
	  } else {
        //alert('There was a problem with the request.');
     
	  }
     }
	}



	
	}
	
	
	
	function settings()
	{
	
	 var site = "<?php echo $website_host; ?>";
	 saved_login_panel = document.getElementById ("my_input").innerHTML;
	 //saved_login_panel = document.getElementById ("input_box").innerHTML;
	 //alert(saved_login_panel);
	// var username= document.getElementById("username").value;
	// var password=document.getElementById("password").value;
	// var lat= document.getElementById("lat").value;
	// var long=document.getElementById("long").value;
	 //var check= document.getElementById('site').checked;
	var url="../parse/user_settings.php";
	var xhr;
	
	 //document.getElementById("input_box").innerHTML ="<h2 align='center'>Going to Sign up panel....</h2>";
	//document.getElementById("username").value="";
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
/**********************************************************/

var data = "username="+site+"&password="+site+"&lat="+site+"&long="+site;


     xhr.open("POST", url, true); 
	
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 //xhr.send(filterb);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
     // alert(xhr.responseText);	   
	//alert('NO problem with the request.');dialogue_content
	  //document.getElementById("suggestion").innerHTML =xhr.responseText;
	
		
	document.getElementById("my_input").innerHTML ="";	
	document.getElementById("my_input").innerHTML = xhr.responseText;
	CollapsiblePanel_user.open();
	
	
	 
	
	
	  } else {
        //alert('There was a problem with the request.');
     
	  }
     }
	}



	
	}
	
	
function open_set(evt, settings) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(settings).style.display = "block";
    evt.currentTarget.className += " active";
	CollapsiblePanel_user.open();
}

	
	
function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#password2").val();

    if (password != confirmPassword)
	{
		$("#divCheckPasswordMatch").css("color", "#F00");
        $("#divCheckPasswordMatch").html("Passwords do not match!");
	}
    else
	{
       	$("#divCheckPasswordMatch").css("color", "#36f407");
	    $("#divCheckPasswordMatch").html("Passwords match.");
	}
}


function checkusername() {
    var username = $("#username").val();
   // var confirmPassword = $("#password2").val();
    var username_count = $("#username").val().length
    if (username_count>=4)
	{
		 $("#divCheckusername").css("color", "#36f407");
        $("#divCheckusername").html("your username is just fine!");
		
	}
	
	
    else
	{
		$("#divCheckusername").css("color", "#F00");
        $("#divCheckusername").html("need more characters for the username.");
		
	}
}	

</script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body>
<?php if($loading_page==1) { ?>
<div id="loader-small"></div>
<div id="notice"><h4 align="center"><?php echo $loading_message ?></h4></div>


<div id="loading_bar"><h3 align="center" id="data-title">Loading</h3><div id="inner-loader-small"></div><br/></div>


<noscript><div id="loading_bar"><h3 align="center" id="data-title">Error your browser does not support JavaScript or it is turned off. TAAISWORLD requires Javascript to run.</h3></div></noscript>
<div id="page" style="display:none;" class="animate-bottom">
<?php } ?>

<?php if($loading_page==0){ ?>
<div id="page" style="display:block;" class="animate-bottom">
<?php } ?>


	  
      <div id="ts_nav" class="taais_nav">
      <div id="nav_title">
       <form action="<?php echo $website_host ?>/news/search.php" method="post" name="ajax-demo">
  
    <div id="profile_title"></div>
  <div id="profile_title_mini"></div>
  <div id="search_mini">
  <input type="text" id="searchquery_mini" name="searchquery" onKeyUp="book_suggestion_mobile('<?php echo $website_host ?>')" placeholder="Search TAAISWORLD" class="dialprefix">
  </div>
  
  <div id="search_button_mini">
  <input type="image" src="<?php echo $website_host ?>/tconnecx/graphics/search.png" alt="Submit">
  </div>
  </form>
      </div>
      <div id="nav_content">
  
 <div id="loader"></div>
 </div>

</div>
<div id="not_nav"><div id="t_logo">


  
  <a href="<?php echo $website_host;?>"><img src="taaisworld_graphics/taaislogo_optimised.png" alt="TAAIS WORLD"/></a></div>
  <div id="taais_icon"><img src="taaisworld_graphics/taaisicon.png" alt="TAAIS"/></div>

  <form action="<?php echo $website_host ?>/news/search.php" method="post" name="ajax-demo">
  <div id="search"><input type="text" id="searchquery" name="searchquery"   onKeyUp="book_suggestion(<?php echo '\''.$website_host.'\' '?>);" placeholder="Search TAAISWORLD" class="dialprefix"></div><div id="search_button"><input type="image" src="tconnecx/graphics/search.png" alt="Submit"></div>
  </form>
  <!--<div id="nav_button" onClick="menu_switch()">&#9776;</div>-->
  <div id="nav_button" onClick="menu_switch()"><img src="taaisworld_graphics/menu.png" alt="Menu"/></div>
   <div id="myuser_area" onClick="nav_switch()" tabindex="0"><img src="<?php  echo $avatar_icon ?>" width="100" alt="userarea" /></div>
  </div>

 
<script src="js/mysearch.js">notification()</script>

    <div id="suggestion"></div>
    <div id="content_box">
    

     
 <!-- InstanceBeginEditable name="body" -->
 



  
 <div class="slideshow-container" id="slide_land">
  <div class="mySlides fade"></div>
    <!--<div class="numbertext">1 / 3</div>-->
    <!--<div class="text_slideshow"></div>
 
  </div>

     --> 
 

   

  
 <a class="prev" onClick="plusSlides(-1)"><h1><?php echo'<' ?></h1></a>
  <a class="next" onClick="plusSlides(1)"><h1><?php echo'>' ?></h1></a> 
  <a class="pause" onClick="plusSlides(1)"><h1><?php echo'' ?></h1></a> 
  
 
</div>






<br>

<div style="text-align:center">
  <span class="dot" onClick="currentSlide(1)"></span> 
  <span class="dot" onClick="currentSlide(2)"></span> 
  <span class="dot" onClick="currentSlide(3)"></span> 
  <span class="dot" onClick="currentSlide(4)"></span> 
  <span class="dot" onClick="currentSlide(5)"></span> 
  <span class="dot" onClick="currentSlide(6)"></span> 
  <span class="dot" onClick="currentSlide(7)"></span> 
  
</div>


<div id="content_bar_view">

<div id="outer_body" style="padding-left:1%;">
<h1 align="center"><u>News</u></h1>
<div id="inner_body">
<div id="f_news"><a href="<?php echo $news_link ?>"><img src="<?php echo $news_thumbnail_square?>" alt="<?php echo $featured_news_row['title']?>" style="width:100%;"/><div class="text_banner"><h2 alig align="center"><?php echo $featured_news_row['title']?></h2></div></a></div>


<div id="e_fav"><br/><h3 align="center">LATEST NEWS SHOWING TOPICS</h3><hr/>
<ul>
<li><a href="<?php echo $website_host.'/url_linker.php?path=news&cat=Blog';?>">Blogs</a></li>
<li><a href="<?php echo $website_host.'/url_linker.php?path=news&cat=Article';?>">Articles</a></li>
<li><a href="<?php echo $website_host.'/url_linker.php?path=news&cat=Technology';?>">Technology</a></li>
<li><a href="<?php echo $website_host.'/url_linker.php?path=news&cat=Gaming';?>">Gaming</a></li>
<li><a href="<?php echo $website_host.'/url_linker.php?path=news&cat=Media';?>">Media</a></li>
</ul>
</div>

<div id="latest_news"><br/><h2 align="center">LATEST NEWS SHOWING TOPICS</h2><hr/>
<ul id="news_list">
<?php while($latest_news_row=mysqli_fetch_assoc($latest_news_sql))
{
$latest_news_thumbnail=$website_host.''.$latest_news_row['thumbnail'];
$latest_news_link =$website_host.'/'.$latest_news_row['path'].'/'.$latest_news_row['friendly_url']?>
<div style="width:100%; background-color:rgba(102,0,255,0.7); margin-left:0;"><h2 align="center"><?php echo $latest_news_row['cat']?></h2></div>
<li><a href="<?php echo $latest_news_link ?>"><img src="<?php echo $latest_news_thumbnail?>" alt="<?php echo $latest_news_row['title']?>" style="width:50px;"/> <?php echo $latest_news_row['title']; ?></a></li>

<?php } ?>
</ul>
</div>

<?php if($count_latest_news>0) { ?>
<div style="width:100%; overflow:hidden; margin-left:0%; position:relative; margin-top:50px;"><h2 align="center">News topics</h2></div>
<div id="news_topics">
<?php if($count_blog>0)
{?>
<div class="news_topic_content"><div class="banner_topic"><h2 align="center"><?php echo $blog_row['cat']?></h2></div><a href="<?php echo $blog_link; ?>"><img src="<?php echo $blog_thumbnail ?>" alt="<?php echo $blog_row['title'] ?>" style="top:-68px; position:relative;"/><div class="text_banner_topic"><h2 align="center"><?php echo substr($blog_row['title'],0,20).'...'?></h2></div></a></div>
<?php } ?>

<?php if($count_article>0)
{ ?>
<div class="news_topic_content"><div class="banner_topic"><h2 align="center"><?php echo $article_row['cat']?></h2></div><a href="<?php echo $article_link; ?>"><img src="<?php echo $article_thumbnail ?>" alt="<?php echo $article_row['title'] ?>"  style="top:-68px; position:relative;"/><div class="text_banner_topic"><h2 align="center"><?php echo substr($article_row['title'],0,20).'...'?></h2></div></a></div>
<?php } ?>

<?php if($count_tech>0)
{ ?>
<div class="news_topic_content"><div class="banner_topic"><h2 align="center"><?php echo $tech_row['cat']?></h2></div><a href="<?php echo $tech_link; ?>"><img src="<?php echo $tech_thumbnail ?>" alt="<?php echo $tech_row['title'] ?>"  style="top:-68px; position:relative;"/><div class="text_banner_topic"><h2 align="center"><?php echo substr($tech_row['title'],0,20).'...'?></h2></div></a></div>
<?php } ?>

<?php if($count_game>0)
{ ?>
<div class="news_topic_content"><div class="banner_topic"><h2 align="center"><?php echo $game_row['cat']?></h2></div><a href="<?php echo $game_link; ?>"><img src="<?php echo $game_thumbnail ?>" alt="<?php echo $game_row['title'] ?>"  style="top:-68px; position:relative;"/><div class="text_banner_topic"><h2 align="center"><?php echo substr($game_row['title'],0,20).'...'?></h2></div></a></div>
<?php } ?>

<?php if($count_media>0) { ?>
<div class="news_topic_content"><div class="banner_topic"><h2 align="center"><?php echo $media_row['cat']?></h2></div><a href="<?php echo $media_link; ?>"><img src="<?php echo $media_thumbnail ?>" alt="<?php echo $media_row['title'] ?>"  style="top:-68px; position:relative;"/><div class="text_banner_topic"><h2 align="center"><?php echo substr($media_row['title'],0,20).'...'?></h2></div></a></div>
<?php } ?>
</div>
<?php } ?>
<?php if($gallery_count>0)
{
	
?>
<h1 align="center"><u>GALLERY</u></h1>
<div id="gallery">
<?php while($gallery_row=mysqli_fetch_assoc($gallery_sql))
{
$image=$website_host.''.$gallery_row['img_800'];	
$image_url=$website_host.'/'.$gallery_row['media_path'].'/'.$gallery_row['media_url'];
$title = $gallery_row['caption'];
?>
<div class="gallery_content"><a href="<?php echo $image_url ?>"><img src="<?php echo $image ?>"  alt="<?php echo $title ?>" style="border-radius:20px; "/></a></div>
<?php } ?>
</div>
<?php } ?>
<br/>

<?php if($video_count>0) 
{
?>
<div style="width:100%;">
<div id="featured_videos"><h2 align="center">Featured Video</h2><hr/>
<video src="<?php echo $featured_video ?>" style="width:100%; height:50%;"  controls=""></video>
</div>
<?php } ?>
<?php if($count_about>0)
{ ?>
<div id="about_us"><br/><h2 align="center">About TAAIS</h2><hr/>
<ul>
<?php while($about_row=mysqli_fetch_assoc($about_sql))
{
$about_link=$website_host.'/'.$about_row['path'].'/'.$about_row['friendly_url'];
$about_title=$about_row['title'];
?>

<li><a href="<?php echo $about_link?>"><?php echo $about_title; ?><hr/></a></li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

</div>
<div style="position:relative; bottom:0%;"><h4 align="center"><?php echo $copyright ?></h4></div>
</div>

</div>

<script>
function my_slideshow()
{

var site = "<?php  echo $website_host; ?>";
var myurl = "<?php  echo $_GET['url']; ?>";	
if(ori=="port")
{
var theurl=site+"/parse/slideshow_port.php";
}

if(ori=="land")
{
var theurl=site+"/parse/slideshow_land.php";
}
var xhr;

 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
/**********************************************************/

var data = theurl;


     xhr.open("POST", theurl, true); 
	
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 //xhr.send(filterb);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
     // alert(xhr.responseText);	   
	//alert('NO problem with the request.');dialogue_content
	  //document.getElementById("suggestion").innerHTML =xhr.responseText;
	//alert(xhr.responseText);
	//alert(xhr.responseText);
	 //var json=eval('(' + xhr.responseText + ')');
	 //alert(xhr.responseText);
	document.getElementById("slide_land").innerHTML = xhr.responseText;
	  if(playOn==0)
	 {
	document.getElementsByClassName("pause")[0].innerHTML='<img src="<?php echo $website_host ?>/taaisworld_graphics/playbutton.png">';
	 }
	 
	 
	   if(playOn==1)
	 {
	document.getElementsByClassName("pause")[0].innerHTML='<img src="<?php echo $website_host ?>/taaisworld_graphics/pausebutton.png">';
	 }
	
		
	//alert(xhr.responseText);
	//document.getElementById("box_comment").innerHTML = xhr.responseText; 
	 //comment_date();

    //message(type,user,id,user_id,elem);
	  //comment_show =setTimeout(comments_show());
	  } else {
        //alert('There was a problem with the request.');
     
	  }
     } 
	}
}
</script>
   <script>
var ori = "land";
var slideIndex = 0;
showSlides();
slideshow_op();
my_slideshow();
//window.onresize = slideshow_op;
window.addEventListener('resize',slideshow_op)

  function slideshow_op()
   {
	  
	var screen_width = screen.width;
	var screen_height = screen.height;
	
	
	if(screen_width>screen_height)
	{
		
	if(ori=="port")
	{
	ori = "land";
	my_slideshow();
	}
	}
	
	
	if(screen_width<screen_height)
	{
	if(ori=="land")
	{
	ori = "port";
	my_slideshow();
	}
	
	
	}
	
	
	var screen769 = window.matchMedia( "(min-width: 1366px)" );
	var screen481 =   window.matchMedia( "(min-width: 481px)" );
	var screen1365 =   window.matchMedia( "(max-width: 1365px)" );
	var screen480 = window.matchMedia( "(max-width: 480px)" );
	
	if (screen769.matches) {
	var nav = 90+'px';
	//alert("large");
	}
	
	if ((screen481.matches) && (screen1365.matches)) {
	var nav = 75+'px';
	//alert("medium");
	}
	
	if (screen480.matches) {
	var nav = 75+'px';
	//alert("small");
	}
	document.getElementsByClassName("slideshow-container")[0].style.height=screen_height-nav;
	
	
   }
  var pauseSlide;
  var playOn=1;
  
  
  function pause()
  {
	 if(playOn==1)
	 {
	clearTimeout(pauseSlide);
	document.getElementsByClassName("pause")[0].innerHTML='<img src="<?php echo $website_host ?>/taaisworld_graphics/playbutton.png">';
	playOn=0
	return false;
	 }
	 
	  if(playOn==0)
	 {
	pauseSlide = setTimeout(showSlides, 4000);
	document.getElementsByClassName("pause")[0].innerHTML='<img src="<?php echo $website_host ?>/taaisworld_graphics/pausebutton.png">';
	playOn=1
	return false;
	 }
  }
   
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1} 
    slides[slideIndex-1].style.display = "block"; 
    pauseSlide = setTimeout(showSlides, 4000); // Change image every 4 seconds
}



function plusSlides(n) {
  showSlides2(slideIndex += n);
}

function currentSlide(n) {
  showSlides2(slideIndex = n);
}

function showSlides2(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}
   </script>
   
   
   
 
     <!-- InstanceEndEditable -->
    
    
    </div>
    
    
  
  
  <?php if($login==0)
  {
  $avatar_icon2=$website_host."/"."taaisworld_graphics/user.png";
  }
  /*
  if ($login==1)
  {
  $avatar_icon=$website_host."/tconnecx/".$avatar_not;
  }
  */
   ?>
  


  <div id="CollapsiblePanel_user" class="CollapsiblePanel_user">
  <div class="CollapsiblePanelTab_user" tabindex="0"><img src="<?php echo $avatar_icon ?>" width="100" alt="userarea" /></div>
 	
  <div class="CollapsiblePanelContent_user" style="display: block">
 

  

  <div id="input_box">
  
  <?php if($login==0)
  {
	if ($signup==0)
	{
  ?>
  <h1 align="center">Login to your account</h1>
  <p><h2>Username/Email:</h2><p><input  name="username" placeholder="Enter Username" type="text" id="username" class="user_input" size="30" maxlength="30" onKeyUp="" />
  <p><button style="background-color:#000; color:#FFF;" class="button" onClick="forget_go()">Forgot Login details</button>
  <button style="background-color:#000; color:#FFF;" id="signup_button" class="button" onClick="signup_go()">Sign Up</button>
  <h2>Password:</h2><p><input  name="password" placeholder="Enter Password" type="password" id="password" class="user_input" size="30" maxlength="30" onKeyUp="" /><p>
<div id="login_button"><button onClick="login_go()" style="background-color:#000; color:#FFF;" class="button">Login</button></div>
<hr/><h1 align="left">OR:</h1><div class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="login_with" data-scope="public_profile,email" onlogin="checkLoginState();"></div>
<br/><br/>
<div class="google g-signin2" data-onsuccess="onSignIn"></div>
<hr/>
   <input type="hidden"  id="lat" name="lat" />
    <input type="hidden"  id="long" name="long" />

<h2 align="center"><label for="cookie">Keep me signed in:</label>
    <input name="cookie" type="checkbox" id="cookie" value="yes" checked="checked" /></h2>
  </p>
 <?php if($website_url) { ?>
  <p>
   <!-- <h2 align="center"><label for="site">Bring me back to this page:</label></h2>-->
    
    <input name="site" type="hidden" id="site" value="yes" checked="checked" disabled />
    
      </p>
  <?php } ?>

 <div id="result"><h2 align="center"></h2></div>
 		
 <?php }
 
 
 if($signup==1)
 
 {
  ?>
 <h1 align="center">Be part of  TAAISWORLD!</h1>
<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
  <p align="left">
    <label for="name"><strong><a onClick="login_go">Already a member?</a><br />
      <br />
    First Name</strong></label>
    <strong>:</strong>
    <input type="hidden" name="MM_insert" value="form1" />
    <input name="name" type="text" id="name" size="30" maxlength="150" />
  </p>
  <p align="left">Surname: 
    <input name="surname" type="text" id="surname" size="30" maxlength="30" />
  </p>
  <p align="left">Username:
    <input name="username" type="text" id="username" size="30" maxlength="30" onKeyUp="checkusername();" />
  </p><div class="registrationFormAlert" id="divCheckusername" style="color:#F00">
</div>
  
  <p align="left">Email Address:
    <input name="email" type="email" id="email" size="30" maxlength="30" />
  </p>
  <p align="left">Birthday</p>
  <p align="left"><select size="1" name="date" value="date">
   <option value="">---Select date---</option>
  <?php for ($i = 1; $i <= 31; $i++) : ?>
  <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?></select><select size="1" name="month" value="month">
  <option value="">---Select month---</option>
  <option value="1">January</option>
  <option value="2">Febuary</option>
  <option value="2">March</option>
  <option value="4">April</option>
  <option value="5">May</option>
  <option value="6">June</option>
  <option value="7">July</option>
  <option value="8">August</option>
  <option value="9">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option value="12">December</option>
  </select><select size="1" name="year" value="Year">
<option value="">---Select year---</option>
  <?php for($i=date('Y') - 10; $i >= 1940; $i--) : ?>
  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
  
</select></p>
  <p align="left">Gender </p>
  <p>
    <label>
      <input type="radio" name="gender" value="Male" id="gender_0" />
    Male</label>
    <br />
    <label>
      <input type="radio" name="gender" value="Female" id="gender_1" />
      Female</label>
  </p>
  <p align="left">Password:
    <input name="password" type="password" id="password" size="30" maxlength="30"  />
    <br />
  </p>
  <p align="left">Confirm Password: 
    <input name="password2" type="password" id="password2" size="30" maxlength="30" onKeyUp="checkPasswordMatch();" />
  </p>
  <p align="center"><div class="registrationFormAlert" id="divCheckPasswordMatch">
</div>
  <div align="left">
    <input type="submit" name="insert" id="insert" value="Signup" />
    </p>
     
  </div>

</form>
<h4 align="center">&nbsp;</h4>
<h4 align="center">&nbsp;</h4>
<h4 align="center"><strong>Copyright © 2015 TAAIS Entertainment.  All rights reserved.</strong>
</h4>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
 }
 } 
?>
</div>
 
 <?php if($login==1)
 { ?>
 <br>
 <div id="input_box">
 <div id="result"></div>
 <div id="my_input">
  <h1 align="center" style="color:#FFF;"> Welcome <?php echo $fullname;?></h1>
  <!--<button style="background-color:#000; color:#FFF;" class="button" onClick="profile_goto()">View Profile </button>-->
  <?php if($user_type=="taais_user")
  {
  ?>
  <button style="background-color:#000; color:#FFF;" class="button" onClick="settings()">Settings </button>
  <?php } ?>
  <button style="background-color:#000; color:#FFF;" class="button" onClick="logout_go()">LOG OUT </button>
  </div>
 </div>
 <?php } ?>
  </div>
  </div>
</div>
<script>
function profile_goto()
{
window.location.href ="<?php echo $profile_link ?>";		
}
</script>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      //alert('User signed out.');
    });
  }
</script>
    <script type="text/javascript">



var CollapsiblePanel_user = new Spry.Widget.CollapsiblePanel("CollapsiblePanel_user", {contentIsOpen:false});


function setPanelOpenClose(e) {  
     cpg.closeAllPanels();  
     return false;  
}  
</script>


<script>
var myVar;

function myFunction() {
	document.getElementById("data-title").innerHTML="Loading "+document.title;
    myVar = setTimeout(showPage, 2000);
}

function showPage() {
  	
  document.getElementById("notice").style.display = "none";
  document.getElementById("loading_bar").style.display = "none";
  document.getElementsByTagName("body")[0].style.background = "none";
  document.getElementsByTagName("body")[0].style.backgroundColor="#000";
  document.getElementsByTagName("body")[0].style.overflowY="auto";
  document.getElementById("page").style.display = "block";
  
  
}

</script>
</body>
<!-- InstanceEnd --></html>
