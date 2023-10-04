<?php 


$server="localhost";
$username="sparrowtechnolog_nsms";
$password="Nsms@1234";
$database="sparrowtechnolog_nsms";

 $site_url = "http://sms.sparrowsofttech.com/";


$con=mysqli_connect($server,$username,$password,$database);

if(!$con)
{
	
	die("Connection Fail....".mysqli_connect_error());
	
}
date_default_timezone_set('Asia/Kolkata');

?> 