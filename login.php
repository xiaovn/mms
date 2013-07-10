<?php
/**
 * Project: mms.
 * File name: login.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 3:28 PM
 * Email: kenzaki@xiao.vn
 */
include_once('header.php');
if(isset($_POST['login']))
{
  include_once "./class/function.php";
  $username = mysql_real_escape_string($_POST["username"]);
  $password = md5(mysql_real_escape_string($_POST["password"]));
  $cl = mysql_query("SELECT * FROM account WHERE (username = '".$username."' OR id = '".$username."' OR email = '".$username."') AND password = '".$password."'");
  if(mysql_num_rows($cl) == 1)
  {
    $row = mysql_fetch_array($cl);
    $_SESSION['xID'] = $row['id'];
    $_SESSION['xUser'] = $row['username'];
    $_SESSION['xEmail'] = $row['email'];
    $_SESSION['LoggedIn'] = 1;
    if($row['group'] == 7)
    {
      $_SESSION['isAdmin'] = 1;
    }
    else{$_SESSION['isAdmin'] = 0;}
    echo "<h1>Success</h1>";
    echo "<p>We (".$_SESSION['xID'].")  are now redirecting you to the member area.</p>";
  }
  else
  {
    echo "<h1>Error</h1>";
    echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";
  }
}
?>
  <div id="forgot-form" class="modal hide fade">
    <div class="modal-header">
      <a class="close" data-dismiss="modal">&times;</a>
      <h3><?php _e('Account Recovery'); ?></h3>
    </div>
    <div class="modal-body">
      <div id="message"></div>
      <form action="forgot.php" method="post" name="forgotform" id="forgotform" class="form-stacked forgotform normal-label">
        <div class="controlgroup forgotcenter">
          <label for="usernamemail"><?php _e('Username or Email Address'); ?></label>
          <div class="control">
            <input id="usernamemail" name="usernamemail" type="text"/>
          </div>
        </div>
        <input type="submit" class="hidden" name="forgotten">
      </form>
    </div>
    <div class="modal-footer">
      <button data-complete-text="<?php _e('Done'); ?>" class="btn btn-primary pull-right" id="forgotsubmit"><?php _e('Submit'); ?></button>
      <p class="pull-left"><?php _e('Easy to recovery your account.'); ?></p>
    </div>
  </div>

  <div class="row">
    <div class="main login">
      <form method="post" class="form normal-label" action="login.php">
        <fieldset>
          <h4><?php _e('Sign in to MMS'); ?></h4>
          <div class="control-group">
            <label for="username" class="login-label"><?php _e('Username or ID or Email Address'); ?></label>
            <div class="controls">
              <input class="xlarge" id="username" name="username" maxlength="30" type="text"/>
              <span class="forgot"><a data-toggle="modal" href="#forgot-form" id="forgotlink" tabindex=-1><?php _e('Forget your password'); ?></a>?</span>
            </div>
          </div>

          <div class="control-group">
            <label for="password" class="login-label"><?php _e('Password'); ?></label>
            <div class="controls">
              <input class="xlarge" id="password" name="password" size="30" type="password"/>
            </div>
          </div>
        </fieldset>

        <input type="hidden" name="token" value="<?php echo $_SESSION['jigowatt']['token']; ?>"/>
        <input type="submit" value="<?php _e('Log in'); ?>" class="btn login-submit" id="login-submit" name="login"/>

        <label class="remember" for="remember">
          <input type="checkbox" id="remember" name="remember"/><span><?php _e('Stay signed in'); ?></span>
        </label>

        <p class="signup"><a href="signup.php"><?php _e('New member? <strong>Join now!</strong>'); ?></a></p>

      </form>
    </div>

  </div>
<?php include_once('footer.php'); ?>