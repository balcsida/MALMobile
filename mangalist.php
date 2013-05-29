<?php
include 'inc/functions.php';
include 'inc/header.php';
if(isset($_GET["username"]) && $_GET["username"]!=""){
$data=getData("mangalist",$_GET["username"]);
if (!is_string($data)){
?>
<div class="page-header">
<h1><?php echo $_GET["username"]; ?> <small>Manga List</small></h1>
</div>
<?php for($a=0;$a<count($mangaValues);$a++){
$statusnum=0;
for($x=0;$x<count($data["manga"]);$x++){
if($data["manga"][$x]["read_status"]==$mangaValues[$a]) $statusnum++;
}
if ($statusnum!=0) {
?>
<h2><?php echo ucfirst($mangaValues[$a]); ?></h2>
<table class="table table-striped table-hover table-condensed table-bordered sortable">
<thead>
<th class="span8">Manga Title</th>
<th class="span1">Score</th>
<th class="span1">Type</th>
<th class="span1">Progress</th>
<?php /*if(isYourThing()){ ?>
<th class="span2 hidden-phone actions">Actions</th>
<?php }*/ ?>
</thead>
<?php
for($x=0;$x<count($data["manga"]);$x++){ 
if ($data["manga"][$x]["read_status"]==$mangaValues[$a]) {
?>
<tr>
<td><a href="manga.php?id=<?php echo $data["manga"][$x]["id"]; ?>"><?php echo $data["manga"][$x]["title"]; ?></a></td>
<td class="ctc"><?php echo $data["manga"][$x]["score"]; ?></td>
<td class="ctc"><?php echo $data["manga"][$x]["type"]; ?></td>
<td class="ctc"><?php echo $data["manga"][$x]["chapters"]; ?>/<?php echo $data["manga"][$x]["chapters"]; ?></td>
<?php /*if(isYourThing()){ ?>
<td class="ctc"><a class="btn btn-mini" href="manga.php?"><i class="icon-pencil"></i><span class="hidden-phone"> Edit</span></a> <a class="btn btn-mini" href="#"><i class="icon-trash"></i><span class="hidden-phone"> Delete</span></a></td>
<?php }*/ ?>
</tr>
<?php }} ?>
</table>
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
include 'inc/footer.php';
?>