<?php
/**
 * Project: mms.
 * File name: test.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 10:21 AM
 * Email: kenzaki@xiao.vn
 */
include_once("./class/Database.Class.php");
include_once("./class/Info.Class.php");
include_once("./class/Contact.Class.php");
$connect = new \mms\Database();
$info = @mysql_query("SELECT * FROM `info` WHERE id='312157777'");
$ui = @mysql_fetch_array( $info );
echo $ui['fullname'];
$inf = new \mms\InfoClass();
$inf->SetPhone("312157777","0935765797");
$email = $inf->GetInfo("email","312157777");
echo $email;
$inf = new \mms\ContactClass();
echo $inf->GetContact("312157777",1);
$inf->AddContact("312157777",2,"kenzakivn");
$to = "xuanthuongcr@gmail.com";
$subject = "This is subject";
$message = "This is simple text message.";
$header = "From:abc@somedomain.com \r\n";
$retval = mail ($to,$subject,$message,$header);
if( $retval == true )
{
    echo "Message sent successfully...";
}
else
{
    echo "Message could not be sent...";
}

