<?php

/*
    Being Thankful Towards Knowledge is to share it ...
    -Imam Ali
    coded by: Kazem
    https://github.com/kaz3m/zakat_elm_robot
*/
require 'init.php';

app::setName($app_name);
app::setToken($admin_password);



if ( $_SERVER['REQUEST_URI'] == '/'.$bot_token )
{
    $telegram = new TelegramBot($bot_token, $bot_name);
    $telegram->serve();
    exit();
}

if ( app::access() )
{

    switch($_SERVER['REQUEST_URI'])
    {
        case '/getMe':
        {
            $telegram = new TelegramBot($bot_token, $bot_name);
            $result = $telegram->getMe();
            $app = new app();
            $app->dump($result);
            break;
        }
        case '/getWebhook':
        {
            $telegram = new TelegramBot($bot_token, $bot_name);
            $result = $telegram->getWebhookInfo();
            app::dump($result);
            break;
        }
        case '/setWebhook':
        {
            $bot_webhook = "https://" . $app_name . '.herokuapp.com/' . $bot_token;
            $telegram_url = TELEGRAM_BOT_API_URI.$bot_token;
            $result = file_get_contents($telegram_url.'/setWebhook?url=' . $bot_webhook);
            app::dump($result);
            break;
        }
        case '/unsetWebhook':
        {
            $telegram = new TelegramBot($bot_token, $bot_name);
            $result = $telegram->setWebhook(['url'=>null]);
            app::dump($result);
            break;
        }
        case '/deleteWebhook':
        {
            $telegram = new TelegramBot($bot_token, $bot_name);
            $result = $telegram->deleteWebhook ();
            app::dump($result);
            break;
        }
        case '/getUpdates':
        {
            $telegram = new TelegramBot($bot_token, $bot_name);
            $result = $telegram->getUpdates();
            app::dump($result);
        }
        default:
        {
            exit('<h1>dar hale enteghal✌️</h1><meta http-equiv="refresh" content="5; URL='.SITE_URL.'ZAKAT_ELM_ADMIN" />');
        }
    } // switch
    
} 
else 
{
    include('login.php');
}

