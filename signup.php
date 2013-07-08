<?php
/**
 * Project: mms.
 * File name: signup.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 3:47 PM
 * Email: kenzaki@xiao.vn
 */
include_once('header.php');
include_once('./class/function.php');
$nmem = new \mms\AccountMMS();
$nid = $nmem->AutoCreateID();
$_SESSION['MMS']['nid'] = $nid;
?>

  <div class="row">
    <div class="span6">
      <form class="form-horizontal" method="post" action="signup.php" id="sign-up-form">
        <fieldset>
          <div class="control-group">
            <label class="control-label" for="name"><?php _e('Your ID'); ?></label>
            <div class="controls">
              <span class="uneditable-input"><?php echo $nid; ?></span>
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
        </fieldset>
        <input type="hidden" name="token" value="<?php echo $_SESSION['jigowatt']['token']; ?>"/>
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

<?php include_once('footer.php'); ?>