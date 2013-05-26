<?php
include("functions.php");
include("header.php");
if(isset($_GET["id"]) && $_GET["id"]!=""){
if (isLoggedIn()) {
$data=getDataAuth("anime",$_GET["id"]);
} elseif (!isLoggedIn()) {
$data=getData("anime",$_GET["id"]);
}
if (!is_string($data)){
?>
<div class="page-header">
<h1><?php echo $data["title"] ?> <small>Anime</small></h1>
</div>
<div class="row">
<div class="span3 text-center">
<img src="<?php echo $data["image_url"]; ?>" class="img-polaroid" alt="cover"><br>
<a href="http://myanimelist.net/anime/<?php echo $data["id"]; ?>">Original MAL page<i class="icon-share"></i></a>
</div>
<div class="span9 tabbable">
<ul class="nav nav-tabs">
<?php if (isLoggedIn()) { ?><li class="active"><a href="#status" data-toggle="tab">Status</a></li><?php }; ?>
<li<?php if (!isLoggedIn()) echo ' class="active"';?>><a href="#synopsis" data-toggle="tab">Synopsis</a></li>
<li><a href="#info" data-toggle="tab">Info</a></li>
<li><a href="#popularity" data-toggle="tab">Popularity</a></li>
</ul>
<div class="tab-content">
<?php if (isLoggedIn()){ ?>
<div class="tab-pane active" id="status">
<?php 
switch ($data["watched_status"]) {
case null:
?>
<a href="http://myanimelist.net/anime/<?php echo $_GET["id"]; ?>" class="btn btn-block btn-small"><i class="icon-plus"></i>Add</a>
<?php
break;
case "watching":
?>
<div class="progress">
<div class="bar bar-primary" style="width:<?php echo (($data["watched_episodes"])/($data["episodes"]))*100; ?>%;">
<?php echo $data["watched_episodes"]."/".$data["episodes"]; ?>
</div>
</div>
<?php
break;
case "completed":
?>
<div class="progress">
<div class="bar bar-success" style="width:100%">
<?php echo $data["watched_episodes"]."/".$data["episodes"]; ?>
</div>
</div>
<?php
break;
case "on-hold":
?>
<div class="progress">
<div class="bar bar-warning" style="width:<?php echo (($data["watched_episodes"])/($data["episodes"]))*100; ?>%;">
<?php echo $data["watched_episodes"]."/".$data["episodes"]; ?>
</div>
</div>
<?php
break;
case "dropped":
?>
<div class="progress">
<div class="bar bar-danger" style="width:<?php echo (($data["watched_episodes"])/($data["episodes"]))*100; ?>%;">
<?php echo $data["watched_episodes"]."/".$data["episodes"]; ?>
</div>
</div>
<?php
break;
case "plan to watch":
?>
<i class="icon-calendar"></i>Plan to Watch
<?php
break;
}
?>
</div>
<?php } ?>
<div class="tab-pane<?php if (!isLoggedIn()) echo " active";?>" id="synopsis">
<h2>Synopsis</h2>
   <p><?php echo $data["synopsis"]; ?></p>
   </div>
<div class="tab-pane" id="info">
<table class="table table-striped table-hover table-condensed">
<tr>
<th>Type</th>
<td><?php echo $data["type"]; ?></td>
</tr>
<tr>
<th>Classification</th>
<td><?php echo $data["classification"]; ?></td>
</tr>
<tr>
<th>Status</th>
<td><?php echo $data["status"]; ?></td>
</tr>
<tr>
<th>Episodes</th>
<td><?php echo $data["episodes"]; ?></td>
</tr>
  </table>
</div>
<div class="tab-pane" id="popularity">
<table class="table table-striped table-hover table-condensed">
<tr>
<th>Rank</th>
<td><?php echo $data["rank"]; ?></td>
</tr>
<tr>
<th>Popularity Rank</th>
<td><?php echo $data["popularity_rank"]; ?></td>
</tr>
<tr>
<th>Members Score</th>
<td><?php echo $data["members_score"]; ?></td>
</tr>
<tr>
<th>Members Count</th>
<td><?php echo $data["members_count"]; ?></td>
</tr>
<tr>
<th>Favorited Count</th>
<td><?php echo $data["favorited_count"]; ?></td>
</tr>
  </table>
</div>
</div>
</div>
</div>
<?php
} else {
switch ($data) {
case "500":
printAlert("error","Invalid ID! Anime with this ID does not exist!");
break;
}
}
} else {
printAlert("error","No ID given!");
}
include('footer.php');
?>