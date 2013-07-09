<?php
/**
 * Project: mms.
 * File name: Signup.Class.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 5:53 PM
 * Email: kenzaki@xiao.vn
 */

namespace mms;
include_once "function.php";

class SignupClass {
  private $settings = array();
  private $error;

  function __construct()
  {
    $this->checkExists();
    if(!empty($_POST)) {
      $this->process();
    }
  }
  public function checkExists() {

    if(!empty($_POST['email']) && !empty($_POST['checkemail'])) {
      $params = array( ':email' => $_POST['email'] );
      $sql = "SELECT `email` FROM `account` WHERE `email` = :email";
    }

    else if(!empty($_POST['username']) && !empty($_POST['checkusername'])) {
      $params = array( ':username' => $_POST['username'] );
      $sql = "SELECT `username` FROM `account` WHERE `username` = :username";
    }
    else return false;
    $stmt = $this->query($sql, $params);
    echo ( $stmt->rowCount() > 0 ) ? "false" : "true";
    exit();

  }
  private function process() {

       // See if all the values are correct
    $this->validate();

    // Sign um up!
    $this->register();

  }
  public function query($query, $params = array()) {

    if ( !is_array( $params ) ) return false;

    $dbh = parent::$dbh;

    if ( empty($dbh) ) return false;

    $stmt = $dbh->prepare($query);
    $stmt->execute($params);

    return $stmt;

  }
  private function validate() {

    if(empty($this->settings['username'])) {
      $this->error .= '<li>'._('You must enter a username.').'</li>';
    } else {
      $params = array( ':username' => $this->settings['username'] );
      $stmt   = $this->query("SELECT * FROM `account` WHERE `username` = :username", $params);
      if ($stmt->rowCount() > 0) $this->error .= '<li>Sorry, username already taken.</li>';
    }
    if(strlen($this->settings['username']) > 11) {
      $this->error .= '<li>'._('Your username must be under 11 characters').'</li>';
    }
    if(empty($this->settings['name'])) {
      $this->error .= '<li>'._('You must enter your name.').'</li>';
    }
    if (!empty($this->settings['email'])) {
      $params = array( ':email' => $this->settings['email'] );
      $stmt = $this->query("SELECT * FROM account WHERE email = :email;", $params);
      if ($stmt->rowCount() > 0)
        $this->error .= '<li>'._('That email address has already been taken.').'</li>';
    }
    if (!parent::isEmail($this->settings['email'])) {
      $this->error .= '<li>'._('You have entered an invalid e-mail address, try again.').'</li>';
    }
    if($this->settings['password'] != $this->settings['password_confirm']) {
      $this->error .= '<li>'._('Your passwords did not match.').'</li>';
    }
    if(strlen($this->settings['password']) < 5) {
      $this->error .= '<li>'._('Your password must be at least 5 characters.').'</li>';
    }
    // Output the errors in a pretty format :]
    $this->error = (isset($this->error)) ? "<div class='alert alert-error alert-block'><h4 class='alert-heading'>"._('Attention!')."</h4>$this->error</div>" : '';

  }
  private function register() {

    if(empty($this->error)) {

      /* See if the admin requires new users to activate */
      $requireActivate = parent::getOption('user-activation-enable');

      /* Log user in when they register */
      $_SESSION['jigowatt']['username'] = $this->settings['username'];

      /* Apply default user_level */
      $_SESSION['jigowatt']['user_level'] = unserialize(parent::getOption('default-level'));

      if ( $requireActivate )
        $_SESSION['jigowatt']['activate'] = 1;

      $_SESSION['jigowatt']['gravatar'] = parent::get_gravatar($this->settings['email'], true, 26);

      /* Create their account */
      $sql = "INSERT INTO account (user_level, name, email, username, password)
						VALUES (:user_level, :name, :email, :username, :password);";
      $params = array(
        ':user_level' => parent::getOption('default-level'),
        ':name'       => $this->settings['name'],
        ':email'      => $this->settings['email'],
        ':username'   => $this->settings['username'],
        ':password'   => parent::hashPassword($this->settings['password'])
      );
      parent::query($sql, $params);

      $user_id = parent::$dbh->lastInsertId();
      $_SESSION['jigowatt']['user_id'] = $user_id;

      /* Social integration. */
      if ( !empty($_SESSION['jigowatt']['facebookMisc']) ) {
        $link = 'facebook';
        $id = $_SESSION['jigowatt']['facebookMisc']['id'];
      }

      if ( !empty($_SESSION['jigowatt']['openIDMisc']) ) {
        $link = $_SESSION['jigowatt']['openIDMisc']['type'];
        $id = $_SESSION['jigowatt']['openIDMisc'][$link];
      }

      if ( !empty($_SESSION['jigowatt']['twitterMisc']) ) {
        $link = 'twitter';
        $id = $_SESSION['jigowatt']['twitterMisc']['id'];
      }

      if ( !empty($link) ) {

        $params = array(
          ':user_id' => $user_id,
          ':id'      => $id,
        );
        parent::query("INSERT INTO `login_integration` (`user_id`, `$link`) VALUES (:user_id, :id);", $params);

      }

      // Update profile fields
      foreach($this->settings as $field => $value) :
        if(strstr($field,'p-')) {
          $field = str_replace('p-', '', $field);
          parent::updateOption($field, $value, true, $user_id);
        }
      endforeach;

      /* Create the activation key */
      if ( $requireActivate ) :
        $key = md5(uniqid(mt_rand(),true));
        $sql = sprintf("INSERT INTO `login_confirm` (`username`, `key`, `email`, `type`)
								VALUES ('%s', '%s', '%s', '%s');",
          $this->settings['username'], $key, $this->settings['email'], 'new_user');
        parent::query($sql);
      endif;

      /* Send welcome email to new user. */
      $msg  = parent::getOption('email-welcome-msg');
      $subj = parent::getOption('email-welcome-subj');

      $shortcodes = array(
        'site_address' => SITE_PATH,
        'full_name'    => $this->settings['name'],
        'username'     => $this->settings['username'],
        'email'        => $this->settings['email'],
        'activate'     => $requireActivate ? SITE_PATH . "activate.php?key=$key" : ''
      );

      if(!parent::sendEmail($this->settings['email'], $subj, $msg, $shortcodes))
        $this->error = _('ERROR. Mail not sent');

      /* Admin notification of new user. */
      $notifyNewUsers = parent::getOption('notify-new-user-enable');
      if ( !empty($notifyNewUsers) ) :

        $msg  = parent::getOption('email-new-user-msg');
        $subj = parent::getOption('email-new-user-subj');
        unset($shortcodes['activate']);

        $userGroup = parent::getOption('notify-new-users');
        if ( !empty($userGroup) ) :
          $userGroup = unserialize($userGroup);

          /* Variable to store all the email addresses of each chosen group. */
          $emails = array();

          foreach ( $userGroup as $level_id ) :

            /* Grab all users within the user group. */
            $params = array( ':level_id' => '%:"' . $level_id . '";%' );
            $sql = "SELECT * FROM `account` WHERE `user_level` LIKE :level_id";
            $stmt = parent::query($sql, $params);

            /* Send email to each user in group. */
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
              $emails[] = $row['email'];
            endwhile;

          endforeach;

          /* Remove duplicates for users with multiple user groups. */
          $emails = array_unique($emails);

          if(!parent::sendEmail($emails, $subj, $msg, $shortcodes, true))
            $this->error = _('ERROR. Mail not sent');

        endif;

      endif;

      unset(
      $_SESSION['jigowatt']['referer'],
      $_SESSION['jigowatt']['token'],
      $_SESSION['jigowatt']['facebookMisc'],
      $_SESSION['jigowatt']['twitterMisc'],
      $_SESSION['jigowatt']['openIDMisc']
      );

      /* After registering, redirect to the page the admin has set in Settings > General > Redirect Options. */
      header('Location: ' . parent::getOption('new-user-redirect') );
      exit();

    }

  }
}