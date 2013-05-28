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
<a href="http://myanimelist.net/anime/<?php echo $data["id"]; ?>">Original MAL page <i class="icon-share"></i></a>
</div>
<div class="span3">
<?php if (isLoggedIn()){
$percent=(($data["watched_episodes"])/($data["episodes"]))*100;
$text = $data["watched_episodes"]."/".$data["episodes"];
switch ($data["watched_status"]) {
case null:
?>
<form method="ADD" action="http://mal-api.com/animelist/anime" class="form-horizontal">
<input type="hidden" name="anime_id" value="<?php echo $data["id"]; ?>">
<fieldset>
<legend>Add anime</legend>
<div class="control-group">
<label class="control-label" for="status">Status</label>
<div class="controls">
<select name="status" id="status">
<option value="plantowatch">Plan to Watch</option>
<option value="watching">Watching</option>
<option value="completed">Completed</option>
<option value="dropped">Dropped</option>
<option value="onhold">On-Hold</option>
</select>
</div>
</div>
<div class="control-group">
<label class="control-label" for="select">Watched episodes</label>
<div class="controls">
<div class="input-append">
<input type="text">
<span class="add-on">/<?php echo $data["episodes"];?></span>
</div>
</div>
</div>
<div class="control-group">
<label class="control-label" for="score">Rating</label>
<div class="controls">
<?php include 'inc/rate.php'; ?>
</div>
</div>
<button type="submit" class="btn"><i class="icon-plus"></i> Add</button>
</fieldset>
</form>
<?php
break;
case "watching":
progressBar($percent,$text);
break;
case "completed":
progressBar($percent,$text,"success");
break;
case "on-hold":
progressBar($percent,$text,"warning");
break;
case "dropped":
progressBar($percent,$text,"danger");
break;
case "plan to watch":
?>
<i class="icon-calendar"></i> Plan to Watch
<?php
break;
}} ?>
</div>
<div class="span9 tabbable">
<ul class="nav nav-tabs">
<li class="active"><a href="#synopsis" data-toggle="tab">Synopsis</a></li>
<li><a href="#info" data-toggle="tab">Info</a></li>
<li><a href="#popularity" data-toggle="tab">Popularity</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="synopsis">
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