<?php
	include("./includes/base.php");
    include("./includes/header.php");
	unset($_SESSION);
	session_destroy();
	session_write_close();
	echo "successful logout :)";
	?>
		<a href="./index.php">index</a>
	<?php
	die;
?>