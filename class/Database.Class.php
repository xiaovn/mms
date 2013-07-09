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
define("DBHOST","192.168.1.13");
define("DBUSER","kenzaki");
define("DBPASS","");
define("DBDATA","mms");

class Database {
  var $connection;

  function __construct() {
    /*
     * This function is connect to Database with info on config.php file.
    */
    $this->connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die(mysql_error());
    mysql_select_db(DBDATA, $this->connection);
    mysql_set_charset('utf8', $this->connection);
  }
  function __destruct() {
    /*
     * Close connection;
     */
    mysql_close($this->connection);
  }
}