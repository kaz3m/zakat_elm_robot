<?php
class TelegramBot
{
    /*
        Being Thankful Towards Knowledge is to share it ...
        -Imam Ali
        coded by: Kazem
        https://github.com/kaz3m/zakat_elm_robot
    */
    private $uri = 'https://api.telegram.org/bot';
    private $name = '';
    private $admin_list = [];

    public function __construct(string $bot_token, string $bot_name)
    {
        $this->uri = $this->uri . $bot_token;
        $this->name = $bot_name;
    }

    public function __call($name, $args)
    {
        return $this->call($name, count($args) === 0 ? [] : $args[0]);
    }

    public function call($method, $params = null)
    {
        $handle = curl_init($this->uri.'/'.$method);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($handle, CURLOPT_TIMEOUT, 60);
        curl_setopt($handle, CURLOPT_POST, true);
        curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($handle, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        
        $response = curl_exec($handle);

        return ($response) ? json_decode($response, true) : false;
    }

    public function getName()
    {
        return $this->name;
    }

    public function filterText(string $text)
    {
        return str_replace($this->name, "", $text);
    }

    private function request()
    {
        return json_decode(file_get_contents("php://input"), true);
    }

    public function serve()
    {

        $update = $this->request();

        if ($update && isset($update["message"])) 
        {
        
            $message = $update['message'];
            
            $message_id = $message['message_id'];
            $from_id = $user_id = $message['from']['id'];
            $chat_id = $message['chat']['id'];
            $fromArray = $message['from'];
            $text = $this->filterText($message['text']);

            switch($text)
            {
                case '/start':
                
                $doLogs = new doLogs($from_id, $chat_id, $fromArray, 'viewLis');
                $doLogs->addUserToDB();
                    $tgPost = new telegramPostBuilder();
                    $tgPost = $tgPost->buildPost($tgPost->startPostContent, 'salavat');
                    $this->sendMessage([
                        'chat_id' => $chat_id,
                        'text' => $tgPost 
                    ]);

                break;
                case '/debug':

                    $this->sendMessage([
                        'chat_id' => $chat_id,
                        'text' => json_encode($update)
                    ]);
                    
                break;
                case '/time':

                    $tgPost = new telegramPostBuilder();
                    $imgUrl = $tgPost->getImage();
                    $tgPost = $tgPost->buildTodayPost();

                    $this->sendPhoto([
                        'chat_id' => $chat_id,
                        'photo' => $imgUrl,
                        'caption' => $tgPost
                    ]);
                    
                break;
                case '/btc':

                    $btcPrice = new displayBitcoinPrice();
                    $btcPrice = $btcPrice->returnBtcEuro();
                    $dateStringYear  = jdate("Y");
                    $dateStringMonth  = jdate("F");
                    $dateStringDayName  = jdate("l");
                    $dateStringDayNumber  = jdate("J");
                    $todayString = "✅امروز ";
                    $todayString .= PHP_EOL . $dateStringDayName . ' ' . $dateStringDayNumber . ' ' .  $dateStringMonth . ' ' . $dateStringYear;
                    $postContent = $todayString . PHP_EOL . "💶 👇 قیمت بیت کوین به یورو 👇 💶" . PHP_EOL . PHP_EOL . '<b>' . $btcPrice . '</b>';
                    $tgPost = new telegramPostBuilder();
                    $tgPost = $tgPost->buildPost($postContent, 'salavat');

                    $this->sendMessage([
                        'chat_id' => $chat_id,
                        'text' => $tgPost,
                        'parse_mode' => 'HTML'
                    ]);
                    
                break;
                
                
            }
        }
    }
}
