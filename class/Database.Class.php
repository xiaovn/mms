<?php
/**
 * Project: mms.
 * File name: Database.Class.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 9:34 AM
 * Email: kenzaki@xiao.vn
 */

namespace mms;



class Database {
  private $host;
  private $user;
  private $password;
  private $database;
  public function Database($host,$user,$pass,$data)
  {
    $this->host = $host;
    $this->user = $user;
    $this->password = $pass;
    $this->database = $data;
  }
  public function ConnectData($host,$user,$pass,$data)
  {
    $Connect = mysql_connect("{$host}","{$user}","{$pass}");
    if (!$Connect)
    {
      die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("{$data}", $Connect);
    mysql_query("set names 'utf8' ");
  }
  public function CloseConnect()
  {

  }
}