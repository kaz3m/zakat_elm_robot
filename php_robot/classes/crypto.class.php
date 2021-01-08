<?php

class displayBitcoinPrice 
{
	
	/*
	Being Thankful Towards Knowledge is to share it ...
	-Imam Ali
	coded by: Kazem
	https://github.com/kaz3m/zakat_elm_robot
	*/
	public function returnBtcEuro() 
	{
		$url = "https://bitpay.com/api/rates";
		$json = json_decode(file_get_contents($url));
		$dollar = $btc = 0;
		foreach($json as $obj){
			if ($obj->code == 'EUR') 
			{
				return number_format(substr((string)$obj->rate, 0, -3));
			}
		}

	}
}
