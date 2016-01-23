<?php
	if($_SESSION['LoggedIn'] == 1){
		$true = 1;
	}
	else{
		echo "You're not logged in. GTFO.";
		break;
	}
?>