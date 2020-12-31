<?php


//setcookie("COOKIE NAME", "COOKIE VALUE", time()+3600, "/", "localhost", 1);

if (isset($_COOKIE) && !empty($_COOKIE)) 
{

	echo '<pre>';
	print_r($_COOKIE);

}

$adminCookie = "emFrYXRfZWxtX3JvYm90";

if (isset($_COOKIE['admin']) && !empty($_COOKIE['admin']) &&  base64_decode($_COOKIE) == 'zakat_elm_robot') 
{

	echo 'SHOMA DASTRESI ADMIN DARID' . PHP_EOL;
}