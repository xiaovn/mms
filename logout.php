<?php

if (isset($_SESSION['xUser'])) :
	session_unset();
	session_destroy();
endif;
header('Location: index.php');
//echo "Session is clear!";
exit();