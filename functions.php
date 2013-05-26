<?php
/*---Minify HTML---*/
function sanitize_output($buffer) {
	$search  = array(
		'/\>[^\S ]+/s', //strip whitespaces after tags, except space
		'/[^\S ]+\</s', //strip whitespaces before tags, except space
		'/(\s)+/s' // shorten multiple whitespace sequences
	);
	$replace = array(
		'>',
		'<',
		'\\1'
	);
	$buffer  = preg_replace($search, $replace, $buffer);
	return $buffer;
}
ob_start("sanitize_output");
//measure generating time
$time  = microtime();
$time  = explode(' ', $time);
$time  = $time[1] + $time[0];
$start = $time;

$animeValues = array(
	"watching",
	"completed",
	"on-hold",
	"dropped",
	"plan to watch"
);
$mangaValues = array(
	"reading",
	"completed",
	"on-hold",
	"dropped",
	"plan to read"
);
function getResponseCode($url) {
	$headers = get_headers($url);
	return substr($headers[0], 9, 3);
}
function http_auth_get($url, $username, $password, $method = "GET") {
	if (getResponseCode($url) != ("200" || "401")) {
		return getResponseCode($url);
	} else {
		$opts = array(
			"http" => array(
				"method" => $method,
				"header" => "Authorization: Basic " . base64_encode("$username:$password")
			)
		);
		$file = @fopen($url, "r", false, stream_context_create($opts));
		if ($file) {
			return stream_get_contents($file);
		} else {
			return "null";
		}
	}
}
function fetchJson($url) {
	if (getResponseCode($url) != "200") {
		return getResponseCode($url);
	} else {
		$search     = array(
			"http://mal-api.com/",
			"/",
			"?"
		);
		$replace    = array(
			"",
			"-",
			"-"
		);
		$cache_file = 'cache/' . str_replace($search, $replace, $url . '.json');
		// CACHING
		if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * 10))) {
			$file = file_get_contents($cache_file, 0, null, null);
		} else {
			$file = file_get_contents($url, 0, null, null);
			file_put_contents($cache_file, $file, LOCK_EX);
		}
		return json_decode($file, true);
	}
}
//LOGIN FUNCTIONS
$salt = "FEGUFRetux3brepejewrExErAvEjeQ";
function encryptPass($sValue, $sSecretKey) {
	return rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $sSecretKey, $sValue, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))), "\0");
}
function decryptPass($sValue, $sSecretKey) {
	return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $sSecretKey, base64_decode($sValue), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)), "\0");
}
function isLoggedIn() {
	return isset($_COOKIE["username"]) && isset($_COOKIE["password"]);
}
function printAlert($type, $text) {
	echo '<div class="alert alert-' . $type . '"><strong>' . strtoupper($type) . '</strong> ' . $text . '</div>';
}
function search($forwhat, $query) {
	return fetchJson("http://mal-api.com/" . $forwhat . "/search?q=" . $query);
}
function isYourThing() {
	return isLoggedIn() && $_GET["username"] == $_COOKIE["username"];
}
function getData($forwhat, $data) {
	return fetchJson("http://mal-api.com/" . $forwhat . "/" . $data);
}
function getDataAuth($forwhat, $data) {
	$url      = "http://mal-api.com/" . $forwhat . "/" . $data . "?mine=1";
	$password = decryptPass($_COOKIE["password"], $GLOBALS["salt"]);
	return json_decode(http_auth_get($url, $_COOKIE["username"], $password), true);
}
?>