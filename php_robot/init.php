<?php


define('TELEGRAM_BOT_API_URI', 'https://api.telegram.org/bot');
$bot_token = str_rot13(base64_decode(getenv('TELEGRAM_BOT_TOKEN')));
$bot_name = getenv('TELEGRAM_BOT_NAME');
$app_name = getenv('HEROKU_APP_NAME');
$admin_password = getenv('ZAKAT_ELM_PASSWORD');
define("SITE_URL", 'https://' . $app_name . '.herokuapp.com/');
require 'app.php';
require 'telegram.php';
require 'classes/' . 'user.class.php';