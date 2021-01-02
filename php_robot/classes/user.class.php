<?php



class userDetails 
{

	public function isAdminLoggedIn() 
	{
		return ( isset($_COOKIE['admin']) && $_COOKIE['admin'] == getenv('ZAKAT_ELM_PASSWORD') ) ? true : false;
	}
}