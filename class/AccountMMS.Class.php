<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Thuong
 * Date: 7/8/13
 * Time: 9:14 AM
 * To change this template use File | Settings | File Templates.
 */
namespace mms;
session_start();
include_once "../class/function.php";
class AccountMMS {

    function testAccountExist($UserName)
    {
        $q="SELECT * FROM `account` WHERE username =' ".$UserName." '";
        $countRecord=mysql_num_rows(mysql_query($q));
        if($countRecord==0)
        {
            return true;
        }
        else return false;

    }
    function CreateAccount($id,$userName,$passWord,$confirmPassword,$email,$group)
    {
        if(isset($passWord ))
        {
            if($passWord==$confirmPassword)
            {
                if(self::testAccountExist($userName)==true)
                {
                    $q="INSERT INTO `account`(`id`, `username`, `password`,email, `group`) VALUES ('".$id."','".$userName."','".$passWord."','".$email."',".$group.")";
                    mysql_query($q);
                    return true;
                }
            }
        }
        return false;
    }
     function DeleteAccount($UserName)
     {
         $q="DELETE FROM `account` WHERE username='".$UserName."'";
         mysql_query($q);
     }

     function ChangePassword($username,$passWord,$newPassWord,$confirmNewPassword)
     {
         if(isset($newPassWord))
         {   echo "abc<br>";
             if($newPassWord==$confirmNewPassword)
             {
                    $q="select * from account where username='".$username."' and password='".$passWord."'";
                    echo $q."<br> ngoai";
                    if(mysql_num_rows(mysql_query($q))==1)
                    {
                        $q="UPDATE account SET password='".$newPassWord."' where username='".$username."'";
                        echo $q;
                        mysql_query($q);
                        return true;
                    }


             }

         }
         else return false;

     }
    function Login($userName,$passWord)
    {
        $q="select * from account where username='".$userName."' and password='".$passWord."'";
        $result=mysql_query($q);
        if(mysql_num_rows($result)==1)
        {   $r = mysql_fetch_array($result);

            $_SESSION['userid'] = $r['id'];
            $_SESSION['username'] = $r['username'];
            $_SESSION['email']=$r['email'];



            return true;
        }
        else return false;
    }
    public function AutoCreateID()
    {
      include_once "Database.Class.php";
      $connect = new Database();
      $id = "";
      do
      {
        $id .= "3121";
        $rdc = rand(1000,9999);
        $id .= $rdc;
        $id .= "7";
      }
      while(mysql_num_rows(mysql_query("SELECT * FROM account WHERE id = '".$id."'")));
      return $id;
    }


}