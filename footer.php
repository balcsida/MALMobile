<hr>
<footer>
<div class="row-fluid">
<div class="span4"><a href="http://balcsida.hu"><img src="img/balcsida_minilogo.png" width="130" height="25" alt="Powered by balcsida"></a></div>
<div class="span4 text-center">
<?php
// MEASURING GENERATING TIME
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo 'Generated under '.$total_time.' sec';
?>
</div>
<div class="span4 text-right" id="footer-links">
<a href="pin.html">Pin to start!</a>
<a href="changelog.php">Changelog</a>
<a href="about.php">About</a>
</div>
</div>
</footer>
</div> <!-- /container -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="js/vendor/jquery.tablesorter.min.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="js/vendor/jquery.smooth-scroll.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>