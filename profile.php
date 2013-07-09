<?php
/**
 * Project: mms.
 * File name: profile.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 3:59 PM
 * Email: kenzaki@xiao.vn
 */
session_start();
include_once('./class/function.php');
include_once('header.php');
$profile = new \mms\MemberClass();

?>

  <h1>

    <a href="http://gravatar.com/emails/" class="a-tooltip" data-rel="tooltip-bottom" title="<?php _e('Change your avatar at Gravatar.com'); ?>">
      <img class="gravatar thumbnail" src="<?php echo $profile->get_gravatar('kenzakivn@gmail.com', false, 54); ?>"/>
    </a>

    kenzaki (Ken Zaki)

  </h1>

  <br>

  <div class="tabs-left">

    <ul class="nav nav-tabs">
      <li class="active"><a href="#usr-control" data-toggle="tab"><i class="icon-cog"></i> <?php _e('General'); ?></a></li>
    </ul>

    <form class="form-horizontal" method="post" action="./Control/changePasswordControl.php">
      <div class="tab-content">

          <div class="tab-pane fade in active" id="usr-control">
            <fieldset>
              <legend><?php _e('General'); ?></legend>
              <div class="control-group">
                <label class="control-label" for="CurrentPass"><?php _e('Current password'); ?></label>
                <div class="controls">
                  <input type="password" autocomplete="off" class="input-xlarge" id="CurrentPass" name="CurrentPass">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="name"><?php _e('Name'); ?></label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="name" readonly="true" name="name" value="<?php echo $_SESSION['fullname']; ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="email"><?php _e('Email'); ?></label>
                <div class="controls">
                  <input type="email" readonly="true" class="input-xlarge" id="email" name="email" value="<?php echo $_SESSION['email'];?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="password"><?php _e('New password'); ?></label>
                <div class="controls">
                  <input type="password" autocomplete="off" class="input-xlarge" id="password" name="password" placeholder="<?php _e('Leave blank for no change'); ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="confirm"><?php _e('New password again'); ?></label>
                <div class="controls">
                  <input type="password" autocomplete="off" class="input-xlarge" id="confirm" name="confirm">
                </div>
              </div>

                <div class="control-group">
                  <label class="control-label" for="confirm"><?php _e('Your public link'); ?></label>
                  <div class="controls">
                    <span class="uneditable-input">profile.php?uid=1</span>
                  </div>
                </div>

            </fieldset>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?php _e('Save changes'); ?></button>
          </div>

      </div>
    </form>
  </div>

<?php include ('footer.php'); ?>