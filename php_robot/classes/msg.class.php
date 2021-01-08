<?php



class sendMsgTelegram 
{
	/*
	class: php class to send a message on telegram
	Being Thankful Towards Knowledge is to share it ...
	-Imam Ali
	coded by: Kazem
	https://github.com/kaz3m/zakat_elm_robot
	*/
	private $botToken;
	public function __construct() 
	{
		$this->botToken = $bot_token;
	}
	public function send($method, $params) 
	{
		$website = "https://api.telegram.org/bot" . $this->botToken;
		$ch = curl_init($website . '/'.$method);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		curl_close($ch);
	}

}