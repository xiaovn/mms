<fieldset>
    <form method="post" class="form form-horizontal" action="user-add.php" id="user-add-form">
		<div id="message"></div>
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="name"><?php _e('Name'); ?></label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="name" name="name">
				</div>
			</div>

			<div class="control-group" id="usrCheck">
				<label class="control-label" for="username"><?php _e('Username'); ?></label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="username" name="username" maxlength="15">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="email"><?php _e('Email'); ?></label>
				<div class="controls">
					<input type="email" class="input-xlarge" id="email" name="email">
				</div>
			</div>
		<p class="help-block"><?php _e('<b>Note</b>: A random password will be generated and emailed to the user.'); ?></p>
		</fieldset>
		<div class="form-actions">
			<!--<button type="submit" name="add_user" class="btn btn-primary" id="user-add-submit"><?php //_e('Add user'); ?></button> -->
      <a href="" class="btn btn-info btn-small" id="user-add-submit"><?php _e('Add user'); ?> &raquo;</a>
      <div class="mgs" id="mgs"></div>
		</div>
	</form>
</fieldset>
<script>
  $(document).ready(function()
  {
    $("span.on_img").mouseover(function ()
    {
      $(this).addClass("over_img");
    });

    $("span.on_img").mouseout(function ()
    {
      $(this).removeClass("over_img");
    });
  });
  $(function() {
    $(".btn-info").click(function()
    {
      var username =  $('input[id=username]').val();
      var name =  $('input[id=name]').val();
      var email =  $('input[id=email]').val();
      var dataString = 'username='+ username + '&name='+ name + '&email=' + email;
      var parent = $(this);
      $(this).text('Loading...');
      $.ajax({
        type: "POST",
        url: "./page/ajax_insert_user.php",
        data: dataString,
        cache: false,

        success: function(html)
        {
          document.getElementById("mgs").innerHTML=html;
          //parent.html(html);
          parent.fadeIn(300);
          $(".btn-info").text("Reset");
        }
      });
      return false;
    });
  });
</script>