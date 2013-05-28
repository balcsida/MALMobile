<?php
include("functions.php");
include("header.php");
if(isset($_GET["username"]) && $_GET["username"]!=""){
$data=getData("animelist",$_GET["username"]);
if (!is_string($data)){
?>
<div class="page-header">
<h1><?php echo $_GET["username"]; ?> <small>Anime List</small></h1>
</div>
<div class="subnav">
<ul class="nav nav-pills">
<?php for($a=0;$a<count($animeValues);$a++){
$statusnum=0;
for($x=0;$x<count($data["anime"]);$x++){
if($data["anime"][$x]["watched_status"]==$animeValues[$a]) $statusnum++;
}
if ($statusnum!=0) {
?>
<li><a href="#<?php echo str_replace(' ','_',$animeValues[$a]); ?>"><?php echo ucfirst($animeValues[$a]); ?></a></li>
<?php }} ?>
</ul>
</div>
<?php for($a=0;$a<count($animeValues);$a++){
$statusnum=0;
for($x=0;$x<count($data["anime"]);$x++){
if($data["anime"][$x]["watched_status"]==$animeValues[$a]) $statusnum++;
}
if ($statusnum!=0) {
?>
<section id="<?php echo str_replace(' ','_',$animeValues[$a]) ?>">
<h2><?php echo ucfirst($animeValues[$a]); ?></h2>
<table class="table table-striped table-hover table-condensed table-bordered sortable">
<thead>
<tr>
<th class="span8">Anime Title<i></i></th>
<th class="span1">Score</th>
<th class="span1">Type</th>
<th class="span1">Progress</th>
<?php /*if(isYourThing()){ ?>
<th class="span2 hidden-phone actions">Actions</th>
<?php }*/ ?>
</tr>
</thead>
<?php
for($x=0;$x<count($data["anime"]);$x++){ 
if ($data["anime"][$x]["watched_status"]==$animeValues[$a]) {
?>
<tr>
<td><a href="anime.php?id=<?php echo $data["anime"][$x]["id"]; ?>" class="tip" data-img="<?php echo $data["anime"][$x]["image_url"]; ?>"><?php echo $data["anime"][$x]["title"]; ?></a></td>
<td class="ctc"><?php echo $data["anime"][$x]["score"]; ?></td>
<td class="ctc"><?php echo $data["anime"][$x]["type"]; ?></td>
<td class="ctc"><?php echo $data["anime"][$x]["watched_episodes"]; ?>/<?php echo $data["anime"][$x]["episodes"]; ?></td>
<?php /*if(isYourThing()){ ?>
<td class="ctc">
<a class="btn btn-mini" href="anime.php?id=<?php echo $data["anime"][$x]["id"]; ?>&action=edit"><i class="icon-edit"></i><span class="hidden-phone"> Edit</span></a> <a class="btn btn-mini" href="anime.php?id=<?php echo $data["anime"][$x]["id"]; ?>&action=delete"><i class="icon-trash"></i><span class="hidden-phone"> Delete</span></a>
</td>
<?php }*/ ?>
</tr>
<?php }} ?>
</table>
</section>
<?php
}}} else {
switch ($data) {
case "500":
printAlert("error","Invalid username! User does not exist!");
break;
}
}
} else {
printAlert("info","This feature will be implemented later! Please login first!");
}
include('footer.php');
?>