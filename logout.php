<?php

$redirect = getenv('HTTP_REFERER') ? getenv('HTTP_REFERER') : 'home.php';

/** See if the admin wants to redirect to a specific page or not. */
if (isset($_SESSION['jigowatt']['username'])) :
	session_unset();
	session_destroy();
endif;
header('Location: index.php');
exit();