<?php

class DBConnection
{
  /*
    Being Thankful Towards Knowledge is to share it ...
    -Imam Ali
    coded by: Kazem
    https://github.com/kaz3m/zakat_elm_robot
  */
  public $host;
  public $username;
  public $password;
  public $dbname;
  public $mysqli;
  public $db;
  public $conn;
  public function __construct()
  {

      $this->db = parse_url(getenv("DATABASE_URL"));
      $this->db["path"] = ltrim($this->db["path"], "/");
      $this->conn = pg_connect(getenv("DATABASE_URL")) or die('died');

  }
  public function runQuery($query)
  {
    $result = pg_query($this->conn, $query);
    if (!$result)
    {
      return FALSE;
    }
    else
    {
      return $result;
    }

  }

  public function returnNumRows($query) 
  {
    $result = pg_query($this->conn, $query);
    $num_rows = pg_num_rows($result);
    return $num_rows;
  }

}





 ?>
