<?php
include("functions.php");
$somethingWritten=(isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["log-in"])) && ($_POST["user"]!="" && $_POST["pass"]!="");
if ($somethingWritten) {
if (http_auth_get("http://myanimelist.net/api/account/verify_credentials.xml",$_POST["user"],$_POST["pass"])!="null") {
$expire=time()+60*60*24*30;
setcookie("username", $_POST["user"],$expire);
setcookie("password", encryptPass($_POST["pass"], $salt),$expire);
header("Location: profile.php?username=".$_POST["user"]);
} else {
include("header.php");
printAlert("error","Wrong username or password!");
include("footer.php");
}
}
if (isset($_POST["log-out"])) {
setcookie("username", "", time()-3600);
setcookie("password", "", time()-3600);
header("Location: index.php");
}
elseif (!$somethingWritten){
include("header.php");
printAlert("error","You left some fields blank!");
include("footer.php");
}
?>