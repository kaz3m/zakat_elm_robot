<?php


define('TELEGRAM_BOT_API_URI', 'https://api.telegram.org/bot');
$bot_token = str_rot13(base64_decode(getenv('TELEGRAM_BOT_TOKEN')));
$bot_name = getenv('TELEGRAM_BOT_NAME');
$app_name = getenv('HEROKU_APP_NAME');
$admin_password = getenv('ZAKAT_ELM_PASSWORD');
define("SITE_URL", 'https://' . $app_name . '.herokuapp.com/');

require_once 'classes/' . 'user.class.php';
require_once 'classes/' . 'db.class.php';
require_once 'classes/' . 'log.class.php';
require_once 'classes/' . 'msg.class.php';
require_once 'classes/' . 'post.class.php';
require_once 'classes/' . 'crypto.class.php';
require_once 'inc/' . 'jdf.php';

require_once 'app.php';
require_once 'telegram.php';