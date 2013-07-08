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
include_once "./config.php";


class Database {
  var $connection;
  var $sf;

  function __construct() {
    /*
     * This function is connect to Database with info on config.php file.
    */
    $this->connection = mysql_connect(DBHOST, DBUSER, DBPASS) or die(mysql_error());
    mysql_select_db(DBDATA, $this->connection);
    mysql_set_charset('utf8', $this->connection);
  }

  function sf($unit, $table) {
    /*
     * This function is select $unit from $table.
     */
    return mysql_query("SELECT ".$unit." FROM ".$table, $this->connection);
    $this->sf();
  }

  function __destruct() {
    /*
     * Close connection;
     */
    mysql_close($this->connection);
  }
}