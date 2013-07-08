<?php
/**
 * Project: mms.
 * File name: Contact.Class.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 10:42 AM
 * Email: kenzaki@xiao.vn
 */

namespace mms;


class ContactClass {
  public function AddContact($uid,$metaid,$meta)
  {
    if(mysql_num_rows(mysql_query("SELECT * FROM `contact` WHERE id='{$uid}' and metaid='{$metaid}'")) > 0)
    {
        mysql_query("UPDATE `contact` SET `meta` = '{$meta}' WHERE id='{$uid}' and metaid='{$metaid}' LIMIT 1 ;");
    }
    else
    {
        @$a=mysql_query("INSERT INTO contact(id,metaid,meta) VALUES ('{$uid}', '{$metaid}','{$meta}')");
    }
  }
  public function GetContact($uid,$metaid)
  {
    $ctl = @mysql_query("SELECT * FROM `contact` WHERE id='{$uid}' and $metaid = '{$metaid}'");
    $ct = @mysql_fetch_array( $ctl );
    return $ct['meta'];
  }
}