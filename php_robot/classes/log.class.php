<?php

class doLogs
{
  public $username;
  public $chat_id;
  public $dbconn;
  public $fromArray;
  public function __construct($username, $chat_id, $fromArray, $action='viewList')
  {
    $this->DBConn = new DBConnection();
    $this->username = $username;
    $this->chat_id = $chat_id;
    $this->fromArray = $fromArray;

  }
  public function addUserToDB() 
  {
    $today = date("Y-m-d h:m:s");
    $other_info = base64_encode(json_encode($this->fromArray));

    (@$this->fromArray['id']) ? $chat_id = $this->fromArray['id'] : $chat_id = NULL;
    (@$this->fromArray['first_name']) ? $first_name = $this->fromArray['first_name'] : $first_name = NULL;
    (@$this->fromArray['language_code']) ? $language_code = $this->fromArray['language_code'] : $language_code = NULL;

    $selectQS = "SELECT id FROM public.users_zakat_elm_robot WHERE chat_id='".$chat_id."'";
    $num_rows = $this->DBConn->returnNumRows($selectQS);
    if ($num_rows == 0) 
    {
      $insertQS = "INSERT INTO public.users_zakat_elm_robot (id, chat_id, first_name, language_code, other_info, date_joined) 
      VALUES (DEFAULT, '".$chat_id."', '".$first_name."', '".$language_code."', '".$other_info."', '".$today."')"; 
      $this->DBConn->runQuery($insertQS);

    }
  }

}

?>
