<?php 
include "./includes/base.php";
include "./includes/header.php";
include("./includes/securityCheck.php");
?>
<body onunload="">
<div class="wide-width center">
	<?php $coursename = $_GET["autocourse"];?>
	<h1 class="fweight-300"><?php echo $coursename; ?></h1><?php
	$result = $connection->query("SELECT * FROM courses WHERE CourseName = '".$coursename."'");
	        $row = $result->fetch_array(MYSQLI_ASSOC);
	        $courseID = $row['CourseID'];
	        $description = $row['Description'];
	        ?>
	        <h6 class="fweight-400 lowgrey-text zero-margin">COURSE DESCRIPTION</h6>
	        <p><?php echo $description;?></p><?php

	        $takeCourse = true;

		$resultTwo = $connection->query("SELECT c.CourseID FROM users s, courses c, users_courses sc WHERE s.UserID = 7 AND s.UserID=sc.UserID AND sc.courseID = c.courseID");
	    
	    while($rowTwo = $resultTwo->fetch_array(MYSQLI_ASSOC)){
	    	$newVar = $rowTwo['CourseID'];

	    	if($newVar == $courseID){
	    		$takeCourse = true;
	    		break;
	    	}
	    	elseif($newVar !== $courseID){
	    		$takeCourse = false;
	    	}
	    }

	    if($takeCourse == true){?>
	    	<a class="light-btn" href="./lessonView.php?courseID=<?php echo $courseID; ?>">RETURN TO COURSE</a>
	    	<a class="red-btn" href="./deletecourse.php?courseID=<?php echo $courseID; ?>">REMOVE COURSE</a>
	    	<?php
	    }
	    else{ ?>
	    	<a class="dark-btn" href="./joincourse.php?courseID=<?php echo $courseID; ?>">JOIN COURSE</a>
	    	<?php
	    }
	?>
</div>
</body>