<?php
include 'inc/functions.php';
include 'inc/header.php';
if(isset($_GET["username"]) && $_GET["username"]!=""){
$data=getData("profile",$_GET["username"]);
if (!is_string($data)){
?>
<div class="page-header">
<h1><?php echo $_GET["username"]; ?> <small>Profile</small></h1>
</div>
<div class="row">
<div class="span3 text-center">
<img src="<?php echo $data["avatar_url"]; ?>" class="img-polaroid" alt="<?php echo $_GET["username"] ?>'s profile picture">
<a href="animelist.php?username=<?php echo $_GET["username"] ?>" class="btn btn-block btn-small">Anime List</a>
<a href="mangalist.php?username=<?php echo $_GET["username"] ?>" class="btn btn-block btn-small">Manga List</a>
</div>
<div class="span9 tabbable">
<ul class="nav nav-tabs">
<li class="active"><a href="#home" data-toggle="tab">Details</a></li>
<li><a href="#anime" data-toggle="tab">Anime</a></li>
<li><a href="#manga" data-toggle="tab">Manga</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="home">
<table class="table table-striped table-hover table-condensed table-bordered">
<tr>
<th>Birthday</th>
<td><?php echo $data["details"]["birthday"]; ?></td>
</tr>
<tr>
<th>Location</th>
<td><?php echo $data["details"]["location"]; ?></td>
</tr>
<tr>
<th>Website</th>
<td><?php echo $data["details"]["website"]; ?></td>
</tr>
<tr>
<th>AIM</th>
<td><?php echo $data["details"]["aim"]; ?></td>
</tr>
<tr>
<th>MSN</th>
<td><?php echo $data["details"]["msn"]; ?></td>
</tr>
<tr>
<th>Yahoo</th>
<td><?php echo $data["details"]["yahoo"]; ?></td>
</tr>
<tr>
<th>Comments</th>
<td><?php echo $data["details"]["comments"]; ?></td>
</tr>
<tr>
<th>Forum Posts</th>
<td><?php echo $data["details"]["forum_posts"]; ?></td>
</tr>
<tr>
<th>Last Online</th>
<td><?php echo $data["details"]["last_online"]; ?></td>
</tr>
<tr>
<th>Gender</th>
<td><?php echo $data["details"]["gender"]; ?></td>
</tr>
<tr>
<th>Join Date</th>
<td><?php echo $data["details"]["join_date"]; ?></td>
</tr>
<tr>
<th>Access Rank</th>
<td><?php echo $data["details"]["access_rank"]; ?></td>
</tr>
<tr>
<th>Anime List Views</th>
<td><?php echo $data["details"]["anime_list_views"]; ?></td>
</tr>
<tr>
<th>Manga List Views</th>
<td><?php echo $data["details"]["manga_list_views"]; ?></td>
</tr>
</table>
</div>
<div class="tab-pane" id="anime">
<table class="table table-striped table-hover table-condensed table-bordered">
<tr>
<th>Time (days)</th>
<td><?php echo $data["anime_stats"]["time_days"]; ?></td>
</tr>
<tr>
<th>Watching</th>
<td><?php echo $data["anime_stats"]["watching"]; ?></td>
</tr>
<tr>
<th>Completed</th>
<td><?php echo $data["anime_stats"]["completed"]; ?></td>
</tr>
<tr>
<th>On Hold</th>
<td><?php echo $data["anime_stats"]["on_hold"]; ?></td>
</tr>
<tr>
<th>Dropped</th>
<td><?php echo $data["anime_stats"]["dropped"]; ?></td>
</tr>
<tr>
<th>Plan To Watch</th>
<td><?php echo $data["anime_stats"]["plan_to_watch"]; ?></td>
</tr>
<tr>
<th>Total Entries</th>
<td><?php echo $data["anime_stats"]["total_entries"]; ?></td>
</tr>
</table>
<div class="progress">
<div class="bar bar-primary" style="width:<?php echo (($data["anime_stats"]["watching"])/($data["anime_stats"]["total_entries"]))*100; ?>%;">Watching</div>
<div class="bar bar-success" style="width:<?php echo (($data["anime_stats"]["completed"])/($data["anime_stats"]["total_entries"]))*100; ?>%;">Completed</div>
<div class="bar bar-warning" style="width:<?php echo (($data["anime_stats"]["on_hold"])/($data["anime_stats"]["total_entries"]))*100; ?>%;">On Hold</div>
<div class="bar bar-danger" style="width:<?php echo (($data["anime_stats"]["dropped"])/($data["anime_stats"]["total_entries"]))*100; ?>%;">Dropped</div>
<div class="bar bar-info" style="width:<?php echo (($data["anime_stats"]["plan_to_watch"])/($data["anime_stats"]["total_entries"]))*100; ?>%;">Plan to Watch</div>
</div>
</div>
<div class="tab-pane" id="manga">
<table class="table table-striped table-hover table-condensed table-bordered">
<tr>
<th>Time (days)</th>
<td><?php echo $data["manga_stats"]["time_days"]; ?></td>
</tr>
<tr>
<th>Reading</th>
<td><?php echo $data["manga_stats"]["reading"]; ?></td>
</tr>
<tr>
<th>Completed</th>
<td><?php echo $data["manga_stats"]["completed"]; ?></td>
</tr>
<tr>
<th>On Hold</th>
<td><?php echo $data["manga_stats"]["on_hold"]; ?></td>
</tr>
<tr>
<th>Dropped</th>
<td><?php echo $data["manga_stats"]["dropped"]; ?></td>
</tr>
<tr>
<th>Plan To Read</th>
<td><?php echo $data["manga_stats"]["plan_to_read"]; ?></td>
</tr>
<tr>
<th>Total Entries</th>
<td><?php echo $data["manga_stats"]["total_entries"]; ?></td>
</tr>
</table>
<div class="progress">
<div class="bar bar-primary" style="width:<?php echo (($data["manga_stats"]["reading"])/($data["manga_stats"]["total_entries"]))*100; ?>%;">Reading</div>
<div class="bar bar-success" style="width:<?php echo (($data["manga_stats"]["completed"])/($data["manga_stats"]["total_entries"]))*100; ?>%;">Completed</div>
<div class="bar bar-warning" style="width:<?php echo (($data["manga_stats"]["on_hold"])/($data["manga_stats"]["total_entries"]))*100; ?>%;">On Hold</div>
<div class="bar bar-danger" style="width:<?php echo (($data["manga_stats"]["dropped"])/($data["manga_stats"]["total_entries"]))*100; ?>%;">Dropped</div>
<div class="bar bar-info" style="width:<?php echo (($data["manga_stats"]["plan_to_read"])/($data["manga_stats"]["total_entries"]))*100; ?>%;">Plan to Read</div>
</div>
</div>
</div>
</div>
</div>
<?php
} else {
switch ($data){
case "500":
printAlert("error","Invalid username! User does not exist!");
break;
}
}
} else {
printAlert("error","No username given!");
}
include 'inc/footer.php';
?>