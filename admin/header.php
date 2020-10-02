<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Movie Booking</title>
<meta charset="UTF-8">
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css">
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script type="text/javascript" src="js/Josefin_Sans_600.font.js"></script>
<script type="text/javascript" src="js/Lobster_400.font.js"></script>
<script type="text/javascript" src="js/sprites.js"></script>
<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="js/jquery.jplayer.settings.js"></script>
<script type="text/javascript" src="js/gSlider.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<!--[if lt IE 7]> <div style=' clear: both; height: 59px; padding:0 0 0 15px; position: relative;'> <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div> <![endif]-->
<!--[if lt IE 9]><script src="js/html5.js" type="text/javascript"></script><![endif]-->
<!--[if IE]><link href="css/ie_style.css" rel="stylesheet" type="text/css" /><![endif]-->
</head>
<body id="page1">
<!-- START PAGE SOURCE -->
<div id="main">
  <header>
	
	<img src="images/AdminLogo.png" style="padding-left:10px;padding-top:10px" height="113px" width="113px">
	<nav>
      <ul>
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="language.php">Language</a></li>
        <li><a href="city.php">City</a></li>
        <li><a href="area.php">Area</a></li>
        <li><a href="theatre.php">Theatre</a></li>
        <li><a href="movie.php">Movie</a></li>
        <li><a href="manager.php">Manager</a></li>
		<li><a href="upload.php">Upload</a></li>
		<li><a href="showinquiry.php">Inquiry</a></li>
		<li><a href="showreview.php">Reviews</a></li>
		<?php
			if(isset($_SESSION['aname']))
			{
		?>
			<li><a href="logout.php"><font color=red>Logout</font></a></li>
		<?php
			}
			else
			{
		?>
			<li><a href="logout.php"><font color=red>Login</font></a></li>
		<?php
			}
		?>
      </ul>
    </nav>
  </header>
<script type="text/javascript">Cufon.now()
$(function () {
    $('nav,.more,.header-more').sprites()

    $('.header-slider').gSlider({
        prevBu: '.hs-prev',
        nextBu: '.hs-next'
    })
})
$(window).load(function () {
    $('.tumbvr')._fw({
        tumbvr: {
            duration: 2000,
            easing: 'easeOutQuart'
        }
    }).bind('click', function () {
        location = "index-3.html"
    })
    $('a[rel=prettyPhoto]').each(function () {
        var th = $(this),
            pb
            th.append(pb = $('<span class="playbutt"></span>').css({
                opacity: .7
            }))
            pb.bind('mouseenter', function () {
                $(this).stop().animate({
                    opacity: .9
                })
            }).bind('mouseleave', function () {
                $(this).stop().animate({
                    opacity: .7
                })
            })
    }).prettyPhoto({
        theme: 'dark_square'
    })
})
</script>
<center>