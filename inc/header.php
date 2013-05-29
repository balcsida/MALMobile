<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title>MyAnimeList</title>
<meta name="description" content="">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="apple-touch-icon" href="touch-icon-iphone.png" />
<link rel="apple-touch-icon" sizes="72x72" href="img/apple/apple-touch-icon-72x72-precomposed.png" />
<link rel="apple-touch-icon" sizes="114x114" href="img/apple/apple-touch-icon-114x114-precomposed.png" />
<link rel="apple-touch-icon" sizes="144x144" href="img/apple/apple-touch-icon-144x144-precomposed.png" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<!-- iPhone -->
<link href="images/apple/apple-startup-iPhone.png" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">
<!-- iPhone (Retina) -->
<link href="images/apple/apple-startup-iPhone-RETINA.png" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPhone 5 -->
<link href="images/apple/apple-startup-iPhone-Tall-RETINA.png"  media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPad Portrait -->
<link href="images/apple/apple-startup-iPad-Portrait.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">
<!-- iPad Landscape -->
<link href="images/apple/apple-startup-iPad-Landscape.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">
<!-- iPad Portrait (Retina) -->
<link href="images/apple/apple-startup-iPad-RETINA-Portrait.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPad Landscape (Retina) -->
<link href="images/apple/apple-startup-iPad-RETINA-Landscape.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<style>body{padding-top: 60px;padding-bottom: 40px}</style>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/main.css">
<link rel="shortcut icon" href="favicon.ico"> 
</head>
<body data-spy="scroll" data-target=".subnav">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<div class="navbar navbar-fixed-top">
<div class="navbar-inner">
<div class="container">
<a class="btn btn-navbar" data-toggle="collapse" data-target="#main-menu">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>
<a class="btn btn-navbar" data-toggle="collapse" data-target="#user">
<span class="icon-user"></span>
</a>
<a class="brand" href="index.php">MAL Mobile</a>
<div class="nav-collapse collapse" id="main-menu">
<ul class="nav">
<li <?php echo ($thisPage=='index.php'? 'class="active"':'');?>><a href="index.php"><i class="icon-home"></i> Home</a></li>
<li <?php echo (($thisPage=='animelist.php')||($thisPage=='anime.php')? 'class="active"':'');?>><a href="animelist.php?username=<?php if (isLoggedIn()) echo $_COOKIE["username"]; ?>"><i class="icon-film"></i> Anime</a></li>
<li <?php echo (($thisPage=='mangalist.php')||($thisPage=='manga.php')? 'class="active"':'');?>><a href="mangalist.php?username=<?php if (isLoggedIn()) echo $_COOKIE["username"]; ?>"><i class="icon-book"></i> Manga</a></li>
</ul>
<form class="navbar-search pull-right" action="search.php" method="post">
<input type="text" class="search-query" name="query" placeholder="Search">
</form>
</div><!--/.nav-collapse -->
<div class="nav-collapse pull-right" id="user">
<ul class="nav">
<?php if(isLoggedIn()){ ?>
<li class="dropdown<?php echo (basename($_SERVER['SCRIPT_FILENAME'])=='profile.php'? ' active':'');?>">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?php echo $_COOKIE["username"]; ?><b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="profile.php?username=<?php echo $_COOKIE["username"]; ?>">Profile</a></li>
<li><a href="login.php?logout">Log out</a></li>
</ul>
<?php } else { ?>
<form class="navbar-form pull-right" action="login.php" method="post">
<input class="" type="text" name="user" placeholder="Username">
<input class="" type="password" name="pass" placeholder="Password">
<button class="btn" type="submit" name="log-in">Log in</button>
</form>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>
<div class="container">