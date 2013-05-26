<?php
include("functions.php");
include('header.php');
?>
<div class="row">
<div class="span9">
<div class="page-header">
<h1>News <small>Anime & Manga News</small></h1>
</div>
<?php
require_once('simplepie/autoloader.php');
$feed = new SimplePie();
$feed->set_feed_url("http://myanimelist.net/rss.php?type=news");
$feed->init();
$feed->handle_content_type();
foreach ($feed->get_items() as $item){
if (($item->get_title())!="") {
?>
<h2><?php echo $item->get_title(); ?></h2><br>
<?php echo $item->get_description(); ?><br>
<small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small><br><a class="btn" href="<?php echo $item->get_permalink(); ?>">Read more &raquo;</a>
<hr>
<?php }} ?>
</div>
<div class="span3">
<h2>Your history</h2>
<p>F*#ckin awesome news now included!</p>
<p><a class="btn" href="#">View details &raquo;</a></p>
</div>
</div>
<?php include('footer.php') ?>