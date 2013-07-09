<?php
/**
 * Project: mms.
 * File name: checkemail.fnc.php
 * Author: sangtd
 * Date: 7/9/13
 * Time: 10:11 AM
 * Email: kenzaki@xiao.vn
 */


include_once "function.php";
$conn = new \mms\Database();
$email = strip_tags(trim($_REQUEST['email']));

if(strlen($email) <= 5)
{
  echo json_encode(array('code'  =>  -1,
    'result'  =>  'Email này không hợp lệ. Hãy thử lại.'
  ));
  die;
}

// Query database to check if the username is available
$query = "Select * from account where email = '{$email}' ";
// Execute the above query using your own script and if it return you the
// result (row) we should return negative, else a success message.

$result = mysql_query($query);
$available = mysql_num_rows($result);

if($available)
{
  echo json_encode(array('code'  =>  0,
    'result'  =>  "Email này đã có người sử dụng"
  ));
  die;
}
else
{
  echo  json_encode(array('code'  =>  1,
    'result'  =>  "Bạn có thể sử dụng email <b>$email</b>."
  ));
  die;
}
die;
?>