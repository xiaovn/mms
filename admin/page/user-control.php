<fieldset>
	<legend><?php _e('Control users'); ?>
	<form method="post" id="search-users-form" action="" class="pull-right">
		<div class="control-group">
		  <div class="controls">
			<div class="input-prepend">
			  <button id="add_new_user_btn" class="btn btn-small"><?php _e('Add new user'); ?></button>
			  <input type="number" class="input-mini" min="0" id="showUsers" name="showUsers" placeholder="<?php _e('Show'); ?>" value="">
			  <span class="add-on">
				<label for="username-search"><a href="#" data-rel="tooltip-bottom" title="<?php _e('Search by Username, Name, or ID!'); ?>"><i class="icon-search"></i></a></label>
			  </span>
			  <input class="span2" style="margin:0" id="username-search" type="text" name="searchUsers" onkeyup="searchSuggest(event);" placeholder="<?php _e('User search'); ?>">
			</div>
		  </div>
		</div>
	</form>
	</legend>

	<div id="add_user" class="hide">
    <?php include_once('./page/user-add.php'); ?>
	</div>

	<div id="user_list">
    <table class="table">
      <thead>
      <tr>
        <th><?php echo _('Username'); ?></th>
        <th><?php echo _('Name'); ?></th>
        <th><?php echo _('Email'); ?></th>
        <th><?php echo _('Registered Date'); ?></th>
        <th><?php echo _('Last Login'); ?></th>
      </tr>
      </thead>
      <tbody>
      <?php
      //$sql="select * from `account`";
      $sql="SELECT
              a.id, a.username, a.email, info.id, info.fullname,userlog.uid, userlog.registerday, userlog.lastlogin
            FROM `account` as a
            INNER
              JOIN `info`
              ON a.id = info.id
            INNER
              JOIN `userlog`
              ON a.id = userlog.uid
            ";
      $acc= mysql_query($sql);
      while($row= mysql_fetch_array($acc))
      {
      ?>
      <tr>
        <td>
           <a href="users.php?uid=<?php echo $row['id']; ?>" class="a-tooltip" data-rel="tooltip-bottom" title="<?php _e('Change your avatar at Gravatar.com'); ?>">
             <img class="gravatar thumbnail" src="<?php echo get_gravatar($row['email'], false, 54); ?>"/>
            <?php echo $row['username']; ?>
          </a>
        </td>
        <td> <?php echo $row['fullname']; ?></td>
        <td> <?php echo $row['email']; ?></td>
        <td> <?php echo $row['registerday']; ?></td>
        <td> <?php echo $row['lastlogin']; ?></td>
      </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
	</div>

</fieldset>

<script>
$('#add_new_user_btn').click(function(e) {

	e.preventDefault();
	$('#add_user').slideToggle();

});

$('#showUsers').blur(function() {
	$.post('classes/functions.php', {'showUsers' : $(this).val()});

	/* Little hack to refresh the page silently... */
	$('a[href="#level-control"]').tab('show');
	$('a[href="#user-control"]').tab('show');
});
</script>