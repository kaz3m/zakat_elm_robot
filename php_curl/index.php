<?php

include 'curl.class.php';
echo '<pre>';


$curl = new telegramRobotSeriesCurl();
$curl = $curl->doCurl("https://zakat-elm.herokuapp.com/");


print_r($curl);