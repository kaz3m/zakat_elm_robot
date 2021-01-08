<?php



class userDetails 
{
	/*
	Being Thankful Towards Knowledge is to share it ...
	-Imam Ali
	coded by: Kazem
	https://github.com/kaz3m/zakat_elm_robot
	*/

	public function isAdminLoggedIn() 
	{
		return ( isset($_COOKIE['admin']) && $_COOKIE['admin'] == getenv('ZAKAT_ELM_PASSWORD') ) ? true : false;
	}
}