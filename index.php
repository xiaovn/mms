<?php
/**
 * Project: mms.
 * File name: index.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 2:19 PM
 * Email: kenzaki@xiao.vn
 */
include_once('header.php');
?>

  <div class="hero-unit">
    <h1><?php _e('Welcome Guest!.'); ?></h1>
    <h2><?php _e('Easy to Registry and Use Service With Us'); ?></h2>
    <p>
      <a href="signup.php" target="_TOP" class="btn btn-info btn-large"><?php _e('New Register'); ?> &raquo;</a>
      <a href="login.php" class="btn btn-large" target="_blank"><?php _e('Member Login'); ?></a>
    </p>
    <p class="info-links">
      <a href="#" target="_blank"><?php _e('Support Center'); ?></a>
      <a href="#" target="_blank"><?php _e('Private Policy'); ?></a>
    </p>
  </div>

  <hr>

  <div class="features">
    <div class="row">
      <h1><?php _e('How to use Member Management System.'); ?></h1>
      <p class="intro"><?php _e('Easy to registry, Easy to Change, Easy to Report.'); ?></p>
      <div class="span6">
        <h2><?php _e('Register'); ?>
            <small><?php _e('One Step'); ?></small>
        </h2>
        <p><?php _e('Only one step to register.'); ?></p>
          <p><?php _e('Start your register by clicking the button below!'); ?></p>
          <p><a href="signup.php" class="btn btn-success"><?php _e('Registry Now!'); ?></a></p>
      </div>

      <div class="span6">
        <h2><?php _e('Reports'); ?></h2>
        <p><?php _e('Your track and activity will show on report automatic.'); ?></p>
      </div>
    </div>

    <div class="row">
      <div class="span6">
        <h2><?php _e('Security'); ?></h2>
        <p><?php _e('Top security for your infomation.'); ?></p>
      </div>

      <div class="span6">
        <h2><?php _e('Email tools'); ?></h2>
        <p><?php _e('Nice daily email service for daily report!'); ?></p>
      </div>
    </div>
  </div>


<?php include_once('footer.php'); ?>