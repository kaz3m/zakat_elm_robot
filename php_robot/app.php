<?php

class app
{

    private static $name = '';
    private static $bot_token = '';

    public static function setName(string $name)
    {
        self::$name = $name;
    }

    public static function setToken(string $bot_token)
    {
        self::$bot_token = $bot_token;
    }

    public static function dump($var){
        //echo "<pre>";
        print_r($var);
        //echo "</pre>";
    }

    public static function access()
    {
        return ( isset($_COOKIE['admin']) && $_COOKIE['admin'] == getenv('ZAKAT_ELM_PASSWORD') ) ? true : false;
    }
    
}