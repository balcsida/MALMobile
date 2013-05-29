<?php
include 'inc/functions.php';
include 'inc/header.php';
if(isset($_POST["query"]) && $_POST["query"]!=""){
$resultsAnime = search("anime",$_POST["query"]);
?>
<div class="page-header">
<h1><?php echo $_POST["query"]; ?> <small>Search results</small></h1>
</div>
<table class="table table-striped table-hover table-condensed table-bordered sortable">
<thead>
<td>Anime Title</td>
<td>Type</td>
<td>Episodes</td>
<td>Members Score</td>
</thead>
<?php for($x=0;$x<count($resultsAnime);$x++){ ?>
<tr>
<td><a href="anime.php?id=<?php echo $resultsAnime[$x]["id"]; ?>"><?php echo $resultsAnime[$x]["title"]; ?></a></td>
<td><?php echo $resultsAnime[$x]["type"]; ?></td>
<td><?php echo $resultsAnime[$x]["episodes"]; ?></td>
<td><?php echo $resultsAnime[$x]["members_score"]; ?></td>
</tr>
<?php } ?>
</table>
<?php } else { 
printAlert("error","You left the search field blank!");
}
include 'inc/footer.php';
?>