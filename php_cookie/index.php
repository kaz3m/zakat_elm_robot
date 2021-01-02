<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
echo 'some random output '.PHP_EOL;
$adminCookie = "emFrYXRfZWxtX3JvYm90";
setcookie("admin", $adminCookie, time()+3600*3000, "/");

if ( isset($_COOKIE) && !empty($_COOKIE) ) 
{

	echo '<pre>';
	print_r($_COOKIE);

}



if (isset($_COOKIE['admin']) && !empty($_COOKIE['admin']) &&  base64_decode($_COOKIE['admin']) == 'zakat_elm_robot') 
{
	echo '<h1>SHOMA DASTRESI ADMIN DARID</h1>' . PHP_EOL;
}