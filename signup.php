<?php
/**
 * Project: mms.
 * File name: signup.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 3:47 PM
 * Email: kenzaki@xiao.vn
 */
session_start();
include_once('header.php');
if(isset($_POST['username']))
{
  include_once "./class/function.php";
  $xid = $_SESSION['nid'];
  $username = mysql_real_escape_string($_POST["username"]);
  $password = md5(mysql_real_escape_string($_POST["password"]));
  $fullname = mysql_real_escape_string($_POST["name"]);
  $email = mysql_real_escape_string($_POST["email"]);
  $conn = new \mms\Database();
  $checkacc= mysql_query("SELECT * FROM account WHERE username = '".$username."' OR id = '".$xid."'");
  if(!mysql_num_rows($checkacc))
  {
    $newacc = new \mms\AccountMMS();
    $newacc->CreateAccount($xid,$username,$password,$email,4);
    echo "<h1>Success!</h1>";
    echo "<p>Thank for Sign up! Please check your email to get active link!</p>";
    //header("Location: index.php");
  }
  else
  {
    echo "<h1>Error</h1>";
    echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";
  }
  //echo $_SESSION['nid'];
}
else
{

include_once('./class/function.php');
$nmem = new \mms\AccountMMS();
$nid = $nmem->AutoCreateID();
$_SESSION['nid'] = $nid;
?>
  <script type="text/javascript">
    //function to create ajax object
    function pullAjax(){
      var a;
      try{
        a=new XMLHttpRequest()
      }
      catch(b)
      {
        try
        {
          a=new ActiveXObject("Msxml2.XMLHTTP")
        }catch(b)
        {
          try
          {
            a=new ActiveXObject("Microsoft.XMLHTTP")
          }
          catch(b)
          {
            alert("Your browser broke!");return false
          }
        }
      }
      return a;
    }

    function validate()
    {
      site_root = './class/';
      var x = document.getElementById('username');
      var msg = document.getElementById('msg');
      user = x.value;

      code = '';
      message = '';
      obj=pullAjax();
      obj.onreadystatechange=function()
      {
        if(obj.readyState==4)
        {
          eval("result = "+obj.responseText);
          code = result['code'];
          message = result['result'];

          if(code <=0)
          {
            x.style.border = "1px solid red";
            msg.style.color = "red";
          }
          else
          {
            x.style.border = "1px solid #000";
            msg.style.color = "green";
          }
          msg.innerHTML = message;
        }
      }
      obj.open("GET",site_root+"checkuser.fnc.php?username="+user,true);
      obj.send(null);
    }
    function validate2()
    {
      site_root = './class/';
      var x2 = document.getElementById('email');
      var msg2 = document.getElementById('msg2');
      email = x2.value;

      code = '';
      message = '';
      obj2=pullAjax();
      obj2.onreadystatechange=function()
      {
        if(obj2.readyState==4)
        {
          eval("result = "+obj2.responseText);
          code = result['code'];
          message = result['result'];

          if(code <=0)
          {
            x2.style.border = "1px solid red";
            msg2.style.color = "red";
          }
          else
          {
            x2.style.border = "1px solid #000";
            msg2.style.color = "green";
          }
          msg2.innerHTML = message;
        }
      }
      obj2.open("GET",site_root+"checkemail.fnc.php?email="+email,true);
      obj2.send(null);
    }
  </script>

  <div class="row">
    <div class="span6">
      <form class="form-horizontal" method="post" action="signup.php" id="sign-up-form">
        <fieldset>
          <div class="control-group">
            <label class="control-label" for="name"><?php _e('Your ID'); ?></label>
            <div class="controls">
              <span class="uneditable-input"><?php echo $nid; ?></span>
              <input type="hidden" name="uid" value="<?php echo $nid; ?>">
              </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="name"><?php _e('Full name'); ?></label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="name" name="name" value="" placeholder="<?php _e('Full name'); ?>">
            </div>
          </div>
          <div class="control-group" id="usrCheck">
            <label class="control-label" for="username"><?php _e('Username'); ?></label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="username" name="username" maxlength="15" value="" placeholder="<?php _e('Choose your username'); ?>">

            </div>
          </div>
          <div class="control-group">
           <div class="controls">
             <a onclick="validate();" class="btn btn-info btn-small"><?php _e('Check Available'); ?> &raquo;</a>
             <div id="msg"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password"><?php _e('Password'); ?></label>
            <div class="controls">
              <input type="password" class="input-xlarge" id="password" name="password" placeholder="<?php _e('Create a password'); ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password_confirm"><?php _e('Password again'); ?></label>
            <div class="controls">
              <input type="password" class="input-xlarge" id="password_confirm" name="password_confirm" placeholder="<?php _e('Confirm your password'); ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="email"><?php _e('Email'); ?></label>
            <div class="controls">
              <input type="email" class="input-xlarge" id="email" name="email" value="" placeholder="<?php _e('Email'); ?>">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <a onclick="validate2();" class="btn btn-info btn-small"><?php _e('Check Available'); ?> &raquo;</a>
              <div id="msg2"></div>
            </div>
          </div>
        </fieldset>
        <button type="submit" class="btn btn-primary"><?php _e('Create my account'); ?></button>
      </form>
    </div>
    <div class="span6">
      <h1><?php _e('Create a new account'); ?></h1>
      <p><?php _e('Account is Passport ID in MMS, with account, you can using every service is easy.'); ?></p>
      <h2><?php _e('Features'); ?></h2>
      <p><?php _e('If you have account, please login here.'); ?></p>
    </div>
  </div>

<?php
}
include_once('footer.php');
?>